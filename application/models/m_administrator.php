<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_administrator extends CI_Model {
	public $db_table = 'admin';

	public function __construct()
	{
		parent::__construct();
	}
	
	public function login($username, $password)
	{
	$this->db->select('id, username, status, password, nama')
				->from($this->db_table)
				->where('username', $username)
			    ->where('password', $password)
				->limit(1);

	$query = $this->db->get();

	if($query->num_rows() == 1)
	{
	 return $query->result();
	}
	else
	{
	 return false;
	}
	}
}

/* End of file m_administrator.php */
/* Location: ./application/models/m_administrator.php */