<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Auth library
 *
 * @author  Danang Wahid S
 */
class Auth {

    var $CI = NULL;

    function __construct() {
        // get CI's object
        $this->CI = & get_instance();
    }

    // untuk validasi login
    function Auth_doLogin($username, $password) {
        $tbluser = $this->CI->config->item('tmst_users');
        $tblmst_user = $this->CI->config->item('tbl_user');
        $tblemployee = $this->CI->config->item('tmst_employee');
        $isAdmin = $this->CI->config->item('isAdmin');


        $pass = md5($password);
        //cek password administrator
        $this->CI->db->from($tbluser);
        $this->CI->db->where('userid', $isAdmin);
        $result2 = $this->CI->db->get();
//		$passadmin = $result2->row->password;
//		var_dump($passadmin);die();
        $passadmin = "";

        // cek di database, ada ga?
        if ($pass == $passadmin) {
            $this->CI->db->from($tbluser);
            $this->CI->db->where('userid', $username);
            $result = $this->CI->db->get();
        } else {
            $this->CI->db->from($tbluser);
            $this->CI->db->where('email', $username);
            $this->CI->db->where('password=md5("' . $password . '")', '', false);
            //$this->CI->db->where('status',1);
            $result = $this->CI->db->get();
        }

        if ($result->num_rows() == 0) {
            // username dan password tsb tidak ada
            return 0;
        } elseif ($result->row()->active == 0) {
            return 2;
        } else {
            // ada, maka ambil informasi dari database
            $userdata = $result->row();

            $session_data = array(
                'userid' => $userdata->emp_id,
                'email' => $userdata->email,
                'themes' => $userdata->themes,
                'username' => $userdata->username,
                'type' => $userdata->tabel,
                'last_login' => date("Y-m-d H:i:s")
            );

            $this->CI->db->query("UPDATE $tblmst_user SET last_login = NOW() WHERE userid = '" . $userdata->userid . "'");
            $this->CI->db->query("UPDATE $tblemployee SET last_login = NOW() WHERE emp_id = '" . $userdata->emp_id . "'");

            /* if($userdata->tabel == "emp") {
              $this->CI->db->query("UPDATE $tblemployee SET last_login = NOW() WHERE emp_id = '".$userdata->emp_id."'");
              } elseif($userdata->tabel == "usr") {
              $this->CI->db->query("UPDATE $tblmst_user SET last_login = NOW() WHERE userid = '".$userdata->userid."'");
              } */
            // buat session
            $this->CI->session->set_userdata($session_data);
            return 1;
        }
    }

    // untuk mengecek apakah user sudah login/belum
    function Auth_isLogin() {
        if ($this->CI->session->userdata('userid') == '') {
            return false;
        } elseif ($this->CI->session->userdata('userid') != 'admin' && $this->CI->config->item('isMaintenance')) {
            redirect('admin/maintenance');
        } else {
            return true;
        }
    }

    // untuk validasi di setiap halaman yang mengharuskan authentikasi
    function Auth_restrict() {
        if ($this->Auth_isLogin() == false) {
            redirect('login');
        }
    }

    // untuk mengecek apakah user memiliki akses menu
    function Auth_isPerm() {
        if ($this->Auth_isLogin()) {
            $tblmenu = $this->CI->config->item('tmst_menu');
            $tbluser = $this->CI->config->item('tmst_users');
            $tbluser_group = $this->CI->config->item('tmst_users_group');
            $tblgroup = $this->CI->config->item('tmst_group');
            $tblgroup_detail = $this->CI->config->item('tmst_group_det');

            $userid = $this->CI->session->userdata('userid');
            $params = $this->CI->router->fetch_class();

            $sSQL = "
				SELECT m.id,m.custom_title,m.parent_id,m.url_menu 
				FROM $tblmenu m, (
					SELECT g.id,gd.menu_id
					FROM $tblgroup g, $tblgroup_detail gd
					WHERE gd.pid = g.id
				) grp , (
					SELECT ug.user_id, ug.group_id
					FROM $tbluser u, $tbluser_group ug
					WHERE ug.user_id = u.emp_id
				) usr
				WHERE grp.menu_id = m.id
					AND usr.group_id = grp.id
					AND m.url_menu LIKE '$params%'
					AND usr.user_id = '$userid'
					AND m.active = 1
				ORDER BY parent_id,tid
			";

            $result = $this->CI->db->query($sSQL);
            if ($result->num_rows() == 0) {
                // privileges menu tsb tidak ada
                return false;
            } else {
                return true;
            }
        } else {
            $this->Auth_restrict();
        }
    }

