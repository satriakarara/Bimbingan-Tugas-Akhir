<?php

class Home extends CI_Controller
{
    public function __construct(){
            parent::__construct();
            $this->load->model('Tugasakhir_model');
            $this->load->library('form_validation');
        }
public function index()
{
    $data['judul'] = 'Daftar Judul Tugas Akhir';
    $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
    $data['tugasakhir'] = $this->Tugasakhir_model->getAllTugasakhir();
    $data['namadosen'] = $this->Tugasakhir_model->namaDosen();
    $data['namadosen2'] = $this->Tugasakhir_model->namaDosen2();
    $this->load->view('templates/header', $data);
    $this->load->view('tugasakhir/index');
    $this->load->view('templates/footer');
}
}
?>