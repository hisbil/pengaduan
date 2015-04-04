<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Pengaduan extends CI_Controller {
	public $konten = array('data' => '',);
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengaduan', 'pengaduan', TRUE);
	}

	public function index()
	{
	   if($this->session->userdata('logged_in_petugas'))
	   {
	   	 $session_data = $this->session->userdata('logged_in_petugas');
		 $id = $session_data['id'];
	     $this->konten['data'] = $this->pengaduan->seleksi_data($id);

	     $this->load->view('pengaduan', $this->konten);
	   }
	   else
	   {
	     redirect('pengaduan/login_index', 'refresh');
	   }
	}

	public function tambah_data()
	{
		$session_data = $this->session->userdata('logged_in_petugas');
		$dt = new DateTime();
	
		$result = array();
		$i=0;
		foreach ($this->input->post('pertanyaan') as $key => $value) {
			$id = $session_data['id'];
			$satker = $this->input->post('satker');
			$id_admin = $this->input->post('admin');
			$email = $this->input->post('email');
			$tgl = $dt->format('Y-m-d');
			$tanya = $this->input->post('pertanyaan');
			$i++;
			$result[] = array(
			'id' => '',
			'id_petugas' => $id,
			'satker' => $satker,
			'id_admin' => $id_admin,
			'email' => $email,
			'tanya' => $tanya[$key],
			'tgl' => $tgl,
			);
		}

		$email_admin = $this->pengaduan->seleksi_admin();
		foreach ($email_admin->result_array() as $d) {
			$email_superuser = $d['email'];
		}

		$email_operat = $this->pengaduan->seleksi_operator($id_admin);
		foreach ($email_operat->result_array() as $d) {
			$email_operator = $d['email'];
		}

		$pengirim = $email;
		$nama = $this->input->post('nama');
		$x = 0;
		
		$list = array($email_superuser, $email_operator);
		
		for($x=0; $x<$i; $x++)
		{
			$this->email->from($pengirim, $nama);
			$this->email->to($list);
			
			$this->email->subject("Pengaduan Inspektorat");
			$pertanyaan = $result[$x]['tanya'];
			$this->email->message($pertanyaan);
			
			if($this->email->send())
			{
				$this->session->set_flashdata('item', array('message' => 'Email berhasil dikirim', 'class' => 'alert alert-success', 'icon' => 'glyphicon glyphicon-ok'));
			}else{
				$this->session->set_flashdata('item', array('message' => 'Email tidak dikirim', 'class' => 'alert alert-danger', 'icon' => 'glyphicon glyphicon-remove'));
			}
		}
		$this->pengaduan->insert_to_db($result);
		redirect('pengaduan');
	}

	public function login_index()
	{
	   if($this->session->userdata('logged_in_petugas'))
	   {
	     redirect('pengaduan', 'refresh');
	   }
	   else 
	   {
	      $this->load->view('login');
	   }
	}

	public function logout()
	{
	   $this->session->unset_userdata('logged_in_petugas');
	   session_destroy();
	   redirect('pengaduan/login_index', 'refresh');
	}

}

/* End of file pengaduan.php */
/* Location: ./application/controllers/pengaduan.php */