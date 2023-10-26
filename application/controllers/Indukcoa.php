<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Indukcoa extends CI_Controller
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

        $data['title'] = "Induk Coa";
        $role = $this->session->userdata('login_session')['role'];

        if (is_admin()==true) {
            $data['indukcoa'] = $this->admin->get('coa');
        }else {
        $data['indukcoa'] = $this->admin->get('coa',null, ['BAGIAN'=>$role]);
        }
        $this->template->load('templates/dashboard', 'indukcoa/data', $data);
    }

    public function lihatcoa()
    {

        $data['title'] = "Lihat Coa";
        $role = $this->session->userdata('login_session')['role'];

        if (is_admin()==true) {
            $data['indukcoa'] = $this->admin->get('coa');
            $data['sub_coa_1'] = $this->admin->get('sub_coa_1');
            $data['sub_coa_2'] = $this->admin->get('sub_coa_2');

        }else {
        $data['indukcoa'] = $this->admin->get('coa',null, ['BAGIAN'=>$role]);
        $data['sub_coa_1'] = $this->admin->get('sub_coa_1',null, ['BAGIAN'=>$role]);
        $data['sub_coa_2'] = $this->admin->get('sub_coa_2',null, ['BAGIAN'=>$role]);

        }
        $this->template->load('templates/dashboard', 'lihatcoa/data', $data);
    }

    private function _validasi($mode)
    {
        $this->form_validation->set_rules('INDUK_COA', 'Induk COa', 'required|trim');
        $this->form_validation->set_rules('NAMA_PERKIRAAN', 'Nama Perkiraan', 'required|trim');

        if ($mode == 'add') {
            $this->form_validation->set_rules('INDUK_COA', 'Induk COa', 'required|trim');
            $this->form_validation->set_rules('NAMA_PERKIRAAN', 'Nama Perkiraan', 'required|trim');
        } else {
            $db = $this->admin->get('coa', ['INDUK_COA' => $this->input->post('INDUK_COA', true)]);
            $INDUK_COA = $this->input->post('INDUK_COA', true);

            // $uniq_INDUK_COA = $db['INDUK_COA'] == $INDUK_COA ? '' : '|is_unique[coa.INDUK_COA]';

            // $this->form_validation->set_rules('INDUK_COA', 'INDUK_COA', 'required|trim|alpha_numeric' . $uniq_INDUK_COA);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Coa";
            $this->template->load('templates/dashboard', 'indukcoa/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'INDUK_COA'          => $input['INDUK_COA'],
                'NAMA_PERKIRAAN'      => $input['NAMA_PERKIRAAN'],
                'TIPE'         => $input['TIPE'],
                'BAGIAN'       => $input['BAGIAN']
 
            ];

            if ($this->admin->insert('coa', $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('indukcoa');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('indukcoa/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Coa";
            $data['indukcoa'] = $this->admin->get('coa', ['id' => $id]);
            $this->template->load('templates/dashboard', 'indukcoa/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'INDUK_COA'          => $input['INDUK_COA'],
                'NAMA_PERKIRAAN'      => $input['NAMA_PERKIRAAN'],
                'TIPE'         => $input['TIPE'],
                'BAGIAN'       => $input['BAGIAN']
 
            ];

            if ($this->admin->update('coa', 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('indukcoa');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('indukcoa/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('coa', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('indukcoa');
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
