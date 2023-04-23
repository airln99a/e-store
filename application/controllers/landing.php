<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class landing extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('landing_model', 'lm');
  }

  //controller index/landing utama
  public function index()
  {
    $data['title']      = 'Store';
    $data['produk']     = $this->db->limit(6)->get_where('produk', ['status' => 1])->result_array();
    $data['aktif']      = 'landing';

    $this->load->view('landing/partials/header', $data);
    $this->load->view('landing/partials/nav', $data);
    $this->load->view('landing/landing');
    $this->load->view('landing/partials/footer');
  }

  //controller produk kami
  public function produk()
  {
    $data['title']                  = 'Store';
    // $data['produk']     = $this->db->get_where('produk', ['status' => 1])->result_array();
    $data['aktif']                  = 'produk';

    $this->load->library('pagination');

    $config['base_url']             = site_url('landing/produk');
    $config['page_query_string']    = TRUE;
    $config['total_rows']           = $this->lm->get_published_count();
    $config['per_page']             = 6;

    $this->pagination->initialize($config);
    $limit                          = $config['per_page'];
    $offset                         = ($this->input->get('per_page'));

    $data['produk']                 = $this->lm->get_published($limit, $offset);

    if (count($data['produk']) > 0) {
      $this->load->view('landing/partials/header', $data);
      $this->load->view('landing/partials/nav', $data);
      $this->load->view('landing/produk', $data);
      $this->load->view('landing/partials/footer');
    }
  }
  
  //controller tentang kami
  public function tentang()
  {
    $data['title']      = 'Store';
    // $data['produk']     = $this->db->limit(6)->get_where('produk', ['status' => 1])->result_array();
    $data['aktif']      = 'tentang';

    $this->load->view('landing/partials/header', $data);
    $this->load->view('landing/partials/nav', $data);
    $this->load->view('landing/tentang');
    $this->load->view('landing/partials/footer');
  }
}
