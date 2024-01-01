<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
	}

	// List all your itemss
	public function index()
	{
		$data['judul'] = 'Profile';

		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		$this->load->view('_part/admin_head',$data);
		$this->load->view('_part/admin_navbar',$data);
		$this->load->view('_part/admin_sidebar',$data);
		$this->load->view('admin/profile');
		$this->load->view('_part/admin_footer');
	}


	public function editProfil($id)
	{
		$id_petugas = htmlspecialchars($id);

		$cek_data = $this->db->get_where('petugas', ['id_petugas' => $id_petugas])->row_array();

		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		if ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		if (!empty($cek_data)) :

			$data['judul'] = 'Edit Profile';
			$data['petugas'] = $cek_data;

			$this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha_numeric_spaces', [
            'required' => 'Nama Belum diisi!!'
        	]);

        	$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric_spaces', [
            'required' => 'Nama Belum diisi!!'
        	]);

			$this->form_validation->set_rules('no_telp', 'No Telepon','required|numeric|min_length[10]|max_length[13]', [
            'required' => 'No Telepon Belum diisi!!',
            'numeric' => 'No Telepon Harus Angka',
            'min_length' => 'No Telepon Min 10 angka',
            'max_length' => 'No Telepon Max 13 angka'
        	]);
			$this->form_validation->set_rules('foto_profile', 'Foto Profile', 'trim');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('_part/admin_head',$data);
				$this->load->view('_part/admin_navbar',$data);
				$this->load->view('_part/admin_sidebar',$data);
				$this->load->view('admin/edit_profile');
				$this->load->view('_part/admin_footer');
			else :
				// Parameter Nama Foto
				$upload_foto = $this->upload_foto('foto_profile');

				if ($upload_foto == FALSE) :
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Upload foto Profile gagal, hanya png,jpg dan jpeg yang dapat di upload!
						</div>');

					redirect('User/ProfileController');
				else :

					// Path dan Params Delete File
					$path = './assets/uploads/' . $cek_data['foto_profile'];
					unlink($path);

					$params = [
						'nama_petugas'			=> htmlspecialchars($this->input->post('nama', TRUE)),
						'username'			=> htmlspecialchars($this->input->post('username', TRUE)),
						'telp'					=> htmlspecialchars($this->input->post('no_telp', TRUE)),
						'foto_profile'			=> $upload_foto,
					];

					$resp = $this->db->update('petugas', $params, ['id_petugas' => $id_petugas]);

					if ($resp) :
						$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
					Akun berhasil di edit
					</div>');

						redirect('User/ProfileController');
					else :
						$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Akun gagal di edit!
					</div>');

						redirect('User/ProfileController');
					endif;

				endif;

			endif;

		else :
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
				Data tidak ada
				</div>');

			redirect('User/ProfileController');
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

		$this->upload->initialize($config);
		if (!$this->upload->do_upload($foto)) :
			return FALSE;
		else :
			return $this->upload->data('file_name');
		endif;
	}

}