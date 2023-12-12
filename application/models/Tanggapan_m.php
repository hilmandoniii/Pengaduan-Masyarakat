<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan_m extends CI_Model {

	private $table = 'tanggapan';
	private $primary_key = 'id_tanggapan';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function get_tanggapan_by_id($id) 
	{
        // Fungsi untuk mendapatkan tanggapan berdasarkan ID pengaduan
        $query = $this->db->get_where('tanggapan', array('id_pengaduan' => $id));
        return $query->row_array();
    }

    public function update_tanggapan($data) 
    {
        // Fungsi untuk mengupdate tanggapan
        $this->db->where('id_pengaduan', $data['id_pengaduan']);
        return $this->db->update('tanggapan', $data);
    }

}