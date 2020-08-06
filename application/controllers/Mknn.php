<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mknn extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $parser = [
            'list' => 'mknn',
            'menu' => 'mknn',
            'tittle' => 'SIPILJur - Data Simulasi Mknn',
            'isi' => $this->load->view('admin/mknn', '', true)
        ];
        $this->parser->parse('admin/main', $parser);
    }
}
