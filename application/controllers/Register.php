 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Register extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('m_register'); //call model
        }

        public function index()
        {
            $title['title'] = "Register";
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[akun.username]', ['trim' => 'Jangan ada spasi']);
            $this->form_validation->set_rules('nama', 'NAMA', 'required');
            $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email|is_unique[akun.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('password_conf', 'Password', 'required|matches[password]');

            if (!$this->form_validation->run() == false) {


                $data['username'] =    $this->input->post('username');
                $data['nama']  =    $this->input->post('nama');
                $data['email']  =    $this->input->post('email');
                $data['password'] =   $this->input->post('password');
                $data['role']  =    2;

                $this->m_register->daftar($data);

                $this->session->set_flashdata('registered', "Pendaftaran berhasil, silakan hubungi admin untuk aktivasi");

                redirect('auth/login');
            } else {

                $this->load->view('v_header', $title);
                $this->load->view('v_register');
                $this->load->view('v_footer');
            }
        }
    }
    ?>