  <!-- Featured Start -->
  <div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
          <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
          <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
          <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
          <h5 class="font-weight-semi-bold m-0">Fast Shipping</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
          <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
          <h5 class="font-weight-semi-bold m-0">Possible Return</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
          <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
          <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
        </div>
      </div>
    </div>
  </div>
  <!-- Featured End -->


  <!-- Categories Start -->
  <div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
      <?php
      foreach ($produk as $p) : ?>
        <div class="col-lg-4 col-md-6 pb-1 data-card-show" data-id="<?= $p['id_produk'] ?>">
          <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
            <a href="<?= base_url('landing/produk') ?>" class="cat-img position-relative overflow-hidden mb-3">
              <?php $process = json_decode($p['gambar']); ?>
              <img style="width: fit-content; height: 306px;" class="img-fluid d-flex m-auto" src="<?= base_url('assets/produk/') . $process[0]  ?>"></img>
            </a>
            <h5 class="font-weight-semi-bold m-0 text-center"><?= $p['nama_produk'] ?></h5>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- Categories End -->

  <script>
    $(document).ready(function() {})
  </script>