<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realisasianggaran extends CI_Controller
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
        $role = $this->session->userdata('login_session')['role'];
        
     
        $data['title'] = "Realisasi Anggaran";
        if (is_admin() == true | is_yayasan() == true) {
            $role='yayasan';
            $keyword = $this->input->get('BAGIAN');
            if ($keyword) {
                $role = $keyword;
            }
            $data['realisasi'] = $this->admin->get("realisasi_$role");
        }else{
            $data['realisasi'] = $this->admin->get("realisasi_".$role);
        }

       
        $this->template->load('templates/dashboard', 'realisasianggaran/data', $data);
    }

    function getsaldo() {
        $role = $this->session->userdata('login_session')['role'];

        $saldo= $this->db->get_where('input_saldo_'.$role, ['INDUK_COA'=>$_GET['NO_COA']])->row_array();
        // var_dump($saldo);die();

    $data_saldo = array('NAMA_PERKIRAAN'      =>  $saldo['NAMA_PERKIRAAN'],
                        'TOTAL_SALDO'      => $saldo['TOTAL_SALDO'],
                        'SALDO_AWAL'     =>  $saldo['SALDO_AWAL']);
    echo json_encode($data_saldo);

    }

    private function _validasi($mode)
    {   
        $role = $this->session->userdata('login_session')['role'];
        
        $this->form_validation->set_rules('NAMA_REALISASI', 'Nama Realisasi', 'required|trim');

        if ($mode == 'add') {
        
            $this->form_validation->set_rules('NAMA_REALISASI', 'Nama Realisasi', 'required|trim');
        } else {
            
            $db = $this->admin->get("realisasi_".$role, ['NO_COA' => $this->input->post('NO_COA', true)]);
            $NO_COA = $this->input->post('NO_COA', true);

            $uniq_NO_COA = $db['NO_COA'] == $NO_COA ? '' : '|is_unique[realisasi_$role.NO_COA]';

            $this->form_validation->set_rules('NO_COA', 'NO_COA', 'required|trim|alpha_numeric' . $uniq_NO_COA);
        }
    }

    public function add()
    {
        $this->_validasi('add');
        $yang_login = $this->session->userdata('login_session')['nama'];

        $role = $this->session->userdata('login_session')['role'];


        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Realisasi Anggaran";
            $data['coa'] = $this->admin->getcoauntukrealisasi();
            $data['subcoa1'] = $this->admin->getsubcoa1();
            $data['subcoa2'] = $this->admin->getsubcoa2();
            $this->template->load('templates/dashboard', 'realisasianggaran/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $total = $this->input->post('TOTAL_SALDO');
            $biaya = $this->input->post('BIAYA_REALISASI');
            $INDUK_COA = $this->input->post('NO_COA');

            
            $sisa_saldo = $total-$biaya;
                        // var_dump($sisa_saldo);die();
            $date = date('y-M-d H:m:s');
            $input_data = [
                'inputby'   => $yang_login,
                'NAMA_PERKIRAAN'          => $input['NAMA_PERKIRAAN'],
                'BAGIAN'          => $input['BAGIAN'],
                'NAMA_REALISASI'          => $input['NAMA_REALISASI'],
                'SALDO_AWAL'      => $input['SALDO_AWAL'],
                'BIAYA_REALISASI'         => $input['BIAYA_REALISASI'],
                'SISA_SALDO'         => $sisa_saldo,
                'TOTAL_SALDO'       => $input['TOTAL_SALDO'],
                'NO_COA'      => $input['NO_COA'],
                'NO_SUB_COA_1'         => $input['NO_SUB_COA_1'],
                'NO_SUB_COA_2'       => $input['NO_SUB_COA_2'],
                'TGL_INPUT'       => date($input['TGL_INPUT'])
            ];
            // var_dump($input_data);die();

            if ($this->admin->insert("realisasi_".$role , $input_data)) {
            $this->admin->update('input_saldo_'.$role , 'INDUK_COA' , $INDUK_COA ,['TOTAL_SALDO'=>$sisa_saldo] );       

                set_pesan('data berhasil disimpan.');
                redirect('realisasianggaran');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('realisasianggaran/add');
            }
        }
    }

    public function edit($getId)
    {
        $role = $this->session->userdata('login_session')['role'];

        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit  Realisasi Anggaran";
            $data['realisasi'] = $this->admin->get('realisasi_anggaran', ['id' => $id]);
            $this->template->load('templates/dashboard', 'realisasianggaran/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'NAMA_PERKIRAAN'          => $input['NAMA_PERKIRAAN'],
                'BAGIAN'          => $input['BAGIAN'],
                'NAMA_REALISASI'          => $input['NAMA_REALISASI'],
                'SALDO_AWAL'      => $input['SALDO_AWAL'],
                'BIAYA_REALISASI'         => $input['BIAYA_REALISASI'],
                'SISA_SALDO'         => $input['SISA_SALDO'],
                'TOTAL_SALDO'       => $input['TOTAL_SALDO'],
                'NO_COA'      => $input['NO_COA'],
                'NO_SUB_COA_1'         => $input['NO_SUB_COA_1'],
                'NO_SUB_COA_2'       => $input['NO_SUB_COA_2'],
                'TGL_INPUT'       => $input['TGL_INPUT']
 
            ];

            if ($this->admin->update("realisasi_".$role , 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('realisasianggaran');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('realisasianggaran/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $role = $this->session->userdata('login_session')['role'];

        $id = encode_php_tags($getId);
        if ($this->admin->delete("realisasi_".$role , 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('realisasianggaran');
    }

    function get_autofill(){
        $NO_COA=$this->input->post('NO_COA');
        $data=$this->admin->get_autofill($NO_COA);
        echo json_encode($data);
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
