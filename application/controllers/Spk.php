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
            $action = $_POST['actname'];
            unset($_POST['actname']);
            $payload['result'] = $this->proses_spk($this->input->post());
            $payload['input'] = $this->input->post();

            if($action == "savepdf"){
                return $this->proses_pdf($payload);
            }

            if($action == "savelog"){
                $this->simpan_log($payload);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-exclamation-triangle"></i> Data berhasil disimpan</div>');
            }
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

    public function proses_pdf($data){
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
            'orientation'=>'P'
        ]);
        $mpdf->SetDisplayMode('fullpage');
        $html = $this->load->view('admin/spkprint', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('mpdf.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function simpan_log($data){
        $param = array_merge($data['input'], ['kelas'=>$data['result'][0]['prediksi']]);
        return $this->db->insert('log_spk', $param);
    }
}