    // untuk mengecek apakah user memiliki akses add, edit, delete data
    function Auth_isPrivButton($priv) {
        if ($this->Auth_isLogin()) {
            $tblmenu = $this->CI->config->item('tmst_menu');
            $tbluser = $this->CI->config->item('tmst_users');
            $tbluser_group = $this->CI->config->item('tmst_users_group');
            $tblgroup = $this->CI->config->item('tmst_group');
            $tblgroup_detail = $this->CI->config->item('tmst_group_det');

            $userid = $this->CI->session->userdata('userid');
            $params = $this->CI->router->fetch_class();

            if ($priv == 'list') {
                $FILTER = "AND grp.isList = 1";
            } elseif ($priv == 'add') {
                $FILTER = "AND grp.isAdd = 1";
            } elseif ($priv == 'edit') {
                $FILTER = "AND grp.isEdit = 1";
            } elseif ($priv == 'delete') {
                $FILTER = "AND grp.isDelete = 1";
            } else {
                return false;
            }

            $sSQL = "
				SELECT m.id,m.custom_title,m.parent_id,m.url_menu 
				FROM $tblmenu m, (
					SELECT g.id,gd.menu_id,gd.isList,gd.isAdd,gd.isEdit,gd.isDelete
					FROM $tblgroup g, $tblgroup_detail gd
					WHERE gd.pid = g.id
				) grp , (
					SELECT ug.user_id, ug.group_id
					FROM $tbluser u, $tbluser_group ug
					WHERE ug.user_id = u.emp_id
				) usr
				WHERE grp.menu_id = m.id
					AND usr.group_id = grp.id
					AND m.url_menu LIKE '$params%'
					AND usr.user_id = '$userid'
					AND m.active = 1
					$FILTER
				ORDER BY parent_id,tid
			";

            $result = $this->CI->db->query($sSQL);
            if ($result->num_rows() == 0) {
                // privileges menu tsb tidak ada
                return false;
            } else {
                return true;
            }
        } else {
            $this->Auth_restrict();
        }
    }

    // untuk mengecek ID pada tabel
    function Auth_isRecID($id, $tblName, $field) {

        if (empty($id)) {
            return false;
        }
        $sSQL = "
			SELECT $field FROM $tblName WHERE $field = '$id'
		";

        $result = $this->CI->db->query($sSQL);
        if ($result->num_rows() == 0) {
            // privileges menu tsb tidak ada
            return false;
        } else {
            return true;
        }
    }

    function Auth_isDataAuthorized($title) {
        $list = $this->CI->session->userdata('data_authorization');
        if (in_array($title, $list)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Auth_getNameMenu() {
        $tblmenu = $this->CI->config->item('tmst_menu');

        $params = $this->CI->router->fetch_class();

        $sSQL = "
			SELECT id,custom_title 
			FROM $tblmenu 
			WHERE 1=1 
				AND (url_menu LIKE '$params' OR url_menu LIKE '$params/')
		";

        $nm = "";
        $ambil = $this->CI->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            $hasil = $ambil->row();
            $nm = $hasil->custom_title;
        }
        return $nm;
    }

    public function TVD($msg = '') {
        echo '<pre>'; // This is for correct handling of newlines
        ob_start();
        print_r($msg);
        $a = ob_get_contents();
        ob_end_clean();
        echo htmlspecialchars($a, ENT_QUOTES); // Escape every HTML special chars (especially > and < )
        echo '</pre>';
    }

    // Fungsi Uniq ID
    public function Auth_nextuniqueid() {
        srand((double) microtime() * 1000000);
        return sprintf("%s%06d", date("YmdHis"), rand(0, 999999));
    }

    public function Auth_isEmailExist($email) {
        $this->CI->load->model('md_manage_user');
        $isEmailExist = $this->CI->md_manage_user->MDL_IsEmailExist($email);
        if ($isEmailExist) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Auth_StockMinimum($barang, $userid = FALSE, $branch = FALSE) {
        $this->CI->load->model('md_set_min_stock');
        $this->CI->load->model('md_employee');

        if (!$branch) {
            if ($userid) {
                $branch = $this->CI->md_employee->MDL_SelectByID($userid)->branch;
            } else {
                $branch = 'BRNC00001';
            }
        }

        $item = $this->CI->md_set_min_stock->MDL_SelectID_Branch($barang[item], $branch);

        $min = $item->available_stock - $barang[qty];

        if ($min >= 0) {
            $status = TRUE;
        } else {
            $status = FALSE;
        }
        return $status;
    }

}
