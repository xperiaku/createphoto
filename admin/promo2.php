<?php
session_start();

include '../components/connect.php';

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header('location:admin_login.php');
    exit();
}

if (isset($_POST['add_promo'])) {

    $code = $_POST['code'];
    $code = filter_var($code, FILTER_SANITIZE_STRING);
    $discount = $_POST['discount'];
    $discount = filter_var($discount, FILTER_SANITIZE_STRING);



    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_size_01 = $_FILES['image_01']['size'];
    $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
    $image_folder_01 = '../promo_img/' . $image_01;

    $select_promo = $conn->prepare("SELECT * FROM `promo` WHERE code = ?");
    $select_promo->execute([$code]);

    if ($select_promo->rowCount() > 0) {
        $message[] = 'Kode Promo Sudah ada!';
    } else {

        $insert_promo = $conn->prepare("INSERT INTO `promo`(code, discount, image_01) VALUES(?,?,?)");
        $insert_promo->execute([$code, $discount, $image_01]);

        if ($insert_promo) {
            if ($image_size_01 > 2000000) {
                $message[] = 'Gambar Terlalu Besar!';
            } else {
                move_uploaded_file($image_tmp_name_01, $image_folder_01);
                $message[] = 'Promo baru ditambahkan!';
            }
        }
    }
}

if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];
    $delete_product_image = $conn->prepare("SELECT * FROM `promo` WHERE id = ?");
    $delete_product_image->execute([$delete_id]);
    $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
    unlink('../uploaded_img/' . $fetch_delete_image['image_01']);
    $delete_product = $conn->prepare("DELETE FROM `promo` WHERE id = ?");
    $delete_product->execute([$delete_id]);
    header('location:promo.php');
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

    <section class="add-products">

        <h1 class="heading">tambahkan promo</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="flex">
                <div class="inputBox">
                    <span>Kode Promo *</span>
                    <input type="text" class="box" required placeholder="masukkan kode" name="code">
                </div>
                <div class="inputBox">
                    <span>Diskon *</span>
                    <input type="number" class="box" required placeholder="masukkan diskon" name="discount">
                </div>
                <div class="inputBox">
                    <span>Banner Promo *</span>
                    <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
                </div>
            </div><br>
            <div class="flex-btn">
                <a href="index.php" class="option-btn">Kembali</a>
                <button type="submit" name="add_promo" class="btn">Tambah Promo</button>
            </div>
        </form>
    </section>

    <section class="show-products">

        <h1 class="heading">Promo Yang Berlangsung</h1>

        <div class="box-container">

            <?php
            $select_products = $conn->prepare("SELECT * FROM `promo`");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
                while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <div class="box">
                        <img src="../promo_img/<?= $fetch_products['image_01']; ?>" alt="">
                        <div class="name">Kode : <?= $fetch_products['code']; ?></div>
                        <div class="price">Diskon : <?= $fetch_products['discount']; ?><span> %</span></div>
                        <a href="promo.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('hapus promo?');">Hapus</a>
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">Tidak ada promo!</p>';
            }
            ?>

        </div>

    </section>


    <script src="../js/admin_script.js"></script>

</body>

</html>