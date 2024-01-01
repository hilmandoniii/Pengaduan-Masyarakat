<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan_m extends CI_Model {

	private $table = 'tanggapan';
	private $primary_key = 'id_tanggapan';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function get_tanggapan($id_pengaduan)
    {
    	return $this->db->get_where($this->table, ['id_pengaduan' => $id_pengaduan]);
        
    }

    public function data_tanggapan_masyarakat_id($id)
	{
		return $this->db->get_where($this->table, ['id_tanggapan' => $id]);
	}

	public function proses_tanggapans()
	{
		$this->db->select('*,aduan.*');
		$this->db->from($this->table);
		$this->db->join('aduan', 'aduan.id_pengaduan = tanggapan.id_pengaduan');
		$this->db->where('status', 'proses');
		return $this->db->get();
	}

}