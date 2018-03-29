<?php

class Md_report_lse extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('md_employee');
    }

    public function MDL_Select($start_date = '', $end_date = '') {
        $userid = $this->session->userdata('userid');
        $SQL =" select d.loading_port_name,c.importer_name,b.npwp,b.address,b.client_name,a.* from ttrs_lse a 

join tmst_client b
on a.client_id = b.client_id 
join tmst_importer c
on c.importer_id = a.importer_id
join tmst_loading_port d
on a.loading_port_id = d.loading_port_code 

WHERE a.recdate >= '$start_date'
                    AND a.recdate <= '$end_date'";
        $result = $this->db->query($SQL)->result();
        //$this->auth->TVD($result);die();
        
        return $result;
    }

   
    public function MDL_SelectReport($start_date = '', $end_date = '') {
       $userid = $this->session->userdata('userid');
        $SQL =" select d.loading_port_name,c.importer_name,b.npwp,b.address,b.client_name,a.* from ttrs_lse a 


join tmst_client b
on a.client_id = b.client_id 
join tmst_importer c
on c.importer_id = a.importer_id
join tmst_loading_port d
on a.loading_port_id = d.loading_port_code




WHERE a.recdate >= '$start_date'
                    AND a.recdate <= '$end_date'";
        $result = $this->db->query($SQL)->result();
        //$this->auth->TVD($result);die();
        
        return $result;
    }

}

?>
