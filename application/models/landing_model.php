<?php
date_default_timezone_set('Asia/Jakarta');

class landing_model extends CI_Model
{
  public function get_published_count()
  {
    $query = $this->db->get_where('produk', ['status' => 1]);
    return $query->num_rows();
  }

  public function get_published($limit = null, $offset = null)
  {
    if (!$limit && $offset) {
      $query = $this->db->get_where('produk', ['status' => 1]);
    } else {
      $query =  $this->db->get_where('produk', ['status' => 1], $limit, $offset);
    }
    return $query->result_array();
  }
}
