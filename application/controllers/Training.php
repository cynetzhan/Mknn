<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Training extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Modeltraining', 'training');
    }
    public function index()
    {
        $parser = [
            'list' => 'training',
            'menu' => 'training',
            'tittle' => 'SIPILJur - Data Training',
            'isi' => $this->load->view('admin/training', '', true)
        ];
        $this->parser->parse('admin/main', $parser);
    }

    public function ambildata()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->training->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                
                $no++;
                $row = array();

                //tombol 
                $tomboledit = "<button type=\"button\" class=\"btn btn-sm btn-outline-info\" title=\"Edit Data\" onclick=\"edit('" . $field->nis . "')\">
                <i class=\"fa fa-tags\"></i>
            </button>";

                $tombolhapus = "<button type=\"button\" class=\"btn btn-sm btn-outline-danger\" title=\"Hapus Data\" onclick=\"hapus('" . $field->nis . "')\">
                <i class=\"fa fa-trash\"></i>
            </button>";

                $row[] = $no;
                $row[] = $field->nis;
                $row[] = $field->nama_siswa;
                $row[] = $field->jenkel;
                $row[] = $field->rapor_ind;
                $row[] = $field->usbn_ind;
                $row[] = $field->rapor_ing;
                $row[] = $field->usbn_ing;
                $row[] = $field->rapor_mtk;
                $row[] = $field->usbn_mtk;
                $row[] = $field->rapor_ipa;
                $row[] = $field->usbn_ipa;
                $row[] = $field->minat;
                $row[] = $field->nilai_iq;
                $row[] = $field->kelas;
                $row[] = $tomboledit . ' ' . $tombolhapus;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->training->count_all(),
                "recordsFiltered" => $this->training->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function formtambah()
    {
        if ($this->input->is_ajax_request() == true) {
            $msg = [
                'sukses' => $this->load->view('admin/modaltambahtraining', '', true)
            ];
            echo json_encode($msg);
        }
    }

    public function simpandata()
    {
        if ($this->input->is_ajax_request() == true) {
            $nis = $this->input->post('nis', true);
            $nama_siswa = $this->input->post('nama_siswa', true);
            $jenkel = $this->input->post('jenkel', true);
            $rapor_ind = $this->input->post('rapor_ind', true);
            $usbn_ind = $this->input->post('usbn_ind', true);
            $rapor_ing = $this->input->post('rapor_ing', true);
            $usbn_ing = $this->input->post('usbn_ing', true);
            $rapor_mtk = $this->input->post('rapor_mtk', true);
            $usbn_mtk = $this->input->post('usbn_mtk', true);
            $rapor_ipa = $this->input->post('rapor_ipa', true);
            $usbn_ipa = $this->input->post('usbn_ipa', true);
            $minat = $this->input->post('minat', true);
            $nilai_iq = $this->input->post('nilai_iq', true);
            $kelas = $this->input->post('kelas', true);

            $this->form_validation->set_rules('nis', 'NIS', 'trim|required|is_unique[training.nis]', ['required' => '%s Tidak boleh kosong', 'is_unique' => '%s sudah ada didalam database']);
            $this->form_validation->set_rules('nama_siswa', 'nama siswa', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('jenkel', 'jenis kelamin', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('rapor_ind', 'rapor ind', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('usbn_ind', 'usbn ind', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('rapor_ing', 'rapor ing', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('usbn_ing', 'usbn ing', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('rapor_mtk', 'rapor mtk', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('usbn_mtk', 'usbn mtk', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('rapor_ipa', 'rapor ipa', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('usbn_ipa', 'usbn ipa', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('minat', 'minat', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('nilai_iq', 'nilai iq', 'trim|required', ['required' => '%s Tidak boleh kosong']);
            $this->form_validation->set_rules('kelas', 'kelas', 'trim|required', ['required' => '%s Tidak boleh kosong']);


            if ($this->form_validation->run() == TRUE) {
                $this->training->simpan($nis, $nama_siswa, $jenkel, $rapor_ind, $usbn_ind, $rapor_ing, $usbn_ing, $rapor_mtk, $usbn_mtk, $rapor_ipa, $usbn_ipa, $minat, $nilai_iq, $kelas);

                $msg = [
                    'sukses' => 'Data Training Berhasil Disimpan'
                ];
            } else {
                $msg = [
                    'error' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    ' . validation_errors() . '
                </div>'
                ];
            }

            echo json_encode($msg);
        }
    }

    public function formedit()
    {
        if ($this->input->is_ajax_request() == true) {
            $nis = $this->input->post('nis', true);

            $ambildata = $this->training->ambildata($nis);

            if ($ambildata->num_rows() > 0) {
                $row = $ambildata->row_array();
                $data = [
                    'nis' => $nis,
                    'nama_siswa' => $row['nama_siswa'],
                    'jenkel' => $row['jenkel'],
                    'rapor_ind' => $row['rapor_ind'],
                    'usbn_ind' => $row['usbn_ind'],
                    'rapor_ing' => $row['rapor_ing'],
                    'usbn_ing' => $row['usbn_ing'],
                    'rapor_mtk' => $row['rapor_mtk'],
                    'usbn_mtk' => $row['usbn_mtk'],
                    'rapor_ipa' => $row['rapor_ipa'],
                    'usbn_ipa' => $row['usbn_ipa'],
                    'minat' => $row['minat'],
                    'nilai_iq' => $row['nilai_iq'],
                    'kelas' => $row['kelas']
                ];
            }
            
            $msg = [
                'sukses' => $this->load->view('admin/modaledittraining', $data, true)
            ];

            echo json_encode($msg);
        }
    }

    public function updatedata()
    {
        if ($this->input->is_ajax_request() == true) {
            $nis = $this->input->post('nis', true);
            $nama_siswa = $this->input->post('nama_siswa', true);
            $jenkel = $this->input->post('jenkel', true);
            $rapor_ind = $this->input->post('rapor_ind', true);
            $usbn_ind = $this->input->post('usbn_ind', true);
            $rapor_ing = $this->input->post('rapor_ing', true);
            $usbn_ing = $this->input->post('usbn_ing', true);
            $rapor_mtk = $this->input->post('rapor_mtk', true);
            $usbn_mtk = $this->input->post('usbn_mtk', true);
            $rapor_ipa = $this->input->post('rapor_ipa', true);
            $usbn_ipa = $this->input->post('usbn_ipa', true);
            $minat = $this->input->post('minat', true);
            $nilai_iq = $this->input->post('nilai_iq', true);
            $kelas = $this->input->post('kelas', true);

            $this->training->update($nis, $nama_siswa, $jenkel, $rapor_ind, $usbn_ind, $rapor_ing, $usbn_ing, $rapor_mtk, $usbn_mtk, $rapor_ipa, $usbn_ipa, $minat, $nilai_iq, $kelas);

            $msg = [
                'sukses' => 'data mahasiswa berhasil di-update'
            ];
            echo json_encode($msg);
        }
    }
    
    public function hapus()
    {
        if ($this->input->is_ajax_request() == true) {
            $nis = $this->input->post('nis', true);

            $hapus = $this->training->hapus($nis);

            if ($hapus) {
                $msg = [
                    'sukses' => 'Data Siswa berhasil terhapus'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function uploaddata()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('importexel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numRow > 1) {
                        $data = array(
                            'nis' => $row->getCellAtIndex(1),
                            'nama_siswa' => $row->getCellAtIndex(2),
                            'jenkel' => $row->getCellAtIndex(3),
                            'rapor_ind' => $row->getCellAtIndex(4),
                            'usbn_ind' => $row->getCellAtIndex(5),
                            'rapor_ing' => $row->getCellAtIndex(6),
                            'usbn_ing' => $row->getCellAtIndex(7),
                            'rapor_mtk' => $row->getCellAtIndex(8),
                            'usbn_mtk' => $row->getCellAtIndex(9),
                            'rapor_ipa' => $row->getCellAtIndex(10),
                            'usbn_ipa' => $row->getCellAtIndex(11),
                            'minat' => $row->getCellAtIndex(12),
                            'nilai_iq' => $row->getCellAtIndex(13),
                            'kelas' => $row->getCellAtIndex(14),

                        );
                        $this->training->import_data($data);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('uploads/' . $file['file_name']);
                $this->session->set_flashdata('pesan', 'import Data Berhasil');
                redirect('Training');
            }
        } else {
            echo "Error :" . $this->upload->display_errors();
        };
    }


}
 