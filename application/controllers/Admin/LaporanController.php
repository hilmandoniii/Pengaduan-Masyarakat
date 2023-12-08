<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		if ($this->session->userdata('level') != 'admin') :
			redirect('Auth/BlockedController');
		endif;
		$this->load->model('Pengaduan_m');
	}

	public function index()
	{
		$data['judul'] = 'Cetak Pengaduan';

		$data['pengaduan'] = $this->db->get('aduan')->num_rows();
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_tanggapan()->result_array();
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		$this->load->view('_part/admin_head',$data);
		$this->load->view('_part/admin_navbar',$data);
		$this->load->view('_part/admin_sidebar',$data);
		$this->load->view('admin/generate_laporan',$data);
		$this->load->view('_part/admin_footer');
	}

}