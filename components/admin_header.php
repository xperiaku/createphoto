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

      <a href="../admin/index.php" class="logo">Create<span><strong>Photo</strong></span></a>

      <nav class="navbar">
         <a href="../admin/index.php">Home</a>
         <a href="../admin/products.php">Produk</a>
         <a href="../admin/promo.php">Promo</a>
         <a href="../admin/orders_all.php">Pesanan</a>
         <a href="../admin/messages.php">Pesan</a>
         <a href="../admin/sales_report.php">Laporan</a>
         <a href="../admin/bank_accounts.php">Bank</a>
         <a href="../admin/admin_accounts.php">Admin</a>
         <a href="../admin/users_accounts.php">Pengguna</a>

      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
         $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
         $select_profile->execute([$admin_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="../admin/update_profile.php" class="home-btn">perbarui profil</a>
         <div class="flex-btn">
            <a href="../admin/register_admin.php" class="option-btn">daftar</a>
            <a href="../admin/admin_login.php" class="btn">masuk</a>
         </div>
         <a href="../components/admin_logout.php" class="delete-btn" onclick="return confirm('keluar dari sini?');">keluar</a>
      </div>

   </section>

</header>