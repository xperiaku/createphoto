<?php

session_start();

include '../components/connect.php';

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    // Membuat prepared statement untuk menghapus data
    $delete_admins = $conn->prepare("DELETE FROM `bank` WHERE id = ?");

    // Mengikat parameter
    $delete_admins->bindParam(1, $delete_id, PDO::PARAM_INT);

    // Menjalankan pernyataan
    $delete_admins->execute();

    header('location:bank_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank</title>

    <!-- Icon -->
    <link href="../images/fav.png" rel="icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

    <?php include '../components/admin_header.php'; ?>

    <section class="accounts">

        <h1 class="heading">Akun Bank</h1>

        <div class="box-container">

            <div class="box">
                <p>Tambah Bank</p>
                <a href="bank_register.php" class="home-btn">Tambah</a>
            </div>

            <?php
            $select_accounts = $conn->prepare("SELECT * FROM `bank`");
            $select_accounts->execute();
            if ($select_accounts->rowCount() > 0) {
                while ($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <div class="box">
                        <p> ID Bank : <span><?= $fetch_accounts['id']; ?></span> </p>
                        <p> Bank : <span><?= $fetch_accounts['name_bank']; ?></span> </p>
                        <p> Nama : <span><?= $fetch_accounts['name']; ?></span> </p>
                        <p> No.Rek : <span><?= $fetch_accounts['no_rek']; ?></span> </p>
                        <div class="flex-btn">
                            <a href="bank_accounts.php?delete=<?= $fetch_accounts['id']; ?>" onclick="return confirm('Hapus bank ini?')" class="delete-btn">Hapus</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">tidak ada bank yang tersedia!</p>';
            }
            ?>

        </div>

    </section>

    <script src="../js/admin_script.js"></script>

</body>

</html>