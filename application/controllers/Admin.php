<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('m_admin');
        if($this->session->userdata('username')==NULL){
            redirect('auth/login');
        }elseif($this->session->userdata('role')!=1){
            echo "bukan hak kamu";
            redirect('auth/forbidden');
        }
    }
    
    public function index()
    {        
        redirect('admin/daftarakun');
        
    }
    public function daftarAkun()
    {
        $title['title'] = "Admin";
        $data['akun'] = $this->m_admin->ambilDataAkun()->result();
        $this->load->view('v_header',$title);
        $this->load->view('v_nav');
        
        $this->load->view('v_daftarakun',$data);
        $this->load->view('v_footer');
    }

    public function ambilDataAkunId()
    {
        $id = $this->input->post('id');
        $data = $this->m_admin->ambilDataAkunId($id)->result();
        echo json_encode($data);
        
    }

    public function updateDataAkun()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'), 
            'username' => $this->input->post('username'), 
            'password' => $this->input->post('password'), 
            'role' => $this->input->post('role'), 
            'aktivasi' => $this->input->post('aktivasi'), 
        );
        
        //echo json_encode($data);
        $this->m_admin->updateData($id,$data);
        redirect('admin/daftarakun','refresh');

        
    }

    public function deleteAkun()
    {
        $id = $this->input->post('id');
        $this->m_admin->deleteAkun($id);
        redirect('admin/daftarakun');
        // echo $this->db->last_query();
        // die();
        
    }

    public function test()
    {
        

        
        $this->load->view('v_header');
        $this->load->view('test');
        $this->load->view('v_footer');
        
        
    }


}

/* End of file Admin.php */


?>