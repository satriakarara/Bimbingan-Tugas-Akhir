<?php

    class Dosen extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Dosen_model');    
            $this->load->library('form_validation');
        }

        public function index(){
            
            $data['judul'] = 'Daftar Dosen';
            $data['dosen'] = $this->Dosen_model->getAllDosen();
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('dosen/index');
            $this->load->view('templates/footer');
        }

        public function pengajuan($id){
            $data['judul'] = 'Daftar Pengajuan Judul Tugas Akhir';
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $data['tugasakhir'] = $this->Dosen_model->getPengajuanTugasAkhir2($id);
            $this->load->view('templates/header', $data);
            $this->load->view('dosen/pengajuan');
            $this->load->view('templates/footer');
        }

        public function setuju($id){
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $this->Dosen_model->setujuiPengajuan($id);
            $this->session->set_flashdata('flash', 'Disetujui');
            redirect('dosen/pengajuan/'.$data['user']['id']);
        }
        public function terima($id){
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $this->Dosen_model->terima($id);
            redirect('dosen/pengajuan/'.$data['user']['id']);
        }
        public function tolak($id){
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $this->Dosen_model->tolak($id);
            redirect('dosen/pengajuan/'.$data['user']['id']);
        }

        public function tambah(){
            $data['judul'] = 'Form Tambah Data Dosen';
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            // $data['opsi'] = $this->Dosen_model->getDosenId();

            $this->form_validation->set_rules('ni', 'NIP', 'required');
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
                $this->load->view('dosen/tambah');
                $this->load->view('templates/footer');
            } else{
                $this->Dosen_model->tambahDataDosen();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('dosen');
            }          
           
        }

        public function hapus($id){
            $this->Dosen_model->hapusDataDosen($id);
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('dosen');
        }

        public function profil($id){

            $data['judul'] = 'Profil';
            $data['profil'] = $this->Dosen_model->profil($id);
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            
                $this->load->view('templates/header', $data);
                $this->load->view('dosen/profil', $data);
                $this->load->view('templates/footer');
        } 

        public function edit($id){
            
            $data['judul'] = 'Form Edit Data Dosen';
            $data['dosen'] = $this->Dosen_model->getDosenById($id);
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

            $this->form_validation->set_rules('ni', 'NIP', 'required');
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
                $this->load->view('dosen/edit', $data);
                $this->load->view('templates/footer');
            } else{
                $this->Dosen_model->editDosenById($id);
                $this->session->set_flashdata('flash', 'Diedit');
                redirect('dosen');
            }   
        }
        public function kirimkomentar($id){

            $data['judul'] = 'Form Edit Data Dosen';
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $data['bimbingan'] = $this->Dosen_model->getIdBimbingan($id);
            $this->form_validation->set_rules('komentar', 'Komentar', 'required');
           
            if($this->form_validation->run()==false){
                $this->load->view('templates/header', $data);
                $this->load->view('dosen/kirimkomentar', $data);
                $this->load->view('templates/footer');
            } else{
                $this->Dosen_model->kirimkomentar($id);
                $this->session->set_flashdata('flash', 'Diedit');
                redirect('dosen/bimbing/'.$data['bimbingan']['id1']);
            } 
        }

        public function bimbing($id){

           
            $data['judul'] = 'Bimbingan';
            $data['mahasiswa'] = $this->Dosen_model->getMahasiswaById($id);
            $data['profil'] = $this->Dosen_model->profill($id);
            $data['bimbingan'] = $this->Dosen_model->getBimbinganById($id);
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $this->form_validation->set_rules('dospem1', 'Dosen', 'required');
            // $this->form_validation->set_rules('bimbingan', 'bimbingan', 'required');
            if($this->form_validation->run()==false){
                $this->load->view('templates/header', $data);
                $this->load->view('dosen/bimbing', $data);
                $this->load->view('templates/footer');
            } else{
                  
                $this->session->set_flashdata('flash', 'Dikirim');
                redirect('dosen/profil/'.$id);
                
            }   
        }
        
    }

?>