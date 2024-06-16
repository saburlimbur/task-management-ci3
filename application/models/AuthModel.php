<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {
    public function register($data)
    {
       return $this->db->insert('users', $data);
    }

    public function cekEmail($email)
    {
        return $this->db->get_where('users', ['email' => $email]);
    }
    
}
?>