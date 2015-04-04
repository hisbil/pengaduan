<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model {
	public $db_tabel = 'admin';

	public function seleksi_data()
	{
		$this->db->select('*')
				 ->from($this->db_tabel);
		$data = $this->db->get();
		return $data->result_array();
	}

	public function seleksi_data_operator($status)
	{
		$this->db->select('*')
				 ->from($this->db_tabel)
				 ->where('status', $status);
		$data = $this->db->get();
		return $data->result_array();
	}

	public function tambah_data($data)
	{
		$tambah = $this->db->insert($this->db_tabel, $data);
		return $tambah;
	}
	
	public function update_data($id, $data)
	{
		$this->db->where('id', $id);
		$update = $this->db->update($this->db_tabel, $data);
		return $update;
	}

	public function seleksi_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($this->db_tabel);
		return $query->result_array();
	}

	public function hapus_data($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete($this->db_tabel);
		return $hapus;
	}
}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */