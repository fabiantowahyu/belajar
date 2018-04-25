<?php
class Md_diagnosa extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select() {
		$tbltypevar = $this->config->item('tmst_diagnosa');

		$hasil = array();
		
		$sSQL = "
			SELECT * from tmst_diagnosa
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
		$tmst_diagnosa = $this->config->item('tmst_diagnosa');

		$id = $this->MDL_getAutoID();
		
		$data = array(
			'id_diagnosa' => $id,
			'nama_diagnosa' => $this->input->post('nama_diagnosa'),
			'poli' => $this->input->post('poli'),
			'userid' => $this->session->userdata('userid'),
                        'moduser' => $this->session->userdata('userid'),
			'recdate' => date("Y-m-d H:i:s"),
			'moddate' => date("Y-m-d H:i:s")
			);
		$res = $this->db->insert('tmst_diagnosa', $data);
		
	}

	// Fungsi Ubah Data
	public function MDL_Update($id_diagnosa){
		$tbltypevar = $this->config->item('tmst_diagnosa');

		
		$data = array(
			'nama_diagnosa' => $this->input->post('nama_diagnosa'),
			'poli' => $this->input->post('poli'),
			'moduser' => $this->session->userdata('userid'),
			'moddate' => date("Y-m-d H:i:s")
			);

                 $this->db->where('id_diagnosa', $id_diagnosa);
		 $res = $this->db->update('tmst_diagnosa', $data);
		
    }

	// Fungsi Hapus Data
	public function MDL_Delete($id_diagnosa) {
		$tmst_diagnosa = $this->config->item('tmst_diagnosa');

		$this->db->delete('tmst_diagnosa', array('id_diagnosa' => $id_diagnosa));
	}


	public function MDL_SelectID($id_diagnosa){
		$tmst_diagnosa = $this->config->item('tmst_diagnosa');

        return $this->db->get_where('tmst_diagnosa', array('id_diagnosa' => $id_diagnosa))->row();
    }
	public function MDL_getAutoID() {
		$tbltypevar = $this->config->item('tmst_diagnosa');

		$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id_diagnosa,5,5) AS UNSIGNED INTEGER) AS num
				FROM tmst_diagnosa
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

		$hasil = sprintf("DIA%05d",$no_urut);

		return $hasil;	
	}
	
	
}
?>