<?php

function cek_login()
{
   $ci = get_instance();
   if (!$ci->session->userdata('email')) {
      redirect('autentifikasi');
   } else {
      $role_id = $ci->session->userdata('role_id');
      $menu = $ci->uri->segment(1);
      $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
      $menuId = $queryMenu['id'];

      $userAccess = $ci->db->get_where('user_access_menu', [
         'menu_id' => $menuId,
         'role_id' => $role_id
      ]);

      if ($userAccess->num_rows() < 1) {
         redirect('autentifikasi/blok');
      }
   }
}


function cek_akses($roleId, $menuId)
{
   $ci = get_instance();
   $ci->db->where('role_id', $roleId);
   $ci->db->where('menu_id', $menuId);
   $result = $ci->db->get('user_access_menu');

   if ($result->num_rows() > 0) {
      return "checked='checked'";
   }
}
