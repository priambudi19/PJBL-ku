<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('m_guru');
        if ($this->session->userdata('username') == NULL) {
            redirect('auth/login');
        } elseif ($this->session->userdata('role') != 2) {
            echo "bukan hak kamu";
            redirect('auth/forbidden');
        }
    }


    public function index()
    {
        redirect('guru/daftarkelas');
    }
    public function daftarkelas()
    {
        $id_guru = $this->session->userdata('id');
        $data['kelas'] = $this->m_guru->ambilDataKelas($id_guru)->result();
        $title['title'] = 'Daftar Kelas';
        $this->load->view('v_header', $title);
        $this->load->view('v_nav');
        $this->load->view('guru/v_daftarkelas', $data);
        $this->load->view('v_footer');
    }
    public function tambahKelas()
    {
        $data = array(
            'nama_kelas' => $this->input->post('nama_kelas'),
            'id_guru' => $this->session->userdata('id'),
        );
        if ($this->m_guru->tambahKelas($data)) {
            redirect('guru');
        }
    }

    public function ambilKelas()
    {
        $id = $this->input->post('id_kelas');
        $data = $this->m_guru->ambilKelas($id)->result();
        echo json_encode($data);
    }

    public function kelas($id)
    {
        $kelas = $id;
        $data['project'] = $this->m_guru->ambilDataProject($kelas)->result();
        $data['kelas'] = $this->m_guru->ambilKelas($id)->result();
        $title['title'] = $this->m_guru->ambilKelas($id)->row()->nama_kelas;
        $this->load->view('v_header', $title);
        $this->load->view('v_nav');
        $this->load->view('guru/v_kelas', $data);
        $this->load->view('v_footer');
    }

    public function editKelas()
    {
        $id_kelas = $this->input->post('id_kelas');
        $nama_kelas = array('nama_kelas' => htmlspecialchars($this->input->post('nama_kelas')));
        $this->m_guru->editKelas($id_kelas, $nama_kelas);
    }
    public function deleteKelas()
    {
        $id_kelas = $this->input->post('id_kelas');
        $this->m_guru->deleteKelas($id_kelas);
    }

    public function projectDetail($id)
    {


        if (!$this->m_guru->getKelompok($id)->result()) {
            $this->session->set_flashdata('cek_kelompok', 'true');
            //apabila kelompok sudah dibentuk maka di v project btn buat kelompok akan hilang
            //agar meminimalisasi duplikasi username di database
        };
        $title['title']  = $this->m_guru->projectDetail($id)->row()->nama_project;
        $this->load->view('v_header', $title);
        $this->load->view('v_nav');
        $data['kelompok'] = $this->m_guru->getKelompok($id)->result();
        $data['fase'] = $this->m_guru->getAllFase($id)->result();
        $data['project']  = $this->m_guru->projectDetail($id)->result();

        $this->load->view('guru/v_project', $data);
        $this->load->view('v_footer');
    }

    public function deleteProject()
    {
        $id_project = $this->input->post('id_project');
        $this->m_guru->deleteProject($id_project);
    }

    public function buatProject($id)
    {
        $data['kelas'] = $this->m_guru->ambilKelas($id)->result();
        $title['title'] = "Buat Project";
        $this->load->view('v_header', $title);
        $this->load->view('v_nav');
        $this->load->view('guru/v_buatproject', $data);
        $this->load->view('v_footer');
    }
    public function editProject($id)
    {
        $data['project'] = $this->m_guru->projectDetail($id)->row();
        $title['title'] = "Edit Project";
        $this->load->view('v_header', $title);
        $this->load->view('v_nav');
        $this->load->view('guru/v_editproject', $data);
        $this->load->view('v_footer');
    }

    public function editSaveProject()
    {
        $id_project = $this->input->post('id_project');
        $last_lampiran = $this->input->post('last_thumb');
        $config['upload_path'] = './assets/fase/';
        $config['allowed_types'] = 'jpg|jpeg|png|';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);


        //print_r($last_lampiran);
        if (!$this->upload->do_upload('thumb')) {
            $error = array('error' => $this->upload->display_errors());
            $datafile = $last_lampiran;
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            
            

        } else {
            $file = array('upload_data' => $this->upload->data());
            $datafile = $file['upload_data']['file_name'];
        }

        $data = array(
            'nama_project' => htmlspecialchars($this->input->post('nama_project')),
            "deskripsi" => htmlspecialchars($this->input->post("deskripsi")),
            'thumb' => $datafile
        );
        
        if ($this->m_guru->editSaveProject($data, $id_project)) {

            $this->session->set_flashdata('kirim', 'Project Telah Diedit');
            $this->session->keep_flashdata('kirim');
        }
        redirect('guru/projectdetail/' . $id_project);
    }


    public function saveProject()
    {
        $config['upload_path']          = './assets/';
        $config['allowed_types']        = 'jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('thumb')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            $datafile = null;
        } else {
            $file = array('upload_data' => $this->upload->data());
            $datafile = $file['upload_data']['file_name'];
        }

        $data = array(
            "id_kelas" => $this->input->post("id_kelas"),
            "nama_project" => htmlspecialchars($this->input->post("nama_project")),
            "deskripsi" =>  htmlspecialchars($this->input->post("deskripsi")),
            "thumb" => $datafile
            //"jumlah_kelompok"=> $this->input->post("jumlah_kelompok")
        );

        $this->m_guru->saveProject($data);
        $id_kelas = $this->input->post("id_kelas");
        redirect('guru/kelas/' . $id_kelas);
    }

    public function buatKelompok()
    {
        $id_project = $this->input->post('id_project');
        $jumlah_kelompok = strip_tags($this->input->post('jumlah_kelompok'));
        $generate = array();
        $generate_k = array();

        for ($i = 1; $i <= $jumlah_kelompok; $i++) {


            $data = array(
                'nama_kelompok' => "kelompok-" . $i . "p" . $id_project,
                'id_project' => $id_project,
                'username' => "kelompok" . $i . "p" . $id_project,
                'password' => "kelompok" . $i . "p" . $id_project


            );

            array_push($generate, $data);
        }
        $this->m_guru->generateKelompok($generate);
        redirect('guru/projectdetail/' . $id_project, 'refresh');
    }

    public function showKelompok()
    {
        $id_project = $this->input->post('id_project');
        $data['kelompok'] = $this->m_guru->showKelompok($id_project)->result();
        echo json_encode($data['kelompok']);

        // $this->load->view('v_header',$title,$title['title']);            
        // $this->load->view('v_datakelompok', $data);
        // $this->load->view('v_footer');

    }
    public function showKelompokByID()
    {
        $id = $this->input->post('id');

        $data['kel'] = $this->m_guru->showKelompok($id)->result();
        echo json_encode($data);

        // $this->load->view('v_header',$title,$title['title']);            
        // $this->load->view('v_datakelompok', $data);
        // $this->load->view('v_footer');

    }



    public function getFase()
    {
        $this->load->model('m_guru');
        $id_project = $this->input->post("id_project");
        $get = $this->m_guru->getJumlahFase($id_project)->row();

        echo json_encode($get);




        //echo json_encode( $this->db->last_query());

    }




    public function buatFase()
    {


        $id_project = $this->input->post("id_project");
        $config['upload_path'] = './assets/fase/';
        $config['allowed_types'] = 'zip|rar|pdf|doc|ppt|pptx|odt|docx|jpg|jpeg|png|gif|';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('lampiran')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            $datafile = null;
        } else {
            $file = array('upload_data' => $this->upload->data());
            $datafile = $file['upload_data']['file_name'];
        }
        $thumb_config['upload_path'] = './assets/fase/thumb/';
        $thumb_config['allowed_types'] = 'jpg|jpeg|png|gif|';
        $thumb_config['encrypt_name'] = TRUE;
        $this->upload->initialize($thumb_config);



        $this->load->library('upload', $thumb_config);
        if (!$this->upload->do_upload('thumb')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            $datathumb = null;
        } else {
            $thumb = array('upload_data' => $this->upload->data());
            $datathumb = $thumb['upload_data']['file_name'];
        }



        $data = array(
            "id_project" => $this->input->post("id_project"),
            "urutan_fase" => $this->input->post("urutan_fase"),
            "nama_fase" =>  htmlspecialchars($this->input->post("nama_fase")),
            "deskripsi" => htmlspecialchars($this->input->post("deskripsi")),
            "tenggat" =>  htmlspecialchars($this->input->post("tenggat")),
            "waktu_akses" => htmlspecialchars($this->input->post("waktu_akses")),
            "lampiran" => $datafile,
            "thumb" => $datathumb

        );

        $this->m_guru->saveFase($data);
        redirect('guru/projectdetail/' . $id_project, 'refresh');
    }

    public function editFase()
    {
        $id_project = $this->input->post("id_project");
        $id_fase = $this->input->post("id_fase");
        $config['upload_path'] = './assets/fase/';
        $config['allowed_types'] = 'zip|rar|pdf|doc|ppt|pptx|odt|docx|jpg|jpeg|png|gif|';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('lampiran')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            $datafile = $this->input->post('lampiran_last');
        } else {
            $file = array('upload_data' => $this->upload->data());
            $datafile = $file['upload_data']['file_name'];
        }
        $thumb_config['upload_path'] = './assets/fase/thumb/';
        $thumb_config['allowed_types'] = 'jpg|jpeg|png|gif|';
        $thumb_config['encrypt_name'] = TRUE;
        $this->upload->initialize($thumb_config);


        $this->load->library('upload', $thumb_config);
        if (!$this->upload->do_upload('thumb')) {
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            $error = array('error' => $this->upload->display_errors());
            $datathumb = $this->input->post('thumb_last');
        } else {
            $thumb = array('upload_data' => $this->upload->data());
            $datathumb = $thumb['upload_data']['file_name'];
        }



        $data = array(
            "nama_fase" => htmlspecialchars($this->input->post("nama_fase")),
            "deskripsi" => htmlspecialchars($this->input->post("deskripsi")),
            "tenggat" =>  htmlspecialchars($this->input->post("tenggat")),
            "waktu_akses" => htmlspecialchars($this->input->post("waktu_akses")),
            "lampiran" => $datafile,
            "thumb" => $datathumb

        );

        $this->m_guru->editFase($id_fase, $data);
        redirect('guru/projectdetail/' . $id_project, 'refresh');
    }

    public function getFaseByID()
    {
        echo json_encode($this->m_guru->getFaseByID($this->input->post('id_fase'))->row());
    }

    public function beriNilaiFase()
    {
        $id_fase = $this->input->post('id_fase');
        $id_jawaban = $this->input->post('id');
        $data = array('nilai' => $this->input->post('nilai'), 'komentar' => $this->input->post('komentar'));
        $this->m_guru->beriNilaiFase($id_jawaban, $data);
        redirect('guru/jawabanfase/' . $id_fase);
    }

    public function jawabanfase($id)
    {
        $data['listjawaban'] = $this->m_guru->jawabanfase($id)->result();
        $data['id_project'] = $this->m_guru->getFaseByID($id)->row()->id_project;
        $title['title'] = "Jawaban Fase: " . $this->m_guru->getFaseByID($id)->row()->nama_fase;
    
        $this->load->view('v_header', $title);
        $this->load->view('v_nav');
        $this->load->view('guru/v_jawabanfase', $data);
        $this->load->view('v_footer');
    }


    public function pertanyaan($id_project)
    {
        $this->load->model('m_siswa');
        $data['id_fase'] = $this->m_siswa->getFasePertanyaan($id_project)->row()->id;
        $title['title'] = "Pertanyaan";
        $this->load->view('v_header', $title);
        $this->load->view('v_nav');
        $data['pertanyaan'] = $this->m_guru->listpertanyaan($id_project)->result();
        $data['kelompok'] = $this->m_guru->showKelompok($id_project)->result();
        $this->load->view('guru/v_pertanyaan', $data);
        $this->load->view('v_footer');
    }

    public function buatpertanyaan()
    {
        $id_project = $this->input->post('id_project');
        $data =  $this->input->post('pertanyaan');
        $pertanyaan = array();
        foreach ($data as $key => $val) {
            array_push($pertanyaan, array('id_project' => $id_project, 'pertanyaan' => $val));
        }

        
        $config['upload_path'] = './assets/fase/';
        $config['allowed_types'] = 'zip|rar|pdf|doc|ppt|pptx|odt|docx|jpg|jpeg|png|gif';
        
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('lampiran')) {
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            $datafile = "";
        } else {
            $file = array('upload_data' => $this->upload->data());
            $datafile = $file['upload_data']['file_name'];
        }
        

        $fase = [   'id_project'=>$id_project,
                    'nama_fase'=>"Pertanyaan Mendasar",
                    'deskripsi'=>$this->input->post('deskripsi'),
                    'lampiran'=>$datafile,
                    'urutan_fase'=>1,
                    'thumb'=>'pertanyaan.jpg'];
        
        $this->m_guru->buatpertanyaan($pertanyaan, $id_project, $fase);
        redirect('guru/pertanyaan/' . $id_project);
    }


    public function getPertanyaan()
    {
        $id = $this->input->post('id');
        echo json_encode($this->m_guru->getpertanyaan($id)->result());
    }


    public function editPertanyaan()
    {
        $id_project = $this->input->post('id_project');
        $id = $this->input->post('id');
        $data = array(
            'pertanyaan' => htmlspecialchars($this->input->post('pertanyaan'))

        );
        $this->m_guru->editPertanyaan($id, $data);
        redirect('guru/pertanyaan/' . $id_project);
    }

    public function deletePertanyaan()
    {
        $id = $this->input->post('id');
        $id_project = $this->input->post('id_project');
        $this->m_guru->deletePertanyaan($id);
        redirect('guru/pertanyaan/' . $id_project);
    }

    public function getJawabanPertanyaan()
    {
        $id_project = $this->input->post('id_project');
        $id_kelompok = $this->input->post('id_kelompok');

        echo json_encode($this->m_guru->getJawabanPertanyaan($id_project, $id_kelompok)->result());
    }
    public function setJawabanPertanyaan()
    {
        $id = $this->input->post('id');
        $id_project = $this->input->post('id_project');
        $this->m_guru->setJawabanPertanyaan($id, array('set_jawaban' => $this->input->post('set_jawaban')));
        redirect('guru/pertanyaan/' . $id_project);
    }

    public function profil()
    {
        $id = $this->session->userdata('id');

        $data['guru'] = $this->m_guru->profil($id)->row_array();
        $title['title'] = "Profil";

        $this->load->view('v_header', $title);
        $this->load->view('v_nav');
        $this->load->view('guru/v_profilguru', $data);
        $this->load->view('v_footer');
    }

    public function editprofil()
    {
        $id = $this->input->post('id');
        //print_r($id);die();
        
        $data = array(
            'nama' => htmlspecialchars($this->input->post('nama')),
            'email' => htmlspecialchars($this->input->post('email')),
            
            'password' => $this->input->post('password')
        );

        $this->m_guru->editprofil($id, $data);

        redirect('guru/profil/' . $id);
    }

    


}
    
    /* End of file Guru.php */

    