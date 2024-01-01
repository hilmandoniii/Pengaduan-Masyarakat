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

	// List all your itemss
	public function index()
	{
		$data['judul'] = 'Dashboard';

		$data['pengaduan'] = $this->db->get('aduan')->num_rows();
		$data['pengaduan_masuk'] = $this->db->get_where('aduan', ['status' => '0'])->num_rows();
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


	public function pengaduan_hapus($id)
	{
		$cek_data = $this->db->get_where('aduan', ['id_pengaduan' => htmlspecialchars($id)])->row_array();

		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		if (!empty($cek_data)) :

				$resp = $this->db->delete('aduan', ['id_pengaduan' => $id]);

				// Hapus File
				$path = './assets/uploads/' . $cek_data['foto'];
				unlink($path);

				if ($resp) :
					$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
						Hapus pengaduan berhasil
						</div>');

					redirect('Admin/DashboardController');
				else :
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Hapus pengaduan gagal!
						</div>');

					redirect('Admin/DashboardController');
				endif;


		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/DashboardController');
		endif;
	}

	//ass
	public function hapus_data($id)
	{

		$cek_data = $this->db->get_where('aduan', ['id_pengaduan' => htmlspecialchars($id)])->row_array();

		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		if (!empty($cek_data)) :

			$data['judul'] = 'Detail Pengaduan';

			$data['data_pengaduan'] = $this->Pengaduan_m->data_detail_pengaduan_tanggapan(htmlspecialchars($id))->row_array();

			$resp = $this->db->delete('aduan', ['id_pengaduan' => $id]);

				// Hapus File
				$path = './assets/uploads/' . $cek_data['foto'];
				unlink($path);

				if ($resp) :
					$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
						Hapus pengaduan berhasil
						</div>');

					redirect('Admin/DashboardController');
				else :
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Hapus pengaduan gagal!
						</div>');

					redirect('Admin/DashboardController');
				endif;

			
		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/TanggapanController');
		endif;
	}

	public function hapus_data_data($id)
	{

		$cek_data = $this->db->get_where('aduan', ['id_pengaduan' => htmlspecialchars($id)])->row_array();

		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		if (!empty($cek_data)) :

			$data['judul'] = 'Detail Pengaduan';

			$data['data_pengaduan'] = $this->Pengaduan_m->data_detail_pengaduan_tanggapan(htmlspecialchars($id))->row_array();

			$resp = $this->db->delete('tanggapan', ['id_tanggapan' => $id]);

				// Hapus File
				$path = './assets/uploads/' . $cek_data['foto'];
				unlink($path);

				if ($resp) :
					$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
						Hapus pengaduan berhasil
						</div>');

					redirect('Admin/DashboardController');
				else :
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Hapus pengaduan gagal!
						</div>');

					redirect('Admin/DashboardController');
				endif;

			
		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/TanggapanController');
		endif;
	}



}