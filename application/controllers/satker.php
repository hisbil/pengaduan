<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Satker extends CI_Controller {

	public $konten = array(
		'main_view' => '');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_satker', 'satker', TRUE);
	}

	public function index()
	{
		if($this->session->userdata('logged_in'))
	    {
			$data = array('data' => $this->satker->seleksi_data());

			$this->konten['main_view'] = $this->load->view('admin/satker', $data, TRUE);
			$this->load->view('admin/admin', $this->konten);
		}else
		{
			redirect('administrator/login_index', 'refresh');
		}
	}

	public function tambah_data()
	{
		$this->form_validation->set_rules('satker', 'satker', 'trim|required|min_length[2]|max_length[32]|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$data = array('data' => $this->satker->seleksi_data(), );

			$this->konten['main_view'] = $this->load->view('admin/satker', $data, TRUE);
			$this->load->view('admin/admin', $this->konten);
		}else
		{
			$data = array(
				'id_satker' => '',
				'satker' => $this->input->post('satker')
				);
		$this->satker->tambah_data($data);
		}

		redirect('satker');
	}

	public function get_id($id)
	{
		$data['data'] = $this->satker->seleksi_id($id);
		$this->konten['main_view'] = $this->load->view('admin/update_satker', $data, TRUE);
		$this->load->view('admin/admin', $this->konten);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$data = array('satker' => $this->input->post('satker'));
		$this->satker->update_data($id, $data);
		redirect('satker');
	}

	public function delete_data($id)
	{
		$this->satker->hapus_data($id);
		redirect('satker');
	}

}

/* End of file satker.php */
/* Location: ./application/controllers/satker.php */