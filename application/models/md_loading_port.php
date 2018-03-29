<?php

class Md_loading_port extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
        $tblloading_port = $this->config->item('tmst_loading_port');

        $hasil = array();

        $sSQL = "
			SELECT id,loading_port_code,loading_port_name
			FROM $tblloading_port 
			WHERE 1=1 
			ORDER BY loading_port_name ASC
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;
    }

    public function MDL_SelectID($id) {
        $tblloading_port = $this->config->item('tmst_loading_port');

        return $this->db->get_where($tblloading_port, array('id' => $id))->row();
    }

    // Fungsi Tambah Data
    public function MDL_Insert() {
        $tblloading_port = $this->config->item('tmst_loading_port');

        $loading_port_code = $this->input->post('loading_port_code');
        $loading_port_code = strtoupper($loading_port_code);
        $loading_port_name = $this->input->post('loading_port_name');


        $userid = $this->session->userdata('userid');
        $recdate = date("Y-m-d H:i:s");
        $moduser = $this->session->userdata('userid');
        $moddate = date("Y-m-d H:i:s");

        $data = array(
            'loading_port_code' => $loading_port_code,
            'loading_port_name' => $loading_port_name,
            'userid' => $userid,
            'recdate' => $recdate,
            'moduser' => $moduser,
            'moddate' => $moddate
        );
        $this->db->insert($tblloading_port, $data);
    }

    // Fungsi Ubah Data
    public function MDL_Update($id) {
        $tblloading_port = $this->config->item('tmst_loading_port');

        $loading_port_name = $this->input->post('loading_port_name');

        $moduser = $this->session->userdata('userid');
        $moddate = date("Y-m-d H:i:s");

        $data = array(
            'loading_port_name' => $loading_port_name,
            'moduser' => $moduser,
            'moddate' => $moddate
        );

        $this->db->where('id', $id);
        $this->db->update($tblloading_port, $data);
    }

    public function MDL_isPermInsert($id) {
        $tblloading_port = $this->config->item('tmst_loading_port');
        $res = $this->db->get_where($tblloading_port, array('loading_port_code' => $id))->num_rows();

        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    // Fungsi Hapus Data
    public function MDL_Delete($id) {
        $tblloading_port = $this->config->item('tmst_loading_port');

        $this->db->delete($tblloading_port, array('loading_port_code' => $id));
    }

    public function MDL_isPermDelete($id) {
        //Nanti di set pada table transaksi
        $tblName = $this->config->item('ttrs_lse');
        $sSQL = "
			SELECT loading_port_id FROM $tblName WHERE id = '$id' LIMIT 0,1
		";

        $ambil = $this->db->query($sSQL);
        $res = $ambil->num_rows();
        if ($res) {
            return 0;
        } else {
            return 1;
        }
    }

    public function MDL_CekField($field, $id = '') {
        $tbljob_grade = $this->config->item('tmst_job_grade');

        $fvalue = $_REQUEST['fvalue'];
        $res = ($fvalue == $id) ? 0 : $this->db->get_where($tbljob_grade, array($field => $fvalue))->num_rows();

        if (!$res) {
            return true;
        } else {
            return false;
        }
    }

}

?>