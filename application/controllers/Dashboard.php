<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "Dashboard";


        $role = $this->session->userdata('login_session')['role'];


        $data['kategori'] = $this->admin->get("tb_kategori");




        $data['user'] = $this->admin->count('user');


        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
}
