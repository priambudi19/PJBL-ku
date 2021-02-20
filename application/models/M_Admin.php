<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Admin extends CI_Model {
    
        public function ambilDataAkun()
        {
          return $this->db->get('akun');
           
        }
        public function ambilDataAkunId($id)
        {
          $this->db->where('id', $id);          
          return $this->db->get('akun');
           
        }

        public function updateData($id,$data)
        {
          $this->db->where('id', $id);          
          $this->db->update('akun', $data);           
        }
        public function deleteAkun($id)
        {
          $this->db->where('id', $id);          
          $this->db->delete('akun');         
        }
    
    }
    
    /* End of file M_Admin.php */
    
?>