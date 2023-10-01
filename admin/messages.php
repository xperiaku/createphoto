<?php
session_start();
include '../components/connect.php';

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
};

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];

   // Membuat prepared statement untuk menghapus pesan
   $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = :id");
   $delete_message->bindParam(':id', $delete_id, PDO::PARAM_INT);
   $delete_message->execute();

   header('location:messages.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pesan</title>

   <!-- Icon -->
   <link href="../images/fav.png" rel="icon">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="../css/table.css">

</head>

<body>

   <?php include '../components/admin_header.php'; ?>

   <section class="pesan">

      <h1 class="heading">Pesan</h1>

      <table class="table_order">
         <thead>
            <tr>
               <th>No</th>
               <th>User ID</th>
               <th>Nama</th>
               <th>Email</th>
               <th>No. HP</th>
               <th>Pesan</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $no = 1;
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
            if ($select_messages->rowCount() > 0) {
               while ($fetch_message = $select_messages->fetch(PDO::FETCH_ASSOC)) {
            ?>
                  <tr>
                     <td class="center"><?= $no++; ?></td>
                     <td><?= $fetch_message['user_id']; ?></td>
                     <td><?= $fetch_message['name']; ?></td>
                     <td><?= $fetch_message['email']; ?></td>
                     <td><?= $fetch_message['number']; ?></td>
                     <td><?= substr($fetch_message['message'], 0, 50) . '   . . . . . .'; ?></td>
                     <td class="flex-btn">
                        <a href="messages_see.php?id=<?= $fetch_message['id']; ?>">Lihat</a>
                        <span> | </span>
                        <a href="messages.php?delete=<?= $fetch_message['id']; ?>" onclick="return confirm('Hapus pesan ini?');">Hapus</a>
                     </td>
                  </tr>
            <?php
               }
            } else {
               echo '<tr><td colspan="6" class="empty">Tidak ada pesan</td></tr>';
            }
            ?>
         </tbody>
      </table>
   </section>


   <script src="../js/admin_script.js"></script>

</body>

</html>