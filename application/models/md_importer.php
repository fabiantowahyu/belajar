<?php
class Md_importer extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
        $tblimporter = $this->config->item('tmst_importer');
        $tbltypevar = $this->config->item('tmst_typevar');

        $hasil = array();

        $sSQL = "
			SELECT c.importer_id,c.importer_name, c.pic, c.hp, c.phone, c.fax, c.email, c.address, c.npwp
			FROM $tblimporter c
			WHERE 1=1 
			ORDER BY c.importer_name ASC
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;	
    }

    public function MDL_NewImporter($importer){
        $result = $this->db->insert('tmst_importer', $importer);
        return $result;
    }

    public function MDL_SelectID($id){
        $tblimporter = $this->config->item('tmst_importer');

        $tblName = $tblimporter;

        return $this->db->get_where($tblName, array('importer_id' => $id))->row();
    }

    // Fungsi Tambah Data
    public function MDL_Insert($new_id = '') {
        $tblimporter = $this->config->item('tmst_importer');
        if ($new_id) {
            $id = $new_id;
        } else {
            $id = $this->input->post('id');
        }

        //$id = $this->input->post('id');
        $importer = $this->input->post('importer');
        $pic = $this->input->post('pic');
        $npwp_address = $this->input->post('npwp_address');
        $priority = $this->input->post('priority');
        $email = $this->input->post('email');
        $hp = $this->input->post('hp');
        $phone = $this->input->post('phone');
        $fax = $this->input->post('fax');
        $postal_code = $this->input->post('postal_code');
        $province = $this->input->post('province');
        $country = $this->input->post('country');
        $address = $this->input->post('address');
        $npwp = $this->input->post('npwp');

        $type = $this->input->post('type');

        $userid = $this->session->userdata('userid');
        $recdate = date("Y-m-d H:i:s");
        $moduser = $this->session->userdata('userid');
        $moddate = date("Y-m-d H:i:s");

        $data = array(
            'importer_id' => $id,
            'importer_name' => $importer,
            'type' => $type,
            'pic' => $pic,
            'npwp_address' => $npwp_address,
            'email' => $email,
            'phone' => $phone,
            'fax' => $fax,
            'postcode' => $postal_code,
            'province' => $province,
            'address' => $address,
            'npwp' => $npwp,
            'userid' => $userid,
            'recdate' => $recdate,
            'moduser' => $moduser,
            'moddate' => $moddate
        );

        $result = $this->db->insert($tblimporter, $data);
        return array('id'=>$id, 'success'=>$result);
    }

    // Fungsi Ubah Data
    public function MDL_Update($id){
        
       
        $tblimporter = $this->config->item('tmst_importer');

        //$id = $this->input->post('id');
        $importer = $this->input->post('importer');
        $type = $this->input->post('type');
        $pic = $this->input->post('pic');
        $category = $this->input->post('category');
        $priority = $this->input->post('priority');
        $email = $this->input->post('email');
        $hp = $this->input->post('hp');
        $phone = $this->input->post('phone');
        $fax = $this->input->post('fax');
        $postcode = $this->input->post('postal_code');
        $province = $this->input->post('province');
        $country = $this->input->post('country');
        $address = $this->input->post('address');
        $npwp = $this->input->post('npwp');

        $userid = $this->session->userdata('userid');
        $recdate = date("Y-m-d H:i:s");
        $moduser = $this->session->userdata('userid');
        $moddate = date("Y-m-d H:i:s");

        $data = array(
            'importer_name' => $importer,
            'type' => $type,
            'pic' => $pic,
            'category' => $category,
            'priority' => $priority,
            'email' => $email,
            'hp' => $hp,
            'phone' => $phone,
            'fax' => $fax,
            'postcode' => $postcode,
            'province' => $province,
            'country' => $country,
            'address' => $address,
            'npwp' => $npwp,
            'npwp_address' => $this->input->post('npwp_address'),
            'moduser' => $moduser,
            'moddate' => $moddate
        );

        $this->db->where('importer_id', $id);
        $result = $this->db->update($tblimporter, $data);
        
        if($result){
            $success = 1;
        }else{
            $success = 0;
            
        }
        return array('success'=>$success );
    }

    // Fungsi Hapus Data
    public function MDL_Delete($id) {
        $tblimporter = $this->config->item('tmst_importer');

        $this->db->delete($tblimporter, array('importer_id' => $id));
    }

    //=====================================================================
    public function MDL_isPermInsert($id){
        $tblName = $this->config->item('tmst_importer');

        $res = $this->db->get_where($tblName, array('importer_id' => $id))->num_rows();

        if($res) {
            return 0;
        } else {
            return 1;
        }
    }

    public function MDL_isPermDelete($id){
        $tblName = $this->config->item('ttrs_lse');
        $sSQL = "
			SELECT importer_id FROM $tblName WHERE importer_id = '$id' LIMIT 0,1
		";

        $ambil = $this->db->query($sSQL);
        $res = $ambil->num_rows();

		
        if($res) {
            return 1;
        } else {
            return 0;
        }
    }

    public function MDL_getAutoID() {
        $tblimporter = $this->config->item('tmst_importer');

        $hasil = array();
        $tmpData = array();
        $jum = 0;


        $sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(importer_id,4,5) AS UNSIGNED INTEGER) AS num
				FROM $tblimporter
			) p
			WHERE 1=1
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $no_urut = $data->no_urut + 1;
            }
        } else {
            $no_urut = 1;
        }

        $nom_jo = sprintf("IMP%05d",$no_urut);

        return $nom_jo;	
    }

    public function select_region_by_countryID($country_code){
        $tbl_province    = $this->config->item('tmst_country');

        $query=$this->db->query("SELECT 
              a.country_code,
              a.country_name
            FROM
              $tbl_province a 
            WHERE  a.country_code = '$country_code'
            ORDER BY a.country_name asc");

        // echo $this->db->last_query();die();
        return $query->result();

    }

    public function select_region($country_code){
        $tbl_province = $this->config->item('tmst_province');
        $query=$this->db->query(" SELECT 
            a.country_code,
            a.province_name,
            a.province_code

            FROM $tbl_province a

            WHERE a.country_code = '$country_code' 
            ORDER BY a.province_name asc");
        return $query->result();
    }

}
?>