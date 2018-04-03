<?php
class Md_tindakan extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select() {
		$tbltypevar = $this->config->item('tmst_tindakan');

		$hasil = array();
		
		$sSQL = "
			SELECT * from tmst_tindakan
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
		$tmst_tindakan = $this->config->item('tmst_tindakan');

		$id = $this->MDL_getAutoID();
		
		$data = array(
			'id_tindakan' => $id,
			'nama' => $this->input->post('nama'),
			'poli' => $this->input->post('poli'),
			'jenis' => $this->input->post('jenis'),
                        'tarif_umum' => $this->input->post('tarif_umum'),
                        'tarif_member' => $this->input->post('tarif_member'),
                        'fee_dokter' => $this->input->post('fee_dokter'),
                        'fee_nurse' => $this->input->post('fee_nurse'),
			'userid' => $this->session->userdata('userid'),
                        'moduser' => $this->session->userdata('userid'),
			'recdate' => date("Y-m-d H:i:s"),
			'moddate' => date("Y-m-d H:i:s")
			);
		$res = $this->db->insert('tmst_tindakan', $data);
		
	}
        
        // Fungsi Tambah Data
	public function MDL_InsertConsumable($id) {
		$tmst_tindakan_penggunaan_bahan = $this->config->item('tmst_tindakan_penggunaan_bahan');

		
		
		$data = array(
			'pid' => $id,
			'nama_produk' => $this->input->post('nama_produk'),
			'jumlah' => $this->input->post('jumlah'),
                        'moduser' => $this->session->userdata('userid'),
			'recdate' => date("Y-m-d H:i:s"),
			);
                
		$res = $this->db->insert('tmst_tindakan_penggunaan_bahan', $data);
		
	}
        

	// Fungsi Ubah Data
	public function MDL_Update($id_tindakan){
		$tbltypevar = $this->config->item('tmst_tindakan');

		
		$data = array(
			'nama' => $this->input->post('nama'),
			'poli' => $this->input->post('poli'),
			'jenis' => $this->input->post('jenis'),
                        'tarif_umum' => $this->input->post('tarif_umum'),
                        'tarif_member' => $this->input->post('tarif_member'),
                        'fee_dokter' => $this->input->post('fee_dokter'),
                        'fee_nurse' => $this->input->post('fee_nurse'),
			'moduser' => $this->session->userdata('userid'),
			'moddate' => date("Y-m-d H:i:s")
			);

                 $this->db->where('id_tindakan', $id_tindakan);
		 $res = $this->db->update('tmst_tindakan', $data);
		
    }

	// Fungsi Hapus Data
	public function MDL_Delete($id_tindakan) {
		$tmst_tindakan = $this->config->item('tmst_tindakan');

		$this->db->delete('tmst_tindakan', array('id_tindakan' => $id_tindakan));
	}


	public function MDL_SelectID($id_tindakan){
		$tmst_tindakan = $this->config->item('tmst_tindakan');

        return $this->db->get_where('tmst_tindakan', array('id_tindakan' => $id_tindakan))->row();
    }
    
    public function MDL_SelectConsumable($id_tindakan){
        
		$tmst_tindakan = $this->config->item('tmst_tindakan');

        return $this->db->get_where('tmst_tindakan', array('pid' => $id_tindakan))->result();
    }
    
    
    
    
	public function MDL_getAutoID() {
		$tbltypevar = $this->config->item('tmst_tindakan');

		$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id_tindakan,5,5) AS UNSIGNED INTEGER) AS num
				FROM tmst_tindakan
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

		$hasil = sprintf("TND%05d",$no_urut);

		return $hasil;	
	}
	
	
}
?>