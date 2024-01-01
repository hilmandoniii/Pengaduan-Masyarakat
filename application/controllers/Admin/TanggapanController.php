<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TanggapanController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependenciess
		is_logged_in();
		if (!$this->session->userdata('level')) :
			redirect('Auth/BlockedController');
		endif;
		$this->load->model('Tanggapan_m');
		$this->load->model('Pengaduan_m');
		$this->load->model('Petugas_m');
	}

	// List all your itemsss
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

	public function tanggapanEdit($id_tanggapan)
	{
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

	    $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'trim|required', [
            'required' => 'Tanggapan tidak boleh kosong!!'
        ]);


	    if ($this->form_validation->run() == FALSE) :
	        // Validasi gagal, kembalikan ke halaman update dengan pesan error
	        $data['judul'] = 'Update Tanggapan';
	        $data['tanggapan'] = $this->db->get_where('tanggapan', ['id_tanggapan' => $id_tanggapan])->row_array();

	       	$this->load->view('_part/admin_head',$data);
			$this->load->view('_part/admin_navbar',$data);
			$this->load->view('_part/admin_sidebar',$data);
			$this->load->view('admin/edit_tanggapan',$data);
			$this->load->view('_part/admin_footer');
	    else :
				// Validasi berhasil, lakukan proses update tanggapan
			        $tanggapan_data = [
			        	'tgl_tanggapan'		=> date('Y-m-d'),
			            'tanggapan'			=> htmlspecialchars($this->input->post('tanggapan', true)),
			        ];

			        $update_result = $this->db->update('tanggapan', $tanggapan_data, ['id_tanggapan' => $id_tanggapan]);

				if ($update_result) :
					$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">Update Tanggapan berhasil</div>');
			        redirect('Admin/TanggapanController/proses');
				else :
					 // Update gagal, redirect dengan pesan error
			         $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Gagal Update Tanggapan</div>');
			         redirect('Admin/TanggapanController/tanggapanEdit');
				endif;

			
		endif;

	    	
	}

	

	//sss
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
					'image'				=> '',
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

					redirect('Admin/TanggapanController/tanggapan_selesai');

				else :
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Pengaduan berhasil diselesaikan!
						</div>');

					redirect('Admin/TanggapanController/tanggapan_selesai');
				endif;

			endif;
		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/TanggapanController/tanggapan_proses');
		endif;
	}


	public function detail_tanggapan($id)
	{

		$cek_data = $this->db->get_where('aduan', ['id_pengaduan' => htmlspecialchars($id)])->row_array();

		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		if (!empty($cek_data)) :

			$data['judul'] = 'Detail Pengaduan';

			$data['data_pengaduan'] = $this->Pengaduan_m->data_detail_pengaduan_tanggapan(htmlspecialchars($id))->row_array();
			if ($data['data_pengaduan']) :
				$this->load->view('_part/admin_head',$data);
				$this->load->view('_part/admin_navbar',$data);
				$this->load->view('_part/admin_sidebar',$data);
				$this->load->view('admin/detail_pengaduan',$data);
				$this->load->view('_part/admin_footer');
			else :
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Data tidak ada
					</div>');

				redirect('Admin/TanggapanController');
			endif;

		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Admin/TanggapanController');
		endif;
	}

	public function proses()
	{
		$data['judul'] = 'Pengaduan Proses';
		$data['data_pengaduan'] = $this->Tanggapan_m->proses_tanggapans()->result_array();

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

	public function edit($id_tanggapan)
	{
		$data['judul'] = 'Update Tanggapan';
	    $data['tanggapan'] = $this->db->get_where('tanggapan', ['id_tanggapan' => $id_tanggapan])->row_array();
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
		

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

	    $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'trim|required', [
            'required' => 'Tanggapan tidak boleh kosong!!'
        ]);

	   $this->form_validation->set_rules('image', 'Image Tanggapan', 'trim');
	    if ($this->form_validation->run() == FALSE) :
	        // Validasi gagal, kembalikan ke halaman update dengan pesan errorss

	       	$this->load->view('_part/admin_head',$data);
			$this->load->view('_part/admin_navbar',$data);
			$this->load->view('_part/admin_sidebar',$data);
			$this->load->view('admin/edit_tanggapan',$data);
			$this->load->view('_part/admin_footer');
	    else :

	    	// Parameter Nama Foto
			$upload_foto = $this->upload_foto('image');

			if ($upload_foto == FALSE) :
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Upload foto Profile gagal, hanya png,jpg dan jpeg yang dapat di upload!</div>');

				redirect('Admin/TanggapanController/edit');
			else :

				// Path dan Params Delete File
				$path = './assets/uploads/' . $data['tanggapan']['image'];
				unlink($path);

				// Validasi berhasil, lakukan proses update tanggapan
				$tanggapan_data = [
					'tgl_tanggapan'     => empty($data['tanggapan']['tgl_tanggapan']) ? date('Y-m-d') : $data['tanggapan']['tgl_tanggapan'],
					'tanggapan'			=> htmlspecialchars($this->input->post('tanggapan', true)),
					'image' 			=> $upload_foto
					
				];

				$update_tanggapan = $this->db->update('tanggapan', $tanggapan_data, ['id_tanggapan' => $id_tanggapan]);

				if ($update_tanggapan) :
					$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">Update Tanggapan berhasil</div>');
					redirect('Admin/TanggapanController/proses');
				else :
							 // Update gagal, redirect dengan pesan error
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Gagal Update Tanggapan</div>');
					redirect('Admin/TanggapanController/edit');

				endif;

			endif;


		endif;

	    	
	}

	// Fungsi Upload Foto
	private function upload_foto($foto)
	{
		$config['upload_path']          = './assets/uploads/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 3000;
		$config['remove_spaces']        = TRUE;
		$config['detect_mime']        	= TRUE;
		$config['mod_mime_fix']        	= TRUE;
		$config['encrypt_name']        	= TRUE;
		$config['max_width'] = '1024';
		$config['max_height'] = '1000';

		$this->upload->initialize($config);
		if (!$this->upload->do_upload($foto)) :
			return FALSE;
		else :
			return $this->upload->data('file_name');
		endif;
	}

	

	

}