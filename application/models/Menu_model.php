<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

   // Join
   public function getSubmenu()
   {
      $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
               FROM `user_sub_menu` JOIN `user_menu`
               ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";

      return $this->db->query($query)->result_array();
   }

   // get Menu Join
   public function getMenuJoin($role_id)
   {
      $queryMenu = "SELECT `user_menu`.`id` , `menu`
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC";
      return $this->db->query($queryMenu)->result_array();
   }






   public function hapusMenu($id)
   {
      return $this->db->delete('user_menu', $id);
   }

   public function hapusSubmenu($id)
   {
      return $this->db->delete('user_sub_menu', $id);
   }
}
