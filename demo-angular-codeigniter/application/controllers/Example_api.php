<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH .'libraries/REST_Controller.php');

class Example_api extends REST_Controller{
    public  function test_get(){
        $name = 'KIET';

        echo "Tao la".$name."ne";
        
    }
    public function api_get(){

    }
    public function __construct() {
      parent::__construct();
      $this->load->model('User_model');

  }    
    public function user_get(){
      $r = $this->User_model->read();
      $this->response($r); 
  }
  public function user_put(){
    $id = $this->uri->segment(3);

    $data = array('name' => $this->input->get('name'),
    'password' => $this->input->get('password'),
    'email' => $this->input-get('email'),
    'quyen' => $this->input->get('quyen')
    );

     $r = $this->User_model->update($id,$data);
        $this->response($r); 
}


}
?>