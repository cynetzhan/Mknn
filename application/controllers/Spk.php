<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modeltraining', 'training');
        $this->load->model('Modeldata', 'data');
    }
    public function index()
    {
        $payload = [];
        if($this->input->post() != null){
            $payload['result'] = $this->proses_spk($this->input->post());
            $payload['input'] = $this->input->post();
        }

        $parser = [
            'list' => 'spk',
            'menu' => 'spk',
            'tittle' => 'SIPILJur - SPK',
            'isi' => $this->load->view('admin/spk', $payload, true)
        ];
        $this->parser->parse('admin/main', $parser);
    }
    public function proses_spk($data){
        $nilai_k = 3; // Seharusnya diambil dari db / pengaturan
        $config = [
            'K'=>$nilai_k
        ];
        $this->load->library('MKNN', $config);
        // transform data training
        $data_training = $this->training->get()->result_array();
        $prep_training = [];
        $label_training = [];
        foreach($data_training as $x=>$row){
            $label_training[$x] = $row['kelas'];
            $row = $this->data->apply_transform($row);
            unset($row['kelas']);
            $prep_training[$x] = array_values($row);
        }

        // klasifikasi data inputan
        $test_transformed = array_values($this->data->apply_transform($data));
        $this->mknn->fit($prep_training, $label_training);
        return [
            'klasifikasi' => $this->mknn->predict([$test_transformed])
        ];
    }
}
