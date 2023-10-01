<?php

session_start();

include 'components/connect.php';


if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
   header('location:user_login.php');
};

include 'components/wishlist_cart.php';

if (isset($_POST['delete'])) {
   $wishlist_id = $_POST['wishlist_id'];
   $delete_wishlist_item = $conn->prepare("DELETE FROM `wishlist` WHERE id = ?");
   $delete_wishlist_item->execute([$wishlist_id]);
}

if (isset($_GET['delete_all'])) {
   $delete_wishlist_item = $conn->prepare("DELETE FROM `wishlist` WHERE user_id = ?");
   $delete_wishlist_item->execute([$user_id]);
   header('location:wishlist.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Daftar Keinginan</title>

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

   <section class="wishlist">

      <h3 class="heading">keinginan kamu</h3>

      <div class="box-container">

         <?php
         $grand_total = 0;
         $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
         $select_wishlist->execute([$user_id]);
         if ($select_wishlist->rowCount() > 0) {
            while ($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)) {
               $grand_total += $fetch_wishlist['price'];
         ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="qty" value="1">
                  <input type="hidden" name="pid" value="<?= $fetch_wishlist['pid']; ?>">
                  <input type="hidden" name="wishlist_id" value="<?= $fetch_wishlist['id']; ?>">
                  <input type="hidden" name="name" value="<?= $fetch_wishlist['name']; ?>">
                  <input type="hidden" name="price" value="<?= $fetch_wishlist['price']; ?>">
                  <input type="hidden" name="image" value="<?= $fetch_wishlist['image']; ?>">
                  <a href="quick_view.php?pid=<?= $fetch_wishlist['pid']; ?>" class="fas fa-eye"></a>
                  <img src="uploaded_img/<?= $fetch_wishlist['image']; ?>" alt="">
                  <div class="flex">
                     <div class="name"><?= $fetch_wishlist['name']; ?></div>
                     <div class="price">Rp<?= number_format(($fetch_wishlist['price']), 0, ',', '.'); ?></div>
                  </div>
                  <div class="flex-btn">
                     <input type="submit" value="hapus" onclick="return confirm('hapus dari daftar keinginanmu?');" class="delete-btn" name="delete">
                     <input type="submit" value="keranjang" class="btn" name="add_to_cart">
                  </div>
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">keinginan kamu kosong!</p>';
         }
         ?>
      </div>

      <div class="wishlist-total">
         <p>Grand total : <span>Rp<?= number_format(($grand_total), 0, ',', '.'); ?></span></p>
         <div class="flex-btn">
            <a href="wishlist.php?delete_all" class="delete-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('hapus semua dari keinginan kamu?');">hapus semua item</a>
            <a href="shop.php" class="option-btn">lanjutkan belanja</a>
         </div>
      </div>
   </section>



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