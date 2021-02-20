<?php  
define('AKTIF',1);
define('NONAKTIF',0);
define('ADMIN',1);
define('GURU',2);
define('SISWA',3);
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
   
    
    public function index()
    {
        switch ($this->session->userdata('role'))
        {
            case GURU:
                redirect('guru');
                break;
            
            case SISWA:
                redirect('siswa');
                break;
            case ADMIN:
                redirect('admin');
                break;
        }
        $title['title'] = "Selamat Datang";
        $this->load->view('v_header',$title);
        $this->load->view('v_welcome');
        $this->load->view('v_footer');
        
    }

    public function login()
    {

        $title['title'] = "Login";
        $this->load->view('v_header',$title);
        $this->load->view('v_login');
        $this->load->view('v_footer');
        
    }
    
    
    public function is_logged()
    {
        $this->load->model('m_login');        
        
        $username=strip_tags($this->input->post('username'));
        $password=strip_tags($this->input->post('password'));
        
        $akun = $this->m_login->cek_user($username,$password)->row_array();
        $kelompok = $this->m_login->cek_kelompok($username,$password)->row_array();
        
        if($akun!=null){
            //print_r($akun);
            if($akun['aktivasi'] == null){
                $this->session->set_flashdata('pesan', 'Akun belum diaktivasi, silakan hubungi administrator');
                redirect('auth/login');
            }else{
                $user = array(
                    'id' => $akun['id'],
                    'username' => $akun['username'],
                    'nama' => $akun['nama'],
                    'role' => $akun['role'],
                );
                $this->session->set_userdata( $user );
                switch ($akun['role']) {
                    case ADMIN:
                        redirect('admin');
                        break;
                        case GURU:
                            redirect('guru');
                        break;                  
                        
                    }
                }
        }elseif($kelompok!=null){
                
                $user = array(
                    'id_kelompok' => $kelompok['id'],
                    'nama_kelompok' => $kelompok['nama_kelompok'],
                    'id_project' => $kelompok['id_project'],
                    'role' => SISWA,
                );
                $this->session->set_userdata( $user );
                redirect('siswa');
                
        }else{
                $this->session->set_flashdata('pesan', 'Salah password/Username tidak terdaftar');
                redirect('auth/login');
                //print_r($this->session->flashdata('pesan'));
                
        }
            
            
            // print_r($this->session->userdata('role'));
            
        
        }
        
        public function forbidden()
        {
            
            $title['title'] = "Register";
            $this->load->view('v_header',$title);
            $this->load->view('forbidden');
            $this->load->view('v_footer');
        }
        public function logout()
        {
            $this->session->sess_destroy();
            redirect('/','refresh');
        }
        
    }
    
    /* End of file Auth.php */

?>
