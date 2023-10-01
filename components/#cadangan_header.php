<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
   }
}
?>

<header class="header">

   <section class="flex">

      <a href="index.php" class="logo">Create<span>Photo</span>.</a>
      <!-- <a href="index.php" class="logo"><img src="images/logo.png" alt=""></a> -->

      <nav class="navbar">
         <a href="index.php">Home</a>
         <a href="promo.php">Promo</a>
         <a href="shop.php">Katalog</a>
         <a href="orders.php">Pesanan</a>
         <a href="contact.php">Kontak</a>
         <a href="about.php">Tentang</a>
      </nav>

      <div class="icons">
         <?php
         $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
         $count_wishlist_items->execute([$user_id]);
         $total_wishlist_counts = $count_wishlist_items->rowCount();

         $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $count_cart_items->execute([$user_id]);
         $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php"><i class="fas fa-search"></i></a>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts; ?>)</span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
         $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_profile->execute([$user_id]);
         if ($select_profile->rowCount() > 0) {
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
            <p><?= $fetch_profile["name"]; ?></p>
            <a href="update_user.php" class="home-btn">perbarui profil</a>
            <div class="flex-btn">
               <a href="user_register.php" class="option-btn">daftar</a>
               <a href="user_login.php" class="btn">masuk</a>
            </div>
            <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('keluar dari sini?');">keluar</a>
         <?php
         } else {
         ?>
            <p>silahkan login atau daftar dulu!</p>
            <div class="flex-btn">
               <a href="user_register.php" class="btn">daftar</a>
               <a href="user_login.php" class="option-btn">masuk</a>
            </div>
         <?php
         }
         ?>


      </div>

   </section>

</header>



<style>
   .header {
      position: sticky;
      top: 0;
      left: 0;
      right: 0;
      background-color: var(--);
      box-shadow: var(--box-shadow);
      z-index: 1000;

   }

   .header .flex {
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
      padding: 1rem 5rem;
   }

   .header .flex .logo {
      font-size: 3.5rem;
      color: var(--black);
   }

   .header .flex .logo span {
      color: #b3c300;
      font-weight: bold;
   }

   .header .flex .navbar a {
      margin: 0 1rem;
      font-size: 1.7rem;
      color: var(--black);
   }

   .header .flex .navbar a:hover {
      color: var(--main-color);
      text-decoration: underline;
   }


   .header .flex .icons>* {
      margin-left: 1rem;
      font-size: 2rem;
      cursor: pointer;
      color: var(--black);
   }

   .header .flex .icons>*:hover {
      color: var(--main-color);
   }

   .header .flex .icons a span {
      font-size: 2rem;
   }

   .header .flex .icons a span {
      font-size: 2rem;
   }


   .header .flex .profile {
      position: absolute;
      top: 120%;
      right: 2rem;
      background-color: var(--white);
      border-radius: .5rem;
      box-shadow: var(--box-shadow);
      border: var(--border);
      padding: 2rem;
      width: 30rem;
      padding-top: 1.2rem;
      display: none;
      animation: fadeIn .2s linear;
   }

   .header .flex .profile.active {
      display: inline-block;
   }

   .header .flex .profile p {
      text-align: center;
      color: var(--black);
      font-size: 2rem;
      margin-bottom: 1rem;
   }



   /* 768 */

   #menu-btn {
      display: inline-block;
   }

   .header .flex .icons>* {
      margin-left: 0.4rem;
      font-size: 1.7rem;
      /* Adjust the font size for mobile devices */
   }

   .header .flex .icons a span {
      font-size: 1.7rem;
      /* Adjust the font size for mobile devices */
   }

   .header .flex .logo {
      font-size: 2.7rem;
   }

   .header .flex .navbar {
      position: absolute;
      top: 100%;
      left: 70%;
      transform: translateX(-50%);
      background-color: var(--white);
      transition: .2s linear;
      overflow: hidden;
      height: 0;
      width: 70%;
      max-width: 200px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
   }

   .header .flex .navbar.active {
      height: auto;
   }

   .header .flex .navbar a {
      text-align: center;
      display: block;
      padding: 1rem;
      border-bottom: var(--border);
   }

   .header .flex .navbar a:last-child {
      border-bottom: none;
   }

   .header .flex .navbar a {
      display: block;
      margin: 2rem;
   }
</style>