<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //date_default_timezone_set("Asia/Jakarta");
    }

    public function index() {

        $AryCommodity = $this->CTRL_Option_Commodity();
        $data['commodity'] = '';
        $data['option_commodity'] = $AryCommodity;

        $AryGoods = $this->CTRL_Option_Goods();
        $data['goods'] = '';
        $data['option_goods'] = $AryGoods;

        $data['plugin'] = 'Login/plugin';
        //var_dump($data['plugin']);die();
        $this->load->view('template_login', $data);
    }

    public function doLogin() {

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $success = $this->auth->Auth_doLogin($email, $password);
        //var_dump($success);die();

        if ($success == 1) {
            // lemparkan ke halaman index user
            if ($this->auth->Auth_isLogin()) {
                redirect('admin');
            } else {
                redirect('login');
            }
        } elseif ($success == 2) {
            print("
				<script language=\"javascript\">
					alert('User Not Active. Please try again or contact administrator.. !!');
					self.history.back();
				</script>
			");
        } else {
            print("
				<script language=\"javascript\">
					alert('Invalid Email or Password. Please try again !!');
					self.history.back();
				</script>
			");
        }
    }

    public function logout() {
        $tbluser = $this->config->item('tmst_users');
        $userid = $this->session->userdata('userid');

        $this->session->sess_destroy();
        redirect('login');
    }

    public function forgot_password() {
        $email = $this->input->post('forgot_email');

        $this->load->model('md_manage_user');
        $this->load->model('md_template_email');

        $user = $this->md_manage_user->MDL_IsEmailExist($email);
        if (!$user) {
            print("
				<script language=\"javascript\">
					alert('" . $email . " is not registered');
					self.history.back();
				</script>
			");
        } else {
            $user = reset($user);
            $password = $this->randomPassword();
            $this->md_manage_user->MDL_ResetPassword(md5($password), $user->username);
            $config = array(
                'protocol' => $this->config->item('protocol'),
                'smtp_host' => $this->config->item('smtp_host'),
                'smtp_port' => $this->config->item('smtp_port'),
                'smtp_user' => $this->config->item('smtp_user'), // change it to yours
                'smtp_pass' => $this->config->item('smtp_pass'), // change it to yours
                'mailtype' => $this->config->item('mailtype'),
                'charset' => $this->config->item('charset'),
                'wordwrap' => $this->config->item('wordwrap')
            );

            $template_id = $this->config->item('template_forgot_password');
            $template = $this->md_template_email->MDL_SelectID($template_id);
            $message = $template->content;
            $message = str_replace('{password}', $password, $message);
            $message = str_replace('{EMAIL}', $email, $message);

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($this->config->item('smtp_user'), 'Laporan Surveyor - Coal');
            $this->email->to($email);
            $this->email->subject('Password Reset');
            $this->email->message($message);
            $this->email->send();

            print("
				<script language=\"javascript\">
					alert('Your new password has been sent to your email');
					self.history.back();
				</script>
			");
        }
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public function create_account() {

        $goods = $this->input->post('goods');

        /* data user step 3 wizard */
        $username = $this->input->post('username_create_account');
        $password = md5($this->input->post('password_create_account'));
        $email = $this->input->post('email_create_account');


        $this->load->model('md_create_account');
        $this->load->model('md_template_email');

        $user = $this->md_create_account->MDL_IsUserNameExist($username);

        if ($user) {
            print("
					<script language=\"javascript\">
						alert('" . $username . " is registered already, use different username');
						self.history.back();
					</script>
				");
        } else {
            $this->md_create_account->MDL_InsertUser($goods);

            //Set Active User
            $user = array(
                'active' => TRUE,
                'userid' => $this->input->post('username_create_account'),
                'first_name' => $this->input->post('username_create_account'),
                'middle_name' => '',
                'last_name' => '',
                'username' => $this->input->post('username_create_account'),
                'email' => $this->input->post('email_create_account'),
                'password' => md5($this->input->post('password_create_account')),
                'moduser' => 'user'
            );

            $this->load->model('md_registration');
            $this->md_registration->MDL_SetActiveUser($user, '18'); // New Registration

            $config = array(
                'protocol' => $this->config->item('protocol'),
                'smtp_host' => $this->config->item('smtp_host'),
                'smtp_port' => $this->config->item('smtp_port'),
                'smtp_user' => $this->config->item('smtp_user'), // change it to yours
                'smtp_pass' => $this->config->item('smtp_pass'), // change it to yours
                'mailtype' => $this->config->item('mailtype'),
                'charset' => $this->config->item('charset'),
                'wordwrap' => $this->config->item('wordwrap')
            );

            // Email for External (Customer)...
            $template_id = $this->config->item('template_registration_external');
            $template = $this->md_template_email->MDL_SelectID($template_id);
            $message = $template->content;
            $message = str_replace('{username}', $username, $message);

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($this->config->item('smtp_user'), 'SNI Compliance Program');
            $this->email->to($email);
            $this->email->subject('New Registration SNI Compliance Program');
            $this->email->message($message);
            $this->email->send();

            // Email for Internal (HO Operation)...
            $template_2 = $this->config->item('template_registration_internal');
            $template_2 = $this->md_template_email->MDL_SelectID($template_2);
            $message_2 = $template_2->content;
            $message_2 = str_replace('{EMAIL}', $email, $message_2);

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($this->config->item('smtp_user'), 'SNI Compliance Program');
            $this->email->to('danang.samekto@carsurin.com');
            $this->email->subject('New Registration SNI Compliance Program');
            $this->email->message($message_2);
            $this->email->send();

            print("
					<script language=\"javascript\">
						alert('Your New Registration Information has been sent to your email');
						self.history.back();
					</script>
				");
        }
    }

    public function CTRL_Option_Commodity() {
        $this->load->model('md_commodity');
        $AryType = $this->md_commodity->MDL_Select();
        $option[''] = '';
        foreach ($AryType as $row) {
            $option[$row->id] = $row->commodity_name;
        }
        return $option;
    }

    public function CTRL_Option_Goods() {
        $this->load->model('md_ref_json');
        $AryType = $this->md_ref_json->MDL_Select_MasterType('GOODS');
        foreach ($AryType as $row) {
            $option[$row->id] = $row->name;
        }
        return $option;
    }

}
