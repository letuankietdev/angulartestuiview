<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
 
/**
 
*
 
*/
 
class User_model extends CI_Model
 
{
    public function __construct(){
        parent::__construct();
         $this->load->database();
         $this->load->model('User_model','model');
     }
    public function read(){
 
   
 
       $query = $this->db->query("select * from `users`");
 
       return $query->result_array();
 
   }
  
   public function addUser($data){
        $query = $this->db->insert('users',$data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
        // $data = array('name' => $name, 'email'=>$email,'password'=>$password,'quyen'=>$quyen);
        // $this->db->insert('users',$data);
        // $insert_id = $this->db->affected_rows();
        // return $insert_id();
    //    $this->name = $data['name'];
    //    $this->enail = $data['email'];
    //    $this->quyen = $data['quyen'];
    //    $this->password = $data['password'];
    //     if($this->db->insert(`users`, $this)){
    //         return "Insert success";
    //     }
    //     else{
    //         return "Error";
    //     }

   }
   public function update($id, $data){
       $this->name = $data['name'];
       $this->email = $data['email'];
       $this->created_at = $data['created_at'];
       $this->updated_at = $data['updated_at'];
       $result = $this->db->update('users',$this,array('id'=>$id));
       if($result){
           return "update success";
       }
       else{
           return "Error";
       }
        // $this->db->where('id',$id);
        // $this->db->update('users',$data);
        // $num_inserts = $this->db->affected_rows();
        // return $num_inserts;
   }
 
 
 
  
 
 
}