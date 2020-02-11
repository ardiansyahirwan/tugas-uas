<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      cek_login();
   }

   public function index()
   {
      $data['judul'] = 'Jadwal Kuliah';
      $data['user'] = $this->User_model->getUser()->row_array();
      $data['jadwalkuliah'] = $this->Jadwal_model->getJadwal()->result_array();
      $this->load->view('templates/user-header', $data);
      $this->load->view('jadwal/index', $data);
      $this->load->view('templates/user-footer', $data);
   }

   public function agenda()
   {
      $data['judul'] = 'Data Agenda';
      $data['user'] = $this->User_model->getUser()->row_array();
      $data['agenda'] = $this->db->get('agenda')->result_array();
      $this->load->view('templates/user-header', $data);
      $this->load->view('jadwal/agenda', $data);
      $this->load->view('templates/user-footer');
   }
}
