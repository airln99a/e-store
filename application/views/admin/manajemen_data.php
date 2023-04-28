<?= $this->session->flashdata('penanda');
unset($_SESSION['penanda']); ?>
<?= $this->session->flashdata('idEdit');
unset($_SESSION['idEdit']); ?>
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row align-items-center">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="page-title mb-0 p-0">Data Produk</h3>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Management</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
              <button type="button" class="btn btn-outline-primary" id="tambah-produk">Tambah Produk</button>
            </div>
            <div class="table-responsive">
              <table id="tabel" class="table hover" style="table-layout:fixed;">
                <thead>
                  <tr>
                    <th style="max-width: 25px;" class="border-top-0">No</th>
                    <th class="border-top-0">Nama Produk</th>
                    <th class="border-top-0">Harga</th>
                    <th class="border-top-0">Deskripsi</th>
                    <th style="max-width: 75px;" class="border-top-0">Status</th>
                    <th class="border-top-0">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($produk as $p) : ?>

                    <tr>
                      <td style="max-width: 25px;"><?= $i; ?></td>
                      <td><?= $p['nama_produk']; ?></td>
                      <td>Rp. <?= $p['harga']; ?></td>
                      <div class="encode-gambar" hidden><?= $p['gambar']; ?></div>
                      <td><?= $p['deskripsi']; ?></td>
                      <td style="max-width: 75px;">
                        <?php
                        if ($p['status'] == 1) {
                        ?>
                          <span class="badge bg-success">Aktif</span>
                        <?php
                        } else {
                        ?>
                          <span class="badge bg-warning">Tidak Aktif</span>
                        <?php
                        } ?>
                      </td>
                      <td align="center">
                        <button type="button" data-slick=<?= $p['gambar'] ?> data-id="<?= $p['id_produk']; ?>" data-status="<?= $p['status']; ?>" class="btn waves-effect waves-light btn-info btn-sm mdi mdi-file-document-box lihat-produk text-white">Lihat</button>
                        <button type="button" data-slick=<?= $p['gambar'] ?> data-id="<?= $p['id_produk']; ?>" data-status="<?= $p['status']; ?>" class="btn waves-effect waves-light btn-warning btn-sm mdi mdi-table-edit edit-produk text-white">Edit</button>
                        <button type="button" data-id="<?= $p['id_produk']; ?>" class="btn waves-effect waves-light btn-danger btn-sm mdi mdi-delete-forever hapus-produk text-white">Hapus</button>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Full width modal content -->
  <div class="modal fade" id="full-width-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="fullWidthModalLabel">Tambah Produk</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('admin/TambahProduk') ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Produk</label>
              <input type="text" class="form-control" name="nama_produk" aria-describedby="emailHelp" value="<?= set_value('nama_produk') ?>">
              <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi_produk" aria-describedby="emailHelp" value="<?= set_value('deskripsi_produk') ?>">
                  <?= form_error('deskripsi_produk', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Foto Produk</label>
                  <input type="file" class="form-control" name="files[]" multiple aria-describedby="emailHelp">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Harga Produk</label>
              <div class="d-flex flex-row align-items-center" style="gap: 10px">
                <label for="exampleInputEmail1">Rp.</label>
                <input type="text" class="form-control" id="harga-produk" name="harga_produk" aria-describedby="emailHelp" value="<?= set_value('harga_produk') ?>">
              </div>
              <?= form_error('harga_produk', '<small class="text-danger pl-3">', '</small>') ?>

            </div>
        </div>
        <div class="modal-footer">
          <button id="close-form" type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Close</button>
          <button id="submit-form" type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- Long Content Scroll Modal -->
  <?php foreach ($produk as $p) : ?>
    <div class="modal fade" id="scrollable-modal<?= $p['id_produk']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="scrollableModalTitle">Edit Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="overflow-x: hidden;">
            <form method="post" action="<?= base_url('admin/EditProduk') ?>" enctype="multipart/form-data">
              <input type="text" class="form-control id" name="id" hidden aria-describedby="emailHelp" id="id" value="<?= $p['id_produk']; ?>">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" aria-describedby="emailHelp" value="<?= $p['nama_produk']; ?>">
                <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <textarea style="height: 200px;" type="text" class="form-control" name="deskripsi_produk" aria-describedby="emailHelp"><?= $p['deskripsi']; ?></textarea>
                    <?= form_error('deskripsi_produk', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Foto Produk</label>
                    <div class="encode-gambar-edit" hidden><?= $p['gambar']; ?></div>
                    <input type="text" class="form-control encode-gambar" name="encode-gambar" hidden aria-describedby="emailHelp" value=<?= $p['gambar'];  ?>>
                    <div class="slick"></div>
                    <input type="file" class="form-control" name="files[]" multiple aria-describedby="emailHelp">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Harga Produk</label>
                <div class="d-flex flex-row align-items-center" style="gap: 10px">
                  <label for="exampleInputEmail1">Rp.</label>
                  <input type="text" class="form-control" id="harga-produk-edit" name="harga_produk" aria-describedby="emailHelp" value="<?= $p['harga'];  ?>">
                </div>
                <?= form_error('harga_produk', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="form-group d-flex flex-column" id="status-produk">
                <label for="exampleInputEmail1">Ketersediaan Produk</label>
                <select class="aktif-produk" name="status">
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button id="close-form" type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Close</button>
            <button id="submit-form" type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
  <?php endforeach; ?>

  <!-- /.modal-dialog -->
</div>

<script>
  let penanda = $("#penanda").html();
  let idEdit = $("#idEdit").html();
  let idHapus;

  $(document).ready(function() {
    // init data tabel
    $("#tabel").DataTable();

    $('.aktif-produk').select2({
      minimumResultsForSearch: -1
    });

    // trigger tambah produk
    $("#tambah-produk").click(function() {
      $("#full-width-modal").modal("show")
    })

    // tambah separator pada harga produk
    $("#harga-produk, #harga-produk-edit").keyup(function() {
      // set value hanya angka ketika input
      this.value = this.value.replace(/\D/g, '');

      // jika inputan tidak kosong, akan dicek angka pertama untuk dilakukan penambahan separator titik tiap puluhan/ratusan/ribuan/dst
      if (this.value != "") {
        index = this.value.split('.');
        index[0] = (parseInt(index[0], 10)).toLocaleString('en-DE');
        this.value = index.join('.');
      }
    })

    // jika terdapat error pada validasi...
    if (penanda == "error") {
      //untuk trigger modal agar user mengetahui text form validasi inputan error, karena modal ketika di refresh tidak terbuka secara otomatis by default
      $("#tambah-produk").trigger("click")

      // reset url
      $("body").on("click", "#close-form, .btn-close", function() {
        location.href = "<?= site_url('admin/ManajemenData') ?>"
      })
    }
    if (idEdit) {
      //untuk trigger modal agar user mengetahui text form validasi inputan error, karena modal ketika di refresh tidak terbuka secara otomatis by default
      $(`#scrollable-modal${idEdit}`).modal("show")

      let valueArray = JSON.parse($(`#scrollable-modal${idEdit}`).find(".encode-gambar-edit").html());
      let html = ""
      valueArray.forEach(element => {
        html += `
            <img class="data-image" src="<?= base_url('assets/produk/') ?>${element}"></img>
          `
      });
      $(".slick").html(html)

      $(".data-image").css({
        height: "165px",
      })

      setTimeout(() => {
        callSlick();
      }, 1000);
      // reset url
      $("body").on("click", "#close-form, .btn-close", function() {
        location.href = "<?= site_url('admin/ManajemenData') ?>"
      })
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

    // fungsi menampilkan modal delete dan ngambil id produknya untuk dikirim ke controller
    const hapusProduk = () => {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Apakah anda yakin?',
        text: "Data produk yang terhapus tidak dapat dikembalikan ulang!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire(
            'Deleted!',
            'Data produk anda terhapus !',
            'success'
          )
          setTimeout(() => {
            window.location.href = `<?= site_url('admin/HapusProduk/') ?>${idHapus}`
          }, 2000);
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Data produk anda gagal dihapus !',
            'error'
          )
        }
      })
    }

    $(".hapus-produk").click(function() {
      idHapus = $(this).data("id")
      hapusProduk()
    })

    const callSlick = () => {
      $(".slick").slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1
      });
    }

    // edit
    $(".edit-produk").click(function() {
      let idProduk = $(this).data("id")
      let status = $(this).data("status")
      $(`#scrollable-modal${idProduk}`).modal("show")

      $(`#scrollable-modal${idProduk}`).find("#scrollableModalTitle").html("Edit Produk")
      $(`#scrollable-modal${idProduk}`).find(".modal-footer,input:file, small#emailHelp").show()
      $(`#scrollable-modal${idProduk}`).find("#status-produk").addClass("d-flex")
      $(`#scrollable-modal${idProduk}`).find("#status-produk").show()


      $(`#scrollable-modal${idProduk}`).find(".form-control").removeAttr("disabled")

      $(`#scrollable-modal${idProduk}`).find(".aktif-produk").val(status).trigger("change");
      $("#id-produk").html(idProduk)

      let valueArray = $(this).data("slick");
      let html = ""
      valueArray.forEach(element => {
        html += `
            <img class="data-image" src="<?= base_url('assets/produk/') ?>${element}"></img>
          `
      });
      $(".slick").html(html)

      $(`#scrollable-modal${idProduk}`).find(".data-image").css({
        height: "165px",
      })

      setTimeout(() => {
        callSlick();
      }, 1000);
    })

    $("body").on("click", ".btn-close, #close-form", function() {
      $(".slick").html("")
      $(".slick").removeClass("slick-initialized slick-slider")
    })

    // read
    $(".lihat-produk").click(function() {
      let idProduk = $(this).data("id")
      $(`#scrollable-modal${idProduk}`).modal("show")

      $(`#scrollable-modal${idProduk}`).find("#scrollableModalTitle").html("Lihat Produk")
      $(`#scrollable-modal${idProduk}`).find(".modal-footer,input:file, small#emailHelp").hide()
      $(`#scrollable-modal${idProduk}`).find("#status-produk").removeClass("d-flex")
      $(`#scrollable-modal${idProduk}`).find("#status-produk").hide()

      $(`#scrollable-modal${idProduk}`).find(".form-control").attr("disabled", true)

      $("#id-produk").html(idProduk)

      let valueArray = $(this).data("slick");
      let html = ""
      valueArray.forEach(element => {
        html += `
            <img class="data-image" src="<?= base_url('assets/produk/') ?>${element}"></img>
          `
      });
      $(".slick").html(html)


      $(`#scrollable-modal${idProduk}`).find(".data-image").css({
        height: "200px",
      })

      setTimeout(() => {
        callSlick();
      }, 1000);
    })
  });
</script>