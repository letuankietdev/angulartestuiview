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
    public function tintuc_get(){
        $r = $this->Tintuc_model->tintuc();
        $this->response($r);
    }
    // public function user_post(){
    //     $data = array('name'=>$this->input->post('name'),
    //                   'email'=>$this->input->post('email'),
    //                   'password'=>$this->input->post('password'),
    //                   'quyen'=>$this->input->post('quyen')
    //      );
    //      $r = $this->User_model->insert($data);
    //      $this->reponse($r);
         
    // }
    public function user_post(){
        $id = $this->uri->segment(4);
        $data = array ('name'=>$this->input->post('name'),
                        'email'=>$this->input->post('email'),
                        'created_at'=>$this->input->post('created_at'),
                        'updated_at'=>$this->input->post('updated_at')
    );
        $r = $this->User_model->update($id,$data);
        $this->response($r);


    }
    



}
?>