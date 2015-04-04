<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Petugas extends CI_Controller {

	public $konten = array(
		'main_view' => '');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_petugas', 'petugas', TRUE);
	}

	public function index()
	{
		if($this->session->userdata('logged_in'))
	    {
			$data = array('data' => $this->petugas->seleksi_data());

			$this->konten['main_view'] = $this->load->view('admin/petugas', $data, TRUE);
			$this->load->view('admin/admin', $this->konten);
		}else
		{
			redirect('administrator/login_index', 'refresh');
		}
	}

	public function tambah_data()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[32]|xss_clean');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[6]|max_length[32]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$data = array('data' => $this->petugas->seleksi_data(), );

			$this->konten['main_view'] = $this->load->view('admin/petugas', $data, TRUE);
			$this->load->view('admin/admin', $this->konten);
		}else
		{
			$data = array(
				'id' => '',
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'id_satker' => $this->input->post('satker'),
				);
			// print_r($data);
			$this->petugas->tambah_data($data);
			redirect('petugas');
		}
	}

	public function get_id($id)
	{
		$data['data'] = $this->petugas->seleksi_id($id);
		$this->konten['main_view'] = $this->load->view('admin/update_petugas', $data, TRUE);
		$this->load->view('admin/admin', $this->konten);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'id_satker' => $this->input->post('satker'),
			);
		$this->petugas->update_data($id, $data);
		redirect('petugas');
	}

	public function delete_data($id)
	{
		$this->petugas->hapus_data($id);
		redirect('petugas');
	}

}

/* End of file petugas.php */
/* Location: ./application/controllers/petugas.php */