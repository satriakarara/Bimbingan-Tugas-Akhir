<?php

    class Admin extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Admin_model');    
            $this->load->library('form_validation');
        }

        public function index(){
            $data['judul'] = 'Admin';
            $data['mahasiswa'] = $this->Admin_model->getAllMahasiswa();
            $data['belumsempro'] = $this->Admin_model->belumSempro();
            $data['sudahsempro'] = $this->Admin_model->sudahSempro();
            $data['sudahsemhas'] = $this->Admin_model->sudahSemhas();
            $data['sudahujian'] = $this->Admin_model->sudahUjian();
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        }

        public function tabel($id){
            $data['judul'] = 'Admin';
            $data['mahasiswa'] = $this->Admin_model->getAllMahasiswa();
            
            $data['id'] = $this->Admin_model->getId($id);

            $data['belumsempro'] = $this->Admin_model->belumSempro();            
            $data['belumsemprodosen'] = $this->Admin_model->belumSemproDosen();

            $data['sudahsempro'] = $this->Admin_model->sudahSempro();
            $data['sudahsemprodosen'] = $this->Admin_model->sudahSemproDosen();

            $data['sudahsemhas'] = $this->Admin_model->sudahSemhas();
            $data['sudahsemhasdosen'] = $this->Admin_model->sudahSemhasDosen();

            $data['sudahujian'] = $this->Admin_model->sudahUjian();
            $data['sudahujiandosen'] = $this->Admin_model->sudahUjianDosen();

            $data['tugasakhir'] = $this->Admin_model->getAllTugasAkhir();
            $data['namadosen'] = $this->Admin_model->namaDosen();
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('admin/tabel', $data);
            $this->load->view('templates/footer');
        }

    }


?>