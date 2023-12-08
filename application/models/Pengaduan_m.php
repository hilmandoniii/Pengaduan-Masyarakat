<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_m extends CI_Model
{

	private $table = 'aduan';
	private $primary_key = 'id_pengaduan';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function data_pengaduan()
	{
		return $this->db->get($this->table);
	}

	public function data_pengaduan_semua()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('status', '0');
		return $this->db->get();
	}

	public function data_pengaduan_tolak()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('status', 'tolak');
		return $this->db->get();
	}

	public function data_pengaduan_selesai()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('status', 'selesai');
		return $this->db->get();
	}

	public function data_pengaduan_proses()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('status', 'proses');
		return $this->db->get();
	}

	public function data_pengaduan_masyarakat_id($id)
	{
		return $this->db->get_where($this->table, ['id_pengaduan' => $id]);
	}

	public function data_pengaduan_tanggapan()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tanggapan', 'tanggapan.id_pengaduan = aduan.id_pengaduan', 'left');
		$this->db->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas', 'left');
		return $this->db->get();
	}

}