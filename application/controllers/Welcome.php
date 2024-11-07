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
        // Pastikan pengguna sudah login sebelum menampilkan halaman homePage
        if ($this->session->userdata('logged_in')) {
            $this->load->view('hal_home');
        } else {
            redirect('login'); // Redirect ke halaman login jika belum login
        }
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
                    $userdata = array(
                        'user-role'=> $user_data->user_role, 
                        'username' => $user_data->username,  
                        'email' => $user_data->email,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($userdata);

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
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
    
        // Validasi form
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('page_register');
        } else {
            $email = $this->input->post('email');
            // Cek apakah email sudah terdaftar
            $email_check = $this->AuthModel->cekEmail($email);
    
            if ($email_check->num_rows() > 0) {
                if ($this->input->is_ajax_request()) {
                    echo json_encode(['status' => 'error', 'message' => 'Email sudah terdaftar']);
                    return;
                } else {
                    $this->session->set_flashdata('error', 'Email sudah terdaftar');
                    $this->load->view('page_register');
                }
            } else {
                $data = [
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
                ];
    
                $insert = $this->AuthModel->register($data);
    
                if ($insert) {
                    if ($this->input->is_ajax_request()) {
                        echo json_encode(['status' => 'success', 'message' => 'Registrasi berhasil, silakan login']);
                        return;
                    } else {
                        $this->session->set_flashdata('success', 'Registrasi Berhasil');
                        redirect('welcome/login');
                    }
                } else {
                    if ($this->input->is_ajax_request()) {
                        echo json_encode(['status' => 'error', 'message' => 'Terjadi masalah saat registrasi']);
                        return;
                    } else {
                        $this->session->set_flashdata('error', 'Terjadi masalah saat registrasi');
                        $this->load->view('page_register');
                    }
                }
            }
        }
    }
    

    public function logout()
    {
        // Hapus semua data sesi
        $this->session->sess_destroy();
        redirect('login');
    }

    // view pada settings page

    public function settings_page()
    {
        $this->load->view('page_settings');
    }

}
?>