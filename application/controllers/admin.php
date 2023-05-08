<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model', 'am');

    if (!$this->session->userdata('username')) {
      redirect('auth/not_found');
    }
  }

  //controller index/admin utama
  public function index()
  {
    // $data['user']       = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    $data['title']      = 'Dashboard - Admin Store';
    $data['profil']     = $this->db->get_where('useradmin', ['id_useradmin' => 1])->row_array();

    $this->load->view('admin/partials/header', $data);
    $this->load->view('admin/partials/nav');
    $this->load->view('admin/admin');
    $this->load->view('admin/partials/footer');
  }

  //controller tampilan manajemen data
  public function ManajemenData()
  {
    // $data['user']       = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    // menggunakan query builder, ambil data pada tabel produk dan kembalikan hasilnya dalam bentuk array. hasil tersebut disimpan dalam variabel objek bernama produk
    $data['produk']     = $this->db->get('produk')->result_array();
    $data['title']      = 'Manajemen Data - Admin Store';
    $data['profil']     = $this->db->get_where('useradmin', ['id_useradmin' => 1])->row_array();

    $this->load->view('admin/partials/header', $data);
    $this->load->view('admin/partials/nav');
    $this->load->view('admin/manajemen_data');
    $this->load->view('admin/partials/footer');
  }

  //controller profile (read)
  public function Profile()
  {
    // $data['user']       = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    $data['title']      = 'Profile - Admin Store';
    $data['profil']     = $this->db->get_where('useradmin', ['id_useradmin' => 1])->row_array();

    $this->load->view('admin/partials/header', $data);
    $this->load->view('admin/partials/nav');
    $this->load->view('admin/Profile');
    $this->load->view('admin/partials/footer');
  }

  // controller edit profile (update)
  public function EditProfile()
  {
    // menambah validasi form
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('nomor', 'Nomor Whatsapp', 'required|trim');

    // jika validasi salah
    if ($this->form_validation->run() == FALSE) {
      // membuat session penanda di frontend jika error
      $this->session->set_flashdata('penanda', '<div id="penanda">error</div>');
      $this->Profile();
    } else {
      // membuat variabel kosong yang nantinya akan diisi data gambar
      $data = '';
      // melakukan total gambar yg di upload
      // jika gambar tidak kosong maka
      if (!empty($_FILES['files']['name'])) {
        // membuat files dengan ketentuan sbb
        $_FILES['file']['name']     = $_FILES['files']['name'];
        $_FILES['file']['type']     = $_FILES['files']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
        $_FILES['file']['error']    = $_FILES['files']['error'];
        $_FILES['file']['size']     = $_FILES['files']['size'];

        // membuat config terhadap gambar yg diupload seperti maximal ukuran gambar, peletakan gambar yang diupload, dan namanya
        $config['upload_path']      = FCPATH . 'assets/';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';
        $config['max_size']         = '10000'; // max_size dalam satuan kb
        $config['overwrite']        = FALSE;
        $config['file_name']        = $_FILES['files']['name'];

        // init config tersebut
        $this->upload->initialize($config);
        // load upload library dari codeigniter
        $this->load->library('upload', $config);
        // jika dilakukan upload

        if ($this->upload->do_upload('file')) {
          $id = $this->input->post('id');
          // ngambil data produk sesuai id delete
          $dblist = $this->db->select('foto')->where('id_useradmin', $id)->get('useradmin')->row_array();
          // var_dump($dblist['foto']);
          // init file gambar pada folder yang tesimpan gambar2 nya
          $folder = "assets/" . $dblist['foto'];
          // jika terdapat file gambar pada folder, dilakukan delete
          if (file_exists($folder))
            unlink($folder);
          // mengambil data gambar
          $uploadData = $this->upload->data();
          $filename = $uploadData['file_name'];

          $data = $filename;
        }
        $this->am->EditProfile1($data);
      } else {
        $this->am->EditProfile2();
      }
      // menuju modal untuk dilakukan input pada database
      // membuat session penanda di frontend jika berhasil
      $this->session->set_flashdata('penanda', '<div id="penanda">success</div>');
      // redirect ke halaman manajemen data
      redirect('admin/Profile');
    }
  }

  // controller tambah produk (manajemen data)
  public function TambahProduk()
  {
    // menambah validasi form
    $this->form_validation->set_rules('nama_produk', 'Nama', 'required|trim');
    $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi', 'required|trim');
    $this->form_validation->set_rules('harga_produk', 'Harga', 'required|trim');

    // jika validasi salah
    if ($this->form_validation->run() == FALSE) {
      // membuat session penanda di frontend jika error
      $this->session->set_flashdata('penanda', '<div id="penanda">error</div>');
      // redirect('admin/ManajemenData');
      $this->ManajemenData();
    } else {
      // membuat variabel array kosong yang nantinya akan diisi data gambar
      $data = array();
      // melakukan total gambar yg di upload
      $countfiles = count($_FILES['files']['name']);
      // melakukan looping terhadap gambar yang diupload
      for ($i = 0; $i < $countfiles; $i++) {
        // jika gambar tidak kosong maka
        if (!empty($_FILES['files']['name'][$i])) {
          // membuat files dengan ketentuan sbb
          $_FILES['file']['name']     = $_FILES['files']['name'][$i];
          $_FILES['file']['type']     = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error']    = $_FILES['files']['error'][$i];
          $_FILES['file']['size']     = $_FILES['files']['size'][$i];

          // membuat config terhadap gambar yg diupload seperti maximal ukuran gambar, peletakan gambar yang diupload, dan namanya
          $config['upload_path']      = FCPATH . 'assets/produk/';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '10000'; // max_size in kb
          $config['overwrite']        = FALSE;
          $config['file_name']        = $_FILES['files']['name'][$i];

          // var_dump($_FILES['files']['name']);
          // init config tersebut
          $this->upload->initialize($config);
          // load upload library dari codeigniter
          $this->load->library('upload', $config);
          // jika dilakukan upload
          if ($this->upload->do_upload('file')) {
            // mengambil data gambar
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];

            // init gambar dan dimasukkan ke dalam variabel array kosong di atas tadi
            $data[] = $filename;
          }
        }
      }
      // menuju modal untuk dilakukan input pada database
      $this->am->TambahProdukModel($data);
      // membuat session penanda di frontend jika berhasil
      $this->session->set_flashdata('penanda', '<div id="penanda">success</div>');
      // redirect ke halaman manajemen data
      redirect('admin/ManajemenData');
    }
  }

  // controller hapus produk (manajemen data)
  public function HapusProduk($id)
  {
    // ngambil data produk sesuai id delete
    $dblist = $this->db->get_where('produk', ['id_produk' => $id])->row_array();
    // parse array ke json
    $unlink = json_decode($dblist['gambar']);
    // looping data di dalamnya, dan dilakukan delete gambar dari folder
    foreach ($unlink as $keys) {
      // init file gambar pada folder yang tesimpan gambar2 nya
      $folder = "assets/produk/" . $keys;
      // jika terdapat file gambar pada folder, dilakukan delete
      if (file_exists($folder))
        unlink($folder);
    }

    // delete data dari database
    $this->am->HapusProdukModel($id);
    // redirect ke halaman manajemen data
    redirect('admin/ManajemenData');
  }

  // controller edit produk (manajemen data)
  public function EditProduk()
  {
    // menambah validasi form
    $this->form_validation->set_rules('nama_produk', 'Nama', 'required|trim');
    $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi', 'required|trim');
    $this->form_validation->set_rules('harga_produk', 'Harga', 'required|trim');

    // jika validasi salah
    if ($this->form_validation->run() == FALSE) {
      // membuat session penanda di frontend jika error
      $idEdit = $this->input->post('id');
      $this->session->set_flashdata('idEdit', '<div id="idEdit">' . $idEdit . '</div>');
      // redirect('admin/ManajemenData');
      $this->ManajemenData($idEdit);
    } else {
      if ($this->upload->do_upload('file')) {
        $id = $this->input->post('id');
        // ngambil data produk sesuai id delete
        $dblist = $this->db->select('gambar')->where('id_produk', $id)->get('produk')->row_array();
        // parse array ke json
        $unlink = json_decode($dblist['gambar']);
        // looping data di dalamnya, dan dilakukan delete gambar dari folder
        foreach ($unlink as $keys) {
          // init file gambar pada folder yang tesimpan gambar2 nya
          $folder = "assets/produk/" . $keys;
          // jika terdapat file gambar pada folder, dilakukan delete
          if (file_exists($folder))
            unlink($folder);
        }
      }
      // membuat variabel array kosong yang nantinya akan diisi data gambar
      $data = array();
      // melakukan total gambar yg di upload
      $countfiles = count($_FILES['files']['name']);
      // melakukan looping terhadap gambar yang diupload
      for ($i = 0; $i < $countfiles; $i++) {
        // jika gambar tidak kosong maka
        if (!empty($_FILES['files']['name'][$i])) {
          // membuat files dengan ketentuan sbb
          $_FILES['file']['name']     = $_FILES['files']['name'][$i];
          $_FILES['file']['type']     = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error']    = $_FILES['files']['error'][$i];
          $_FILES['file']['size']     = $_FILES['files']['size'][$i];

          // membuat config terhadap gambar yg diupload seperti maximal ukuran gambar, peletakan gambar yang diupload, dan namanya
          $config['upload_path']      = FCPATH . 'assets/produk/';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '10000'; // max_size dalam satuan kb
          $config['overwrite']        = FALSE;
          $config['file_name']        = $_FILES['files']['name'][$i];

          // init config tersebut
          $this->upload->initialize($config);
          // load upload library dari codeigniter
          $this->load->library('upload', $config);
          // jika dilakukan upload

          if ($this->upload->do_upload('file')) {
            // mengambil data gambar
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];

            // init gambar dan dimasukkan ke dalam variabel array kosong di atas tadi
            $data[] = $filename;
          }
          $this->am->EditProdukModel1($data);
        } else {
          $this->am->EditProdukModel2();
        }
      }
      // menuju modal untuk dilakukan input pada database
      // membuat session penanda di frontend jika berhasil
      $this->session->set_flashdata('penanda', '<div id="penanda">success</div>');
      // redirect ke halaman manajemen data
      redirect('admin/ManajemenData');
    }
  }
