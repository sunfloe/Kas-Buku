<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level')== NULL){
			redirect('auth');
		}
	}
	public function index()
	{
		$username = $this->session->userdata('username');
		$level = $this->session->userdata('level');
        $this->db->from('transaksi');
        $this->db->where('jenis_transaksi','Pemasukan');
		if($level == 'User'){	
			$this->db->where('username', $username);
		}
        $this->db->order_by('tanggal','DESC');
        $pemasukan = $this->db->get()->result_array();
        $data = array(
            'pemasukan' => $pemasukan
        );
		$this->load->view('pemasukan_index',array_merge($data));
	}

	public function simpan()
	{
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'nominal'    => $this->input->post('nominal'),
			'tanggal' 	 => $this->input->post('tanggal'),
			'username'   => $this->session->userdata('username'),
			'jenis_transaksi' => 'Pemasukan'
		);
		$this->db->insert('transaksi',$data);
		$this->session->set_flashdata('alert','
			<div class="alert alert-primary alert-dismissible" role="alert">
				input berhasil
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		');
		redirect('pemasukan');
	}

	function delete_data($id)
	{
		$where = array('transaksi_id' => $id);
        $this->db->delete('transaksi', $where);
		$this->session->set_flashdata('alert','
			<div class="alert alert-primary alert-dismissible" role="alert">
				berhasil dihapus
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		');
		redirect('pemasukan');
		return redirect('pemasukan');
	}
}

