<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      cek_login();
   }

   public function index()
   {
      $data['user'] = $this->User_model->getUser()->row_array();
      $data['judul'] = 'Dashboard';
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/index', $data);
      $this->load->view('templates/footer', $data);
   }

   public function role()
   {
      $data['user'] = $this->User_model->getUser()->row_array();
      $data['role'] = $this->db->get('role_id')->result_array();

      // set Validasi
      $this->form_validation->set_rules('role_id', 'Role', 'required|trim', [
         'required' => 'Role belum di isi'
      ]);
      // run Validasi
      if ($this->form_validation->run() == false) {
         $data['judul'] = 'Role';
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('admin/role', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $data = ['role_id' => $this->input->post('role_id')];
         $this->User_model->simpanRole($data);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role baru Telah di Tambahkan</div>');
         redirect('Admin/role');
      }
   }

   public function hapusRole()
   {
      $id = ['id' => $this->uri->segment(3)];
      $this->User_model->hapusRole($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role telah di hapus</div>');
      redirect('Admin/role');
   }

   public function roleAccess($id)
   {
      $data['user'] = $this->User_model->getUser()->row_array();
      $data['role'] = $this->db->get_where('role_id', ['id' => $id])->row_array();
      $this->db->where('id !=', 1);
      $data['menu'] = $this->User_model->getMenu()->result_array();
      $data['judul'] = 'Role Access';
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/role-access');
      $this->load->view('templates/footer', $data);
   }

   public function changeAccess()
   {
      $menuId = $this->input->post('menuId');
      $roleId = $this->input->post('roleId');

      $data = [
         'role_id' => $roleId,
         'menu_id' => $menuId
      ];

      $result = $this->db->get_where('user_access_menu', $data);
      if ($result->num_rows() < 1) {
         $this->db->insert('user_access_menu', $data);
      } else {
         $this->db->delete('user_access_menu', $data);
      }

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access Changed </div>');
   }
}
