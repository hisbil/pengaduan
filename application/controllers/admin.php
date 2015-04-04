<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Admin extends CI_Controller {

	public $konten = array(
			'main_view' => '',
			);
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin', 'admin', TRUE);
	}

	public function index()
	{
		if($this->session->userdata('logged_in'))
	    {
			$session_data = $this->session->userdata('logged_in');
			$status = $session_data['status'];

			if ($status==1) {
				$data = array('data' => $this->admin->seleksi_data());
				$this->konten['main_view'] = $this->load->view('admin/data_admin', $data, TRUE);
				$this->load->view('admin/admin', $this->konten);
			}else if($status==0)
			{
				$this->get_operator($status);
			}
		}else{
			redirect('administrator/login_index', 'refresh');
		}
	}

	public function get_operator($status)
	{
		$s = $this->session->userdata('logged_in');
		$status = $s['status'];

		$data = array('data' => $this->admin->seleksi_data_operator($status));
		$this->konten['main_view'] = $this->load->view('admin/data_operator', $data, TRUE);
		$this->load->view('admin/admin', $this->konten);
	}

	public function tambah_data()
	{
		$this->form_validation->set_rules('nama', 'Nama Admin', 'trim|required|min_length[2]|max_length[32]|xss_clean');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[2]|max_length[32]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]|xss_clean');
		$this->form_validation->set_rules('radiostatus', 'Status', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$session_data = $this->session->userdata('logged_in');
			$status = $session_data['status'];

			if ($status==1) {
				$data = array('data' => $this->admin->seleksi_data());
				$this->konten['main_view'] = $this->load->view('admin/data_admin', $data, TRUE);
				$this->load->view('admin/admin', $this->konten);
			}else if($status==0)
			{
				$this->get_operator($status);
			}
		}else
		{
			$data = array(
				'id' => '',
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('email'),
				'status' => $this->input->post('radiostatus') 
				);
		$this->admin->tambah_data($data);
		}
		redirect('admin');
	}

	public function get_id($id)
	{
		$data['data'] = $this->admin->seleksi_id($id);
		$this->konten['main_view'] = $this->load->view('admin/update_data_admin', $data, TRUE);
		$this->load->view('admin/admin', $this->konten);
	}

	public function get_id_operator($id)
	{
		$data['data'] = $this->admin->seleksi_id($id);
		$this->konten['main_view'] = $this->load->view('admin/update_data_operator', $data, TRUE);
		$this->load->view('admin/admin', $this->konten);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'status' => $this->input->post('radiostatus'),
			);
		$this->admin->update_data($id, $data);
		redirect('admin');
	}

	public function delete_data($id)
	{
		$this->admin->hapus_data($id);
		redirect('admin');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */