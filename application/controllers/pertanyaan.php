<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Pertanyaan extends CI_Controller {

	public $konten = array(
		'main_view' => '');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pertanyaan', 'pertanyaan', TRUE);
	}

	public function index()
	{
		if($this->session->userdata('logged_in'))
	    {
			$session_data = $this->session->userdata('logged_in');
			$status = $session_data['status'];
			$id = $session_data['id'];

			if ($status==1) {
				$this->admin();
			}else if($status==0)
			{
				$data = array('data' => $this->pertanyaan->seleksi_data($status, $id));

				$this->konten['main_view'] = $this->load->view('admin/pertanyaan', $data, TRUE);
				$this->load->view('admin/admin', $this->konten);
			}
		}else{
			redirect('administrator/login_index', 'refresh');
		}
		
	}

	public function admin()
	{
		$data = array('data' => $this->pertanyaan->seleksi_data_admin());

		$this->konten['main_view'] = $this->load->view('admin/pertanyaan', $data, TRUE);
		$this->load->view('admin/admin', $this->konten);
	}

	public function get_id($id_petugas, $tgl)
	{
		$data = array(
			'status' => '1', );
		$this->pertanyaan->update($id_petugas, $tgl, $data);
		$data['data'] = $this->pertanyaan->seleksi_id($id_petugas, $tgl);
		$this->konten['main_view'] = $this->load->view('admin/detail_pertanyaan', $data, TRUE);
		$this->load->view('admin/admin', $this->konten);
	}

	public function delete_data($id)
	{
		$this->pertanyaan->hapus_data($id);
		redirect('pertanyaan');
	}

	public function balas()
	{
		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
		$emailadmin = $this->pertanyaan->getemail($id);
		$emailpegawai = $this->input->post('email');
		foreach ($emailadmin as $d) {
			$emailadmin = $d['email'];
			$nama = $d['nama'];
		}

		$this->email->from($emailadmin, $nama);
		$this->email->to($emailpegawai);
		
		$this->email->subject('Konfirmasi pertanyaan pengaduan inspektorat');
		$this->email->message($this->input->post('balas'));
		
		if ($this->email->send()) {
			$this->session->set_flashdata('item', array('message' => 'Email berhasil dikirim', 'class' => 'alert alert-success', 'icon' => 'glyphicon glyphicon-ok'));
		}else{
			$this->session->set_flashdata('item', array('message' => 'Email tidak dikirim', 'class' => 'alert alert-danger', 'icon' => 'glyphicon glyphicon-remove'));
		}
		$satker = $this->input->post('satker');
		$tgl = $this->input->post('tgl');
		redirect('pertanyaan/get_id/'.$satker.'/'.$tgl.'');
	}
}

/* End of file pertanyaan.php */
/* Location: ./application/controllers/pertanyaan.php */