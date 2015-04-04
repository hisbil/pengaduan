<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pertanyaan extends CI_Model {

	public $db_tabel = 'pertanyaan';

	public function seleksi_data($status, $id)
	{
		$this->db->select('pertanyaan.id, petugas.nama a, admin.nama b, pertanyaan.email, pertanyaan.tanya, pertanyaan.tgl, petugas.id_satker, pertanyaan.satker, admin.status x, pertanyaan.status z, pertanyaan.id_petugas')
				 ->from($this->db_tabel)
				 ->join('petugas', 'petugas.id = pertanyaan.id_petugas')
				 ->join('admin', 'admin.id = pertanyaan.id_admin')
				 ->where('admin.status', $status)
				 ->where('admin.id', $id)
				 ->order_by('pertanyaan.tgl', 'ASC');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function seleksi_data_admin()
	{
		$this->db->select('pertanyaan.id, petugas.nama a, admin.nama b, pertanyaan.email, pertanyaan.tanya, pertanyaan.tgl, petugas.id_satker, pertanyaan.satker, admin.status x, pertanyaan.status z, pertanyaan.id_petugas')
				 ->from($this->db_tabel)
				 ->join('petugas', 'petugas.id = pertanyaan.id_petugas')
				 ->join('admin', 'admin.id = pertanyaan.id_admin')
				 ->order_by('pertanyaan.tgl', 'ASC');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function seleksi_id($id_petugas, $tgl)
	{
		$this->db->select('pertanyaan.id, petugas.nama a, pertanyaan.id_petugas, admin.nama b, pertanyaan.email, pertanyaan.tanya, pertanyaan.tgl, petugas.id_satker, pertanyaan.satker')
				 ->from($this->db_tabel)
				 ->join('petugas', 'petugas.id = pertanyaan.id_petugas')
				 ->join('admin', 'admin.id = pertanyaan.id_admin')
				 ->where('pertanyaan.id_petugas', $id_petugas)
				 ->where('pertanyaan.tgl', $tgl)
				 ->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function hapus_data($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete($this->db_tabel);
		return $hapus;
	}
	
	
	public function update($id_petugas, $tgl, $data)
	{
		$this->db->where('id_petugas', $id_petugas)
				 ->where('tgl', $tgl);
		$update = $this->db->update($this->db_tabel, $data);
		return $update;
	}

	public function getemail($id)
	{
		$this->db->select('email, nama')
				 ->from('admin')
				 ->where('id', $id);

		$query = $this->db->get();
		return $query->result_array();
	}
}

/* End of file m_pertanyaan.php */
/* Location: ./application/models/m_pertanyaan.php */