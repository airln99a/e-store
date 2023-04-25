<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title><?= $title ?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="<?= base_url('assets/login/css/mdb.min.css') ?>" />
  <script src="<?= base_url('assets/admin/assets/plugins/jquery/dist/jquery.min.js') ?>"></script>

</head>

<body>
  <!--Main Navigation-->
  <header>
    <style>
      #intro {
        background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
        height: 100vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" target="_blank" href="landing">
          <strong>Store</strong>
        </a>

      </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form class="bg-white rounded shadow-5-strong p-5" method="post" action="<?= base_url('auth/login') ?>">
                <?php echo $this->session->flashdata('message');
                unset($_SESSION['message']); ?>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="email_login" class="form-control" />
                  <label class="form-label" for="form1Example1">Email address</label>
                  <?= form_error('email', '<small class="text-danger pl-3" style="margin-left: 13px;">', '</small>') ?>
                </div>


                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="password_login" class="form-control" />
                  <label class="form-label" for="form1Example2">Password</label>
                  <?= form_error('password', '<small class="text-danger pl-3" style="margin-left: 13px;">', '</small>') ?>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  </footer>
  <!--Footer-->
  <!-- MDB -->
  <script type="text/javascript" src="<?= base_url('assets/login/js/mdb.min.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    $(document).ready(function() {
      let penanda = $("#penanda").html();

      if (penanda == "succesLogout") {
        Swal.fire(
          'Success!',
          'Berhasil melakukan logout!',
          'success'
        )

        setTimeout(() => {
          location.href = "<?= base_url('landing') ?>"
        }, 2000);
      }
    })
  </script>
</body>

</html>