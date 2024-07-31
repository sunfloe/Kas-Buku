<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
		if($this->session->userdata('level')!='Admin'){
			redirect('beranda');
		}
    }

	public function index()
	{
		$this->db->select('*')->from('user');
		$this->db->order_by('nama','ASC');
		$user = $this->db->get()->result_array();
		$data = array('user' => $user);
		$this->load->view('user_index',$data);
	}
    public function tambah()
	{
		
		$this->load->view('user_tambah');
	}

	function edit($id)
	{
		$this->db->select('*')->from('user');
		$this->db->where('id_user',$id);
		$user = $this->db->get()->result_array();
		$data = array('user' => $user);
		$this->load->view('user_edit',$data);
	}
	function simpan()
	{
		$username = $this->input->post('username');
		$this->db->from('user');
		$this->db->where('username',$username);
		$cek = $this->db->get()->result_array();
		if($cek <> NULL){
				$this->session->set_flashdata('alert','
				<div class="alert alert-danger alert-dismissible" role="alert">
					username sudah digunakan
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				');
				redirect('user');
		}
		$this->user_model->simpan_data();
		$this->session->set_flashdata('alert','
			<div class="alert alert-primary alert-dismissible" role="alert">
				berhasil disimpan
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		');
		redirect('user');
		
	}

	public function update_data()
	{
		$this->user_model->update_data_user();
		$this->session->set_flashdata('alert','
			<div class="alert alert-primary alert-dismissible" role="alert">
				berhasil diupdate
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		');
		redirect('user');
	}

	function delete_data($id)
	{
		$where = array('id_user' => $id);
        $this->db->delete('user', $where);
		$this->session->set_flashdata('alert','
			<div class="alert alert-primary alert-dismissible" role="alert">
				berhasil dihapus
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		');
		redirect('user');
		return redirect('user');
	}
}
