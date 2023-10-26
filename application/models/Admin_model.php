<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
    }  

    public function count($table)
    {
        return $this->db->count_all($table);
    }


    public function laporan($table, $mulai, $akhir)
    {
        $tgl = $table == 'barang_masuk' ? 'tanggal_masuk' : 'tanggal_keluar';
        $this->db->where($tgl . ' >=', $mulai);
        $this->db->where($tgl . ' <=', $akhir);
        return $this->db->get($table)->result_array();
    }

    public function getcoa()
	{   
        $role = $this->session->userdata('login_session')['role'];

		if (Is_admin() == true) {
            return $this->db->get('coa')->result();
        }else {
            return $this->db->query("SELECT * FROM coa where BAGIAN='$role'")->result();
        }
        
	}

    public function getcoauntukrealisasi()
	{   
        $role = $this->session->userdata('login_session')['role'];

		if (Is_admin() == true) {
            return $this->db->get('coa')->result();
        }else {
            return $this->db->query("SELECT * FROM input_saldo_$role")->result();
        }
        
	}

    public function get_keyword($keyword="sarpras")
    {
         $this->db->select('*');
        $this->db->from('input_saldo_'.$keyword);
        
        return $this->db->get()->result();
    }


    public function getsubcoa1()
	{
        $role = $this->session->userdata('login_session')['role'];

        if (Is_admin() == true) {
            return $this->db->get('sub_coa_1')->result();

        }else {
            return $this->db->query("SELECT * FROM sub_coa_1 where BAGIAN='$role'")->result();
        }

	}

    public function getsubcoa2()
	{
        $role = $this->session->userdata('login_session')['role'];

        if (Is_admin() == true) {
            return $this->db->get('sub_coa_2')->result();
        }else {
            return $this->db->query("SELECT * FROM sub_coa_2 where BAGIAN='$role'")->result();
        }

		
	}

    function get_autofill_mod($NO_COA){
        $role = $this->session->userdata('login_session')['role'];

        $hsl=$this->db->query("SELECT * FROM input_saldo_.$role WHERE NO_COA='$NO_COA'");
          if($hsl->num_rows()>0){
          foreach ($hsl->result() as $data) {
          $hasil=array(
            'NO_COA' => $data->NO_COA,
            'NAMA_PERKIRAAN' => $data->NAMA_PERKIRAAN,
            'SALDO_AWAL' => $data->SALDO_AWAL,
            );
          }
                }
          return $hasil;
        }

        

    
}
