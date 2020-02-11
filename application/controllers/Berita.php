<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      cek_login();
   }

   public function index()
   {
      $data['user'] = $this->User_model->getUser()->row_array();
      $data['judul'] = 'Post Berita';
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('berita/index', $data);
      $this->load->view('templates/footer', $data);
   }
}
