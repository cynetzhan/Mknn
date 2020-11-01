<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Modellogin extends CI_Model {

    public function login_admin($data)
    {
        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);

        return $this->db->get('user')->row();
    }

    // public function cek($data)
    // {
    //     $this->db->where('nama', $data);
    //     return $this->db->get('user')->result();
    // }

}

