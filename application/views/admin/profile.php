<?= $this->session->flashdata('penanda');
unset($_SESSION['penanda']); ?>
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row align-items-center">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="page-title mb-0 p-0">Profile</h3>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <!-- Column -->
      <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
          <div class="card-body profile-card">
            <center class="mt-4"> <img src="<?= base_url('assets/') . $profil['foto']  ?>" class="rounded-circle" style="width: 150px; height: 150px;" />
              <h4 class="card-title mt-2"><?= $profil['nama_lengkap'] ?></h4>
              <h6 class="card-subtitle">Admin Store</h6>
              <div class="row text-center justify-content-center">
                <div class="col-8">
                  <a href="javascript:void(0)" class="link">
                    <i class="mdi mdi-whatsapp" aria-hidden="true"></i>
                    <span class="value-digit"><?= $profil['no_wa'] ?></span>
                  </a>
                </div>
              </div>
            </center>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal form-material mx-2" method="post" action="<?= base_url('admin/EditProfile') ?>" enctype="multipart/form-data">
              <input hidden type="text" class="form-control ps-0 form-control-line" name="id" id="id_admin" value="<?= $profil['id_useradmin'] ?>">
              <div class="form-group">
                <label class="col-md-12 mb-0">Nama Lengkap</label>
                <div class="col-md-12">
                  <input type="text" class="form-control ps-0 form-control-line" name="nama" id="nama_admin" value="<?= $profil['nama_lengkap'] ?>">
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">Email</label>
                <div class="col-md-12">
                  <input type="email" placeholder="johnathan@admin.com" class="form-control ps-0 form-control-line" name="email" id="email_admin" value="<?= $profil['email'] ?>">
                  <?= form_error('umur', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">Alamat</label>
                <div class="col-md-12">
                  <input type="text" placeholder="johnathan@admin.com" class="form-control ps-0 form-control-line" name="alamat" id="" value="<?= $profil['alamat'] ?>">
                  <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">Nomor Whatsapp</label>
                <div class="col-md-12">
                  <input type="text" placeholder="johnathan@admin.com" class="form-control ps-0 form-control-line" name="nomor" id="nomor_admin" value="<?= $profil['no_wa'] ?>" maxlength="14">
                  <?= form_error('nomor', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 mb-0">Foto</label>
                <div class="col-md-12">
                  <input type="file" class="form-control" name="files" multiple aria-describedby="emailHelp">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12 d-flex">
                  <button class="btn btn-success mx-auto mx-md-0 text-white">Update
                    Profile</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  let penanda = $("#penanda").html();
  let idEdit = $("#idEdit").html();
  let idHapus;

  $(document).ready(function() {
    // init data tabel
    $("#tabel").DataTable();

    // tambah separator pada harga produk
    $("#nomor_admin").keyup(function() {
      // set value hanya angka ketika input
      this.value = this.value.replace(/\D/g, '');
    })

    // jika terdapat error pada validasi...
    if (penanda == "error") {
      const successInput = () => {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Terdapat kesalahan data!'
        })
      }
      setTimeout(() => {
        successInput()
      }, 1500);
    }
    if (penanda === "success") {
      const successInput = () => {
        Swal.fire({
          icon: 'success',
          title: 'Data telah tersimpan !',
          showConfirmButton: false,
          timer: 2000,
          showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          }
        })
      }
      setTimeout(() => {
        successInput()
      }, 1500);
    }
  });
</script>