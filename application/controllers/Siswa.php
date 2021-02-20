<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Siswa extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('m_siswa');
        if($this->session->userdata('id_kelompok')==NULL){
            redirect('auth/login');
        }elseif($this->session->userdata('role')!=3){
            echo "bukan hak kamu";
            redirect('auth/forbidden');
        }
    }
    
    public function index()
    {
        
        redirect('siswa/detailproject','refresh');
        
    }

    public function detailProject()
    {
        
        $id_kelompok = $this->session->userdata('id_kelompok');
        $data['project'] = $this->m_siswa->ambilDataProject($id_kelompok)->result();
        $data['fase'] = $this->m_siswa->getALlFase( $data['project'][0]->id_project)->result();
        $title['title'] = "Project: ".$this->m_siswa->ambilDataProject($id_kelompok)->row()->nama_project;
    
        //print_r($data['project']);
        //echo "<hr>";
        //print_r($data['fase']);

        
        $this->load->view('v_header',$title);
        $this->load->view('v_nav',$data);  
        $this->load->view('siswa/v_siswa',$data);
        $this->load->view('v_footer');
    }

    public function detailFase($id)
    {

        if($this->m_siswa->aksesFase($id)->row('id') != $this->session->userdata('id_project')){
            
            redirect('siswa/detailproject','refresh');
            
        }
               
        $data['fase'] = $this->m_siswa->getFase($id)->result();
        $title['title'] = "Detail Fase: ".$this->m_siswa->getFase($id)->row()->nama_fase;
        $id_kelompok = $this->session->userdata('id_kelompok');
        $cek = $this->m_siswa->cekJawaban($id,$id_kelompok)->result();
        $data['jawaban_fase'] = $cek;
        if ($cek!=null){
           $this->session->set_flashdata('jawaban', 'true');
           
        }else{
            $this->session->set_flashdata('jawaban', 'false');
        }
        $this->load->view('v_header',$title);
        $this->load->view('v_nav');  
    //    print_r($cek); echo "<hr>".$this->db->last_query()."<hr>";
    //     print_r($this->session->userdata('id_kelompok'));
        $this->load->view('siswa/v_detailfase',$data);        
        $this->load->view('v_footer');
        
    }

    public function kirimJawaban()
    {
        $config['upload_path'] = './assets/fase/jawaban/';
        $config['allowed_types'] = 'zip|rar|pdf|doc|ppt|pptx|odt|docx|jpg|jpeg|png|gif|';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $urutanfase = $this->input->post('urutan_fase');
        
        if ( ! $this->upload->do_upload('lampiran')){
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            $error = array('error' => $this->upload->display_errors());
            $datafile = null;
        }
        else{
            $file = array('upload_data' => $this->upload->data());
            $datafile = $file['upload_data']['file_name'];
        } 
        
        
        $data = array(
                    // 'id_project'=>$this->input->post('id_project'),
                    'id_kelompok'=> $this->session->userdata('id_kelompok'),
                    'id_fase'=>$this->input->post('id_fase'),
                    'jawaban'=>htmlspecialchars($this->input->post('jawaban')),
                    'lampiran'=>$datafile
                    );
        if($this->m_siswa->kirimJawaban($data)){
            
            $this->session->set_flashdata('kirim', 'Jawaban Terkirim');
            if($urutanfase != 1){
            redirect('siswa/detailfase/'.$this->input->post('id_fase'),'refresh');            
            }else{
                redirect('siswa/pertanyaan/','refresh');
            }
        }
    }
    public function editJawaban()
    {
        
        $config['upload_path'] = './assets/fase/jawaban/';
        $config['allowed_types'] = 'zip|rar|pdf|doc|ppt|pptx|odt|docx|jpg|jpeg|png|gif|';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $last_lampiran = $this->input->post('last_lampiran');
        //print_r($last_lampiran);
        if ( ! $this->upload->do_upload('lampiran')){
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            $error = array('error' => $this->upload->display_errors());
            $datafile = $last_lampiran;
         //   print_r($datafile);
            
        }else{
            $file = array('upload_data' => $this->upload->data());
            $datafile = $file['upload_data']['file_name'];
        } 
       
        $id_jawaban = $this->input->post('id_jawaban');
        $data = array(
                    // 'id_project'=>$this->input->post('id_project'),
                    'id_kelompok'=> $this->session->userdata('id_kelompok'),
                    'id_fase'=>$this->input->post('id_fase'),
                    'jawaban'=>htmlspecialchars($this->input->post('jawaban')),
                    'lampiran'=>$datafile
                    );
        if($this->m_siswa->editJawaban($data,$id_jawaban)){
            
            $this->session->set_flashdata('kirim', 'Jawaban Telah Diedit');
                
            
        }
        redirect('siswa/detailfase/'.$this->input->post('id_fase'),'refresh');    
    }

    public function profil()
    {
        $id_kelompok = $this->session->userdata('id_kelompok');
        $data['kelompok'] = $this->m_siswa->profil($id_kelompok)->row_array();
        $title['title'] = "Profil";
        $this->load->view('v_header',$title);
        $this->load->view('v_nav');  
        //$this->load->view('v_profilkelompok', $data);
        //print_r($data['kelompok']);
        $this->load->view('siswa/v_profilsiswa', $data);        
        $this->load->view('v_footer');
        
    }

    public function editProfil()
    {
 
        
        $id_kelompok = $this->input->post('id');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $data = array(
            'nama_kelompok' => htmlspecialchars($this->input->post('nama_kelompok')),
            'anggota' => htmlspecialchars($this->input->post('anggota')),
            
            'password' => $this->input->post('password')
        );

        if (!$this->form_validation->run() == false) {

            $this->m_siswa->editProfil($id_kelompok, $data);
            
            
        } else {
            $this->session->set_flashdata('error', form_error('password','<strong class="text-danger">','</strong>'));
            
        }
        redirect('siswa/profil/'.$id_kelompok);



        
        // print_r($this->db->last_query());
        
        
    }

    
    
    public function pertanyaan()
        {   
            $title['title'] = "Pertanyaan";
            $this->load->view('v_header',$title);
            $this->load->view('v_nav');  
            $this->load->model('m_guru');          
            $id_kelompok = $this->session->userdata('id_kelompok');            
            $id_project = $this->session->userdata('id_project');            
            $data["pertanyaan"] = $this->m_siswa->getPertanyaan($id_project)->result();
            $data["fase"] = $this->m_siswa->getFasePertanyaan($id_project)->result();
            $id_kelompok = $this->session->userdata('id_kelompok');
            $cek = $this->m_siswa->cekJawaban($data["fase"][0]->id,$id_kelompok)->result();
            $data['jawaban_fase'] = $cek;
            if ($cek!=null){
            $this->session->set_flashdata('jawaban', 'true');
            
            }else{
                $this->session->set_flashdata('jawaban', 'false');
            }
            $this->load->view('siswa/v_pertanyaan_s', $data);
            // print_r($data["fase"]);
            // );
            $this->load->view('v_footer');
        }
    
    public function getPertanyaanID()
    {
        $id_pertanyaaan = $this->input->post('id');
        $data = $this->m_siswa->getPertanyaanID($id_pertanyaaan)->row();
        echo json_encode($data);
        
    }

    public function getJawabanPertanyaan()
    {
        $id_pertanyaaan = $this->input->post('id_pertanyaan');
        $data = $this->m_siswa->getJawabanPertanyaan($id_pertanyaaan)->row();
        echo json_encode( $this->db->last_query());
    }

    public function kirimJawabanPertanyaan()
    {
       $jawaban = array(
                        'id_kelompok'=>$this->input->post('id_kelompok'),
                        'id_pertanyaan' =>$this->input->post('id_pertanyaan'),
                        'jawaban' => htmlspecialchars($this->input->post('jawaban'))
       );
       $this->m_siswa->kirimJawabanPertanyaan($jawaban);
       
       redirect('siswa/pertanyaan/'.$this->session->userdata('id_project'),'refresh');
       
    }

    public function cekJawabanPertanyaan()
    {   
        $where = array(
        'id_pertanyaan'=> $this->input->post('id_pertanyaan'),
        'id_kelompok'=> $this->input->post('id_kelompok'));
        $data = $this->m_siswa->cekJawabanPertanyaan($where)->row();
        echo json_encode($data);
    }

    public function presentaseTerjawab()
    {
       
    }

}

/* End of file Siswa.php */


?>