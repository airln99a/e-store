<?= $this->session->flashdata('message');
unset($_SESSION['message']); ?>
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row align-items-center">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="page-title mb-0 p-0">Change Password</h3>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Change Password</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal form-material mx-2" method="post" action="<?= base_url('admin/ChangePassword') ?>">
              <div class="form-group">
                <label class="col-md-12 mb-0">Password Lama</label>
                <div class="col-md-12">
                  <input type="password" class="form-control ps-0 form-control-line" name="oldpassword" id="pw-lama" placeholder="Masukkan Password Lama">
                  <?= form_error('oldpassword', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">Password Baru</label>
                <div class="col-md-12">
                  <input type="password" class="form-control ps-0 form-control-line" name="newpassword" id="pw-baru" placeholder="Masukkan Password Baru">
                  <?= form_error('newpassword', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">Ulangi Password Baru</label>
                <div class="col-md-12">
                  <input type="password" class="form-control ps-0 form-control-line" name="repeatpassword" id="r-pw-baru" placeholder="Masukkan Ulangi Password Baru">
                  <?= form_error('repeatpassword', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12 d-flex justify-content-end">
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
  $(document).ready(function() {
    let penanda = $("#penanda").html();

    if (penanda == "success") {
      console.log("success")
      Swal.fire(
        'Data berhasil diubah!',
        'Password anda berhasil diganti',
        'success'
      )
    }
    if (penanda == "salah") {
      console.log("salah")
      Swal.fire(
        'Password Salah!',
        'Password yang anda inputkan salah',
        'error'
      )
    }
    if (penanda == "sama") {
      console.log("sama")
      Swal.fire(
        'Password sama?',
        'Password kini sama seperti sebelumnya',
        'question'
      )
    }
  })
</script>