<?php

    class Dashboard extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Dashboard_model');    
            $this->load->library('form_validation');
        }

        public function index(){
            $data['judul'] = 'Dashboard';
            $data['dosen'] = $this->Dashboard_model->jumlahDosen();
            $data['dosen1'] = $this->Dashboard_model->jumlahDosen1();
            $data['dosen2'] = $this->Dashboard_model->jumlahDosen2();
            $data['user'] = $this->db->get_where('user', ['email'=>$this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('templates/footer');    
        }

    }


?>