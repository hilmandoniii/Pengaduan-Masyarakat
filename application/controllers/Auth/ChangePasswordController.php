<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePasswordController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		
	}

	// List all your items
	// public function index()
	// {
	// 	$data['title'] = 'Profile';

	// 	$this->load->view('_part/admin_head',$data);
	// 	$this->load->view('_part/admin_navbar',$data);
	// 	$this->load->view('_part/admin_sidebar',$data);
	// 	$this->load->view('admin/ganti_password');
	// 	$this->load->view('_part/admin_footer');
	// }

	public function index()
	{
		$data['judul'] = 'Ubah Password';

		$this->form_validation->set_rules('current_password', 'Password Sekarang', 'trim|required');
		$this->form_validation->set_rules('new_password', 'Password Baru', 'trim|required|min_length[6]|max_length[15]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password Baru', 'trim|required|min_length[6]|max_length[15]|matches[new_password]');

		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		
		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		if ($this->form_validation->run() == FALSE) :
			$this->load->view('_part/admin_head',$data);
			$this->load->view('_part/admin_navbar',$data);
			$this->load->view('_part/admin_sidebar',$data);
			$this->load->view('admin/ganti_password');
			$this->load->view('_part/admin_footer');
		else :
			$passwordSekarang = htmlspecialchars($this->input->post('current_password', true));
			$passwordBaru = htmlspecialchars($this->input->post('new_password', true));

			$this->change_password($passwordSekarang, $passwordBaru);
		endif;
	}

	public function change_password($passwordSekarang, $passwordBaru)
	{
		// cek akun di table masyarakat dan petugas berdasarkan username
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :

			if (password_verify($passwordSekarang, $petugas['password'])) :

				$params = [
					'password' => password_hash($passwordBaru, PASSWORD_DEFAULT),
				];

				$resp = $this->db->update('petugas', $params, ['id_petugas' => $petugas['id_petugas']]);
				if ($resp) :
					$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
						Ganti password berhasil!
						</div>');

					redirect('Auth/ChangePasswordController');
				else :
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Ganti password gagal!
						</div>');

					redirect('Auth/ChangePasswordController');
				endif;

			else :
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Password salah!
					</div>');

				redirect('Auth/ChangePasswordController');
			endif;

		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				Password salah!
				</div>');

			redirect('Auth/ChangePasswordController');
		endif;

	}

}