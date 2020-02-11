<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{

   // Ambil Data
   public function getJadwal()
   {
      return $this->db->get('jadwalkuliah');
   }

   public function getMatkul()
   {
      return $this->db->get('jadwalkuliah');
   }

   // ambil jumlah SKS
   public function total($field, $where)
   {
      $this->db->select_sum($field);
      if (!empty($where) && count($where) > 0) {
         $this->db->where($where);
      }
      $this->db->from('jadwalkuliah');
      return $this->db->get()->row($field);
   }
}
