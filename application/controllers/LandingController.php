<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingController extends CI_Controller {

	
	public function index()
	{
		$data['judul'] = 'E-Ladumas';
		$data['pengaduan'] = $this->db->get('aduan')->num_rows();
		$data['pengaduan_proses'] = $this->db->get_where('aduan', ['status' => 'proses'])->num_rows();
        $data['pengaduan_tolak'] = $this->db->get_where('aduan', ['status' => 'tolak'])->num_rows();
        $data['pengaduan_selesai'] = $this->db->get_where('aduan', ['status' => 'selesai'])->num_rows();
		$this->load->view('_part/landing_head',$data);
		$this->load->view('_part/landing_header',$data);
		$this->load->view('index',$data);
		$this->load->view('_part/landing_footer');
	}

	
}