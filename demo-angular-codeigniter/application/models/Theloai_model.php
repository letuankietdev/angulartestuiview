<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Theloai_model extends CI_Model {
        public function __construct(){
            parent::__construct();
             $this->load->database();
             $this->load->model('Theloai_model','model');
         }
         public function getTheloai(){
            $query = $this->db->query("select * from `theloai`");
 
            return $query->result_array();
         }
    }
