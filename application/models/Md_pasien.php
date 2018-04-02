<?php
class Md_pasien extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select() {
		$tmst_pasien = $this->config->item('tmst_pasien');

		$hasil = array();
		
		$sSQL = "
			SELECT * from tmst_pasien
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
		$tmst_pasien = $this->config->item('tmst_pasien');

		$id = $this->MDL_getAutoID();
		
		$data = array(
			'id_pasien' => $id,
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
                        'foto' => $this->input->post('foto'),
			'userid' => $this->session->userdata('userid'),
                        'moduser' => $this->session->userdata('userid'),
			'recdate' => date("Y-m-d H:i:s"),
			'moddate' => date("Y-m-d H:i:s")
			);
		$res = $this->db->insert('tmst_pasien', $data);
		
	}

	// Fungsi Ubah Data
	public function MDL_Update($id_pasien){
		$tmst_pasien = $this->config->item('tmst_pasien');

		
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
                        'foto' => $this->input->post('foto'),
			'moduser' => $this->session->userdata('userid'),
			'moddate' => date("Y-m-d H:i:s")
			);

                 $this->db->where('id_pasien', $id_pasien);
		 $res = $this->db->update('tmst_pasien', $data);
		
    }

	// Fungsi Hapus Data
	public function MDL_Delete($id_pasien) {
		$tmst_pasien = $this->config->item('tmst_pasien');

		$this->db->delete('tmst_pasien', array('id_pasien' => $id_pasien));
	}


	public function MDL_SelectID($id_pasien){
		$tmst_pasien = $this->config->item('tmst_pasien');

        return $this->db->get_where('tmst_pasien', array('id_pasien' => $id_pasien))->row();
    }
	public function MDL_getAutoID() {
		$tmst_pasien = $this->config->item('tmst_pasien');

		$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id_pasien,5,5) AS UNSIGNED INTEGER) AS num
				FROM tmst_pasien
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

		$hasil = sprintf("CST%05d",$no_urut);

		return $hasil;	
	}
	
	
}
?>