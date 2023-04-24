 <div class="preloader">
   <div class="lds-ripple">
     <div class="lds-pos"></div>
     <div class="lds-pos"></div>
   </div>
 </div>
 <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
   <header class="topbar" data-navbarbg="skin6">
     <nav class="navbar top-navbar navbar-expand-md navbar-dark">
       <div class="navbar-header" data-logobg="skin6">
         <a class="navbar-brand ms-4" href="index.html">
           <b class="logo-icon">
             <img src="<?= base_url('assets/admin/assets/images/logo-light-icon.png') ?>" alt="homepage" class="dark-logo" />

           </b>
           <span class="logo-text">
             <img src="<?= base_url('assets/admin/assets/images/logo-light-text.png') ?>" alt="homepage" class="dark-logo" />

           </span>
         </a>
         <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
       </div>
       <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
         <ul class="navbar-nav d-lg-none d-md-block ">
           <li class="nav-item">
             <a class="nav-toggler nav-link waves-effect waves-light text-white " href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
           </li>
         </ul>
         <ul class="navbar-nav me-auto mt-md-0 ">
         </ul>
         <ul class="navbar-nav">
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <img src="<?= base_url('assets/') . $profil['foto']  ?>" alt="user" class="profile-pic me-2" style="height: 30px;"><?= $profil['nama_lengkap'] ?>
             </a>
             <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
           </li>
         </ul>
       </div>
     </nav>
   </header>

   <aside class="left-sidebar" data-sidebarbg="skin6">
     <div class="scroll-sidebar">
       <nav class="sidebar-nav">
         <ul id="sidebarnav">
           <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin') ?>" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span class="hide-menu">Dashboard</span></a></li>
           <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/Profile') ?>" aria-expanded="false">
               <i class="mdi me-2 mdi-account-edit"></i><span class="hide-menu">Profile</span></a>
           </li>
           <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/ChangePassword') ?>" aria-expanded="false">
               <i class="mdi me-2 mdi-security"></i><span class="hide-menu">Change Password</span></a>
           </li>
           <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/ManajemenData') ?>" aria-expanded="false"><i class="mdi me-2 mdi-table"></i><span class="hide-menu">Management</span></a></li>
           </li>
           <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/logout') ?>" aria-expanded="false"><i class="mdi me-2 mdi-power"></i><span class="hide-menu">Logout</span></a></li>
           </li>
         </ul>
       </nav>
     </div>
   </aside>