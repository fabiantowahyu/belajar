<?php

class Md_report_daglu extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('md_employee');
    }

    public function MDL_Select($start_date = '', $end_date = '') {
        $tblhs = $this->config->item('ttrs_lse_survres_hs');
        $tblLse = $this->config->item('ttrs_lse');
        $tblClient = $this->config->item('tmst_client');
        $tblProvince = $this->config->item('tmst_province');
        $tblCountry = $this->config->item('tmst_country');
        $tblLoadingPort = $this->config->item('tmst_loading_port');
        $userid = $this->session->userdata('userid');
        $SQL = "SELECT
            a.id as id_hs, a.hs, a.description, a.id_lse, sum(a.fas) as total_fas, sum(a.quantity) as total_quantity,
            b.no_lse, b.date_issued, b.no_reg_exporter, b.port_destination, b.date_reg_exporter, b.date_expired, b.client_id, b.country_id, b.loading_port_id, 
            c.client_id, c.client_name, c.province,
            d.province_code, d.province_name,
            e.country_code, e.country_name,
            f.loading_port_code, f.loading_port_name
        FROM
            $tblhs a
            LEFT JOIN(SELECT * FROM $tblLse)b ON b.no_lse = a.id_lse
            LEFT JOIN(SELECT * FROM $tblCountry)e ON e.country_code = b.country_id
            LEFT JOIN(SELECT * FROM $tblLoadingPort)f ON f.loading_port_code = b.loading_port_id
            LEFT JOIN(SELECT * FROM $tblClient)c ON c.client_id = b.client_id
            LEFT JOIN(SELECT * FROM $tblProvince)d ON d.province_code = c.province 
        WHERE 1=1
            AND b.recdate >= '$start_date'
            AND b.recdate <= '$end_date'
        Group By b.no_lse";
        $result = $this->db->query($SQL)->result();
        //$this->auth->TVD($result);die();

        return $result;
    }

    public function MDL_SelectReport($start_date = '', $end_date = '') {
        $tblhs = $this->config->item('ttrs_lse_survres_hs');
        $tblLse = $this->config->item('ttrs_lse');
        $tblClient = $this->config->item('tmst_client');
        $tblProvince = $this->config->item('tmst_province');
        $tblCountry = $this->config->item('tmst_country');
        $tblLoadingPort = $this->config->item('tmst_loading_port');
        $userid = $this->session->userdata('userid');
        $SQL = "SELECT
            a.id as id_hs, a.hs, a.description, a.id_lse, sum(a.fas) as total_fas, sum(a.quantity) as total_quantity,
            b.no_lse, b.date_issued, b.no_reg_exporter, b.port_destination, b.date_reg_exporter, b.date_expired, b.client_id, b.country_id, b.loading_port_id, 
            c.client_id, c.client_name, c.province,
            d.province_code, d.province_name,
            e.country_code, e.country_name,
            f.loading_port_code, f.loading_port_name
        FROM
            $tblhs a
            LEFT JOIN(SELECT * FROM $tblLse)b ON b.no_lse = a.id_lse
            LEFT JOIN(SELECT * FROM $tblCountry)e ON e.country_code = b.country_id
            LEFT JOIN(SELECT * FROM $tblLoadingPort)f ON f.loading_port_code = b.loading_port_id
            LEFT JOIN(SELECT * FROM $tblClient)c ON c.client_id = b.client_id
            LEFT JOIN(SELECT * FROM $tblProvince)d ON d.province_code = c.province 
        WHERE 1=1
            AND b.recdate >= '$start_date'
            AND b.recdate <= '$end_date'
        Group By a.id";
        $result = $this->db->query($SQL)->result();
        //$this->auth->TVD($result);die();
        return $result;
    }

}

?>
