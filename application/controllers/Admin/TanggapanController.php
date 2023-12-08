<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TanggapanController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		if (!$this->session->userdata('level')) :
			redirect('Auth/BlockedController');
		endif;
		$this->load->model('Tanggapan_m');
		$this->load->model('Pengaduan_m');
		$this->load->model('Petugas_m');
	}

	// List all your itemss
	public function index()
	{
		$data['judul'] = 'Semua Pengaduan';
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_semua()->result_array();
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		$this->load->view('_part/admin_head',$data);
		$this->load->view('_part/admin_navbar',$data);
		$this->load->view('_part/admin_sidebar',$data);
		$this->load->view('admin/pengaduan',$data);
		$this->load->view('_part/admin_footer');
	}

	// Fungsi Tanggapan Ditolak
	public function tanggapan_tolak()
	{
		$data['judul'] = 'Pengaduan Ditolak';
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_tolak()->result_array();
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		$this->load->view('_part/admin_head',$data);
		$this->load->view('_part/admin_navbar',$data);
		$this->load->view('_part/admin_sidebar',$data);
		$this->load->view('admin/pengaduan_tolak',$data);
		$this->load->view('_part/admin_footer');
	}

	// Fungsi Tanggapan Ditolak
	public function tanggapan_selesai()
	{
		$data['judul'] = 'Pengaduan Selesai';
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_selesai()->result_array();
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		$this->load->view('_part/admin_head',$data);
		$this->load->view('_part/admin_navbar',$data);
		$this->load->view('_part/admin_sidebar',$data);
		$this->load->view('admin/pengaduan_selesai',$data);
		$this->load->view('_part/admin_footer');
	}

	public function tanggapan_proses()
	{
		$data['judul'] = 'Pengaduan Proses';
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_proses()->result_array();
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		$this->load->view('_part/admin_head',$data);
		$this->load->view('_part/admin_navbar',$data);
		$this->load->view('_part/admin_sidebar',$data);
		$this->load->view('admin/pengaduan_proses',$data);
		$this->load->view('_part/admin_footer');
	}


	public function tanggapan_detail()
	{
		$id = htmlspecialchars($this->input->post('id', true)); // id pengaduan

		$cek_data = $this->db->get_where('aduan', ['id_pengaduan' => $id])->row_array();

		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		if (!empty($cek_data)) :

			$data['judul'] = 'Beri Tanggapan';
			$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_masyarakat_id(htmlspecialchars($id))->row_array();

			$this->load->view('_part/admin_head',$data);
			$this->load->view('_part/admin_navbar',$data);
			$this->load->view('_part/admin_sidebar',$data);
			$this->load->view('admin/tanggapan',$data);
			$this->load->view('_part/admin_footer');

		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/TanggapanController');
		endif;
	}

	//s
	public function tambah_tanggapan()
	{
		$id_pengaduan = htmlspecialchars($this->input->post('id', true));
		$cek_data = $this->db->get_where('aduan', ['id_pengaduan' => $id_pengaduan])->row_array();
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		if (!empty($cek_data)) :

			$this->form_validation->set_rules('id', 'id', 'trim|required');
			$this->form_validation->set_rules('status', 'Status Pengaduan', 'trim|required');
			$this->form_validation->set_rules('tanggapan', 'Tanggapan', 'trim|required');

			if ($this->form_validation->run() == FALSE) :

				$data['judul'] = 'Beri Tanggapan';
				$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_masyarakat_id(htmlspecialchars($id_pengaduan))->row_array();

				$this->load->view('_part/admin_head',$data);
				$this->load->view('_part/admin_navbar',$data);
				$this->load->view('_part/admin_sidebar',$data);
				$this->load->view('admin/tanggapan',$data);
				$this->load->view('_part/admin_footer');

			else :

				$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

				$params = [
					'id_pengaduan'		=> $id_pengaduan,
					'tgl_tanggapan'		=> date('Y-m-d'),
					'tanggapan'			=> htmlspecialchars($this->input->post('tanggapan', true)),
					'id_petugas'		=> $petugas['id_petugas'],
				];

				$menanggapi = $this->db->insert('tanggapan', $params);

				if ($menanggapi) :

					$params = [
						'status' => $this->input->post('status', true),
					];

					$update_status_pengaduan = $this->db->update('aduan', $params, ['id_pengaduan' =>  $id_pengaduan]);

					if ($update_status_pengaduan) :

						$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
							Menanggapi berhasil
							</div>');

						redirect('Admin/TanggapanController');

					else :
						$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
							Gagal Update Pengaduan
							</div>');

						redirect('Admin/TanggapanController');
					endif;


				else :
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Menanggapi gagal!
						</div>');

					redirect('Admin/TanggapanController');
				endif;

			endif;



		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/TanggapanController');
		endif;
	}

	
	// Fungsi Tanggapan Pengaduan Selesai
	public function tanggapan_pengaduan_selesai()
	{
		$id_pengaduan = htmlspecialchars($this->input->post('id', true));
		$cek_data = $this->db->get_where('aduan', ['id_pengaduan' => $id_pengaduan])->row_array();
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		if (!empty($cek_data)) :

			$this->form_validation->set_rules('id', 'id', 'trim|required');

			if ($this->form_validation->run() == FALSE) :

				$data['judul'] = 'Pengaduan Proses';
				$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_proses()->result_array();

				$this->load->view('_part/admin_head',$data);
				$this->load->view('_part/admin_navbar',$data);
				$this->load->view('_part/admin_sidebar',$data);
				$this->load->view('admin/pengaduan_proses',$data);
				$this->load->view('_part/admin_footer');

			else :

				$params = [
					'status' => 'selesai',
				];

				$update_status_pengaduan = $this->db->update('aduan', $params, ['id_pengaduan' =>  $id_pengaduan]);

				if ($update_status_pengaduan) :

					$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
						Pengaduan berhasil diselesaikan!
						</div>');

					redirect('Admin/TanggapanController/tanggapan_proses');

				else :
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Pengaduan berhasil diselesaikan!
						</div>');

					redirect('Admin/TanggapanController/tanggapan_proses');
				endif;

			endif;
		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/TanggapanController/tanggapan_proses');
		endif;
	}

}