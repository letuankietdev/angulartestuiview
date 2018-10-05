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
    public function addUser_post(){
        $postdat = file_get_contents("php://input");
        $request = json_decode($postdat);
        $name = $request ->name;
        $emai = $request ->email;
        $password = $request->password;
        $quyen = $request->quyen;
        $id = $this->User_model->addUser($name,$emai,$password,$quyen);
        if($id){
            echo '{"status":"success"}';

        }
        else{
            echo '{"status":"faile"}';
        }
    }
    public function user_get(){
      $r = $this->User_model->read();
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
        
        $result = $this->User_model->update($this->post('id'),array(
            'name'=> $this->post('name'),
            'email'=> $this->post('email'),
            'created_at'=> $this->post('created_at'),
            'updated_at'=> $this->post('updated_at'),
        ));
        if($result == FALSE){
            $this->response(array('status' => 'failed'));
        }
         else
        {
            $this->response(array('status' => 'success'));
        }
           
        // $data = array ('name'=>$this->input->post('name'),
        // 'email'=>$this->input->post('email'),
        // 'created_at'=>$this->input->post('created_at'),
        // 'updated_at'=>$this->input->post('updated_at')
        // );
 
        //     $r = $this->User_model->update($id,$data);
        //        $this->response($r); 


    }
    public function userlogin_get(){
        $email = $_GET['email'];
        $password = $_GET['password'];
        $query = $this->User_nodel->login($email, $password);
        echo json_encode($query);

    }
    



}
?>