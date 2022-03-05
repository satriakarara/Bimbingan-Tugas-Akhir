<?php

class Login extends CI_Controller
{
public function index()
{
    $data['judul'] = 'Login Bimbingan TA Unram';
    $this->load->view('login/index');
}
}

