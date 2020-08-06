<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $parser = [
            'list' => 'spk',
            'menu' => 'spk',
            'tittle' => 'SIPILJur - SPK',
            'isi' => $this->load->view('admin/spk', '', true)
        ];
        $this->parser->parse('admin/main', $parser);
    }
}
