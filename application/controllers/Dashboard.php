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


        $data['kategoriaset'] = $this->db->query("SELECT sum(tb_aset.jumlah_unit) AS totalaset,tb_kategori.kategori FROM tb_kategori left JOIN tb_aset on tb_kategori.kategori = tb_aset.kategori GROUP BY tb_kategori.kategori")->result_array();

        $data['kategoridisposal'] = $this->db->query("SELECT sum(tb_disposal.jumlah_unit) AS totalaset,tb_kategori.kategori FROM tb_kategori left JOIN tb_disposal on tb_kategori.kategori = tb_disposal.kategori GROUP BY tb_kategori.kategori")->result_array();




        $data['user'] = $this->admin->count('user');


        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
}
