<?php
session_start();
include '../components/connect.php';

if (isset($_SESSION['admin_id'])) {
   $admin_id = $_SESSION['admin_id'];
} else {
   header('location:admin_login.php');
   exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Halaman Awal</title>

   <!-- Icon -->
   <link href="../images/fav.png" rel="icon">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

   <?php include '../components/admin_header.php'; ?>

   <section class="dashboard">

      <h1 class="heading">Halaman Awal</h1>

      <div class="box-container">

         <!-- <div class="box">
            <h3>Selamat Datang!</h3>
            <p><?= $fetch_profile['name']; ?></p>
            <a href="update_profile.php" class="btn">update profile</a>
         </div> -->

         <div class="box">
            <?php
            $total_orders = 0;
            $select_orders = $conn->prepare("SELECT SUM(total_price) AS total_orders FROM `orders`");
            $select_orders->execute();
            $total_orders_result = $select_orders->fetch(PDO::FETCH_ASSOC);
            $total_orders = $total_orders_result['total_orders'];
            ?>
            <h3><span>Rp</span><?= number_format(($total_orders), 0, ',', '.'); ?><span>,-</span></h3>
            <p>Semua Pesanan</p>
            <a href="orders_all.php" class="home-btn">Lihat</a>
         </div>

         <div class="box">
            <?php
            $payment = 'pending';
            $total_pendings = 0;
            $select_pendings = $conn->prepare("SELECT SUM(total_price) AS total_pendings FROM `orders` WHERE payment_status = ?");
            $select_pendings->execute([$payment]);
            $total_pendings_result = $select_pendings->fetch(PDO::FETCH_ASSOC);
            $total_pendings = $total_pendings_result['total_pendings'];
            ?>
            <h3><span>Rp</span><?= number_format(($total_pendings), 0, ',', '.'); ?><span>,-</span></h3>
            <p>Pesanan Tertunda</p>
            <a href="orders_pending.php" class="home-btn">Lihat</a>
         </div>

         <div class="box">
            <?php
            $total_completes = 0;
            $payment_status = 'completed';
            $select_completes = $conn->prepare("SELECT SUM(total_price) AS total_completes FROM `orders` WHERE payment_status = ?");
            $select_completes->execute([$payment_status]);
            $total_completes_result = $select_completes->fetch(PDO::FETCH_ASSOC);
            $total_completes = $total_completes_result['total_completes'];
            ?>
            <h3><span>Rp</span><?= number_format(($total_completes), 0, ',', '.'); ?><span>,-</span></h3>
            <p>Pesanan Selesai</p>
            <a href="orders_placed.php" class="home-btn">Lihat</a>
         </div>

         <div class="box">
            <?php
            $select_products = $conn->prepare("SELECT COUNT(*) AS number_of_products FROM `products`");
            $select_products->execute();
            $number_of_products_result = $select_products->fetch(PDO::FETCH_ASSOC);
            $number_of_products = $number_of_products_result['number_of_products'];
            ?>
            <h3><?= $number_of_products; ?></h3>
            <p>Semua Undangan</p>
            <a href="products.php" class="home-btn">Lihat</a>
         </div>

         <div class="box">
            <?php
            $select_promo = $conn->prepare("SELECT COUNT(*) AS number_of_promo FROM `promo`");
            $select_promo->execute();
            $number_of_promo_result = $select_promo->fetch(PDO::FETCH_ASSOC);
            $number_of_promo = $number_of_promo_result['number_of_promo'];
            ?>
            <h3><?= $number_of_promo; ?></h3>
            <p>Semua Promo</p>
            <a href="promo.php" class="home-btn">Lihat</a>
         </div>

         <div class="box">
            <?php
            $select_messages = $conn->prepare("SELECT COUNT(*) AS number_of_messages FROM `messages`");
            $select_messages->execute();
            $number_of_messages_result = $select_messages->fetch(PDO::FETCH_ASSOC);
            $number_of_messages = $number_of_messages_result['number_of_messages'];
            ?>
            <h3><?= $number_of_messages; ?></h3>
            <p>Pesan Baru</p>
            <a href="messages.php" class="home-btn">Lihat</a>
         </div>

         <div class="box">
            <?php
            $total_completes = 0;
            $payment_status = 'completed';
            $select_completes = $conn->prepare("SELECT SUM(total_price) AS total_completes FROM `orders` WHERE payment_status = ?");
            $select_completes->execute([$payment_status]);
            $total_completes_result = $select_completes->fetch(PDO::FETCH_ASSOC);
            $total_completes = $total_completes_result['total_completes'];
            ?>
            <h3><span>Rp</span><?= number_format(($total_completes), 0, ',', '.'); ?><span>,-</span></h3>
            <p>Laporan Penjualan</p>
            <a href="sales_report.php" class="home-btn">Lihat</a>
         </div>

         <div class="box">
            <?php
            $select_orders = $conn->prepare("SELECT COUNT(*) AS number_of_orders FROM `bank`");
            $select_orders->execute();
            $number_of_orders_result = $select_orders->fetch(PDO::FETCH_ASSOC);
            $number_of_orders = $number_of_orders_result['number_of_orders'];
            ?>
            <h3><?= $number_of_orders; ?></h3>
            <p>Akun Bank</p>
            <a href="bank_accounts.php" class="home-btn">Lihat</a>
         </div>

         <div class="box">
            <?php
            $select_users = $conn->prepare("SELECT COUNT(*) AS number_of_users FROM `users`");
            $select_users->execute();
            $number_of_users_result = $select_users->fetch(PDO::FETCH_ASSOC);
            $number_of_users = $number_of_users_result['number_of_users'];
            ?>
            <h3><?= $number_of_users; ?></h3>
            <p>Akun Pelanggan</p>
            <a href="users_accounts.php" class="home-btn">Lihat</a>
         </div>

         <div class="box">
            <?php
            $select_admins = $conn->prepare("SELECT COUNT(*) AS number_of_admins FROM `admins`");
            $select_admins->execute();
            $number_of_admins_result = $select_admins->fetch(PDO::FETCH_ASSOC);
            $number_of_admins = $number_of_admins_result['number_of_admins'];
            ?>
            <h3><?= $number_of_admins; ?></h3>
            <p>Akun Admin</p>
            <a href="admin_accounts.php" class="home-btn">Lihat</a>
         </div>

      </div>

   </section>

   <script src="../js/admin_script.js"></script>

</body>

</html>