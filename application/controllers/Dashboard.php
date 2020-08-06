<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $parser = [
            'list' => '',
            'menu' => 'dashboard',
            'tittle' => 'SIPILJur - Welcome Dashboard',
            'isi' => $this->load->view('admin/dashboard', '', true)
        ];
        $this->parser->parse('admin/main', $parser);
    }
}
