<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
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

      // validation
      $this->form_validation->set_rules('menu', 'Menu', 'required|trim');
      if ($this->form_validation->run() == false) {
         $data['judul'] = 'Manajemen Menu';
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('menu/index', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru telah di tambah</div>');
         redirect('menu');
      }
   }

   // HAPUS MENU
   public function hapusMenu()
   {
      $id = [
         'id' => $this->uri->segment(3)
      ];

      $this->Menu_model->hapusMenu($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Telah di Hapus</div>');
      redirect('menu');
   }

   public function subMenu()
   {
      $data['user'] = $this->User_model->getUser()->row_array();
      $data['menu'] = $this->User_model->getMenu()->result_array();
      // load Model
      $data['submenu'] = $this->Menu_model->getSubmenu();

      // validation
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('menu_id', 'Menu', 'required');
      $this->form_validation->set_rules('url', 'URL', 'required');
      $this->form_validation->set_rules('icon', 'Icon', 'required');
      if ($this->form_validation->run() == false) {
         $data['judul'] = 'Manajemen Submenu';
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('menu/submenu', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
         ];

         $this->db->insert('user_sub_menu', $data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu baru telah di tambah</div>');
         redirect('menu/submenu');
      }
   }

   // HAPUS SUBMENU
   public function hapusSubmenu()
   {
      $id = [
         'id' => $this->uri->segment(3)
      ];

      $this->Menu_model->hapusSubmenu($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu Telah di Hapus</div>');
      redirect('menu/submenu');
   }


   // DATA USER
   public function dataUser()
   {
      $data['user'] = $this->User_model->getUser()->row_array();
      $data['DataUser'] = $this->User_model->getDataUser()->result_array();
      $data['role'] = $this->db->get('role_id')->result_array();

      // set validasi
      $this->form_validation->set_rules('name', 'Nama', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('role_id', 'Role ID', 'required');

      // run validasi
      if ($this->form_validation->run() == false) {
         $data['judul'] = 'Data User';
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('menu/data-user', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role_id'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => time()
         ];

         $this->User_model->simpanData($data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil ditambahkan</div>');
         redirect('menu/datauser');
      }
   }

   public function hapusDatauser()
   {
      $id = [
         'id' => $this->uri->segment(3)
      ];

      $this->User_model->hapusDatauser($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Telah di Hapus</div>');
      redirect('menu/datauser');
   }
}
