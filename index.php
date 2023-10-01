<?php
session_start();

include 'components/connect.php';

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CreatePhoto</title>

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

   <div class="home-bg">

      <section class="home">

         <div class="swiper home-slider">

            <div class="swiper-wrapper">

               <div class="swiper-slide slide">
                  <div class="image">
                     <img src="images/home.png" alt="">
                  </div>
                  <div class="content">
                     <h3>Undangan Video Potrait</h3>
                     <a href="category.php?category=2" class="home-btn">Lihat</a>
                  </div>
               </div>

               <div class="swiper-slide slide">
                  <div class="image">
                     <img src="images/home-1.png" alt="">
                  </div>
                  <div class="content">
                     <h3>Undangan Video Landscape</h3>
                     <a href="category.php?category=1" class="home-btn">Lihat</a>
                  </div>
               </div>

               <div class="swiper-slide slide">
                  <div class="image">
                     <img src="images/home-2.png" alt="">
                  </div>
                  <div class="content">
                     <h3>Undangan Foto Potrait</h3>
                     <a href="category.php?category=3" class="home-btn">Lihat</a>
                  </div>
               </div>
            </div>

            <div class="swiper-pagination"></div>

         </div>

      </section>

   </div>



   <section class="category">

      <h1 class="heading">Kategori</h1>

      <div class="swiper category-slider">

         <div class="swiper-wrapper">

            <a href="category.php?category=1" class="swiper-slide slide">
               <img src="images/icon-1.png" alt="">
               <h3>Landscape</h3>
            </a>

            <a href="category.php?category=2" class="swiper-slide slide">
               <img src="images/icon-2.png" alt="">
               <h3>Potrait</h3>
            </a>

            <a href="category.php?category=3" class="swiper-slide slide">
               <img src="images/icon-3.png" alt="">
               <h3>Foto Potrait</h3>
            </a>


         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>

   <section class="home-products">

      <h1 class="heading">Produk terbaru</h1>

      <div class="swiper products-slider">

         <div class="swiper-wrapper">

            <?php
            $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY `id` DESC LIMIT 6");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
               while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                  <form action="" method="post" class="swiper-slide slide">
                     <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                     <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                     <input type="hidden" name="category" value="<?= $fetch_product['category']; ?>">
                     <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                     <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
                     <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                     <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
                     <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
                     <div class="flex">
                        <div class="name" style="font-weight: bold;"><?= $fetch_product['name']; ?></div>
                        <div class="price"><span>Rp</span><?= number_format($fetch_product['price'], 0, ',', '.'); ?><span></span></div>
                        <input type="hidden" name="qty" value="1">
                     </div>
                     <div class="category">
                        <?php
                        if ($fetch_product['category'] == 1) {
                           echo "Video Landscape";
                        } else if ($fetch_product['category'] == 2) {
                           echo "Video Potrait";
                        } else if ($fetch_product['category'] == 3) {
                           echo "Foto Potrait";
                        } else {
                           echo "Kategori tidak ditemukan";
                        }
                        ?>
                     </div>


                     <div class="flex-btn">

                        <input type="button" value="Preview" class="btn option-btn" onclick="window.open('<?= $fetch_product['link']; ?>', '_blank')">
                        <input type="submit" value="Keranjang" class="btn" name="add_to_cart">
                     </div>
                  </form>
            <?php
               }
            } else {
               echo '<p class="empty">Tidak ada produk</p>';
            }
            ?>
         </div>
         <div class="swiper-pagination"></div>
      </div>
   </section>

   <section class="box-container">
      <div class="faq">
         <h1 class="heading">FAQs</h1>
         <div class="faq-container">
            <div class="faq-item">
               <h2 class="faq-question">Bagaimana cara buat undangan digital?</h2>
               <div class="faq-answer">
                  <p>Pilih Undangan yang diinginkan, klik Keranjang lalu klik Checkout, setelah klik Checkout kamu dapat mulai memasukkan data dirimu & pasangan, data acara, foto-foto dan undanganmu.
                     Kemudian masuk kedalam pesanan dan lakukan pembayaran. Setelah pembayaran terverifikasi, undanganmu akan dibuat dan kamu hanya menunggu undanganmu selesai dibuat.</p>
               </div>
            </div>
            <div class="faq-item">
               <h2 class="faq-question">Berapa lama proses pembuatannya?</h2>
               <div class="faq-answer">
                  <p>Untuk pembuatan undangan digital hanya membutuhkan waktu sekitar 1 s/d 2 hari untuk membuat undangan digital yang kamu pesan
                     dan undangan digital kamu sudah siap untuk disebarkan.</p>
               </div>
            </div>
            <div class="faq-item">
               <h2 class="faq-question">Apakah data yang sudah dimasukkan bisa diubah kembali?</h2>
               <div class="faq-answer">
                  <p>Ya, data yang sudah kamu masukkan dapat kamu ubah sewaktu-waktu tanpa ada batasan.</p>
               </div>
            </div>
            <div class="faq-item">
               <h2 class="faq-question">Apakah bisa di bantu untuk pengisian informasi dan kelengkapan undangan?</h2>
               <div class="faq-answer">
                  <p>Kami senantiasa siap membantu kamu apabila ada kesulitan dalam pengisian data/informasi undangan. Silahkan hubungi kami melalui WhatsApp apabila membutuhkan bantuan.</p>
               </div>
            </div>
            <div class="faq-item">
               <h2 class="faq-question">Apakah bisa custom tema?</h2>
               <div class="faq-answer">
                  <p>Mohon maaf, untuk saat ini kami belum menerima custom tema. Silahkan gunakan tema yang ada.</p>
               </div>
            </div>
         </div>
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
      var swiper = new Swiper(".home-slider", {
         loop: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
      });

      var swiper = new Swiper(".category-slider", {
         loop: true,
         spaceBetween: 10,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            0: {
               slidesPerView: 3,
            },
            1024: {
               slidesPerView: 3,
            },
         },
      });

      var swiper = new Swiper(".products-slider", {
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
            1024: {
               slidesPerView: 3,
            },
         },
      });

      const faqItems = document.querySelectorAll(".faq-item");

      faqItems.forEach((item) => {
         item.addEventListener("click", () => {
            if (item.classList.contains("active")) {
               item.classList.remove("active");
            } else {
               faqItems.forEach((faqItem) => {
                  faqItem.classList.remove("active");
               });
               item.classList.add("active");
            }
         });
      });
   </script>

</body>

</html>