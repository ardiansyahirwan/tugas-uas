<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      cek_login();
   }

   public function index()
   {
      $data['user'] = $this->User_model->getUser()->row_array();
      $data['menu'] = $this->User_model->getMenu()->result_array();
      $data['judul'] = 'Beranda';
      $this->load->view('templates/user-header', $data);
      $this->load->view('beranda/berita-user', $data);
      $this->load->view('templates/user-footer', $data);
   }
}
