<?php
session_start();
include '../components/connect.php';

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}

if (isset($_POST['submit'])) {
    $bank = $_POST['name_bank'];
    $name = $_POST['name'];
    $no_rek = $_POST['no_rek'];

    // Membuat prepared statement
    $select_bank = $conn->prepare("SELECT * FROM `bank` WHERE name_bank = :bank");
    $select_bank->bindParam(':bank', $bank, PDO::PARAM_STR);
    $select_bank->execute();

    if ($select_bank->rowCount() > 0) {
        $message[] = 'nama bank sudah ada!';
    } else {
        // Menggunakan prepared statement dengan parameter binding
        $insert_bank = $conn->prepare("INSERT INTO `bank`(name_bank, name, no_rek) VALUES(:name_bank, :name, :no_rek)");
        $insert_bank->bindParam(':name_bank', $bank, PDO::PARAM_STR);
        $insert_bank->bindParam(':name', $name, PDO::PARAM_STR);
        $insert_bank->bindParam(':no_rek', $no_rek, PDO::PARAM_STR);
        $insert_bank->execute();
        $message[] = 'bank baru berhasil ditambah!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar bank</title>

    <!-- Icon -->
    <link href="../images/fav.png" rel="icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

    <?php include '../components/admin_header.php'; ?>

    <section class="form-container">

        <form action="" method="post">
            <h3>Tambah Bank</h3>
            <input type="text" name="name_bank" required placeholder="Nama Bank" class="box">
            <input type="text" name="name" required placeholder="Nama Pemilik" class="box">
            <input type="number" name="no_rek" required placeholder="Nomor Rekening" class="box">
            <input type="submit" value="Tambah" class="btn" name="submit">
        </form>

    </section>

    <script src="../js/admin_script.js"></script>

</body>

</html>