// ganti password
  public function ChangePassword()
  {
    $data['title']      = 'Change Password - Admin Store';
    $data['profil']     = $this->db->get_where('useradmin', ['id_useradmin' => 1])->row_array();

    $this->form_validation->set_rules('oldpassword', 'Password Lama', 'required|trim');
    $this->form_validation->set_rules(
      'newpassword',
      'Password Baru',
      'required|trim|min_length[5]|matches[repeatpassword]'
    );
    $this->form_validation->set_rules('repeatpassword', 'Ulangi Password', 'required|trim|matches[newpassword]');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/partials/header', $data);
      $this->load->view('admin/partials/nav');
      $this->load->view('admin/change_password');
      $this->load->view('admin/partials/footer');
    } else {
      $current_password   = $this->input->post('oldpassword');
      $new_password       = $this->input->post('newpassword');
      if (!password_verify($current_password, $data['profil']['password'])) {
        $this->session->set_flashdata('message', '<div id="penanda">salah</div>');
        redirect('admin/ChangePassword');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('message', '<div id="penanda">sama</div>');
          redirect('admin/ChangePassword');
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('id_useradmin', 1);
          $this->db->update('useradmin');

          $this->session->set_flashdata('message', '<div id="penanda">success</div>');
          redirect('admin/ChangePassword');
        }
      }
    }
  }

  // controller logout
  public function logout()
  {
    $this->session->unset_userdata('id');
    $this->session->unset_userdata('username');

    $this->session->set_flashdata('message', '<div hidden id="penanda">succesLogout</div>');
    redirect('auth');
  }
}
