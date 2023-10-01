<?php
session_start();
include '../components/connect.php';

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_admins = $conn->prepare("DELETE FROM `admins` WHERE id = :delete_id");
   $delete_admins->bindParam(':delete_id', $delete_id, PDO::PARAM_INT);
   $delete_admins->execute();
   header('location:admin_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>akun admin</title>

   <!-- Icon -->
   <link href="../images/fav.png" rel="icon">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

   <?php include '../components/admin_header.php'; ?>

   <section class="accounts">

      <h1 class="heading">Akun admin</h1>

      <div class="box-container">

         <div class="box">
            <p>Buat Akun Admin</p>
            <a href="register_admin.php" class="home-btn">Daftar</a>
         </div>

         <?php
         $select_accounts = $conn->prepare("SELECT * FROM `admins`");
         $select_accounts->execute();
         if ($select_accounts->rowCount() > 0) {
            while ($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <div class="box">
                  <p> Admin ID : <span><?= $fetch_accounts['id']; ?></span> </p>
                  <p> Username : <span><?= $fetch_accounts['name']; ?></span> </p>
                  <div class="flex-btn">
                     <a href="admin_accounts.php?delete=<?= $fetch_accounts['id']; ?>" onclick="return confirm('Hapus akun ini?')" class="delete-btn">Hapus</a>
                     <?php
                     if ($fetch_accounts['id'] == $admin_id) {
                        echo '<a href="update_profile.php" class="btn">Perbarui</a>';
                     }
                     ?>
                  </div>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">tidak ada akun yang tersedia!</p>';
         }
         ?>

      </div>

   </section>

   <script src="../js/admin_script.js"></script>

</body>

</html>