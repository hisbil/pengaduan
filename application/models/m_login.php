<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {
	public $db_table = 'petugas';

	public function __construct()
	{
		parent::__construct();
	}
	
	public function login($username, $password)
	{
	$this->db->select('id, username, password, nama')
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
