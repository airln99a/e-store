<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
  <div class="row px-xl-5 pt-5">
    <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
      <a href="" class="text-decoration-none">
        <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
      </a>
      <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
      <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>mitrajayacolection@gmail.com</p>
      <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
    </div>
    <div class="col-lg-8 col-md-12">
      <div class="row">
        <div class="col-md-4 mb-5">
          <h5 class="font-weight-bold text-dark mb-4">Pintasan</h5>
          <div class="d-flex flex-column justify-content-start">
            <a class="text-dark mb-2" href="<?= base_url('landing') ?>"><i class="fa fa-angle-right mr-2"></i>Home</a>
            <a class="text-dark mb-2" href="<?= base_url('landing/produk') ?>"><i class="fa fa-angle-right mr-2"></i>Toko</a>
            <a class="text-dark" href="<?= base_url('landing/tentang') ?>"><i class="fa fa-angle-right mr-2"></i>Tentang Kami</a>
          </div>
        </div>
        <div class="col-lg-8 col-md-12">
          <h5 class="font-weight-bold text-dark mb-4">Tanyakan sesuatu?</h5>
          <form action="">

            <div>
              <button class="btn btn-primary btn-block border-0 py-3" type="submit" id="tanyakan">Klik disini</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row border-top border-light mx-xl-5 py-4">
    <div class="col-md-6 px-xl-0">
      <p class="mb-md-0 text-center text-md-left text-dark">
        &copy; <a class="text-dark font-weight-semi-bold" href="#">Store</a>. Copyright 2023 - All Rights Reserved
      </p>
    </div>
    <div class="col-md-6 px-xl-0 text-center text-md-right">
      <img class="img-fluid" src="<?= base_url('assets/landing/img/payments.png') ?>" alt="">
    </div>
  </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/landing/lib/easing/easing.min.js') ?>"></script>
<script src="<?= base_url('assets/landing/lib/owlcarousel/owl.carousel.min.js') ?>"></script>

<!-- Contact Javascript File -->
<script src="<?= base_url('assets/landing/mail/jqBootstrapValidation.min.js') ?>"></script>
<script src="<?= base_url('assets/landing/mail/contact.js') ?>"></script>

<!-- Template Javascript -->
<script src="<?= base_url('assets/landing/js/main.js') ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script>
  $(document).ready(function() {
    $("#tanyakan").click(function() {
      window.open(`https://wa.me/6285954588332?text=Halo,%20Saya%20mau%20bertanya%20`)
    })
  })
</script>

</body>

</html>