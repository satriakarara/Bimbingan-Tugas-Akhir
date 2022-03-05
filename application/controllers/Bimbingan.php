<?php

    class Bimbingan extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Bimbingan_model');    
            $this->load->library('form_validation');
            
        }

        public function index(){
            
            $data['judul'] = 'List Bimbingan';
            $data['bimbingan'] = $this->Bimbingan_model->getAllBimbingan();
            $this->load->view('templates/header', $data);
            $this->load->view('bimbingan/index');
            $this->load->view('templates/footer');
        }

        public function kirim(){
            $data['judul'] = 'Kirim Bimbingan';

            $this->form_validation->set_rules('file', 'File', 'required');
            $this->form_validation->set_rules('komentar', 'Komentar', 'required');
            $this->form_validation->set_rules('dosen1', 'Dosen', 'required');
            $this->form_validation->set_rules('mahasiswa', 'Mahasiswa', 'required');
            if($this->form_validation->run()==false){
                $this->load->view('templates/header', $data);
                $this->load->view('bimbingan/kirim');
                $this->load->view('templates/footer');
            } else{
                $this->Bimbingan_model->kirimBimbingan();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                // kirim email disini
                redirect('bimbingan');
            }          
           
        }

        // public function send_mail(){
        //     $from_email = "kararasatria2@gmail.com";
        // $to_email = "kararasatria@gmail.com";

        // //Load email library 
        // $this->load->library('email');

        // $this->email->from($from_email, 'Your Name');
        // $this->email->to($to_email);
        // $this->email->subject('Email Test');
        // $this->email->message('Testing the email class.');
        // }

        public function hapus($id){
            $this->Mahasiswa_model->hapusDataMahasiswa($id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('mahasiswa');
        }

        public function edit($id){
            $data['judul'] = 'Form Edit Data Mahasiswa';
            $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);

            $this->form_validation->set_rules('nim', 'NIM', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('nohp', 'Nomor HP', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');
            if($this->form_validation->run()==false){
                $this->load->view('templates/header', $data);
                $this->load->view('mahasiswa/edit', $data);
                $this->load->view('templates/footer');
            } else{
                $this->Mahasiswa_model->editMahasiswaById($id);
                $this->session->set_flashdata('flash', 'Diedit');
                redirect('mahasiswa');
            }   
        }
    }

?>