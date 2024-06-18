<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function homePage()
    {
        $this->load->view('hal_home');
    }

    public function login()
    {
        $this->load->view('page_login');
    }

	public function proccess_login()
	{
        // menggunakan library form validation dari dokumentasi code igniter
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('page_login');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->AuthModel->cekEmail($email);

			if ($user->num_rows() === 1) {
				$user_data = $user->row();

				if (password_verify($password, $user_data->password)) {
					// Set session login
					$this->session->set_userdata('logged_in', FALSE);

					// Set flashdata untuk pesan sukses
					$this->session->set_flashdata('success', 'Berhasil Login');
					redirect('homePage');
				} else {
					// Password salah
					$this->session->set_flashdata('error', 'Gagal Login: Password salah');
					redirect('login');
				}
			} else {
				// Email tidak terdaftar
				$this->session->set_flashdata('error', 'Gagal Login: Email tidak terdaftar');
				redirect('login');
			}
		}
	}


    public function index()
    {
        $this->load->view('page_register');
    }

	// proses register /proccess_register
    public function proccess_register() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

		// validasi pada form
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('page_register');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
            ];

            $insert = $this->AuthModel->register($data);

            if ($insert) {
                // Set flashdata untuk pesan sukses
                $this->session->set_flashdata('success', 'Registrasi Berhasil');
                redirect('login'); // Mengarahkan ke halaman login setelah registrasi berhasil
            } else {
                echo 'Terjadi masalah saat registrasi';
            }
        }
    }
}
?>