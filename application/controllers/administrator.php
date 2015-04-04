<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Administrator extends CI_Controller {
	public $konten = array('main_view' => '', );
	function __construct()
	{
	   parent::__construct();
	}

	function index()
	{
	   if($this->session->userdata('logged_in'))
	   {
	     $session_data = $this->session->userdata('logged_in');
	     $data['username'] = $session_data['nama'];
	     $this->konten['main_view'] = $this->load->view('admin/admin_utama', $data, TRUE);
	     $this->load->view('admin/admin', $this->konten);
	   }
	   else
	   {
	     redirect('administrator/login_index', 'refresh');
	   }
	}

	public function notifikasi()
	{
		$session_data = $this->session->userdata('logged_in');
		$status = $session_data['status'];
		$id = $session_data['id'];
		if($status==1)
		{
			$hasil_query = mysql_query("SELECT id from pertanyaan where status=0");
			$row = mysql_num_rows($hasil_query);
			echo json_encode($row);
		}else if($status==0)
		{
			$hasil_query = mysql_query("SELECT id from pertanyaan where status=0 and id_admin=$id");
			$row = mysql_num_rows($hasil_query);
			echo json_encode($row);
		}
	}

	function login_index()
	{
	   if($this->session->userdata('logged_in'))
	   {
	     redirect('administrator', 'refresh');
	   }
	   else 
	   {
	      $this->load->helper(array('form'));
	      $this->load->view('admin/administrator');
	   }
	}

	function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('administrator/login_index', 'refresh');
	}

}

/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */