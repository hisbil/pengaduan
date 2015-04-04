<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Verify_login extends CI_Controller {

  function __construct()
  {
     parent::__construct();
     $this->load->model('m_login','login',TRUE);
  }

  function index()
  {
     $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
     $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

     if($this->form_validation->run() == FALSE)
     {
       $this->load->view('login');
     }
     else
     {
       redirect('pengaduan', 'refresh');
     }

  }

  function check_database($password)
  {
     $username = $this->input->post('username');
     $password = md5($this->input->post('password'));

     $result = $this->login->login($username, $password);

     if($result)
     {
       $sess_array = array();
       foreach($result as $row)
       {
         $sess_array = array(
           'id' => $row->id,
           'nama' => $row->nama,
           'username' => $row->username,
         );
         $this->session->set_userdata('logged_in_petugas', $sess_array);
       }
       return TRUE;
     }
     else
     {
       $this->form_validation->set_message('check_database', 'Username dan Password Anda Tidak Cocok');
       return false;
     }
  }

}