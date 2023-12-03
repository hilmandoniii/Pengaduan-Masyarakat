<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		$this->load->model('Pengaduan_m');
	}

	// List all your items
	public function index()
	{
		$data['judul'] = 'Dashboard';

		$data['pengaduan'] = $this->db->get('aduan')->num_rows();
		$data['pengaduan_proses'] = $this->db->get_where('aduan', ['status' => 'proses'])->num_rows();
		$data['pengaduan_tolak'] = $this->db->get_where('aduan', ['status' => 'tolak'])->num_rows();
		$data['pengaduan_selesai'] = $this->db->get_where('aduan', ['status' => 'selesai'])->num_rows();
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan()->result_array();
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		$this->load->view('_part/admin_head',$data);
		$this->load->view('_part/admin_navbar',$data);
		$this->load->view('_part/admin_sidebar',$data);
		$this->load->view('admin/dashboard',$data);
		$this->load->view('_part/admin_footer');
	}



}