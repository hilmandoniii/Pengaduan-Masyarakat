<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PetugasController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();

		$this->load->model('Petugas_m');

		if ($this->session->userdata('level') == 'admin' or $this->session->userdata('level') == 'petugas') :
			return false;
		else :
			redirect('Auth/BlockedController');
		endif;

	}

	public function index()
	{
		$data['judul'] = 'Data Anggota';
		$data['data_petugas'] = $this->db->get('petugas')->result_array();
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric_spaces|callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric_spaces|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('telp', 'No Telepon','required|numeric|min_length[10]|max_length[13]', [
            'required' => 'No Telepon Belum diisi!!',
            'numeric' => 'No Telepon Harus Angka',
            'min_length' => 'No Telepon Min 10 angka',
            'max_length' => 'No Telepon Max 13 angka'
        	]);
		$this->form_validation->set_rules('level', 'Level', 'trim|required');

		if ($this->form_validation->run() == FALSE) :
			$this->load->view('_part/admin_head',$data);
			$this->load->view('_part/admin_navbar',$data);
			$this->load->view('_part/admin_sidebar',$data);
			$this->load->view('admin/anggota',$data);
			$this->load->view('_part/admin_footer');

		else :
			$params = [
				'nama_petugas'			=> htmlspecialchars($this->input->post('nama', TRUE)),
				'username'				=> htmlspecialchars($this->input->post('username', TRUE)),
				'password'				=> password_hash(htmlspecialchars($this->input->post('password', TRUE)), PASSWORD_DEFAULT),
				'telp'					=> htmlspecialchars($this->input->post('telp', TRUE)),
				'level'					=> htmlspecialchars($this->input->post('level', TRUE)),
				'foto_profile'			=> 'user.png'
			];

			$resp = $this->Petugas_m->create($params);

			if ($resp) :
				$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
					Buat akun berhasil
					</div>');

				redirect('Admin/PetugasController');
			else :
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Buat akun berhasil!
					</div>');

				redirect('Admin/PetugasController');
			endif;
		endif;
	}

	public function delete($id)
	{

		$id_petugas = htmlspecialchars($id); // id petugas

		$cek_data = $this->db->get_where('petugas', ['id_petugas' => $id_petugas])->row_array();

		if (!empty($cek_data)) :
			$resp = $this->db->delete('petugas', ['id_petugas' => $id_petugas]);

			if ($resp) :
				$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
				Akun berhasil dihapus
				</div>');

				redirect('Admin/PetugasController');
			else :
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				Akun gagal dihapus!
				</div>');

				redirect('Admin/PetugasController');
			endif;
		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
			Data tidak ada
			</div>');

			redirect('Admin/PetugasController');
		endif;
	}

	// Fungsi Check Username
	public function username_check($str = NULL)
	{
		if (!empty($str)) :

			$petugas = $this->db->get_where('petugas', ['username' => $str])->row_array();

			if ($petugas == true) :

				$this->form_validation->set_message('username_check', 'Username ini sudah terdaftar ada.');

				return false;
			else :
				return true;
			endif;
		else :
			$this->form_validation->set_message('username_check', 'Inputan Kosong');

			return false;
		endif;
	}

	// Fungsi Edit Admin atau Petugas
	public function edit($id)
	{
		// ID Petugas
		$id_petugas = htmlspecialchars($id);

		$cek_data = $this->db->get_where('petugas', ['id_petugas' => $id_petugas])->row_array();

		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;


		if (!empty($cek_data)) :

			$data['judul'] = 'Edit Admin/Petugas';
			$data['petugas'] = $cek_data;

			$this->form_validation->set_rules('level', 'Level', 'trim|required');
			

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('_part/admin_head',$data);
				$this->load->view('_part/admin_navbar',$data);
				$this->load->view('_part/admin_sidebar',$data);
				$this->load->view('admin/edit_anggota',$data);
				$this->load->view('_part/admin_footer');
			else :
					$params = [
						'level'					=> htmlspecialchars($this->input->post('level', TRUE))
					];

					$resp = $this->db->update('petugas', $params, ['id_petugas' => $id_petugas]);

					if ($resp) :
						$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
					Akun petugas berhasil di edit
					</div>');

						redirect('Admin/PetugasController');
					else :
						$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Akun petugas gagal di edit!
					</div>');

						redirect('Admin/PetugasController');
					endif;
			endif;

		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				Data tidak ada
				</div>');

			redirect('Admin/PetugasController');
		endif;
	}


}