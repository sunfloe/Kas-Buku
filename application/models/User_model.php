<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model
{

    function tampil()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

    function tampil_by_id($id)
    {
        $query = $this->db->get_where('user', array('id_user' => $id));
        return $query->row();
    }
    function simpan_data()
    {
       $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'nama' => $this->input->post('nama'),
            'level' => $this->input->post('level')
       );
       $this->db->insert('user',$data);
    }

    function update_data_user()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'level' => $this->input->post('level')
    );
        $where = array(
        'id_user'=>$this->input->post('id')
    );
    $this->db->update('user', $data, $where);
    }

    function delete_data_user($id)
    {
        $where = array('id_user' => $id);
        $this->db->delete('user', $where);
    }
}