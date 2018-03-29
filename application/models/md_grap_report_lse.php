<?php

class md_grap_report_lse extends CI_Model {

    public function MDL_SelectLSE($year) {
	$tblLse = $this->config->item('ttrs_lse');
        $hasil = array();
	$sSQL = "
            SELECT
                count(id) AS TotalInput, DATE_FORMAT(recdate, '%m') AS bulan, laststatus_lse, recdate
            FROM
                $tblLse
            WHERE
                recdate BETWEEN '$year-01-01'
                AND '$year-12-31'
                AND laststatus_lse = '6'
            GROUP BY MONTH(recdate) 
            ORDER BY recdate
		";
	$ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;	
    }
    
    
    public function MDL_LSETotal($year) {
        $tblLse = $this->config->item('ttrs_lse');
	$hasil = array();
	$sSQL = "
            SELECT
                count(id) AS LSETotal, DATE_FORMAT(recdate, '%m') AS bulan, no_lse, laststatus_lse, recdate
            FROM
                $tblLse
            WHERE
                recdate BETWEEN '$year-01-01'
                AND '$year-12-31'
                AND laststatus_lse = '6'
		";

	$ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil = $data;
            }
        }
        return $hasil;	
    }

}

?>