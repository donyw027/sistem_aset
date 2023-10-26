<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subcoa1 extends CI_Controller
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
        $data['title'] = "Sub Coa 1";
        $role = $this->session->userdata('login_session')['role'];

        if (is_admin()==true) {
            $data['subcoa1'] = $this->admin->get('sub_coa_1');
        }else {
        $data['subcoa1'] = $this->admin->get('sub_coa_1',null, ['BAGIAN'=>$role]);
        }
        $this->template->load('templates/dashboard', 'subcoa1/data', $data);
    }

    private function _validasi($mode)
    {   
        $this->form_validation->set_rules('NO_SUB_COA_1', 'No Sub Coa 1', 'required|trim');
        $this->form_validation->set_rules('INDUK_COA', 'Induk Coa', 'required|trim');
        $this->form_validation->set_rules('NAMA_PERKIRAAN', 'Nama Perkiraan', 'required|trim');

        if ($mode == 'add') {
        $this->form_validation->set_rules('NO_SUB_COA_1', 'No Sub Coa 1', 'required|trim');

            $this->form_validation->set_rules('INDUK_COA', 'Induk Coa', 'required|trim');
            $this->form_validation->set_rules('NAMA_PERKIRAAN', 'Nama Perkiraan', 'required|trim');
        } else {
            
            $db = $this->admin->get('sub_coa_1', ['NO_SUB_COA_1' => $this->input->post('NO_SUB_COA_1', true)]);
            $NO_SUB_COA_1 = $this->input->post('NO_SUB_COA_1', true);

          

        }
    }

    public function add()
    {   
        $this->_validasi('add');    

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Sub Coa 1";
            $data['coa'] = $this->admin->getcoa();

            $this->template->load('templates/dashboard', 'subcoa1/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'NO_SUB_COA_1'          => $input['NO_SUB_COA_1'],
                'INDUK_COA'          => $input['INDUK_COA'],
                'NAMA_PERKIRAAN'      => $input['NAMA_PERKIRAAN'],
                'TIPE'         => $input['TIPE'],
                'BAGIAN'       => $input['BAGIAN']
 
            ];

            if ($this->admin->insert('sub_coa_1', $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('subcoa1');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('subcoa1/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Sub Coa 1";
            $data['subcoa1'] = $this->admin->get('sub_coa_1', ['id' => $id]);
            $this->template->load('templates/dashboard', 'subcoa1/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'NO_SUB_COA_1'          => $input['NO_SUB_COA_1'],
                'INDUK_COA'          => $input['INDUK_COA'],
                'NAMA_PERKIRAAN'      => $input['NAMA_PERKIRAAN'],
                'TIPE'         => $input['TIPE'],
                'BAGIAN'       => $input['BAGIAN']
 
            ];

            if ($this->admin->update('sub_coa_1', 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('subcoa1');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('subcoa1/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('sub_coa_1', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('subcoa1');
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
