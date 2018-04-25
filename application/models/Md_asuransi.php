<?php
class Md_asuransi extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select() {
		$tmst_asuransi = $this->config->item('tmst_asuransi');

		$hasil = array();
		
		$sSQL = "
			SELECT * from tmst_asuransi
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
		$tmst_asuransi = $this->config->item('tmst_asuransi');

		$id = $this->MDL_getAutoID();
		
		$data = array(
			'id_asuransi' => $id,
			'nama_asuransi' => $this->input->post('nama_asuransi'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
                        'kontak' => $this->input->post('kontak'),
                        'margin_tindakan' => $this->input->post('margin_tindakan'),
                        'margin_lab_rontgen' => $this->input->post('margin_lab_rontgen'),
                        'margin_obat' => $this->input->post('margin_obat'),
			'userid' => $this->session->userdata('userid'),
                        'moduser' => $this->session->userdata('userid'),
			'recdate' => date("Y-m-d H:i:s"),
			'moddate' => date("Y-m-d H:i:s")
			);
		$res = $this->db->insert('tmst_asuransi', $data);
		
	}

	// Fungsi Ubah Data
	public function MDL_Update($id_asuransi){
		$tmst_asuransi = $this->config->item('tmst_asuransi');

		
		$data = array(
			'nama_asuransi' => $this->input->post('nama_asuransi'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
                        'kontak' => $this->input->post('kontak'),
                        'margin_tindakan' => $this->input->post('margin_tindakan'),
                        'margin_lab_rontgen' => $this->input->post('margin_lab_rontgen'),
                        'margin_obat' => $this->input->post('margin_obat'),
			'moduser' => $this->session->userdata('userid'),
			'moddate' => date("Y-m-d H:i:s")
			);

                 $this->db->where('id_asuransi', $id_asuransi);
		 $res = $this->db->update('tmst_asuransi', $data);
		
    }

	// Fungsi Hapus Data
	public function MDL_Delete($id_asuransi) {
		$tmst_asuransi = $this->config->item('tmst_asuransi');

		$this->db->delete('tmst_asuransi', array('id_asuransi' => $id_asuransi));
	}


	public function MDL_SelectID($id_asuransi){
		$tmst_asuransi = $this->config->item('tmst_asuransi');

        return $this->db->get_where('tmst_asuransi', array('id_asuransi' => $id_asuransi))->row();
    }
	public function MDL_getAutoID() {
		$tmst_asuransi = $this->config->item('tmst_asuransi');

		$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id_asuransi,5,5) AS UNSIGNED INTEGER) AS num
				FROM tmst_asuransi
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

		$hasil = sprintf("INS%05d",$no_urut);

		return $hasil;	
	}
	
	
}
?>