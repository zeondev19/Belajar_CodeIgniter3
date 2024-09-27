<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function get_user($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row_array();
    }

    public function get_user_by_id($user_id)
    {
        $query = $this->db->get_where('users', array('id' => $user_id));
        return $query->row_array();
    }

    public function update_user($user_id, $data)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }
    public function update_password($user_id, $new_password)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('users', array('password' => $new_password));
    }
}
