<?php

session_start();

include 'components/connect.php';

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
   header('location:user_login.php');
};


include 'components/data_update.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

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

   <section class="checkout-orders">

      <form action="" method="POST">

         <h3>Pesanan kamu</h3>

         <div class="display-orders">
            <?php
            $grand_total = 0;
            $cart_items[] = '';
            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $select_cart->execute([$user_id]);
            if ($select_cart->rowCount() > 0) {
               while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                  $cart_items[] = $fetch_cart['name'] . ' (' . $fetch_cart['price'] . ' x ' . $fetch_cart['quantity'] . ') - ';
                  $total_products = implode($cart_items);
                  $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
            ?>
                  <div style="display: inline-block;">
                     <div class="swiper-slide slide">
                        <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="" style="max-width: 200px; max-height: 200px;">
                     </div>
                     <p> <?= $fetch_cart['name']; ?> <span>(<?= 'Rp' . number_format(($fetch_cart['price']), 0, ',', '.') . ' x ' . $fetch_cart['quantity']; ?>)</span> </p>
                  </div>
            <?php
               }
            } else {
               echo '<p class="empty">keranjang kamu kosong!</p>';
            }
            ?>
            <input type="hidden" name="total_products" value="<?= $total_products; ?>">
            <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
            <div class="grand-total">Grand total : <span>Rp<?= number_format(($grand_total), 0, ',', '.') ?>,-</span></div>
         </div>

         <h3>Data Pemesan Undangan</h3>

         <div class="flex">
            <div class="inputBox">
               <span>Nama :</span>
               <input type="text" name="name" placeholder="Masukkan nama kamu" class="box" required>
            </div>
            <div class="inputBox">
               <span>Nomor :</span>
               <input type="number" name="number" placeholder="Masukkan nomor kamu" class="box" min="0" onkeypress="if(this.value.length == 20) return false;" required>
            </div>
            <div class="inputBox">
               <span>Email :</span>
               <input type="email" name="email" placeholder="Masukkan email kamu" class="box" required>
            </div>
            <div class="inputBox">
               <span>Alamat :</span>
               <input type="text" name="address" placeholder="Masukkan alamat kamu" class="box" required>
            </div>
         </div><br>

         <h3>Data Mempelai Pria</h3>

         <div class="flex">
            <div class="inputBox">
               <span>Nama Lengkap :</span>
               <input type="text" name="name_men" placeholder="Masukkan nama mempelai pria" class="box" required>
            </div>
            <div class="inputBox">
               <span>Nama Panggilan :</span>
               <input type="text" name="nickname_men" placeholder="Masukkan nama panggilan" class="box" required>
            </div>
            <div class="inputBox">
               <span>Nama Ayah :</span>
               <input type="text" name="father_men" placeholder="Masukkan nama ayah" class="box" required>
            </div>
            <div class="inputBox">
               <span>Nama ibu :</span>
               <input type="text" name="mother_men" placeholder="Masukkan nama ibu" class="box" required>
            </div>
            <div class="inputBox">
               <span>Anak ke berapa :</span>
               <input type="text" name="child_men" placeholder="contoh : Anak ke-1 dari 3 bersaudara" class="box" required>
            </div>
         </div><br>

         <h3>Data Mempelai Wanita</h3>

         <div class="flex">
            <div class="inputBox">
               <span>Nama Lengkap :</span>
               <input type="text" name="name_women" placeholder="Masukkan nama mempelai pria" class="box" required>
            </div>
            <div class="inputBox">
               <span>Nama Panggilan :</span>
               <input type="text" name="nickname_women" placeholder="Masukkan nama panggilan" class="box" required>
            </div>
            <div class="inputBox">
               <span>Nama Ayah :</span>
               <input type="text" name="father_women" placeholder="Masukkan nama ayah" class="box" required>
            </div>
            <div class="inputBox">
               <span>Nama ibu :</span>
               <input type="text" name="mother_women" placeholder="Masukkan nama ibu" class="box" required>
            </div>
            <div class="inputBox">
               <span>Anak ke berapa :</span>
               <input type="text" name="child_women" placeholder="contoh : Anak ke-1 dari 3 bersaudara" class="box" required>
            </div>
         </div><br>


         <h3>Data Akad Pernikahan</h3>

         <div class="flex">
            <div class="inputBox">
               <span>Hari & Tanggal Acara :</span>
               <input type="date" name="marriage_date" class="box" required>
            </div>
            <div class="inputBox">
               <span>Waktu Acara :</span>
               <input type="time" name="marriage_time" class="box" required>
            </div>
            <div class="inputBox">
               <span>Tempat :</span>
               <input type="text" name="marriage_place" placeholder="Tuliskan Alamat Tempat Acara" class="box" required>
            </div>
            <div class="inputBox">
               <span>Link Google Maps :</span>
               <input type="text" name="marriage_link" placeholder="Isikan Link Tempat Acara Kamu" class="box" required>
            </div>
         </div><br>

         <h3>Data Resepsi Pernikahan</h3>

         <div class="flex">
            <div class="inputBox">
               <span>Hari & Tanggal Acara :</span>
               <input type="date" name="reception_date" class="box" required>
            </div>
            <div class="inputBox">
               <span>Waktu Acara :</span>
               <input type="time" name="reception_time" class="box" required>
            </div>
            <div class="inputBox">
               <span>Tempat :</span>
               <input type="text" name="reception_place" placeholder="Tuliskan Alamat Tempat Acara" class="box" required>
            </div>
            <div class="inputBox">
               <span>Link Google Maps :</span>
               <input type="text" name="reception_link" placeholder="Isikan Link Tempat Acara Kamu" class="box" required>
            </div>
         </div><br>

         <h3>Data Pelengkap ( Opsional )</h3>

         <div class="flex">
            <div class="inputBox">
               <span>No. WA Mempelai Pria :</span>
               <input type="number" name="wa_men" placeholder="Isikan Nomor Whatsapp" class="box">
            </div>
            <div class="inputBox">
               <span>IG Mempelai Pria :</span>
               <input type="text" name="ig_men" placeholder="Isikan Akun Instagram" class="box">
            </div>
            <div class="inputBox">
               <span>No. WA Mempelai Wanita :</span>
               <input type="number" name="wa_women" placeholder="Isikan Nomor Whatsapp" class="box">
            </div>
            <div class="inputBox">
               <span>IG Mempelai Wanita :</span>
               <input type="text" name="ig_women" placeholder="Isikan Akun Instagram" class="box">
            </div>
            <div class="inputBox">
               <span>Link Foto :</span>
               <input type="text" name="photos_link" placeholder="Isikan link Google Drive" class="box">
            </div>
         </div><br>

         <h3>Data Bank ( Opsional )</h3>

         <div class="bank">
            <div class="flex" id="bank-data">
               <div class="inputBox">
                  <span>Nama Penerima :</span>
                  <input type="text" name="bank_name" placeholder="Isikan Nama Penerima & Bank" class="box">
               </div>
               <div class="inputBox">
                  <span>Nomor Bank :</span>
                  <input type="number" name="bank_number" placeholder="Isikan Nomor Bank" class="box">
               </div>
               <div class="inputBox">
                  <span>Nama Penerima :</span>
                  <input type="text" name="bank_name2" placeholder="Isikan Nama Penerima & Bank" class="box">
               </div>
               <div class="inputBox">
                  <span>Nomor Bank :</span>
                  <input type="number" name="bank_number2" placeholder="Isikan Nomor Bank" class="box">
               </div>
            </div>
         </div>
         <br>
         <div class="flex-btn">
            <a href="cart.php" class="option-btn">Kembali</a>
            <input type="submit" name="order" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>" value="Bayar">
         </div>

      </form>

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