<?php

class Md_pemeriksaan_hasil extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
        $ttrs_kunjungan = $this->config->item('ttrs_kunjungan');

        $hasil = array();

        $sSQL = "
			SELECT * from ttrs_pemeriksaan_lab 
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
    public function MDL_Insert($no_urut) {
        $ttrs_pemeriksaan_lab = $this->config->item('ttrs_pemeriksaan_lab');

        $id = $this->MDL_getAutoID();

        $data = array(
            'id_pemeriksaan' => $id,
            'no_urut' => $no_urut,
            'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
            'pasien' => $this->input->post('pasien'),
            'dokter' => $this->input->post('dokter'),
            'nama_dokter' => '',
            'asuransi' => $this->input->post('asuransi'),
            'userid' => $this->session->userdata('userid'),
            'moduser' => $this->session->userdata('userid'),
            'recdate' => date("Y-m-d H:i:s"),
            'moddate' => date("Y-m-d H:i:s")
        );
        
        $res = $this->db->insert('ttrs_pemeriksaan_lab', $data);
        
        $barang = $this->input->post('barang');
         foreach ($barang as $key => $value) {
            $data2 = array(
                'id_pemeriksaan' => $id,
                'kode_tindakan_lab' => $value['item'],
                'harga' => str_replace(',', '', $value['unit_price']),
                'diskon' => $value['discount'],
                'total' => str_replace(',', '', $value['total']),
                'userid' => $this->session->userdata('userid'),
                'recdate' => date("Y-m-d H:i:s"),
                
            );
            $this->db->insert('ttrs_pemeriksaan_lab_item', $data2);
          
        }
    }

    // Fungsi Ubah Data
    public function MDL_Update($id_pasien) {
        $ttrs_pemeriksaan_lab = $this->config->item('ttrs_pemeriksaan_lab');


        $data = array(
            'pasien' => $this->input->post('pasien'),
            'poli' => $this->input->post('poli'),
            'dokter' => $this->input->post('dokter'),
            'moduser' => $this->session->userdata('userid'),
            'moddate' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_pasien', $id_pasien);
        $res = $this->db->update('ttrs_pemeriksaan_lab', $data);
    }

    // Fungsi Hapus Data
    public function MDL_Delete($id_pasien) {
        $ttrs_pemeriksaan_lab = $this->config->item('ttrs_pemeriksaan_lab');

        $this->db->delete('ttrs_pemeriksaan_lab', array('id_pasien' => $id_pasien));
    }

    public function MDL_SelectID($no_urut) {
        $ttrs_kunjungan = $this->config->item('ttrs_kunjungan');

        return $this->db->get_where('ttrs_kunjungan', array('no_urut' => $no_urut))->row();
    }

    public function MDL_getAutoID() {
        $ttrs_pemeriksaan_lab = $this->config->item('ttrs_pemeriksaan_lab');

        $sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id_pemeriksaan,5,5) AS UNSIGNED INTEGER) AS num
				FROM ttrs_pemeriksaan_lab
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

        $hasil = sprintf("CHK%05d", $no_urut);

        return $hasil;
    }

}

?>