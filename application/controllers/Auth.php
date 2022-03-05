<?php


    class Auth extends CI_Controller{

        public function __construct(){
            parent::__construct();  
            $this->load->library('form_validation');            
            
        }
        public function index(){
            $this->form_validation->set_rules('email','E-Mail','trim|required|valid_email');
            $this->form_validation->set_rules('password','Password','trim|required');

            if ($this->form_validation->run() == false){
                $data['judul'] = 'Login';
                $this->load->view('auth/login', $data);
            } else{
                // validasi lolos
                $this->_login();
            }
            
        }
        private function _login(){
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['email'=>$email])->row_array();
            
            if($user){
                //usernya ada
                //cek password
                if(password_verify($password, $user['password'])){  
                    $data=[
                        'email' => $user['email'],
                        'userlevel' => $user['userlevel']
                    ];
                    $this->session->set_userdata($data);
                    redirect('tugasakhir');

                } else{
                    $this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
                Password yang anda masukkan salah! </div>');
                redirect('auth');
                }

            } else{
                $this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
                E-mail belum terdaftar! </div>');
                redirect('auth');
              }
            }
            
        
        public function logout(){
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('password');
            $this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
                Berhasil logout! </div>');
            redirect('auth');
        }
    }