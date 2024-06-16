<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskModel extends CI_Model {

    public function getAllTasks() {
        return $this->db->get('tasks')->result_array();  // mengambil semua data dari tabel 'tasks' dan kembalikan dalam bentuk array
    }

    public function getTaskById($id) {
        return $this->db->get_where('tasks', ['id' => $id])->row_array();  // mengambil satu data berdasarkan ID dari tabel 'tasks' dan kembalikan dalam bentuk array
    }

    public function insertTask($data) {
        return $this->db->insert('tasks', $data);  // menaruh data baru ke dalam tabel 'tasks'
    }

    public function updateTask($id, $data) {
        $this->db->where('id', $id);  // menentukan baris yang akan diupdate berdasarkan ID
        return $this->db->update('tasks', $data);  // update data di dalam tabel 'tasks'
    }

     //fitur yang bisa baru Delete saja
    public function deleteTask($id) {
        $this->db->where('id', $id);  // menentukan task berdasarkan ID
        return $this->db->delete('tasks');  // menghapus data dari tabel 'tasks'
    }
}
?>