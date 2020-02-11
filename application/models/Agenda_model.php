<?php defined('BASEPATH') or exit('No direct script access allowed');
class Agenda_model extends CI_Model
{
   //manajemen buku 
   public function getAgenda()
   {
      return $this->db->get('agenda');
   }

   public function agendaWhere($where)
   {
      return $this->db->get_where('agenda', $where);
   }

   public function simpanagenda($data = null)
   {
      $this->db->insert('agenda', $data);
   }

   public function updateagenda($data = null, $where = null)
   {
      $this->db->update('agenda', $data, $where);
   }

   public function hapusagenda($where = null)
   {
      $this->db->delete('agenda', $where);
   }

   public function total($field, $where)
   {
      $this->db->select_sum($field);
      if (!empty($where) && count($where) > 0) {
         $this->db->where($where);
      }
      $this->db->from('agenda');
      return $this->db->get()->row($field);
   }
}
