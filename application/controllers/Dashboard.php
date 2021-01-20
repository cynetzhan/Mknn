<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modeltraining', 'training');
        $this->load->model('Modeltesting', 'testing');
    }
    
    public function index()
    {
        
        $sum['totaltraining'] = $this->training->tampil_sum();
        $sum['totaltesting'] = $this->testing->tampil_sum();
        $parser = [
            'list' => '',
            'menu' => 'dashboard',
            'tittle' => 'SIPILJur - Welcome Dashboard',
            'isi' => $this->load->view('admin/dashboard', $sum,  true)
        ];
        $this->parser->parse('admin/main', $parser);
    }
}
