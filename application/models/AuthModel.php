<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {
    public function register($data)
    {
       return $this->db->insert('users', $data);
    }

    public function cekEmail($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('users');
    }

    // public function cekUsername($username)
    // {
    //     $this->db->where('username', $username);
    //     return $this->db->get('users');
    // }
    
}
?>