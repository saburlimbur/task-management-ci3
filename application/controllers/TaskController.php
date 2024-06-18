<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TaskModel'); // /TaskModel URL
        $this->load->helper('url'); //  helper 'url' untuk URL
        $this->load->library('form_validation');  // pake library form validation agar sempurnah
    }

    public function index() {
        $data['tasks'] = $this->TaskModel->getAllTasks();  // memanggil semua getAllTask
        $this->load->view('hal_home', $data);  // memuat view 'hal_home' dengan data tasks yang telah diambil
    }

    public function create() {
        $this->form_validation->set_rules('title', 'Title', 'required');  //  validasi title wajib diisi
        $this->form_validation->set_rules('description', 'Description', 'required');  //  validasi description wajib diisi
        $this->form_validation->set_rules('status', 'Status', 'required');  // Aturan validasi status wajib diisi

        if ($this->form_validation->run() === FALSE) { // jika
            $this->load->view('add_task');  //  validasi gagal, tampilkan kembali halaman 'hal_home' (index)
        } else {
            // Jika validasi sukses, ambil data dari inputan form
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status')
            ];
            // Panggil model TaskModel untuk menyimpan data tugas baru ke database
            $this->TaskModel->insertTask($data);
            redirect('TaskController');  // akan mengembalikan ke halaman utama /TaskController atau homePage jika sudah
        }
    }

    public function edit($id) {
        $data['task'] = $this->TaskModel->getTaskById($id);  // Ambil data tugas berdasarkan ID yang diberikan
        $this->load->view('edit_task', $data);  // menampilkan halaman iew 'edit_task'. tapi masih kosong
    }

    public function update($id) { // fungsi update
        $this->form_validation->set_rules('title', 'Title', 'required');  //  validasi title wajib diisi
        $this->form_validation->set_rules('description', 'Description', 'required');  //  validasi description wajib diisi
        $this->form_validation->set_rules('status', 'Status', 'required');  //  validasi status wajib diisi

        if ($this->form_validation->run() === FALSE) {
            // jika validasi gagal, tampilkan kembali halaman 'edit_task' dengan data tugas yang ingin diubah
            $data['task'] = $this->TaskModel->getTaskById($id);
            $this->load->view('edit_task', $data);
        } else {
            // jiks validasi sukses, ambil data dari inputan form
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status')
            ];
            // memanggil model TaskModel untuk melakukan update data tugas berdasarkan ID
            $this->TaskModel->updateTask($id, $data);
            redirect('TaskController');  // redirect ke halaman utama /TaskController setelah proses update selesai
        }
    }

    public function delete($id) {
        // Panggil model TaskModel untuk menghapus data tugas berdasarkan ID
        $this->TaskModel->deleteTask($id);
        redirect('TaskController');  // Redirect ke halaman utama setelah proses penghapusan selesai
    }
}
// fungsi yang dapat digunakan cuma baru delete saja 
?>