<?php
class Md_poli extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select() {
		$tbltypevar = $this->config->item('tmst_poli');

		$hasil = array();
		
		$sSQL = "
			SELECT * from tmst_poli
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
		$tmst_poli = $this->config->item('tmst_poli');

		$id = $this->MDL_getAutoID();
		
		$data = array(
			'id_poli' => $id,
			'nama_poli' => $this->input->post('nama_poli'),
			'userid' => $this->session->userdata('userid'),
                        'moduser' => $this->session->userdata('userid'),
			'recdate' => date("Y-m-d H:i:s"),
			'moddate' => date("Y-m-d H:i:s")
			);
		$res = $this->db->insert('tmst_poli', $data);
		
	}

	// Fungsi Ubah Data
	public function MDL_Update($id_poli){
		$tbltypevar = $this->config->item('tmst_poli');

		
		$data = array(
			'nama_poli' => $this->input->post('nama_poli'),
			'poli' => $this->input->post('poli'),
			'moduser' => $this->session->userdata('userid'),
			'moddate' => date("Y-m-d H:i:s")
			);

                 $this->db->where('id_poli', $id_poli);
		 $res = $this->db->update('tmst_poli', $data);
		
    }

	// Fungsi Hapus Data
	public function MDL_Delete($id_poli) {
		$tmst_poli = $this->config->item('tmst_poli');

		$this->db->delete('tmst_poli', array('id_poli' => $id_poli));
	}


	public function MDL_SelectID($id_poli){
		$tmst_poli = $this->config->item('tmst_poli');

        return $this->db->get_where('tmst_poli', array('id_poli' => $id_poli))->row();
    }
	public function MDL_getAutoID() {
		$tbltypevar = $this->config->item('tmst_poli');

		$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id_poli,5,5) AS UNSIGNED INTEGER) AS num
				FROM tmst_poli
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