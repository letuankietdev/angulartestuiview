<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Tintuc_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function tintuc(){
        
       $query = $this->db->query("select * from `tintuc`");
 
       return $query->result_array();
 
    }
}