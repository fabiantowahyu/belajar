<?php

class Md_kunjungan_baru extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
        $ttrs_kunjungan = $this->config->item('ttrs_kunjungan');

        $hasil = array();

        $sSQL = "
			SELECT * ,d.nama as nama_dokter from $ttrs_kunjungan k
                            left join tmst_dokter d on k.dokter = d.id_dokter
                        
where status_kunjungan=0
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

    public function MDL_SelectID($id_pasien) {
        $ttrs_kunjungan = $this->config->item('ttrs_kunjungan');

        return $this->db->get_where('ttrs_kunjungan', array('id_pasien' => $id_pasien))->row();
    }

    public function MDL_getAutoID() {
        $ttrs_kunjungan = $this->config->item('ttrs_kunjungan');

        $sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(no_urut,5,5) AS UNSIGNED INTEGER) AS num
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

        $hasil = sprintf("%s%05d",'2018' ,$no_urut);

        return $hasil;
    }

    
     public function MDL_Masuk_Antrian($no_urut){
         
         $data=array(
             'status_kunjungan'=>1,
             'waktu_masuk'=>date("Y-m-d H:i:s")
             );
    $this->db->where('no_urut',$no_urut);
   $res =  $this->db->update('ttrs_kunjungan',$data);
         return $res;
     }
}

?>