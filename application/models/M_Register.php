 <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
 
  class M_Register extends CI_Model{

       function daftar($data)
       {
            $this->db->insert('akun',$data);
       }
  }
 ?>