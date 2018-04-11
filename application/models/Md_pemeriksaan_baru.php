<?php

class Md_pemeriksaan_baru extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
        $ttrs_kunjungan = $this->config->item('ttrs_kunjungan');

        $hasil = array();

        $sSQL = "
			SELECT * from ttrs_kunjungan where status_kunjungan=1
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;
    }

    // Fungsi Tambah Data
    public function MDL_Insert() {
        $ttrs_kunjungan = $this->config->item('ttrs_kunjungan');

        $id = $this->MDL_getAutoID();

        $data = array(
            'no_urut' => $id,
            'pasien' => $this->input->post('pasien'),
            'poli' => $this->input->post('poli'),
            'dokter' => $this->input->post('dokter'),
            'userid' => $this->session->userdata('userid'),
            'moduser' => $this->session->userdata('userid'),
            'recdate' => date("Y-m-d H:i:s"),
            'moddate' => date("Y-m-d H:i:s")
        );
        
        $res = $this->db->insert('ttrs_kunjungan', $data);
        
    }

    // Fungsi Ubah Data
    public function MDL_Update($id_pasien) {
        $ttrs_kunjungan = $this->config->item('ttrs_kunjungan');


        $data = array(
            'pasien' => $this->input->post('pasien'),
            'poli' => $this->input->post('poli'),
            'dokter' => $this->input->post('dokter'),
            'moduser' => $this->session->userdata('userid'),
            'moddate' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_pasien', $id_pasien);
        $res = $this->db->update('ttrs_kunjungan', $data);
    }

    // Fungsi Hapus Data
    public function MDL_Delete($id_pasien) {
        $ttrs_kunjungan = $this->config->item('ttrs_kunjungan');

        $this->db->delete('ttrs_kunjungan', array('id_pasien' => $id_pasien));
    }

    public function MDL_SelectID($no_urut) {
        $ttrs_kunjungan = $this->config->item('ttrs_kunjungan');

        return $this->db->get_where('ttrs_kunjungan', array('no_urut' => $no_urut))->row();
    }

    public function MDL_getAutoID() {
        $ttrs_kunjungan = $this->config->item('ttrs_kunjungan');

        $sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id_pasien,5,5) AS UNSIGNED INTEGER) AS num
				FROM ttrs_kunjungan
			) p
			WHERE 1=1
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            $data = $ambil->row();
            $no_urut = $data->no_urut + 1;
        } else {
            $no_urut = 1;
        }

        $hasil = sprintf("CST%05d", $no_urut);

        return $hasil;
    }

}

?>