<?php

    class Tugasakhir extends CI_Controller{
        public function __construct(){
            parent:: __construct();
            $this->load->model('Tugasakhir_model');
            $this->load->library('form_validation');
        }

        public function index(){
            $data['judul'] = 'Daftar Judul Tugas Akhir';
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $data['tugasakhir'] = $this->Tugasakhir_model->getAllTugasakhir();
            $data['namadosen'] = $this->Tugasakhir_model->namaDosen();
            $data['namadosen2'] = $this->Tugasakhir_model->namaDosen2();
            $this->load->view('templates/header', $data);
            $this->load->view('tugasakhir/index');
            $this->load->view('templates/footer');
        }

        public function pengajuan(){
            $data['judul'] = 'Daftar Pengajuan Judul Tugas Akhir';
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $data['tugasakhir'] = $this->Tugasakhir_model->getPengajuanTugasAkhir();
            $this->load->view('templates/header', $data);
            $this->load->view('tugasakhir/pengajuan');
            $this->load->view('templates/footer');
        }

        public function setuju($id){
            $this->Tugasakhir_model->setujuiPengajuan($id);
            $this->session->set_flashdata('flash', 'Disetujui');
            redirect('tugasakhir/pengajuan');
        }        

        public function edit($id){
            $data['judul'] = 'Form Edit Data Tugas Akhir';
            $data['mahasiswa'] = $this->Tugasakhir_model->getMahasiswaById($id);
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $data['dosen'] = $this->Tugasakhir_model->getNamaDosen();
            $data['tugasakhir'] = $this->Tugasakhir_model->getTugasAkhirById($id);

            $this->form_validation->set_rules('ni', 'NIM', 'required');
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
            $this->form_validation->set_rules('dospem1', 'Dosen', 'required');
            $this->form_validation->set_rules('status', 'Dosen', 'required');
            if($this->form_validation->run()==false){
                $this->load->view('templates/header', $data);
                $this->load->view('tugasakhir/edit');
                $this->load->view('templates/footer');
            } else{
                $this->Tugasakhir_model->editDataTugasakhir($id);
                redirect('tugasakhir');
            }          
           
        }

        public function tambah($id){
            $data['judul'] = 'Form Tambah Judul Tugas Akhir';
            $data['mahasiswa'] = $this->Tugasakhir_model->getMahasiswaById($id);
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $data['dosen'] = $this->Tugasakhir_model->getNamaDosen();

            $this->form_validation->set_rules('ni', 'NIM', 'required');
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
            $this->form_validation->set_rules('dospem1', 'Dosen', 'required');
            $this->form_validation->set_rules('status', 'Dosen', 'required');
            if($this->form_validation->run()==false){
                $this->load->view('templates/header', $data);
                $this->load->view('tugasakhir/tambah');
                $this->load->view('templates/footer');
            } else{
                $this->Tugasakhir_model->tambahDataTugasakhir();
                redirect('tugasakhir');
            }          
           
        }
    }
?>