<?php
class Md_kecamatan extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
        $tblcity 	= $this->config->item('tmst_city');
        $tblkecamatan 	= $this->config->item('tmst_kecamatan');

        $hasil = array();

        $sSQL = "
			SELECT a.id,a.kecamatan_code,a.kecamatan_name,a.city_code,b.city_name
			FROM $tblkecamatan a, $tblcity b
			WHERE 1=1 
				AND a.city_code = b.city_code 
			ORDER BY a.kecamatan_name ASC
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;	
    }

    public function MDL_Select2() {
        $tblcity 	= $this->config->item('tmst_city');
        $tblkecamatan 	= $this->config->item('tmst_kecamatan');

        $hasil = array();

        $sSQL = "
			SELECT a.city_code,a.city_name
			FROM $tblcity a
			ORDER BY a.city_name ASC
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;	
    }

    public function MDL_SelectID($id){
        $tblkecamatan = $this->config->item('tmst_kecamatan');

        return $this->db->get_where($tblkecamatan, array('id' => $id))->row();
    }

    // Fungsi Tambah Data
    public function MDL_Insert() {
        $tblkecamatan = $this->config->item('tmst_kecamatan');

        $kecamatan_code = $this->input->post('kecamatan_code');
        $kecamatan_code = strtoupper($kecamatan_code);
        $kecamatan_name = $this->input->post('kecamatan_name');
        $city = $this->input->post('city');

        $userid = $this->session->userdata('userid');
        $recdate = date("Y-m-d H:i:s");
        $moduser = $this->session->userdata('userid');
        $moddate = date("Y-m-d H:i:s");

        $data = array(
            'kecamatan_code' => $kecamatan_code,
            'kecamatan_name' => $kecamatan_name,
            'city_code' => $city,
            'userid' => $userid,
            'recdate' => $recdate,
            'moduser' => $moduser,
            'moddate' => $moddate
        );
        $this->db->insert($tblkecamatan, $data);
    }

    // Fungsi Ubah Data
    public function MDL_Update($id){
        $tblkecamatan = $this->config->item('tmst_kecamatan');

        $kecamatan_name = $this->input->post('kecamatan_name');
        $city = $this->input->post('city');

        $moduser = $this->session->userdata('userid');
        $moddate = date("Y-m-d H:i:s");

        $data = array(
            'kecamatan_name' => $kecamatan_name,
            'city_code' => $city,
            'moduser' => $moduser,
            'moddate' => $moddate
        );

        $this->db->where('id', $id);
        $this->db->update($tblkecamatan, $data);
    }

    public function MDL_isPermInsert($id){
        $tblkecamatan = $this->config->item('tmst_kecamatan');

        $res = $this->db->get_where($tblkecamatan, array('kecamatan_code' => $id))->num_rows();
        if($res) {
            return 0;
        } else {
            return 1;
        }
    }

    // Fungsi Hapus Data
    public function MDL_Delete($id) {
        $tblkecamatan = $this->config->item('tmst_kecamatan');

        $this->db->delete($tblkecamatan, array('kecamatan_code' => $id));
    }

    /*
	public function MDL_isPermDelete($id){
		//Nanti di set pada table transaksi
		$tblName = $this->config->item('tmst_employee');

		$sSQL = "
			SELECT country FROM $tblName WHERE country = '$id' LIMIT 0,1
		";

		$ambil = $this->db->query($sSQL);
		$res = $ambil->num_rows();

		if($res) {
			return 0;
		} else {
			return 1;
		}
    } */

    public function MDL_CekField($field,$id='') {
        $tbljob_grade = $this->config->item('tmst_job_grade');

        $fvalue = $_REQUEST['fvalue'];
        $res = ($fvalue == $id) ? 0 : $this->db->get_where($tbljob_grade, array($field => $fvalue))->num_rows();

        if(!$res) {
            return true;
        } else {
            return false;
        }
    }

    /*
	public function MDL_getAutoID() {
		$tbljob_grade = $this->config->item('tmst_job_grade');

		$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(Equipment_Id,5,5) AS UNSIGNED INTEGER) AS num
				FROM $tbljob_grade
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

		$hasil = sprintf("EQP%05d",$no_urut);

		return $hasil;	
	}
	*/
}
?>