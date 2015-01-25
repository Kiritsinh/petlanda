<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }
        $this->location = APPPATH.'third_party/location.json';
        $this->load->model('login_model');
        $this->load->helper('myfunction');
    }

    function auth_user() {
        $userName = $this->input->post('userName');
        $Password = $this->input->post('Password');
        
        $check_user = $this->login_model->auth_user($userName, $Password, 'active');
        if (!empty($check_user)) {
            $info = array('uid' => $check_user[0]['uid'], 'username' => $check_user[0]['username']);
            $this->session->set_userdata($info);
            echo "success";
        }else{
            echo "new";
        }
        
    }

    function index() {
        
        $this->user_id = $this->session->userdata('uid');
        if(!$this->user_id){
            $this->load->view('login/index');
        }else{
            redirect(site_url(), 'refresh');
        }
    }
    
    function logout() {
        $this->session->sess_destroy();
        redirect(site_url('login/index/'), 'refresh');
    }
    
    function get_city() {
        if(empty($_POST)){
            exit;
        }
        $selectedCon = $this->input->post('country');
        $list = json_decode(file_get_contents($this->location), true);
        if (array_key_exists($selectedCon, $list)) {
            $allCity = $list[$selectedCon];
            sort($allCity);
        }else {
            echo "no_country";
            exit;
        }
        $string = '';
        if (array_key_exists($selectedCon, $list)) {
            $string.='<span class="input-group-addon"><i class="fa fa-user"></i></span>';
            $string.='<select name="city" id="city" class="form-control">';
            foreach ($allCity as $val) { 
                $string.='<option value="';$string.=$val;$string.='">';$string.=$val;$string.='</option>';
            }
            echo $string.='</select>';
        } else {
            echo "no_country";
        }
    }
    function sign_up() {
        $list = json_decode(file_get_contents($this->location), true);
        $country = array();
        foreach ($list as $key => $val) {
            $country[] = $key;
        }
        sort($country);
        $data = array('country' => $country);
        //$this->load->view('ppc_pages/location', $data);
        $this->load->view('login/sign_up_form',$data);
    }

    function authenticate_user() {
        if(empty($_POST)){
            exit;
        }
        $userName = $this->input->post('userName');
        $email = $this->input->post('email');
        $Password = $this->input->post('Password');
        $Password_repeat = $this->input->post('Password_repeat');
        $gender = $this->input->post('gender');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $day = $this->input->post('day');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $country = $this->input->post('country');
        $city = $this->input->post('city');
        
        $list = json_decode(file_get_contents($this->location), true);
        if (!array_key_exists($country, $list)) {
            echo "fake_country";exit;
        }
        $country_city = $list[$country];
        if(!in_array($city, $country_city)){
            echo "fake_city";exit;
        }
        
        $checkBday = checkdate($month, $day, $year);
        if($checkBday==TRUE && strlen($year)<=4){
            $birthday = date("Y-m-d",mktime(0,0,0,$month,$day,$year));
        }else{
            echo "bday";
            exit;
        }
         
        if (md5($Password) !== md5($Password_repeat)) {
            echo "password_not_match";
            exit;
        }
        $gender = ($gender=="1") ? "Male" : (($gender=="2") ? "Female" : "");
        //$sql1 = $this->login->check_user($userName, $this->input->post('pass'));
        $user_exist = $this->login_model->user_exist($userName, $email, 'active');
        if (!empty($user_exist)) {
            echo "user_exist";
            exit;
        } else {
            $info = array(
                'username' => $userName, 
                'password' => md5($Password),
                'email' => $email,
                'gender'=>$gender ,
                'firstname'=>$firstname,
                'lastname'=>$lastname,
                'birthday'=>$birthday,
                'country'=>$country,
                'city'=>$city,
                'live_status' => 'Online',
                'account_status' => 'active'
                );
            
            $this->login_model->insert_userInfo($info);
        }
        $userInfo = $this->login_model->get_user_info($userName, $email);
        $info = array('uid' => $userInfo[0]['uid'], 'username' => $userInfo[0]['username']);
        $this->session->set_userdata($info);
        //redirect(site_url('welcome'), 'refresh');
        //redirect(site_url('login'), 'refresh');
    }

}
