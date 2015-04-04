<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pengaduan extends CI_Model {

	public $db_table = 'pertanyaan';

	public function insert_to_db($data)
	{
		$tambah = $this->db->insert_batch($this->db_table, $data);
		return $tambah;
	}

	public function seleksi_data($id)
	{
		$this->db->select("petugas.id, petugas.nama, petugas.username, petugas.password, petugas.email, tbsatker.satker")
				 ->from("petugas")
				 ->join('tbsatker', 'tbsatker.id_satker=petugas.id_satker')
				 ->where('id', $id)
				 ->limit(1);
		$query = $this->db->get();
		return $query->result_array();                                                                
	}

	public function seleksi_admin()
	{
		$this->db->select('id, email, status')
				 ->from('admin')
				 ->where('status', 1);

		$query = $this->db->get();

		return $query;
	}

	public function seleksi_operator($id)
	{
		$this->db->select('id, email')
				 ->from('admin')
				 ->where('id', $id);

		$query = $this->db->get();

		return $query;
	}
}

/* End of file m_pengaduan.php */
/* Location: ./application/models/m_pengaduan.php */