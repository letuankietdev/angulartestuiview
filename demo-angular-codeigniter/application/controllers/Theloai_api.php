<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH .'libraries/REST_Controller.php');

class Theloai_api extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Theloai_model');
  
    }  
    public function TheLoai_get(){
        $r = $this->Theloai_model->getTheloai();
        $this->response($r); 
    }
}