<?php
class Md_tindakan_lab extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select() {
		$tbltypevar = $this->config->item('tmst_tindakan_lab');

		$hasil = array();
		
		$sSQL = "
			SELECT * from tmst_tindakan_lab
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
		$tmst_tindakan_lab = $this->config->item('tmst_tindakan_lab');

		$id = $this->MDL_getAutoID();
		
		$data = array(
			'id_tindakan_lab' => $id,
			'nama' => $this->input->post('nama'),
			'golongan' => $this->input->post('golongan'),
			'jenis' => $this->input->post('jenis'),
                        'tarif' => $this->input->post('tarif'),
                        'fee' => $this->input->post('fee'),
			'userid' => $this->session->userdata('userid'),
                        'moduser' => $this->session->userdata('userid'),
			'recdate' => date("Y-m-d H:i:s"),
			'moddate' => date("Y-m-d H:i:s")
			);
		$res = $this->db->insert('tmst_tindakan_lab', $data);
		
	}
        
        // Fungsi Tambah Data
	public function MDL_InsertConsumable($id) {
		$tmst_tindakan_lab_penggunaan_bahan = $this->config->item('tmst_tindakan_lab_penggunaan_bahan');

		
		
		$data = array(
			'pid' => $id,
			'nama_produk' => $this->input->post('nama_produk'),
			'jumlah' => $this->input->post('jumlah'),
                        'moduser' => $this->session->userdata('userid'),
			'recdate' => date("Y-m-d H:i:s"),
			);
                
		$res = $this->db->insert('tmst_tindakan_lab_penggunaan_bahan', $data);
		
	}
        

	// Fungsi Ubah Data
	public function MDL_Update($id_tindakan_lab){
		$tbltypevar = $this->config->item('tmst_tindakan_lab');

		
		$data = array(
			'nama' => $this->input->post('nama'),
			'golongan' => $this->input->post('golongan'),
			'jenis' => $this->input->post('jenis'),
                        'tarif' => $this->input->post('tarif'),
                        'fee' => $this->input->post('fee'),
			'moduser' => $this->session->userdata('userid'),
			'moddate' => date("Y-m-d H:i:s")
			);

                 $this->db->where('id_tindakan_lab', $id_tindakan_lab);
		 $res = $this->db->update('tmst_tindakan_lab', $data);
		
    }

	// Fungsi Hapus Data
	public function MDL_Delete($id_tindakan_lab) {
		$tmst_tindakan_lab = $this->config->item('tmst_tindakan_lab');

		$this->db->delete('tmst_tindakan_lab', array('id_tindakan_lab' => $id_tindakan_lab));
	}


	public function MDL_SelectID($id_tindakan_lab){
		$tmst_tindakan_lab = $this->config->item('tmst_tindakan_lab');

        return $this->db->get_where('tmst_tindakan_lab', array('id_tindakan_lab' => $id_tindakan_lab))->row();
    }
    
    public function MDL_SelectConsumable($id_tindakan_lab){
        
		$tmst_tindakan_lab = $this->config->item('tmst_tindakan_lab');

        return $this->db->get_where('tmst_tindakan_lab', array('pid' => $id_tindakan_lab))->result();
    }
    
    
    
    
	public function MDL_getAutoID() {
		$tbltypevar = $this->config->item('tmst_tindakan_lab');

		$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id_tindakan_lab,5,5) AS UNSIGNED INTEGER) AS num
				FROM tmst_tindakan_lab
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

		$hasil = sprintf("TNDL%05d",$no_urut);

		return $hasil;	
	}
	
	
}
?>