<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

   // SIMPAN
   public function simpanData($data)
   {
      return $this->db->insert('user', $data);
   }

   public function simpanRole($data)
   {
      return $this->db->insert('role_id', $data);
   }



   // AMBIL DATA
   // mendapatkan data user berdasarkan session email
   public function getUser()
   {
      $email = $this->session->userdata('email');
      return $this->db->get_where('user', ['email' => $email]);
   }

   // mendapatkan semua data user
   public function getDataUser()
   {
      return $this->db->get('user');
   }

   public function getMenu()
   {
      return $this->db->get('user_menu');
   }

   public function getSubmenu($menuId)
   {
      return $this->db->get_where('user_sub_menu', ['menu_id' => $menuId, 'is_active' => 1]);
   }

   public function getUserWhere($where)
   {
      return $this->db->get_where('user', $where);
   }



   // HAPUS
   public function hapusRole($id)
   {
      $this->db->delete('role_id', $id);
   }

   public function hapusDatauser($id)
   {
      $this->db->delete('user', $id);
   }

   // join table  user menu dengan user access menu
   // public function joinMenu($role_id)
   // {
   //    $this->db->select('user_menu.id', 'menu');
   //    $this->db->from('user_menu');
   //    $this->db->join('user_access_menu', 'user_menu.id = user_access_menu.menu_id');
   //    $this->db->where('user_access_menu.role_id', $role_id);
   //    $this->db->order_by('user_access_menu.menu_id', 'ASC');
   //    return $query = $this->db->get();
   // }
}
