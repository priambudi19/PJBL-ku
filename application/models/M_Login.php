<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Login extends CI_Model {
    
        public function cek_user($username,$password)
        {
            return $this->db->get_where('akun', array('username'=>$username,'password'=>$password));
            
            
        }

        public function cek_kelompok($username,$password)
        {
            return $this->db->get_where('kelompok', array('username'=>$username,'password'=>$password));
        }
    
    }
    
    /* End of file Auth.php */
    
?>