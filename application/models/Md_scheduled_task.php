<?php

class Md_scheduled_task extends CI_Model {

    // Fungsi Ambil Data

    public function MDL_Select_Resi($type) {
        $ttrs_order_domestic = $this->config->item('ttrs_order_domestic');
        $ttrs_order_import = $this->config->item('ttrs_order_import');

        if ($type == 'domestic') {
            $table = $ttrs_order_domestic;
        } else {
            $table = $ttrs_order_import;
        }



        $sSQL = "
                select * from $table a join tmst_registration b on a.client_id=b.client_id where a.no_resi !='' and a.delivered_notification !=1
            ";

        $hasil = $this->db->query($sSQL)->result();

        return $hasil;
    }

    public function MDL_Select_ResiIgnored($type) {
        $ttrs_order_domestic = $this->config->item('ttrs_order_domestic');
        $ttrs_order_import = $this->config->item('ttrs_order_import');

        if ($type == 'domestic') {
            $table = $ttrs_order_domestic;
        } else {
            $table = $ttrs_order_import;
        }



        $sSQL = "
                select * from $table a join tmst_registration b on a.client_id=b.client_id where a.laststatus_printing!='L06' and a.laststatus_printing !='L07' and a.delivered_notification =1
            ";

        $hasil = $this->db->query($sSQL)->result();

        return $hasil;
    }

    public function UpdateCourierStatus($order_no, $status, $type) {

        $ttrs_order_domestic = $this->config->item('ttrs_order_domestic');
        $ttrs_order_import = $this->config->item('ttrs_order_import');

        if ($type == 'domestic') {
            $table = $ttrs_order_domestic;
        } else {
            $table = $ttrs_order_import;
        }

        $sSQL = "
		UPDATE $table set courier_status='$status' where order_no='$order_no' 
              
			";

        $this->db->query($sSQL);
    }

    public function UpdateDeliveredNotification($order_no, $type) {
        $ttrs_order_domestic = $this->config->item('ttrs_order_domestic');
        $ttrs_order_import = $this->config->item('ttrs_order_import');

        if ($type == 'domestic') {
            $table = $ttrs_order_domestic;
        } else {
            $table = $ttrs_order_import;
        }

        $sSQL = "
		UPDATE $table set delivered_notification=1 where order_no='$order_no' 
              
			";

        $this->db->query($sSQL);
    }

    public function ForceUpdateDelivered($order_no, $type) {

        $ttrs_order_domestic = $this->config->item('ttrs_order_domestic');
        $ttrs_order_import = $this->config->item('ttrs_order_import');

        if ($type == 'domestic') {
            $table = $ttrs_order_domestic;
        } else {
            $table = $ttrs_order_import;
        }

        $sSQL = "
		UPDATE $table set laststatus_printing='L06' where order_no='$order_no' 
              
			";

        $this->db->query($sSQL);
    }

}

?>
