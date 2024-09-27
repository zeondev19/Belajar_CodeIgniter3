<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function edit()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->user_model->get_user_by_id($user_id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('edit_profile', $data);
        } else {
            $update_data = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address')
            );

            if ($this->user_model->update_profile($user_id, $update_data)) {
                $this->session->set_flashdata('success', 'Profile updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile');
            }
            redirect('profile/edit');
        }
    }

    public function change_password()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->user_model->get_user_by_id($user_id);

        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('change_password', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            if ($current_password === $data['user']['password']) {
                if ($this->user_model->update_password($user_id, $new_password)) {
                    $this->session->set_flashdata('success', 'Password changed successfully');
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Failed to change password');
                    redirect('profile/change_password');
                }
            } else {
                $this->session->set_flashdata('error', 'Current password is incorrect');
                redirect('profile/change_password');
            }
        }
    }
}
