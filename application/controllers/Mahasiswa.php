<?php

    class Mahasiswa extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Mahasiswa_model');    
            $this->load->library('form_validation');
            $this->load->helper('download');
        }

        public function index(){
            
            $data['judul'] = 'Daftar Mahasiswa';
            $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
            $data['tugasakhir'] = $this->Mahasiswa_model->checkTugasAkhir();
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('mahasiswa/index', $data);
            $this->load->view('templates/footer');
        }

        public function tambah(){
            $data['judul'] = 'Form Tambah Data Mahasiswa';
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

            $this->form_validation->set_rules('ni', 'NIM', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('password1', 'Password', 'required|min_length[6]|matches[password2]',
            [
                'matches' => 'Password tidak sama!',
                'min_length' => 'Password terlalu pendek!'
            ]);

            $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');
            $this->form_validation->set_rules('nohp', 'Nomor HP', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');
            if($this->form_validation->run()==false){
                $this->load->view('templates/header', $data);
                $this->load->view('mahasiswa/tambah');
                $this->load->view('templates/footer');
            } else{
                $this->Mahasiswa_model->tambahDataMahasiswa();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('mahasiswa');
            }          
           
        }

        public function hapus($id){
            $this->Mahasiswa_model->hapusDataMahasiswa($id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('mahasiswa');
        }

        public function edit($id){

            $data['judul'] = 'Form Edit Data Mahasiswa';
            $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $this->form_validation->set_rules('ni', 'NIM', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('password1', 'Password', 'required|min_length[6]|matches[password2]',
            [
                'matches' => 'Password tidak sama!',
                'min_length' => 'Password terlalu pendek!'
            ]);

            $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');
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

     

        public function profil($id){

            $data['judul'] = 'Profil';
            $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
            $data['profil'] = $this->Mahasiswa_model->profil($id);
            $data['bimbingan'] = $this->Mahasiswa_model->getBimbinganById($id);
            $data['userId'] = $this->Mahasiswa_model->userId($id);
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $this->form_validation->set_rules('dospem1', 'Dosen', 'required');
            // $this->form_validation->set_rules('bimbingan', 'bimbingan', 'required');
            if($this->form_validation->run()==false){
                $this->load->view('templates/header', $data);
                $this->load->view('mahasiswa/profil', $data);
                $this->load->view('templates/footer');
            } else{
                $this->Mahasiswa_model->kirimBimbingan($id);
                $this->Mahasiswa_model->kirimEmail($id);    //kirimEmail untuk ngirim email bimbingan
                $this->session->set_flashdata('flash', 'Dikirim');
                redirect('mahasiswa/profil/'.$id);
                
            }   
        } 
        
    }

?>