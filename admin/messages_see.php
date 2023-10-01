<?php
session_start();

include '../components/connect.php';

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Pesan</title>

    <!-- Icon -->
    <link href="../images/fav.png" rel="icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

    <?php include '../components/admin_header.php'; ?>

    <section class="add-products">

        <form action="" method="POST" enctype="multipart/form-data">

            <?php
            if (isset($_GET['id'])) {
                $pesan_id = $_GET['id'];

                // Membuat prepared statement
                $select_products = $conn->prepare("SELECT * FROM `messages` WHERE id = :pesan_id");

                // Mengikat parameter
                $select_products->bindParam(':pesan_id', $pesan_id, PDO::PARAM_INT);

                // Mengeksekusi pernyataan
                $select_products->execute();

                if ($select_products->rowCount() > 0) {
                    while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>

                        <h1 class="heading">Pesan Pelanggan</h1>

                        <div class="flex">
                            <div class="inputBox">
                                <span>Nama :</span>
                                <input type="text" name="name" value="<?= htmlentities($fetch_products['name']); ?>" readonly class="box">
                            </div>
                            <div class="inputBox">
                                <span>No Telp :</span>
                                <input type="number" name="number" value="<?= htmlentities($fetch_products['number']); ?>" readonly class="box">
                            </div>
                            <div class="inputBox">
                                <span>Email :</span>
                                <input type="email" name="email" value="<?= htmlentities($fetch_products['email']); ?>" readonly class="box">
                            </div>
                            <div>
                                <span>Isi Pesan :</span>
                                <textarea class="box" required style="height: 500px;" cols="70" readonly><?= htmlentities($fetch_products['message']); ?></textarea>
                            </div>
                            <a href="messages.php" class="btn">Kembali</a>
                        </div><br>
            <?php
                    }
                }
            }
            ?>
        </form>
    </section>

    <script src="../js/admin_script.js"></script>

</body>

</html>