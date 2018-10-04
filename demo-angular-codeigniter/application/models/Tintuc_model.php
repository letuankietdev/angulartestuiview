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
    public function tintuchot(){
        $this->db->limit(3);
        $query =  $this->db->get_where('tintuc', array('NoiBat' =>1));
        return $query->result_array();
    }
    public function tintucmoi() {
      

        $this->db->limit(3);
        $this->db->order_by("created_at",'DESC');
        $query = $this->db->get('tintuc');;
        return $query->result_array();

    }
    public function tintucdocnhieu(){
        $this->db->limit(3);
        $this->db->order_by("SoLuotXem",'DESC');
        $query = $this->db->get('tintuc');;
        return $query->result_array();

    }
    public function  readnow($id){
        $query =  $this->db->get_where('tintuc', array('id' =>$id));
        return $query->result_array();
    }
}