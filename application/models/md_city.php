<?php
class Md_city extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
        $tblprovince= $this->config->item('tmst_province');
        $tblcity 	= $this->config->item('tmst_city');

        $hasil = array();

        $sSQL = "
			SELECT a.id,a.city_code,a.city_name,a.province_code,b.province_name,a.type
			FROM $tblcity a, $tblprovince b
			WHERE 1=1 
				AND a.province_code = b.province_code AND b.country_code = 'ID'
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

    public function MDL_Select2($country) {
        $tblprovince 	= $this->config->item('tmst_province');
        $tblcountry 	= $this->config->item('tmst_country');

        $hasil = array();

        $sSQL = "
			SELECT a.id,a.province_code,a.province_name,b.country_name
			FROM $tblprovince a, $tblcountry b
			WHERE 1=1 
				AND a.country_code = b.country_code AND a.country_code = '$country'
			ORDER BY a.province_name ASC
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
        $tblcity = $this->config->item('tmst_city');

        return $this->db->get_where($tblcity, array('id' => $id))->row();
    }

    // Fungsi Tambah Data
    public function MDL_Insert() {
        $tblcity = $this->config->item('tmst_city');

        $city_code = $this->input->post('city_code');
        $city_code = strtoupper($city_code);
        $city_name = $this->input->post('city_name');
	$type	   = $this->input->post('type');
        $province = $this->input->post('province');
	$postal_code = $this->input->post('postal_code');

        $userid = $this->session->userdata('userid');
        $recdate = date("Y-m-d H:i:s");
        $moduser = $this->session->userdata('userid');
        $moddate = date("Y-m-d H:i:s");

        $data = array(
            'city_code' => $city_code,
            'city_name' => $city_name,
	    'type' => $type,
            'province_code' => $province,
	    'postal_code' => $postal_code,
            'userid' => $userid,
            'recdate' => $recdate,
            'moduser' => $moduser,
            'moddate' => $moddate
        );
        $this->db->insert($tblcity, $data);
    }

    // Fungsi Ubah Data
    public function MDL_Update($id){
        $tblcity = $this->config->item('tmst_city');

        $city_name = $this->input->post('city_name');
        $province = $this->input->post('province');
	$postal_code = $this->input->post('postal_code');

        $moduser = $this->session->userdata('userid');
        $moddate = date("Y-m-d H:i:s");

        $data = array(
            'city_name' => $city_name,
            'province_code' => $province,
	    'postal_code' => $postal_code,
            'moduser' => $moduser,
            'moddate' => $moddate
        );

        $this->db->where('id', $id);
        $this->db->update($tblcity, $data);
    }

    public function MDL_isPermInsert($id){
        $tblcity = $this->config->item('tmst_city');

        $res = $this->db->get_where($tblcity, array('city_code' => $id))->num_rows();
        if($res) {
            return 0;
        } else {
            return 1;
        }
    }

    // Fungsi Hapus Data
    public function MDL_Delete($id) {
        $tblCity = $this->config->item('tmst_city');

        $this->db->delete($tblCity, array('city_code' => $id));
    }

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
}
?>