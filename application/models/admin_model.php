<?php
date_default_timezone_set('Asia/Jakarta');

class admin_model extends CI_Model
{
  //model tambah produk ke database
  public function TambahProdukModel($data)
  {
    $data = [
      "nama_produk"     => $this->input->post('nama_produk'),
      "deskripsi"       => $this->input->post('deskripsi_produk'),
      "harga"           => $this->input->post('harga_produk'),
      "gambar"          => json_encode(array_values($data)),
      "status"          => 1
    ];
    $this->db->insert('produk', $data);
  }

  //model edit profil dalam database
  public function EditProfile1($data)
  {
    $id = $this->input->post('id');
    $data = [
      "nama_lengkap"    => $this->input->post('nama'),
      "email"           => $this->input->post('email'),
      "alamat"          => $this->input->post('alamat'),
      "no_wa"           => $this->input->post('nomor'),
      "foto"            => $data
    ];
    $this->db->where('id_useradmin', $id);
    $this->db->update('useradmin', $data);

    // var_dump($data);
  }
  public function EditProfile2()
  {
    $id = $this->input->post('id');
    $data = [
      "nama_lengkap"     => $this->input->post('nama'),
      "email"            => $this->input->post('email'),
      "alamat"           => $this->input->post('alamat'),
      "no_wa"            => $this->input->post('nomor')
    ];
    $this->db->where('id_useradmin', $id);
    $this->db->update('useradmin', $data);

    // var_dump($data);
  }

  //model edit produk dalam database
  public function EditProdukModel1($data)
  {
    $id = $this->input->post('id');
    $data = [
      "nama_produk"     => $this->input->post('nama_produk'),
      "deskripsi"       => $this->input->post('deskripsi_produk'),
      "harga"           => $this->input->post('harga_produk'),
      "gambar"          => json_encode(array_values($data)),
      "status"          => $this->input->post('status')
    ];
    $this->db->where('id_produk', $id);
    $this->db->update('produk', $data);

    // var_dump($data);
  }
  public function EditProdukModel2()
  {
    $id = $this->input->post('id');
    $data = [
      "nama_produk"     => $this->input->post('nama_produk'),
      "deskripsi"       => $this->input->post('deskripsi_produk'),
      "harga"           => $this->input->post('harga_produk'),
      "gambar"          => $this->input->post('encode-gambar'),
      "status"          => $this->input->post('status')
    ];
    $this->db->where('id_produk', $id);
    $this->db->update('produk', $data);

    // var_dump($data);
  }

  //model hapus produk dari database
  public function HapusProdukModel($id)
  {
    $this->db->where('id_produk', $id);
    $this->db->delete('produk');
  }
}
