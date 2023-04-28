   <?php
    error_reporting(0);
    ?>
   <?= $this->session->flashdata('penanda');
    unset($_SESSION['penanda']); ?>
   <!-- Shop Product Start -->
   <div class="col-lg-12 col-md-12">
     <div class="row pb-3 m-auto">
       <div class="col-12 pb-1">
         <div class="mb-4">
           <form action="">
             <div class="input-group">
               <input type="text" id="search-data" class="form-control" placeholder="Cari berdasarkan nama produk" style="border-right: none;">
               <div class="input-group-append">
                 <span class="input-group-text bg-transparent text-primary">
                   <i class="fa fa-search"></i>
                 </span>
               </div>
             </div>
           </form>
         </div>
       </div>
       <?php
        foreach ($produk as $p) : ?>
         <div class="col-lg-4 col-md-6 col-sm-12 pb-1 list-produk">
           <div class="card product-item border-0 mb-4">
             <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
               <?php $process = json_decode($p['gambar']); ?>
               <img style="height: 474px; width: fit-content;" class="img-fluid w-100" src="<?= base_url('assets/produk/') . $process[0]  ?>" alt="">
             </div>
             <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
               <h6 class="text-truncate mb-3 nama-produk"><?= $p['nama_produk'] ?></h6>
               <div class="d-flex justify-content-center">
                 <h6>Rp. <?= $p['harga'] ?></h6>
               </div>
             </div>
             <div class="card-footer d-flex justify-content-between bg-light border">
               <a class="btn btn-sm text-dark p-0 lihat-produk" data-slick=<?= $p['gambar'] ?> data-id="<?= $p['id_produk'] ?>"><i class=" fas fa-eye text-primary mr-1"></i>Lihat Detail</a>
               <a class="btn btn-sm text-dark p-0 chat-whatsapp" data-title="<?= $p['nama_produk'] ?>"><i class="fas fa-shopping-cart text-primary mr-1"></i>Beli Sekarang</a>
             </div>
           </div>
         </div>
       <?php endforeach; ?>

       <div class="col-12 pb-1">
         <?= $this->pagination->create_links(); ?>
       </div>
     </div>
   </div>
   <!-- Shop Product End -->
   </div>
   </div>

   <!--  Modal content for the above example -->
   <?php foreach ($produk as $p) : ?>
     <div class="modal fade" id="detail-produk-<?= $p['id_produk'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg">
         <div class="modal-content">
           <div class="modal-body">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
             <!-- Shop Detail Start -->
             <div class="container-fluid">
               <div class="row px-xl-5" style="padding-right: 0px !important; padding-left: 0px !important;">
                 <div class="col-lg-5 pb-5" style="padding-bottom: 0px !important;">
                   <div id="product-carousel" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner border fill-gambar">

                     </div>
                   </div>
                 </div>

                 <div class="col-lg-7 pb-5">
                   <h3 class="font-weight-semi-bold"><?= $p['nama_produk'] ?></h3>
                   <h3 class="font-weight-semi-bold mb-4">Rp. <?= $p['harga'] ?></h3>
                   <p class="mb-4"><?= $p['deskripsi'] ?></p>
                 </div>
               </div>
             </div>
             <!-- Shop Detail End -->
           </div>
         </div>
         <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
     </div>
   <?php endforeach; ?>

   <!-- Shop End -->
   <script>
     $(document).ready(function() {
       // fungsi pencarian
       $("#search-data").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $(".nama-produk").filter(function() {
           $(this).parents('.list-produk').toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
       });

       //  chat wa
       $(".chat-whatsapp").click(function() {
         let produk = $(this).data("title")
         window.open(`https://wa.me/6285954588332?text=Nama :%0aAlamat pengiriman : %0aNama Produk :%20${produk}%0aJumlah :`)
       })

       //  lihat detail
       $(".lihat-produk").click(function() {
         let idProduk = $(this).data("id")
         $(`#detail-produk-${idProduk}`).modal("show")

         let valueArray = $(this).data("slick");
         let html = ""
         valueArray.forEach(element => {
           html += `
            <div class="carousel-item">
              <img class="w-100 h-100" src="<?= base_url('assets/produk/') ?>${element}" alt="Image">
            </div>
          `
         });
         $(".fill-gambar").html(html)

         setTimeout(() => {
           callSlick();
         }, 1000);
       })

       const callSlick = () => {
         $(".fill-gambar").slick({
           infinite: true,
           speed: 300,
           dots: true,
           arrows: true,
           slidesToShow: 1,
           slidesToScroll: 1,
           prevArrow: `<a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                       <i class="fa fa-2x fa-angle-left text-dark"></i>
                     </a>`,
           nextArrow: `<a class="carousel-control-next" href="#product-carousel" data-slide="next">
                       <i class="fa fa-2x fa-angle-right text-dark"></i>
                     </a>`

         });

         $(".slick-dots").css("margin-bottom", "35px")
         $(".modal").css("margin-top", "50px")
       }

       $("body").on("click", "button.close", function() {
         $(".fill-gambar").html("")
         $(".fill-gambar").removeClass("slick-initialized slick-slider")
       })

       let value = $("#penanda").html()
       if(value == "nodata"){
        $("#search-data").parent(".input-group").hide()
        $("form").append(`
              <h1 class="d-flex justify-content-center">Belum ada data Produk ditemukan !</h1>
          `)
       }
     });
   </script>