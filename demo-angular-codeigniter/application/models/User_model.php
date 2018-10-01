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
        if($this->db->insert('users', $this)){
            return "Insert success";
        }
        else{
            return "Error";
        }
   }
 
 
 
  
 
 
}