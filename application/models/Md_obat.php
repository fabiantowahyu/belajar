<?php

class Md_obat extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
        $tbltypevar = $this->config->item('tmst_typevar');

        $hasil = array();

        $sSQL = "
			SELECT * from tmst_obat
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
        $tmst_obat = $this->config->item('tmst_obat');

        $id = $this->MDL_getAutoID();

        $data = array(
            'id_obat' => $id,
            'nama' => $this->input->post('nama'),
            'merk' => $this->input->post('merk'),
            'satuan' => $this->input->post('satuan'),
            'sumber' => $this->input->post('sumber'),
            'jumlah' => $this->input->post('jumlah'),
            'supplier' => $this->input->post('supplier'),
            'golongan' => $this->input->post('golongan'),
            'min_stock' => $this->input->post('min_stock'),
            'harga_beli' => $this->input->post('harga_beli'),
            'harga_jual' => $this->input->post('harga_jual'),
            'userid' => $this->session->userdata('userid'),
            'moduser' => $this->session->userdata('userid'),
            'recdate' => date("Y-m-d H:i:s"),
            'moddate' => date("Y-m-d H:i:s")
        );
        $res = $this->db->insert('tmst_obat', $data);
    }

    // Fungsi Ubah Data
    public function MDL_Update($id_obat) {
        $tbltypevar = $this->config->item('tmst_typevar');


        $data = array(
            'nama' => $this->input->post('nama'),
            'merk' => $this->input->post('merk'),
            'satuan' => $this->input->post('satuan'),
            'sumber' => $this->input->post('sumber'),
            'jumlah' => $this->input->post('jumlah'),
            'supplier' => $this->input->post('supplier'),
            'golongan' => $this->input->post('golongan'),
            'min_stock' => $this->input->post('min_stock'),
            'harga_beli' => $this->input->post('harga_beli'),
            'harga_jual' => $this->input->post('harga_jual'),
            'moduser' => $this->session->userdata('userid'),
            'moddate' => date("Y-m-d H:i:s")
        );

        $this->db->where('id_obat', $id_obat);
        $res = $this->db->update('tmst_obat', $data);
    }

    // Fungsi Hapus Data
    public function MDL_Delete($id_obat) {
        $tmst_obat = $this->config->item('tmst_obat');

        $this->db->delete('tmst_obat', array('id_obat' => $id_obat));
    }

    public function MDL_SelectID($id_obat) {
        $tmst_obat = $this->config->item('tmst_obat');

        return $this->db->get_where('tmst_obat', array('id_obat' => $id_obat))->row();
    }

    public function MDL_getAutoID() {
        $tbltypevar = $this->config->item('tmst_typevar');

        $sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id_obat,5,5) AS UNSIGNED INTEGER) AS num
				FROM tmst_obat
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

        $hasil = sprintf("MDC%05d", $no_urut);

        return $hasil;
    }

}

?>