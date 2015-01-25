<?php

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
        $this->user_id = $this->session->userdata('uid');
        $this->username = $this->session->userdata('username');
    }

    public function index() {
        $data = array();
        $this->load->view('welcome_message',$data);
        $this->load->view('header/footer');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */