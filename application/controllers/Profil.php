<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
    
    public function index()
	{
		if (!$this->session->userdata('nama')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> Anda Harus Login Terlebih dahulu</div>');
			redirect('auth');
        }
        
        $parser = [
            'list' => 'profil',
            'menu' => 'profil',
            'tittle' => 'SIPILJur - Profil',
            'isi' => $this->load->view('admin/profil', '', true)
        ];

        $this->parser->parse('admin/main', $parser);
	}
}
