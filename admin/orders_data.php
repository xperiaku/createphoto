<?php

session_start();

include '../components/connect.php';

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produk</title>

    <!-- Icon -->
    <link href="../images/fav.png" rel="icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

    <?php include '../components/admin_header.php'; ?>

    <section class="add-products">

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $fetch_products['id']; ?>">

            <?php
            $id = $_GET['id'];
            $select_products = $conn->prepare("SELECT * FROM `orders` where id = ?");
            $select_products->execute([$id]);
            if ($select_products->rowCount() > 0) {
                while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>

                    <h1 class="heading2">Data Pemesan Undangan</h1>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Nama :</span>
                            <input type="text" name="name" value="<?= $fetch_products['name']; ?>" readonly placeholder="Masukkan nama pemesan" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nomor :</span>
                            <input type="number" name="number" value="<?= $fetch_products['number']; ?>" readonly placeholder="Masukkan nomor pemesan" class="box" min="0" onkeypress="if(this.value.length == 20) return false;">
                        </div>
                        <div class="inputBox">
                            <span>Email :</span>
                            <input type="email" name="email" value="<?= $fetch_products['email']; ?>" readonly placeholder="Masukkan email pemesan" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Alamat :</span>
                            <input type="text" name="address" value="<?= $fetch_products['address']; ?>" readonly placeholder="Masukkan alamat pemesan" class="box">
                        </div>
                    </div><br><br>

                    <h1 class="heading2">Data Mempelai Pria</h1>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Nama Lengkap :</span>
                            <input type="text" name="name_men" value="<?= $fetch_products['name_men']; ?>" readonly placeholder="Masukkan nama" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama Panggilan :</span>
                            <input type="text" name="nickname_men" value="<?= $fetch_products['nickname_men']; ?>" readonly placeholder="Masukkan nama panggilan" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama Ayah :</span>
                            <input type="text" name="father_men" value="<?= $fetch_products['father_men']; ?>" readonly placeholder="Masukkan nama ayah" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama ibu :</span>
                            <input type="text" name="mother_men" value="<?= $fetch_products['mother_men']; ?>" readonly placeholder="Masukkan nama ibu" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Anak ke berapa :</span>
                            <input type="text" name="child_men" value="<?= $fetch_products['child_men']; ?>" readonly placeholder="contoh : Anak ke-1 dari 3 bersaudara" class="box">
                        </div>
                    </div><br><br>

                    <h1 class="heading2">Data Mempelai Wanita</h1>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Nama Lengkap :</span>
                            <input type="text" name="name_women" value="<?= $fetch_products['name_women']; ?>" readonly placeholder="Masukkan nama" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama Panggilan :</span>
                            <input type="text" name="nickname_women" value="<?= $fetch_products['nickname_women']; ?>" readonly placeholder="Masukkan nama panggilan" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama Ayah :</span>
                            <input type="text" name="father_women" value="<?= $fetch_products['father_women']; ?>" readonly placeholder="Masukkan nama ayah" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama ibu :</span>
                            <input type="text" name="mother_women" value="<?= $fetch_products['mother_women']; ?>" readonly placeholder="Masukkan nama ibu" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Anak ke berapa :</span>
                            <input type="text" name="child_women" value="<?= $fetch_products['mother_women']; ?>" readonly placeholder="contoh : Anak ke-1 dari 3 bersaudara" class="box">
                        </div>
                    </div><br><br>


                    <h1 class="heading2">Data Akad Pernikahan</h1>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Hari & Tanggal Acara :</span>
                            <input type="date" name="marriage_date" value="<?= $fetch_products['marriage_date']; ?>" readonly class="box">
                        </div>
                        <div class="inputBox">
                            <span>Waktu Acara :</span>
                            <input type="time" name="marriage_time" value="<?= $fetch_products['marriage_time']; ?>" readonly class="box">
                        </div>
                        <div class="inputBox">
                            <span>Tempat :</span>
                            <input type="text" name="marriage_place" value="<?= $fetch_products['marriage_place']; ?>" readonly placeholder="Masukkan alamat akad" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Link Google Maps :</span>
                            <input type="text" name="marriage_link" value="<?= $fetch_products['marriage_link']; ?>" readonly placeholder="Masukkan Link Gmaps" class="box">
                        </div>
                    </div><br><br>

                    <h1 class="heading2">Data Resepsi Pernikahan</h1>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Hari & Tanggal Acara :</span>
                            <input type="date" name="reception_date" class="box" value="<?= $fetch_products['reception_date']; ?>" readonly class="box">
                        </div>
                        <div class="inputBox">
                            <span>Waktu Acara :</span>
                            <input type="time" name="reception_time" value="<?= $fetch_products['reception_time']; ?>" readonly class="box">
                        </div>
                        <div class="inputBox">
                            <span>Tempat :</span>
                            <input type="text" name="reception_place" value="<?= $fetch_products['reception_place']; ?>" readonly placeholder="Masukkan alamat resepsi" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Link Google Maps :</span>
                            <input type="text" name="reception_link" value="<?= $fetch_products['reception_link']; ?>" readonly placeholder="Masukkan Link Gmaps" class="box">
                        </div>
                    </div><br><br>

                    <h1 class="heading2">Data Pelengkap</h1>

                    <div class="flex">
                        <div class="inputBox">
                            <span>No. Whatsapp Mempelai Pria :</span>
                            <input type="number" name="wa_men" value="<?= $fetch_products['wa_men']; ?>" readonly placeholder="Masukkan no whatsapp" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Instagram Mempelai Pria :</span>
                            <input type="text" name="ig_men" value="<?= $fetch_products['ig_men']; ?>" readonly placeholder="Masukkan akun instagram" class="box">
                        </div>
                        <div class="inputBox">
                            <span>No. Whatsapp Mempelai Wanita :</span>
                            <input type="number" name="wa_women" value="<?= $fetch_products['wa_women']; ?>" readonly placeholder="Masukkan no whatsapp" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Instagram Mempelai Wanita :</span>
                            <input type="text" name="ig_women" value="<?= $fetch_products['ig_women']; ?>" readonly placeholder="Masukkan akun instagram" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Link Foto :</span>
                            <input type="text" name="photos_link" value="<?= $fetch_products['photos_link']; ?>" readonly placeholder="Masukkan link foto" class="box">
                        </div>
                    </div><br><br>

                    <h1 class="heading2">Data Bank</h1>

                    <div class="bank">
                        <div class="flex" id="bank-data">
                            <div class="inputBox">
                                <span>Nama Penerima :</span>
                                <input type="text" name="bank_name" value="<?= $fetch_products['bank_name']; ?>" readonly placeholder="Masukkan Nama Penerima & Bank" class="box">
                            </div>
                            <div class="inputBox">
                                <span>Nomor Bank :</span>
                                <input type="number" name="bank_number" value="<?= $fetch_products['bank_number']; ?>" readonly placeholder="Masukkan nomor bank" class="box">
                            </div>
                            <div class="inputBox">
                                <span>Nama Penerima :</span>
                                <input type="text" name="bank_name2" value="<?= $fetch_products['bank_name2']; ?>" readonly placeholder="Masukkan Nama Penerima & Bank" class="box">
                            </div>
                            <div class="inputBox">
                                <span>Nomor Bank :</span>
                                <input type="number" name="bank_number2" value="<?= $fetch_products['bank_number2']; ?>" readonly placeholder="Masukkan nomor bank" class="box">
                            </div>
                        </div><br><br>
                        <div class="flex-btn">
                            <a href="orders_all.php" class="btn">Kembali</a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </form>
    </section>




    <script src="../js/admin_script.js"></script>

</body>

</html>