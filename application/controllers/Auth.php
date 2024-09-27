<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('login_view');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->user_model->get_user($username);

            if ($user) {
                // Mengecek kesamaan password secara langsung
                if ($password === $user['password']) {
                    $user_data = array(
                        'user_id' => $user['id'],
                        'username' => $user['username'],
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($user_data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Password salah');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Username tidak ditemukan');
                redirect('auth');
            }
        }
    }

    public function logout()
    {

        $this->session->sess_destroy();


        redirect('auth'); // Ganti 'auth' dengan controller/login sesuai kebutuhan
    }
}
