<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TaskModel'); // Memuat model
        $this->load->helper('url'); // Memuat URL helper
        $this->load->library('form_validation');  // Memuat library validasi form
    }

    public function index() {
        $data['tasks'] = $this->TaskModel->getAllTasks();  // Mendapatkan semua tugas
        $this->load->view('hal_home', $data);  // Memuat view 'hal_home' dengan data tugas
    }

    public function create() {
        $this->form_validation->set_rules('title', 'Title', 'required');  // Aturan validasi untuk judul
        $this->form_validation->set_rules('description', 'Description', 'required');  // Aturan validasi untuk deskripsi
        $this->form_validation->set_rules('status', 'Status', 'required');  // Aturan validasi untuk status

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('add_task');  // Jika validasi gagal, muat view 'add_task'
        } else {
            // Jika validasi berhasil, ambil data dari form
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status'),
                // 'start_date' => $this->input->post('start_date'),  // Tangkap tanggal mulai
                // 'end_date' => $this->input->post('end_date')  // Tangkap tanggal selesai
            ];
            // Panggil model untuk menyimpan data tugas baru ke database
            $this->TaskModel->insertTask($data);
            redirect('TaskController');  // Redirect ke halaman utama TaskController setelah menyimpan
        }
    }

    public function edit($id) {
        $data['task'] = $this->TaskModel->getTaskById($id);  // Mendapatkan data tugas berdasarkan ID
        $this->load->view('edit_task', $data);  // Memuat view 'edit_task' dengan data tugas
    }

    public function update($id) {
        $this->form_validation->set_rules('title', 'Title', 'required');  // Aturan validasi untuk judul
        $this->form_validation->set_rules('description', 'Description', 'required');  // Aturan validasi untuk deskripsi
        $this->form_validation->set_rules('status', 'Status', 'required');  // Aturan validasi untuk status

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, muat ulang view 'edit_task' dengan data tugas yang akan diubah
            $data['task'] = $this->TaskModel->getTaskById($id);
            $this->load->view('edit_task', $data);
        } else {
            // Jika validasi berhasil, ambil data dari form
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status')
            ];
            // Panggil model untuk mengupdate data tugas ke database
            $this->TaskModel->updateTask($id, $data);
            redirect('TaskController');  // Redirect ke halaman utama TaskController setelah update
        }
    }

    public function delete($id) {
        // Panggil model untuk menghapus data tugas berdasarkan ID
        $this->TaskModel->deleteTask($id);
        redirect('TaskController');  // Redirect ke halaman utama TaskController setelah penghapusan
    }
}
?>