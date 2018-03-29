<?php
class Md_dokter extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select() {
		$tmst_dokter = $this->config->item('tmst_dokter');

		$hasil = array();
		
		$sSQL = "
			SELECT * from tmst_dokter
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
		$tmst_dokter = $this->config->item('tmst_dokter');

		$id = $this->MDL_getAutoID();
		
		$data = array(
			'id_dokter' => $id,
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
                        'poli' => $this->input->post('poli'),
                        'jadwal' => $this->input->post('jadwal'),
			'userid' => $this->session->userdata('userid'),
                        'moduser' => $this->session->userdata('userid'),
			'recdate' => date("Y-m-d H:i:s"),
			'moddate' => date("Y-m-d H:i:s")
			);
		$res = $this->db->insert('tmst_dokter', $data);
		
	}

	// Fungsi Ubah Data
	public function MDL_Update($id_dokter){
		$tmst_dokter = $this->config->item('tmst_dokter');

		
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
                        'poli' => $this->input->post('poli'),
                        'jadwal' => $this->input->post('jadwal'),
			'moduser' => $this->session->userdata('userid'),
			'moddate' => date("Y-m-d H:i:s")
			);

                 $this->db->where('id_dokter', $id_dokter);
		 $res = $this->db->update('tmst_dokter', $data);
		
    }

	// Fungsi Hapus Data
	public function MDL_Delete($id_dokter) {
		$tmst_dokter = $this->config->item('tmst_dokter');

		$this->db->delete('tmst_dokter', array('id_dokter' => $id_dokter));
	}


	public function MDL_SelectID($id_dokter){
		$tmst_dokter = $this->config->item('tmst_dokter');

        return $this->db->get_where('tmst_dokter', array('id_dokter' => $id_dokter))->row();
    }
	public function MDL_getAutoID() {
		$tmst_dokter = $this->config->item('tmst_dokter');

		$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id_dokter,5,5) AS UNSIGNED INTEGER) AS num
				FROM tmst_dokter
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

		$hasil = sprintf("DCT%05d",$no_urut);

		return $hasil;	
	}
	
	
}
?>