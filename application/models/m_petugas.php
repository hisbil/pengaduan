<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_petugas extends CI_Model {

	public $db_tabel = 'petugas';

	public function seleksi_data()
	{
		$this->db->select('petugas.id, petugas.nama, petugas.username, petugas.email, petugas.password, tbsatker.satker')
				 ->from($this->db_tabel)
				 ->join('tbsatker', 'tbsatker.id_satker = petugas.id_satker')
				 ->order_by('petugas.nama', 'ASC');
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

/* End of file m_petugas.php */
/* Location: ./application/models/m_petugas.php */