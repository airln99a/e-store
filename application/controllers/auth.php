<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');

    if ($this->session->userdata('email')) {
      redirect('admin');
    }
  }

  //controller login
  public function index()
  {
    // $data['user']       = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    $data['title']      = 'Login - Store';

    $this->load->view('login', $data);
  }

  // controller init login
  public function login()
  {
    // menambah validasi form
    $this->form_validation->set_rules('email', 'Email', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');


    // jika validasi salah
    if ($this->form_validation->run() == FALSE) {
      redirect('auth');
    } else {
      $email      = $this->input->post('email');
      $password   = $this->input->post('password');
      var_dump($email, $password);

      $user       = $this->db->get_where('useradmin', ['email' => $email])->row_array();

      if ($user) {
        if (password_verify($password, $user['password'])) {
          $data = [
            'id'        => $user['id_useradmin'],
            'email'     => $user['email']
          ];
          $this->session->set_userdata($data);
          redirect('admin');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!
                </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak ditemukan!
                </div>');
        redirect('auth');
      }
    }
  }

  //controller 404 not found
  public function not_found()
  {
    $data['title']      = '404 - Store';

    $this->load->view('admin/partials/header', $data);
    $this->load->view('admin/not_found');
    $this->load->view('admin/partials/footer');
  }
}
