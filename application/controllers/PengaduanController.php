<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengaduanController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		
		$this->load->model('Pengaduan_m');
	}

	public function index()
	{
		$data['judul'] = 'Pengaduan';

		$this->form_validation->set_rules('nik', 'Nik', 'numeric|required|exact_length[16]', ['required' => '%s harus diisi', 'numeric' => '%s harus angka', 'exact_length' => '%s Harus 16 karakter']);

		$this->form_validation->set_rules('nama', 'Nama Lengkap','required', [
            'required' => 'Nama Belum diis!!'
        ]);

        $this->form_validation->set_rules('email', 'Alamat Email',
        'required|trim|valid_email', [
            'valid_email' => 'Email Tidak Benar!!',
            'required' => 'Email Belum diisi!!'
        ]);

        $this->form_validation->set_rules('telp', 'No Telepon','required|numeric|min_length[10]|max_length[13]', [
            'required' => 'No Telepon Belum diisi!!',
            'numeric' => 'No Telepon Harus Angka',
            'min_length' => 'No Telepon Min 10 angka',
            'max_length' => 'No Telepon Max 13 angka'
        ]);

        $this->form_validation->set_rules('judul_laporan', 'Judul Laporan Pengaduan', 'trim|required', [
            'required' => 'Judul Pengaduan Belum diisi!!',
        ]);

		$this->form_validation->set_rules('isi_laporan', 'Isi Laporan Pengaduan', 'trim|required', [
            'required' => 'Isi Pengaduan Belum diisi!!',
        ]);

		$this->form_validation->set_rules('foto', 'Foto Pengaduan', 'trim');

		if ($this->form_validation->run() == FALSE) :
			$this->load->view('tambah_pengaduan',$data);
			$this->load->view('_part/landing_footer');
		else :


			$upload_foto = $this->upload_foto('foto'); // parameter nama foto
			if ($upload_foto == FALSE) :
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
					Upload foto pengaduan gagal, hanya png,jpg dan jpeg yang dapat di upload!
					</div>');

				redirect('PengaduanController');
			else :

				$params = [
					'nik'				=> htmlspecialchars($this->input->post('nik', true)),
					'tgl_pengaduan'  	=> date('Y-m-d'),
					'nama'				=> htmlspecialchars($this->input->post('nama', true)),
					'email'				=> htmlspecialchars($this->input->post('email', true)),
					'judul_pengaduan'	=> htmlspecialchars($this->input->post('judul_laporan', true)),
					'notelp'			=> htmlspecialchars($this->input->post('telp', true)),
					'isi_pengaduan'		=> htmlspecialchars($this->input->post('isi_laporan', true)),
					'gambar'			=> $upload_foto,
					'status'			=> '0',
				];

				$resp = $this->Pengaduan_m->create($params);

				if ($resp) :
					$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">
						Terimakasih, laporan akan segera diproses!
						</div>');

					redirect('PengaduanController/cek_pengaduan');
				else :
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
						Laporan gagal dibuat!
						</div>');

					redirect('PengaduanController');
				endif;

			endif;
		endif;
	}

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


	public function cek_pengaduan()
	{
		$data['judul'] = 'Data Pengaduan';

		$data['pengaduan'] = $this->db->get('aduan')->num_rows();
		
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_tanggapan()->result_array();


		
		$this->load->view('data_tanggapan',$data);
		$this->load->view('_part/landing_footer');
		
	}

	public function detail_pengaduan_masyarakat($id)
	{

		$cek_data = $this->db->get_where('aduan', ['id_pengaduan' => htmlspecialchars($id)])->row_array();		

		if (!empty($cek_data)) :

			$data['judul'] = 'Detail Pengaduan';

			$data['data_pengaduan'] = $this->Pengaduan_m->data_detail_pengaduan_tanggapan(htmlspecialchars($id))->row_array();
			if ($data['data_pengaduan']) :
				$this->load->view('dp_masyarakat',$data);
				$this->load->view('_part/landing_footer');
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

	
}