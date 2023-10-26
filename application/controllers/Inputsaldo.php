<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputsaldo extends CI_Controller
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
           
     
        $data['title'] = "Input Saldo";
        // $data['coa'] = $this->admin->getcoa();
        $data['coa'] = $this->admin->getcoauntukrealisasi();

        if (is_admin() == true | is_yayasan() == true) {
            $role='yayasan';
            $keyword = $this->input->get('BAGIAN');
            if ($keyword) {
                $role = $keyword;
            }
            $data['input_saldo'] = $this->admin->get("input_saldo_$role");
            
        }else{
        $data['input_saldo'] = $this->admin->get("input_saldo_".$role);
        }
        $this->template->load('templates/dashboard', 'inputsaldo/data', $data);



    }

    function tambahsaldo() {
        $role = $this->session->userdata('login_session')['role'];
        $inpby = $this->session->userdata('login_session')['nama'];
        // print_r($role);die();

        $inputby = $inpby;
        $INDUK_COA = $this->input->post('INDUK_COA');
        $BAGIAN = $role;
        $JUMLAH_TAMBAH = $this->input->post('JUMLAH_TAMBAH');
        $KETERANGAN = $this->input->post('KETERANGAN');
        $TOTAL_SALDO = $this->input->post('TOTAL_SALDO');
        $TGL_INPUT = $this->input->post('TGL_INPUT');
        $hasil_jumlah = $TOTAL_SALDO + $JUMLAH_TAMBAH ;

        $this->admin->insert("riwayat_tambah_saldo" , [
            'inputby'          => $inputby,
            'INDUK_COA'          => $INDUK_COA,
            'BAGIAN'          => $BAGIAN,
            'KETERANGAN'          => $KETERANGAN,
            'JUMLAH_TAMBAH'      => $JUMLAH_TAMBAH,
            'TGL_INPUT'       => $TGL_INPUT
        ]);
        $this->admin->update('input_saldo_'.$role , 'INDUK_COA' , $INDUK_COA ,['TOTAL_SALDO'=>$hasil_jumlah] );       
        echo json_encode([
            'Sukses'=>True
        ]);

        
    }

    function getsaldo() {
        $role = $this->session->userdata('login_session')['role'];

        $saldo= $this->db->get_where('input_saldo_'.$role, ['INDUK_COA'=>$_GET['INDUK_COA']])->row_array();

    $data_saldo = array('TOTAL_SALDO'      =>  $saldo['TOTAL_SALDO'],
                        'SALDO_AWAL'     =>  $saldo['SALDO_AWAL']);
    echo json_encode($data_saldo);

    }

 


    private function _validasi($mode)
    {   
        $role = $this->session->userdata('login_session')['role'];
        
        $this->form_validation->set_rules('SALDO_AWAL', 'Saldo Awal', 'required|trim');

        if ($mode == 'add') {
        
            $this->form_validation->set_rules('SALDO_AWAL', 'Saldo Awal', 'required|trim');
        } else {
            
            $db = $this->admin->get("input_saldo_".$role, ['INDUK_COA' => $this->input->post('INDUK_COA', true)]);
            $INDUK_COA = $this->input->post('INDUK_COA', true);

            // $uniq_INDUK_COA = $db['INDUK_COA'] == $INDUK_COA ? '' : '|is_unique[input_saldo_$role.INDUK_COA]';

            // $this->form_validation->set_rules('INDUK_COA', 'INDUK_COA', 'required|trim|alpha_numeric' . $uniq_INDUK_COA);
        }
    }

    public function add()
    {
        $this->_validasi('add');
        $role = $this->session->userdata('login_session')['role'];


        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Master Saldo";
            $data['coa'] = $this->admin->getcoa();
            $data['subcoa1'] = $this->admin->getsubcoa1();
            $data['subcoa2'] = $this->admin->getsubcoa2();
            $this->template->load('templates/dashboard', 'inputsaldo/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'INDUK_COA'          => $input['INDUK_COA'],
                'NAMA_PERKIRAAN'          => $input['NAMA_PERKIRAAN'],
                'BAGIAN'          => $input['BAGIAN'],
                'SALDO_AWAL'      => $input['SALDO_AWAL'],
                'TOTAL_SALDO'       => $input['SALDO_AWAL'],
                'TGL_INPUT'       => $input['TGL_INPUT']
            ];

            if ($this->admin->insert("input_saldo_".$role , $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('inputsaldo');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('inputsaldo/add');
            }
        }
    }
    

    public function edit($getId)
    {
        $role = $this->session->userdata('login_session')['role'];


        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit  Master Saldo";
            $data['inputsaldo'] = $this->admin->get('input_saldo_'.$role , ['id' => $id]);
            $this->template->load('templates/dashboard', 'inputsaldo/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'INDUK_COA'          => $input['INDUK_COA'],
                'NAMA_PERKIRAAN'          => $input['NAMA_PERKIRAAN'],
                'BAGIAN'          => $input['BAGIAN'],
                'SALDO_AWAL'      => $input['SALDO_AWAL'],
                'TOTAL_SALDO'       => $input['SALDO_AWAL'],
                'TGL_INPUT'       => $input['TGL_INPUT']
 
            ];

            if ($this->admin->update("input_saldo_".$role , 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('inputsaldo');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('inputsaldo/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $role = $this->session->userdata('login_session')['role'];

        $id = encode_php_tags($getId);
        if ($this->admin->delete("input_saldo_".$role , 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('inputsaldo');
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
