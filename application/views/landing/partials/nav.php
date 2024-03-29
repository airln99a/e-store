<!-- Topbar Start -->
<div class="row align-items-center py-3 px-xl-5">
  <div class="col-lg-3 d-none d-lg-block">
    <a href="" class="text-decoration-none">
      <h5 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Toko</span>Mitra Jaya Collection </h5>
    </a>
  </div>
</div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid mb-5">
  <div class="row border-top px-xl-5">
    <div class="col-lg-12">
      <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
          <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
          <div class="navbar-nav mr-auto py-0">
            <a href="<?= base_url('landing') ?>" class="nav-item nav-link <?= $aktif == 'landing' ? 'active' : '' ?>">Home</a>
            <a href="<?= base_url('landing/produk') ?>" class="nav-item nav-link <?= $aktif == 'produk' ? 'active' : '' ?>">Produk</a>
            <a href="<?= base_url('landing/tentang') ?>" class="nav-item nav-link <?= $aktif == 'tentang' ? 'active' : '' ?>">Tentang Kami</a>
          </div>
          <div class="navbar-nav ml-auto py-0">
            <a href="<?= base_url('auth') ?>" class="nav-item nav-link">Login</a>
          </div>
        </div>
      </nav>
      <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" style="height: 410px;">
            <img class="img-fluid" src="<?= base_url('assets/landing/img/carousel-1.jpg') ?>" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
              <div class="p-3" style="max-width: 700px;">
                <h4 class="text-light text-uppercase font-weight-medium mb-3">Get your product</h4>
                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Outfit</h3>
              </div>
            </div>
          </div>
          <div class="carousel-item" style="height: 410px;">
            <img class="img-fluid" src="<?= base_url('assets/landing/img/carousel-2.jpg') ?>" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
              <div class="p-3" style="max-width: 700px;">
                <h4 class="text-light text-uppercase font-weight-medium mb-3">Choose your product</h4>
                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
          <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
          </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
          <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Navbar End -->