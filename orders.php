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
   <title>Pesanan</title>

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

   <section class="orders">

      <h1 class="heading">pesanan kamu</h1>

      <div class="box-container">

         <?php
         if ($user_id == '') {
            echo '<p class="empty">Silahkan Login terlebih dahulu untuk melihat pesananmu!</p>';
         } else {
            $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ? ORDER BY payment_status DESC, placed_on DESC");
            $select_orders->execute([$user_id]);
            if ($select_orders->rowCount() > 0) {
               while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                  $payment_status = $fetch_orders['payment_status'];
         ?>
                  <div class="box">
                     <p>waktu : <span><?= $fetch_orders['placed_on']; ?></span></p>
                     <p>name : <span><?= $fetch_orders['name']; ?></span></p>
                     <!-- <p>email : <span><?= $fetch_orders['email']; ?></span></p>
                     <p>nomor : <span><?= $fetch_orders['number']; ?></span></p>
                     <p>alamat : <span><?= $fetch_orders['address']; ?></span></p> -->
                     <p>produk: <span><?= $fetch_orders['total_products']; ?></span></p>
                     <p>harga : <span>Rp<?= number_format(($fetch_orders['total_price']), 0, ',', '.'); ?>,-</span></p>
                     <?php if (!empty($fetch_orders['promo_code']) && !empty($fetch_orders['percent']) && !empty($fetch_orders['grand_total'])) { ?>
                        <p>Promo : <span><?= $fetch_orders['promo_code'] . ' ( ' . $fetch_orders['percent']  . '% ) '; ?></span></p>
                        <p>Total : <span>Rp<?= number_format(($fetch_orders['grand_total']), 0, ',', '.'); ?>,-</span></p>
                     <?php } ?>
                     <p>
                        <span style="font-weight: bold; color: <?php echo (!empty($fetch_orders['pay_img'])) ? 'green' : 'red'; ?>">
                           <?php echo (!empty($fetch_orders['pay_img'])) ? 'Sudah Dibayar' : 'Belum Dibayar'; ?>
                        </span>
                     </p>

                     <?php if ($payment_status == 'completed') { ?>
                        <form method="post">
                           <div class="flex">
                              <input type="text" name="name" placeholder="Link Undangan" value="<?= $fetch_orders['link_invitation']; ?>" id="link-input-<?= $fetch_orders['id']; ?>">
                              <a href="<?= $fetch_orders['link_invitation']; ?>" target="_blank" class="link-btn">Buka</a>
                           </div>
                        </form>
                     <?php } ?>
                     <?php if ($payment_status == 'pending') { ?>
                        <div class="flex-btn">
                           <a href="order_update.php?update=<?= $fetch_orders['id']; ?>" name="ubah_data" class="option-btn">Ubah</a>
                           <a href="pay.php?order_id=<?= $fetch_orders['id']; ?>" class="btn">Bayar</a>
                        </div>
                     <?php } else { ?>
                        <a href="order_update.php?update=<?= $fetch_orders['id']; ?>" name="ubah_data" class="option-btn">Ubah Data</a>
                     <?php } ?>
                  </div>
         <?php
               }
            } else {
               echo '<p class="empty" >Belum ada pesananmu!</p>';
            }
         }
         ?>

      </div>

   </section>












   <?php include 'components/whatsapp.php'; ?>
   <?php include 'components/footer.php'; ?>

   <script src="js/script.js"></script>
   <script>
      function copyToClipboard(elementId) {
         var inputElement = document.getElementById(elementId);
         inputElement.select();
         document.execCommand("copy");
         alert("Teks telah disalin ke clipboard!");
      }
   </script>

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