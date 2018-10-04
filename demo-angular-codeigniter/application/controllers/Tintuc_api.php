<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH .'libraries/REST_Controller.php');

class Tintuc_api extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Tintuc_model');
  
    }  
    public function Tintuc_get(){
        $r = $this->Tintuc_model->tintuc();
        $this->response($r); 
    }
    public function Tintuchot_get(){
        $r = $this->Tintuc_model->tintuchot();
        $this->response($r); 
    }
    public function Tintucnew_get(){
        $r = $this->Tintuc_model->tintucmoi();
        $this->response($r); 
    }
    public function Tintucreadmore_get(){
        $r = $this->Tintuc_model->tintucdocnhieu();
        $this->response($r); 
    }
    public function readtintuc_get(){

        $r = $this->Tintuc_model->readnow($id);
        $this->response($r);
    }
   
}
