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
   <title>Undangan Kami</title>

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

   <style>

   </style>

</head>

<body>

   <?php include 'components/user_header.php'; ?>

   <section class="products">

      <h1 class="heading">Produk Kami</h1>

      <!-- Kategori Filter -->
      <section class="filter">
         <form action="" method="get">
            <select name="category">
               <option value="">Semua Kategori</option>
               <option value="1" <?php if (isset($_GET['category']) && $_GET['category'] == '1') echo 'selected'; ?>>Video Landscape</option>
               <option value="2" <?php if (isset($_GET['category']) && $_GET['category'] == '2') echo 'selected'; ?>>Video Potrait</option>
               <option value="3" <?php if (isset($_GET['category']) && $_GET['category'] == '3') echo 'selected'; ?>>Foto Potrait</option>
            </select>
            <input type="submit" value="Filter" class="filter-btn">
         </form>
      </section>


      <div class="box-container">

         <?php
         $category = isset($_GET['category']) ? $_GET['category'] : '';

         $select_products = $conn->prepare("SELECT * FROM `products` WHERE category LIKE '%$category%' ORDER BY `id` DESC");
         $select_products->execute();
         if ($select_products->rowCount() > 0) {
            while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                  <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                  <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                  <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
                  <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                  <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
                  <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
                  <div class="flex">
                     <div class="name"><?= $fetch_product['name']; ?></div>
                     <div class="price"><span>Rp</span><?= number_format(($fetch_product['price']), 0, ',', '.'); ?></div>
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
            echo '<p class="empty">tidak ada produk ditemukan!</p>';
         }
         ?>

      </div>

   </section>












   <?php include 'components/whatsapp.php'; ?>
   <?php include 'components/footer.php'; ?>

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


</body>

</html>