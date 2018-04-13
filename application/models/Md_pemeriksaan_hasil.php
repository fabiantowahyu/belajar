<?php

class Md_pemeriksaan_hasil extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
        $ttrs_pemeriksaan_lab = $this->config->item('ttrs_kunjungan');

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
    public function MDL_Insert($id_pemeriksaan) {
        $ttrs_pemeriksaan_lab = $this->config->item('ttrs_pemeriksaan_lab');

        //$id = $this->MDL_getAutoID();

        $data = array(
            //'id_pemeriksaan' => $id,
            'moddate' => date("Y-m-d H:i:s")
        );
        $this->db->where('id_pemeriksaan', $id_pemeriksaan);
        $this->db->update('ttrs_pemeriksaan_lab', $data);
        
        $hasil = $this->input->post('hasil');
         foreach ($hasil as $key => $value) {
            $data2 = array(
                
                 'id_pemeriksaan' => $id_pemeriksaan,
                'kode_tindakan_lab' => $value['kode_tindakan_lab'],
                'nilai' => $value['nilai'],
                'saran' => $value['saran'],
                'analisis' => $value['analisis'],
                'userid' => $this->session->userdata('userid'),
                'recdate' => date("Y-m-d H:i:s"),
                
            );
            $this->db->insert('ttrs_pemeriksaan_lab_hasil', $data2);
          
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

    public function MDL_SelectID($id_pemeriksaan) {
        $ttrs_pemeriksaan_lab = $this->config->item('ttrs_pemeriksaan_lab');
        
        return $this->db->get_where('ttrs_pemeriksaan_lab', array('id_pemeriksaan' => $id_pemeriksaan))->row();
    }
    
    public function MDL_SelectTindakan($id_pemeriksaan) {
        $ttrs_pemeriksaan_lab = $this->config->item('ttrs_pemeriksaan_lab_item');
        
        return $this->db->get_where('ttrs_pemeriksaan_lab_item', array('id_pemeriksaan' => $id_pemeriksaan))->result();
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