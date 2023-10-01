<?php
session_start();

include 'components/connect.php';


if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tentang Kami</title>

   <!-- Icon -->
   <link href="images/fav.png" rel="icon">

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.2/css/boxicons.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="about">

      <div class="row">

         <div class="image">
            <img src="images/about.png" alt="">
         </div>

         <div class="content">
            <h3>Kenapa Createphoto?</h3>
            <p>Createphoto adalah platform undangan pernikahan online dan digital yang dapat dibagikan secara online kepada seluruh tamu undangan dimanapun dan kapanpun. Createphoto selalu menyediakan jasa undangan pernikahan online bagus dan berkualitas.</p>
            <a href="contact.php" class="btn">Hubungi kami</a>
         </div>
      </div>

   </section>

   <section class="reviews">

      <h1 class="heading">Review</h1>

      <div class="swiper reviews-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <!-- <img src="images/empty.png" alt=""> -->
               <p>Keren banget! Gamau tau ini keren banget pokoknya</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
               <h3>Khoirul</h3>
            </div>

            <div class="swiper-slide slide">
               <!-- <img src="images/empty.png" alt=""> -->
               <p>"Alhamdulillah, Makasih min🙏🏻 makasih juga responnya mantepp👍🏻".</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
               <h3>Imam</h3>
            </div>

            <div class="swiper-slide slide">
               <!-- <img src="images/empty.png" alt=""> -->
               <p>"smoga lancar terus usaha kaka, undangan digital nikah sangat membantu🙏"</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>Stella</h3>
            </div>

            <div class="swiper-slide slide">
               <!-- <img src="images/empty.png" alt=""> -->
               <p>"Suka bnget sma undangannya kk😍 suka bnget dgn undangan video in,,adminnya ramah..".</p>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <h3>Dela</h3>
            </div>


         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>








   <?php include 'components/whatsapp.php'; ?>
   <?php include 'components/footer.php'; ?>

   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script src="js/script.js"></script>

   <!-- navbar awal-->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
   <script>
      $(document).ready(function() {
         $("#sidebarCollapse").on("click", function() {
            $("#sidebar").addClass("active");
         });

         $("#sidebarCollapseX").on("click", function() {
            $("#sidebar").removeClass("active");
         });

         $("#sidebarCollapse").on("click", function() {
            if ($("#sidebar").hasClass("active")) {
               $(".overlay").addClass("visible");
               console.log("it's working!");
            }
         });

         $("#sidebarCollapseX").on("click", function() {
            $(".overlay").removeClass("visible");
         });
      });
   </script>
   <!-- navbar akhir-->


   <script>
      var swiper = new Swiper(".reviews-slider", {
         loop: true,
         spaceBetween: 15,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            0: {
               slidesPerView: 2,
            },
            768: {
               slidesPerView: 3,
            },
            1024: {
               slidesPerView: 3,
            },
         },
      });
   </script>

</body>

</html>