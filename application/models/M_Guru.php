<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Guru extends CI_Model {
        public function ambilDataKelas($id_guru)
        {
            return $this->db->get_where('kelas',array('id_guru'=>$id_guru));
        }
        public function ambilKelas($id_kelas)
        {
            return $this->db->get_where('kelas',array('id'=>$id_kelas));
        }
        public function tambahKelas($data)
        {
            return $this->db->insert('kelas',$data);
        }
        public function editKelas($id_kelas,$data)
        {
            $this->db->where('id', $id_kelas);            
            $this->db->update('kelas',$data);
        }
        public function deleteKelas($id_kelas)
        {
            $this->db->where('id', $id_kelas);            
            $this->db->delete('kelas');
            
        }

        public function deleteProject($id_project)
        {
           
            $this->db->where('id', $id_project);            
            $this->db->delete('project');
        }

        public function editSaveProject($data,$id_project)
        {
            $this->db->where('id', $id_project);
            $this->db->update('project', $data);
            return true;
            
            
        }
        
        public function ambilDataProject($kelas)
        {
            return $this->db->query("SELECT	
            project.id, 
            project.id_kelas, 
            kelas.nama_kelas, 
            project.nama_project, 
            project.thumb,

            project.deskripsi
             FROM  project
            INNER JOIN   kelas ON  project.id_kelas = kelas.id WHERE project.id_kelas=$kelas");
   
        }

        public function projectDetail($id)
        {
           return $this->db->get_where('project', array('id'=>$id));
        }

        public function saveProject($data)
        {
            return $this->db->insert('project',$data);
            
        }

        public function getPertanyaan($id)
        {
            return $this->db->get_where('pertanyaan',array('id'=>$id));
            
        }

        public function listpertanyaan($id_project)
        {
            return $this->db->get_where('pertanyaan',array('id_project'=>$id_project));
        }
        public function buatpertanyaan($data,$id_project,$fase)
        {
            $this->db->insert_batch('pertanyaan', $data);
            $this->db->insert('fase',$fase);
        }

        public function editPertanyaan($id,$data)
        {
            $this->db->where('id', $id);
            $this->db->update('pertanyaan', $data);            
            
        }
        public function deletePertanyaan($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('pertanyaan');            
            
        }
        public function setJawabanPertanyaan($id,$data)
        {
            $this->db->where('id', $id);
            $this->db->update('pertanyaan', $data);
            
            
        }

        public function getJawabanPertanyaan($id_project,$id_kelompok)
        {
            $query = "SELECT
            pertanyaan.id,
            pertanyaan.pertanyaan,
            kelompok.nama_kelompok,
            kelompok.anggota,
            jawaban_pertanyaan.jawaban, jawaban_pertanyaan.id_kelompok
            
        FROM
            jawaban_pertanyaan
            INNER JOIN kelompok ON jawaban_pertanyaan.id_kelompok = kelompok.id
            INNER JOIN pertanyaan ON jawaban_pertanyaan.id_pertanyaan = pertanyaan.id 
        WHERE
            pertanyaan.id_project = $id_project AND  kelompok.id = $id_kelompok
        ORDER BY
            pertanyaan.id";
            return $this->db->query($query);
            
        }

        public function generateKelompok($generate)
        {
            $this->db->insert_batch('kelompok', $generate);
            
        }

        public function hitungAkun()
        {
            return $this->db->query('SELECT COUNT(id) FROM akun');   
        }

        public function getKelompok($id_project)
        {
            return $this->db->get_where('kelompok', array('id_project'=>$id_project));
            
        }

        public function saveFase($data)
        {
            return $this->db->insert('fase',$data);
        }

        public function editFase($id_fase,$data)
        {
            $this->db->where('id', $id_fase);            
            $this->db->update('fase', $data);
            
        }

        public function getFaseByID($id_fase)
        {
            return $this->db->get_where('fase', array('id'=>$id_fase));
            
        }

        public function getAllFase($id_project)
        {
            return $this->db->get_where('fase',array('id_project'=>$id_project));
        }
        public function getJumlahFase($id_project)
        {
            return 
            $this->db->query("SELECT COUNT(*) as jumlah FROM fase WHERE fase.id_project = $id_project");
            
        }
        
        public function jawabanfase($id)
        {
            return
            $this->db->query("SELECT
                                jawaban_kelompok.id,
                                jawaban_kelompok.nilai,
                                jawaban_kelompok.komentar,
                                kelompok.nama_kelompok,
                                kelompok.anggota,
                                fase.nama_fase,
                                fase.urutan_fase,
                                kelompok.id_project,
                                jawaban_kelompok.id_fase,
                                jawaban_kelompok.jawaban,
                                jawaban_kelompok.lampiran,
                                jawaban_kelompok.dikirim
                            FROM
                                jawaban_kelompok
                                INNER JOIN kelompok ON jawaban_kelompok.id_kelompok = kelompok.id
                                INNER JOIN fase ON jawaban_kelompok.id_fase = fase.id
                                    WHERE id_fase = $id");       
        }

        public function beriNilaiFase($id_jawaban,$data)
        {
            $this->db->where('id', $id_jawaban);
            $this->db->update('jawaban_kelompok', $data);
            
        }

        public function showKelompok($id_project)
        {

           return $this->db->get_where('kelompok',array('id_project'=>$id_project));
        }
        public function showKelompokByID($id)
        {

           return $this->db->get_where('kelompok',array('id'=>$id));
        }

        public function profil($id)
        {
            return $this->db->get_where('akun',array('id'=>$id));
        }

        public function editprofil($id,$data)
        {
            $this->db->where('id', $id);
            $this->db->update('akun', $data);
            
            
        }
    
    }
    
    /* End of file M_Guru.php */
