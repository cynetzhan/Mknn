<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modellogin');
        
    }

    public function index()
    {

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            ];
            
            // kodingan buat ngambil data 
            $cek = $this->modellogin->login_admin($data);
            // echo var_dump($cek); die;
            if (!$cek == null) {
                $isi = [
                    'username' => $cek->username,
                    'nama' => $cek->nama,
                    'devisi' => $cek->devisi
                ];
                $this->session->set_userdata($isi);
                //echo var_dump($isi); die;
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fa fa-danger"></i> Password salah!</div>');
                $this->load->view('admin/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard');
    }


}