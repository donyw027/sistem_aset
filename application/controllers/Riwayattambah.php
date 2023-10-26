<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayattambah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        // if (!is_admin()) {
        //     redirect('dashboard');
        // }

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['title'] = "Riwayat Tambah Saldo";
        $role = $this->session->userdata('login_session')['role'];

        // if (is_admin()==true) {
        //     $data['riwayattambah'] = $this->admin->get('riwayat_tambah_saldo');
        // }else {
        // $data['riwayattambah'] = $this->admin->get('riwayat_tambah_saldo',null, ['BAGIAN'=>$role]);
        // }

        if (is_admin() == true | is_yayasan() == true) {
            $keyword = $this->input->get('BAGIAN');
            $role='yayasan';
            if ($keyword) {
                $role = $keyword;
            }
            $data['riwayattambah'] = $this->admin->get('riwayat_tambah_saldo',null, ['BAGIAN'=>$role]);
            
        }else{
        $data['riwayattambah'] = $this->admin->get('riwayat_tambah_saldo',null, ['BAGIAN'=>$role]);
        }
        $this->template->load('templates/dashboard', 'riwayattambah/data', $data);
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('riwayat_tambah_saldo', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('riwayattambah');
    }

    // public function toggle($getId)
    // {
    //     $id = encode_php_tags($getId);
    //     $status = $this->admin->get('user', ['id_user' => $id])['is_active'];
    //     $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
    //     $pesan = $toggle ? 'user diaktifkan.' : 'user dinonaktifkan.';

    //     if ($this->admin->update('user', 'id_user', $id, ['is_active' => $toggle])) {
    //         set_pesan($pesan);
    //     }
    //     redirect('user');
    // }
}
