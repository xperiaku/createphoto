<?php
session_start();
include '../components/connect.php';

if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $pass = sha1($_POST['pass']);

   // Membuat prepared statement
   $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = :name AND password = :pass");

   // Mengikat parameter
   $select_admin->bindParam(':name', $name, PDO::PARAM_STR);
   $select_admin->bindParam(':pass', $pass, PDO::PARAM_STR);

   // Mengeksekusi pernyataan
   $select_admin->execute();

   // Mengambil hasil
   $row = $select_admin->fetch(PDO::FETCH_ASSOC);

   if ($select_admin->rowCount() > 0) {
      $_SESSION['admin_id'] = $row['id'];
      header('location:index.php');
   } else {
      $message[] = 'username / password salah!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Admin</title>

   <!-- Icon -->
   <link href="../images/fav.png" rel="icon">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

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

   <section class="form-container">

      <form action="" method="post">
         <h3>CreatePhoto</h3>
         <p>Silahkan login untuk mendapatkan <span>Akses Penuh</span></p>
         <input type="text" name="name" required placeholder="username" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="password" name="pass" required placeholder="kata sandi" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="submit" value="Masuk" class="btn" name="submit">
      </form>

   </section>

</body>

</html>