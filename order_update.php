<?php

session_start();

include 'components/connect.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
    header('location:user_login.php');
};

include 'components/data_update.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbarui Pesanan</title>

    <!-- Icon -->
    <link href="images/fav.png" rel="icon">

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <section class="checkout-orders">

        <h1 class="heading">Lihat & Ubah Data</h1>

        <?php
        $update_id = $_GET['update'];
        $select_products = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
        $select_products->execute([$update_id]);
        if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $fetch_products['id']; ?>">
                    <h3>Data Pemesan Undangan</h3>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Nama :</span>
                            <input type="text" name="name" value="<?= $fetch_products['name']; ?>" required placeholder="Masukkan nama pemesan" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nomor :</span>
                            <input type="number" name="number" value="<?= $fetch_products['number']; ?>" required placeholder="Masukkan nomor pemesan" class="box" min="0" onkeypress="if(this.value.length == 20) return false;">
                        </div>
                        <div class="inputBox">
                            <span>Email :</span>
                            <input type="email" name="email" value="<?= $fetch_products['email']; ?>" required placeholder="Masukkan email pemesan" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Alamat :</span>
                            <input type="text" name="address" value="<?= $fetch_products['address']; ?>" required placeholder="Masukkan alamat pemesan" class="box">
                        </div>
                    </div><br>

                    <h3>Data Mempelai Pria</h3>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Nama Lengkap :</span>
                            <input type="text" name="name_men" value="<?= $fetch_products['name_men']; ?>" required placeholder="Masukkan nama" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama Panggilan :</span>
                            <input type="text" name="nickname_men" value="<?= $fetch_products['nickname_men']; ?>" required placeholder="Masukkan nama panggilan" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama Ayah :</span>
                            <input type="text" name="father_men" value="<?= $fetch_products['father_men']; ?>" required placeholder="Masukkan nama ayah" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama ibu :</span>
                            <input type="text" name="mother_men" value="<?= $fetch_products['mother_men']; ?>" required placeholder="Masukkan nama ibu" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Anak ke berapa :</span>
                            <input type="text" name="child_men" value="<?= $fetch_products['child_men']; ?>" required placeholder="contoh : Anak ke-1 dari 3 bersaudara" class="box">
                        </div>
                    </div><br>

                    <h3>Data Mempelai Wanita</h3>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Nama Lengkap :</span>
                            <input type="text" name="name_women" value="<?= $fetch_products['name_women']; ?>" required placeholder="Masukkan nama" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama Panggilan :</span>
                            <input type="text" name="nickname_women" value="<?= $fetch_products['nickname_women']; ?>" required placeholder="Masukkan nama panggilan" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama Ayah :</span>
                            <input type="text" name="father_women" value="<?= $fetch_products['father_women']; ?>" required placeholder="Masukkan nama ayah" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Nama ibu :</span>
                            <input type="text" name="mother_women" value="<?= $fetch_products['mother_women']; ?>" required placeholder="Masukkan nama ibu" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Anak ke berapa :</span>
                            <input type="text" name="child_women" value="<?= $fetch_products['child_women']; ?>" required placeholder="contoh : Anak ke-1 dari 3 bersaudara" class="box">
                        </div>
                    </div><br>


                    <h3>Data Akad Pernikahan</h3>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Hari & Tanggal Acara :</span>
                            <input type="date" name="marriage_date" value="<?= $fetch_products['marriage_date']; ?>" required class="box">
                        </div>
                        <div class="inputBox">
                            <span>Waktu Acara :</span>
                            <input type="time" name="marriage_time" value="<?= $fetch_products['marriage_time']; ?>" required class="box">
                        </div>
                        <div class="inputBox">
                            <span>Tempat :</span>
                            <input type="text" name="marriage_place" value="<?= $fetch_products['marriage_place']; ?>" required placeholder="Masukkan alamat akad" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Link Google Maps :</span>
                            <input type="text" name="marriage_link" value="<?= $fetch_products['marriage_link']; ?>" required placeholder="Masukkan Link Gmaps" class="box">
                        </div>
                    </div><br>

                    <h3>Data Resepsi Pernikahan</h3>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Hari & Tanggal Acara :</span>
                            <input type="date" name="reception_date" class="box" value="<?= $fetch_products['reception_date']; ?>" required class="box">
                        </div>
                        <div class="inputBox">
                            <span>Waktu Acara :</span>
                            <input type="time" name="reception_time" value="<?= $fetch_products['reception_time']; ?>" required class="box">
                        </div>
                        <div class="inputBox">
                            <span>Tempat :</span>
                            <input type="text" name="reception_place" value="<?= $fetch_products['reception_place']; ?>" required placeholder="Masukkan alamat resepsi" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Link Google Maps :</span>
                            <input type="text" name="reception_link" value="<?= $fetch_products['reception_link']; ?>" required placeholder="Masukkan Link Gmaps" class="box">
                        </div>
                    </div><br>

                    <h3>Data Pelengkap (OPTIONAL)</h3>

                    <div class="flex">
                        <div class="inputBox">
                            <span>No. Whatsapp Mempelai Pria :</span>
                            <input type="number" name="wa_men" value="<?= $fetch_products['wa_men']; ?>" placeholder="Masukkan no whatsapp" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Instagram Mempelai Pria :</span>
                            <input type="text" name="ig_men" value="<?= $fetch_products['ig_men']; ?>" placeholder="Masukkan akun instagram" class="box">
                        </div>
                        <div class="inputBox">
                            <span>No. Whatsapp Mempelai Wanita :</span>
                            <input type="number" name="wa_women" value="<?= $fetch_products['wa_women']; ?>" placeholder="Masukkan no whatsapp" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Instagram Mempelai Wanita :</span>
                            <input type="text" name="ig_women" value="<?= $fetch_products['ig_women']; ?>" placeholder="Masukkan akun instagram" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Link Foto :</span>
                            <input type="text" name="photos_link" value="<?= $fetch_products['photos_link']; ?>" placeholder="Masukkan link foto" class="box">
                        </div>
                    </div><br>

                    <h3>Data Bank (OPTIONAL)</h3>

                    <div class="bank">
                        <div class="flex" id="bank-data">
                            <div class="inputBox">
                                <span>Nama Penerima :</span>
                                <input type="text" name="bank_name" value="<?= $fetch_products['bank_name']; ?>" placeholder="Masukkan Nama Penerima & Bank" class="box">
                            </div>
                            <div class="inputBox">
                                <span>Nomor Bank :</span>
                                <input type="number" name="bank_number" value="<?= $fetch_products['bank_number']; ?>" placeholder="Masukkan nomor bank" class="box">
                            </div>
                            <div class="inputBox">
                                <span>Nama Penerima :</span>
                                <input type="text" name="bank_name2" value="<?= $fetch_products['bank_name2']; ?>" placeholder="Masukkan Nama Penerima & Bank" class="box">
                            </div>
                            <div class="inputBox">
                                <span>Nomor Bank :</span>
                                <input type="number" name="bank_number2" value="<?= $fetch_products['bank_number2']; ?>" placeholder="Masukkan nomor bank" class="box">
                            </div>
                        </div>
                    </div>
                    <br>
            <?php
            }
        }
            ?>
            <div class="flex-btn">
                <a href="orders.php" class="option-btn">Kembali</a>
                <input type="submit" name="update" class="btn" value="Perbarui Data">

            </div>

                </form>

    </section>













    <?php include 'components/footer.php'; ?>

    <script src="js/script.js"></script>

    <!-- navbar awal-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").addClass("active");
            });

            $("#sidebarCollapseX").on("click", function() {
                $("#sidebar").removeClass("active");
            });

            $("#sidebarCollapse").on("click", function() {
                if ($("#sidebar").hasClass("active")) {
                    $(".overlay").addClass("visible");
                    console.log("it's working!");
                }
            });

            $("#sidebarCollapseX").on("click", function() {
                $(".overlay").removeClass("visible");
            });
        });
    </script>
    <!-- navbar akhir-->

</body>

</html>