<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $this->load->model('user_model');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $data['user'] = $this->user_model->get_user_by_id($this->session->userdata('user_id'));
        $this->load->view('dashboard_view', $data);
    }


    public function edit_profile()
    {
        $data['user'] = $this->user_model->get_user_by_id($this->session->userdata('user_id'));

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('dashboard/edit_profile', $data);
        } else {
            $update_data = [
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address')
            ];
            $this->user_model->update_user($this->session->userdata('user_id'), $update_data);

            $this->session->set_flashdata('success', 'Profile updated successfully!');
            redirect('dashboard');
        }
    }

    public function change_password()
    {
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('dashboard/change_password');
        } else {
            $user = $this->user_model->get_user_by_id($this->session->userdata('user_id'));

            // Periksa password, Anda mungkin perlu menggunakan hashing
            if ($this->input->post('current_password') !== $user['password']) {
                $this->session->set_flashdata('error', 'Current password is incorrect!');
                redirect('dashboard/change_password');
            } else {
                $new_password = $this->input->post('new_password');
                $this->user_model->update_user($this->session->userdata('user_id'), ['password' => $new_password]);

                $this->session->set_flashdata('success', 'Password changed successfully!');
                redirect('dashboard');
            }
        }
    }
}
