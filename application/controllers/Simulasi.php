<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Modeltraining', 'training');
        $this->load->model('Modeltesting', 'testing');
    }
    public function index()
    {
        $simul_result = null;
        if($this->input->post('nilai_k') != null){
            $simul_result = $this->proses_training($this->input->post('nilai_k'));
        }

        $content = [
            'nilai_k' => $this->input->post('nilai_k'),
            'hasil' => $simul_result
        ];
        $parser = [
            'list' => 'training',
            'menu' => 'training',
            'tittle' => 'SIPILJur - Simulasi MKNN',
            'isi' => $this->load->view('admin/simulasi', $content, true)
        ];
        $this->parser->parse('admin/main', $parser);
    }

    public function proses_training($nilai_k)
    {
        $config = [
            'K'=>$nilai_k
        ];
        $this->load->library('MKNN', $config);
        # transform data training
        $data_training = $this->training->get()->result_array();
        $prep_training = [];
        $label_training = [];
        foreach($data_training as $x=>$row){
            $prep_training[$x] = array_values($this->apply_transform($row));
            $label_training[$x] = $row['kelas'];
            unset($prep_training[$x]['kelas']);
        }
        $data_testing = $this->testing->get()->result_array();
        $prep_testing = [];
        $label_testing = [];
        foreach($data_testing as $x=>$row){
            $prep_testing[$x] = array_values($this->apply_transform($row));
            $label_testing[$x] = $row['kelas'];
            unset($prep_testing[$x]['kelas']);
        }
        $this->mknn->fit($prep_training, $label_training);
        return [
            'klasifikasi' => $this->mknn->predict($prep_testing, $label_testing),
            'score' => $this->mknn->score($label_testing),
            'confmat' => $this->mknn->confmat($label_testing),
            'total_training' => count($data_training),
            'testing' => $data_testing
        ];
    }

    private function apply_transform($row){
        $excludeColumns = ['id_test', 'id_train', 'nis', 'nama_siswa', 'prediksi'];
        foreach($row as $key => &$val){
            if(in_array($key, $excludeColumns)){
                unset($row[$key]);
                continue;
            }
            if($key == 'jenkel'){
                $val = $this->transform_rules('jk')($val);
                continue;
            }
            if(substr($key, 0, 5) == 'rapor' || substr($key, 0, 4) == 'usbn'){
                $val = $this->transform_rules('nilai')($val);
                continue;
            }
            if($key == 'minat' || $key == 'kelas'){
                $val = $this->transform_rules('minat')($val);
                continue;
            }
            if($key == 'nilai_iq'){
                $val = $this->transform_rules('iq')($val);
                continue;
            }
        }
        return $row;
    }

    private function transform_rules($type)
    {
        $transform_function = [
            'jk'=> function ($data) {
                return ($data == "L") ? 1 : 2;
            },
            'nilai'=> function ($data) {
                if($data >= 93){
                    return 4;
                } else if($data >= 84){
                    return 3;
                } else if($data >= 75){
                    return 2;
                } else {
                    return 1;
                }
            },
            'minat'=> function ($data) {
                return ($data == "MIPA") ? 1 : 2;
            },
            'iq'=> function ($data) {
                if($data >= 140){
                    return 1;
                } else if($data >= 120){
                    return 2;
                } else if($data >= 110){
                    return 3;
                } else if($data >= 90){
                    return 4;
                } else if($data >= 80){
                    return 5;
                } else if($data >= 70){
                    return 6;
                } else {
                    return 7;
                }
            }
        ];

        return $transform_function[$type];
    }

}