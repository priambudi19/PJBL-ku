<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Siswa extends CI_Model {
        
        public function ambilDataProject($id_kelompok)
        {
            return
            $this->db->query("SELECT
            project.id AS id_project,
            project.thumb AS thumb_project,
            project.deskripsi AS deskripsi_project,
            project.nama_project,
            project.id_kelas,
            kelompok.id AS id_kelompok,
            kelompok.nama_kelompok,
            kelompok.anggota,
            kelompok.username,
            kelompok.`password` 
        FROM
            project

            INNER JOIN kelompok ON project.id = kelompok.id_project WHERE kelompok.id=$id_kelompok");
        }



        public function getFase($id)
        {
           return $this->db->get_where('fase', array('id'=>$id));
           
        }
        
        public function getFasePertanyaan($id_project)
        {
            return $this->db->get_where('fase', array('id_project'=>$id_project, 'urutan_fase' => 1));
            
        }

        public function getAllFase($id)
        {
           return $this->db->get_where('fase', array('id_project'=>$id));
            
        }

        public function aksesFase($id)
        {
         return   $this->db->query("SELECT DISTINCT
                project.id 
            FROM
                fase
                INNER JOIN project ON fase.id_project = project.id 
            WHERE
                fase.id = $id");
        }

        public function kirimJawaban($data)
        {
           return $this->db->insert('jawaban_kelompok', $data);
            
        }
        public function editJawaban($data,$id_jawaban)
        {
           $this->db->where('id', $id_jawaban);            
           $this->db->update('jawaban_kelompok', $data);
            
        }
        public function ambilIDKelompok($username)
        {
            return $this->db->get_where('kelompok',array('username'=>$username));
        }

        public function cekJawaban($id_fase, $id_kelompok)
        {
            return $this->db->get_where('jawaban_kelompok',array('id_fase'=>$id_fase,'id_kelompok'=>$id_kelompok));
        }


        public function profil($id_kelompok)
        {
            return $this->db->get_where('kelompok', array('id'=>$id_kelompok));
            
        }
        public function editProfil($id_kelompok,$data)
        {
            $this->db->where('id', $id_kelompok);
            $this->db->update('kelompok', $data);            
            
        }

        public function jawabanpertanyaan($id_kelompok)
        {
            return $this->db->get_where('jawaban_pertanyaan',array('id_kelompok'=>$id_kelompok));
            
        }

        public function getPertanyaan($id_project)
        {
            return $this->db->get_where('pertanyaan', ['id_project'=>$id_project]);            
        
        }

        public function getPertanyaanID($id_pertanyaan)
        {
            return $this->db->get_where('pertanyaan', array('id'=>$id_pertanyaan));
            
        }
        public function getJawabanPertanyaan($id_pertanyaan)
        {
            return $this->db->get_where('jawaban_pertanyaan', array('id_pertanyaan'=>$id_pertanyaan));
            
        }
        public function getAllJawabanPertanyaan($id_kelompok)
        {
            $this->db->order_by('id', 'asc');
            return $this->db->get_where('jawaban_pertanyaan', array('id_kelompok'=>$id_kelompok));
            
        }
        public function cekJawabanPertanyaan($where)
        {   
            return $this->db->get_where('jawaban_pertanyaan', $where);         
        }

        public function kirimJawabanPertanyaan($jawaban)
        {
           $this->db->insert('jawaban_pertanyaan', $jawaban);
           
        }

        public function is_unique($table,$where)
        {
            return $this->db->get_where($table, $where);
        }

        
    
    }
    
    /* End of file Siswa.php */
    

?>