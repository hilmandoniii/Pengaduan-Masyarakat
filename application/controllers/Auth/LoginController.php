<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Petugas_m');

	}

	// List all your items
	public function index()
	{
		

		$this->form_validation->set_rules('username', 'Username',
        'required|trim', [
        'required' => 'Username Harus diisi'
        ]);

        $this->form_validation->set_rules('password', 'Password',
        'required|trim', [
        'required' => 'Password Harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            //kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
            $this->load->view('login',$data);            
        } else {
            $this->cek_login();
        }
	}

	private function cek_login()
	{
		// cek akun di table masyarakat dan petugas berdasarkan username
		$username = htmlspecialchars($this->input->post('username',TRUE));
		$password = htmlspecialchars($this->input->post('password',TRUE));
		$petugas = $this->db->get_where('petugas',['username' => $username])->row_array();

		if ($petugas == TRUE) :
			// jika akun petugas == TRUE
			// cek password

			if (password_verify($password, $petugas['password'])) :
				// jika password benar
				// maka buat session userdata
				$session = [
					'username' 		=> $petugas['username'],
					'level'			=> $petugas['level'],
				];

				$this->session->set_userdata($session);

				$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
					Login berhasil!
					</div>');

				// cek level petugas
				if ($petugas['level'] == 'admin') :
					return redirect('User/ProfileController');

				elseif ($petugas['level'] == 'petugas') :
					return redirect('User/ProfileController');

				else :
					// jika level tidak ada maka Logout
					// supaya session di hancurkan
					return redirect('Auth/LogoutController');
				endif;

			else :
				// jika password salah
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Username atau Password salah!
					</div>');

				return redirect('Auth/LoginController');
			endif;

		else :
		// tidak ada akun yang di temukan
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				Username atau Password salah! petugas
				</div>');
		return redirect('Auth/LoginController');

		endif;
	}

	public function registrasi()
	{
		//membuat rule untuk inputan nama agar tidak boleh kosong dengan membuat pesan error dengan
        //bahasa sendiri yaitu 'Nama Belum diisi'
        $this->form_validation->set_rules('nama_petugas', 'Nama Lengkap','required', [
            'required' => 'Nama Petugas Belum diis!!'
        ]);

        $this->form_validation->set_rules('username', 'Username',
        'required|trim|is_unique[petugas.username]', [
            'required' => 'Username Belum diisi!!',
            'is_unique' => 'Username Sudah Terdaftar!'
        ]);

        $this->form_validation->set_rules('password1', 'Password',
            'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!!',
            'min_length' => 'Password Terlalu Pendek'
        ]);

        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi Member';
            $this->load->view('registrasi', $data);
        } else {
            $username = $this->input->post('username', true);
            $data = [
                'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
                'username' => htmlspecialchars($username),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'foto_profile'	=> 'user.png',
                'level' => 'admin'
            ];

            $this->Petugas_m->create($data); 

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!!
            akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('Auth/LoginController');
            }
	}


}