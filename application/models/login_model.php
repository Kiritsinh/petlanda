<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function user_exist($user,$email,$account_status = 'active') {
        $result = array();
        $query = $this->db->limit('1')->get_where('user_auth', array(
                    'username' => $user,
                    'account_status' => $account_status));
        $result = $query->result_array();
        if(empty($result)){
            unset($result);
            $query = $this->db->limit('1')->get_where('user_auth', array(
                    'email' => $email,
                    'account_status' => $account_status));
            $result = $query->result_array();
        }
        return $result;
    }
    function insert_userInfo($info){
        $this->db->insert('user_auth',$info);
    }
    function get_user_info($username,$email){
        $query = "SELECT * FROM user_auth WHERE username =  '$username'  Or  email = '$email' LIMIT 1";
        $result = $this->db->query($query);
        return $result->result_array();
    }
    function auth_user($userName, $Password, $account_status){
        $query = $this->db->limit('1')->get_where('user_auth', array(
                    'username' => $userName,
                    'Password'=>md5($Password),
                    'account_status' => $account_status));
        $result = $query->result_array();
        
        if(empty($result)){
            unset($result);
            $query = $this->db->limit('1')->get_where('user_auth', array(
                    'email' => $userName,
                    'Password'=>md5($Password),
                    'account_status' => $account_status));
            $result = $query->result_array();
        }
        return $result;
    }
}
