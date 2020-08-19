<?php

use Phpml\Math\Distance\Euclidean;
use Phpml\Metric\Accuracy;
use Phpml\Metric\ConfusionMatrix;
/* This is a modified version of MKNN to provide flexibility of fitting or predicting data */
/* nearest neighbors is suck (in time and resource usage), shouldn't be used for processing hundred thousands data */
class MKNN{

    private $samples;
    public $samples_label;
    private $K;
    public $weight;
    public $predicted_labels;
    public $validity;
    private $offset;
    private $CI;
    public $distance;
 
    function __construct($param){
       $this->K = $param['K'];
       $this->offset = isset($param['offset'])?$param['offset']:0;
       $this->CI =& get_instance();
       $this->distance = new Euclidean();
    }
 
    function fit($samples, $samples_label){
       $this->samples = $samples;
       $this->samples_label = $samples_label;
       $this->validity();
    }

    function set_samples($samples, $samples_label){
        $this->samples = $samples;
        $this->samples_label = $samples_label;
    }

    function set_validity($validity){
        $this->validity = $validity;
    }
 
    function predict($test_samples, $test_labels){
        // $sample_count = count($this->samples);
        // $first_only = true;
        $result = [];
        foreach($test_samples as $iy=>$y){
            $weight = [];
            foreach($this->samples as $ix=>$x){
                $weight[$ix]['weights'] = $this->validity[$ix] / ($this->distance->distance($x, $y) + 0.5);
                $weight[$ix]['labels'] = $this->samples_label[$ix];
            }
            array_multisort(array_column($weight, "weights"), SORT_DESC, array_column($weight, "labels"), SORT_ASC, $weight);
            $sliced_majority = array_slice(array_column($weight, 'labels'), 0, $this->K);
            $this->predicted_labels[$iy] = $sliced_majority[0];
            $result[$iy] = [
                // "id"=>$iy,
                "kelas"=>$test_labels[$iy],
                "prediksi"=>$this->predicted_labels[$iy]
            ];
            // if($first_only){
            //     $sendJson["total_test"] = count($test_samples);
            //     $first_only = false;
            // }
            // $this->CI->template->send_json($sendJson);
            // usleep(1000);
        }
        return $result;
    }
 
    private function validity(){
       $this->validity = array_fill(0, count($this->samples), 0);
       foreach($this->samples as $ix=>$val){
          if($ix < $this->offset) continue;
          $distances = [];
          foreach($this->samples as $ix_b=>$val_b){
             if($ix !== $ix_b) $distances[$ix_b] = $this->distance->distance($val, $val_b); // Hanya menghitung distance data yg tidak sama
          }
          asort($distances);
          $s_func = 0;
          foreach(array_slice($distances, 0, $this->K, true) as $i=>$n){
             $s_func += ($this->samples_label[$i] == $this->samples_label[$ix])?1:0;
          }
          $this->validity[$ix] = $s_func / $this->K;
        //   $this->save_validity($ix, $s_func / $this->K);
        //   $this->CI->template->send_json(["data_num"=>$ix+1]);
       }
    }

    private function save_validity($id, $val){
        $this->CI->db->query("insert into validity_latih_".$this->K." values('$id', '$val')");
    }

    public function log($array_msg){
        echo json_encode($array_msg);
        $this->CI->template->flush();
    }

    public function score($test_class){
        return Accuracy::score($test_class, $this->predicted_labels);
    }
    
    public function confmat($test_class){
        $unique_label = array_values(array_unique($this->samples_label));
        return ConfusionMatrix::compute($test_class, $this->predicted_labels, $unique_label);
    }

    public function normalize_num($array){
        $max = max($array);
        $min = min($array);

        foreach($array as $x=>$val){
            $array[$x] = ($val - $min) / ($max-$min);
        }
        return $array;
    }
}