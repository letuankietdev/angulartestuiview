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
     }
    public function read(){
 
   
 
       $query = $this->db->query("select * from `users`");
 
       return $query->result_array();
 
   }
  
   public function insert($data){
       $this->name = $data['name'];
       $this->enail = $data['email'];
       $this->quyen = $data['quyen'];
       $this->password = $data['password'];
        if($this->db->insert(`users`, $this)){
            return "Insert success";
        }
        else{
            return "Error";
        }
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
   }
 
 
 
  
 
 
}