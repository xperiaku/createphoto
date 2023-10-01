<?php
session_start();
include './components/connect.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
    header('location:user_login.php');
}

$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : '';
if (empty($order_id)) {
    header('location:checkout.php');
}

$select_order = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
$select_order->execute([$order_id]);
$fetch_order = $select_order->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['payment'])) {
    $name_bank = filter_var($_POST['name_bank'], FILTER_SANITIZE_STRING);
    $name_sender = filter_var($_POST['name_sender'], FILTER_SANITIZE_STRING);

    $pay_img = $_FILES['pay_img'];
    $pay_img_name = filter_var($pay_img['name'], FILTER_SANITIZE_STRING);
    $pay_img_size = $pay_img['size'];
    $pay_img_tmp_name = $pay_img['tmp_name'];
    $pay_img_folder = './payment_img/';

    // Hapus file lama jika sudah ada
    $old_file_name = $fetch_order['pay_img'];
    if (!empty($old_file_name) && file_exists($pay_img_folder . $old_file_name)) {
        unlink($pay_img_folder . $old_file_name);
    }

    // Validasi ukuran file
    if ($pay_img_size > 2000000) {
        $message[] = 'Ukuran file terlalu besar! (Maksimal 2MB)';
    } else {
        // Validasi tipe file
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        $pay_img_ext = strtolower(pathinfo($pay_img_name, PATHINFO_EXTENSION));
        if (!in_array($pay_img_ext, $allowed_types)) {
            $message[] = 'Tipe file tidak diizinkan! (Hanya boleh JPG, JPEG, PNG, dan GIF)';
        } else {
            // Upload gambar dan update database
            $new_file_name = uniqid() . '_' . $pay_img_name;
            $pay_img_folder .= $new_file_name;
            if (move_uploaded_file($pay_img_tmp_name, $pay_img_folder)) {
                $update_order = $conn->prepare("UPDATE `orders` SET name_sender=?, name_bank=?, pay_img=? WHERE id=?");
                if ($update_order->execute([$name_sender, $name_bank, $new_file_name, $order_id])) {
                    $message[] = 'Berhasil dibayar!';
                    header('location:orders.php');
                } else {
                    $message[] = 'Gagal mengupdate database!';
                }
            } else {
                $message[] = 'Gagal upload gambar!';
            }
        }
    }
}

$order_id = $_GET['order_id'];

// memeriksa apakah tombol "Gunakan" telah ditekan
if (isset($_POST['promo-input'])) {
    $promo_code = $_POST['promo-input'];

    // mencari kode promo pada tabel promo
    $select_promo = $conn->prepare("SELECT * FROM `promo` WHERE code = ?");
    $select_promo->execute([$promo_code]);

    // jika kode promo ditemukan
    if ($select_promo->rowCount() > 0) {
        $fetch_promo = $select_promo->fetch(PDO::FETCH_ASSOC);
        $discount = $fetch_promo['discount'];
        $promo_id = $fetch_promo['id'];

        // mencari pesanan dengan id yang sesuai pada tabel orders
        $select_order = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
        $select_order->execute([$order_id]);
        $fetch_order = $select_order->fetch(PDO::FETCH_ASSOC);

        $grand_total = $fetch_order['total_price']; // harga awal sebelum diskon
        $discount_amount = ($discount / 100) * $grand_total; // nilai diskon
        $new_total = $grand_total - $discount_amount; // harga setelah diskon

        // memperbarui total harga pada tabel orders dengan harga setelah diskon
        $update_order = $conn->prepare("UPDATE `orders` SET promo_id = ?, grand_total = ?, promo_code = ?, percent = ? WHERE id = ?");
        $update_order->execute([$promo_id, $new_total, $promo_code, $discount, $order_id]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>

    <!-- Icon -->
    <link href="images/fav.png" rel="icon">

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include './components/user_header.php'; ?>

    <section class="payment-orders">

        <form action="" method="POST">

            <div class="display-payment">
                <?php
                $order_id = $_GET['order_id'];
                $select_products = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
                $select_products->execute([$order_id]);
                if ($select_products->rowCount() > 0) {
                    while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <div class="payment-total">Total : <span>Rp<?= number_format(($fetch_product['total_price']), 0, ',', '.'); ?>,-</span>
                            <div class="input-container">
                                <form action="proses_kode_promo.php" method="POST"> <!-- Anda perlu menambahkan action form ke file yang sesuai -->
                                    <input type="text" id="promo-input" name="promo-input" placeholder="Kode Promo" required>
                                    <button type="submit" class="promo-btn">Gunakan</button>
                                </form>
                            </div>
                        </div>

                        <?php
                        $promo_code = $fetch_product['promo_code'];
                        $percent = $fetch_product['percent'];

                        if ($promo_code) {
                        ?>
                            <div class="grand-total">Grand total : <span>Rp<?= number_format(($fetch_product['grand_total']), 0, ',', '.'); ?>,-</span></div>
                            <div class="code-promo">Promo : <span><?= $promo_code . ' ( ' . $percent  . '% ) '; ?></span></div>
                <?php
                        } else {
                            // Menampilkan pesan jika promo tidak ada
                            echo '<div class="code-promo">Promo tidak ada</div>';
                        }
                    }
                }
                ?>
            </div>

        </form>
    </section>

    <section class="contact">
        <div class="form-pay">
            <form>
                <h3>Bank Untuk Pembayaran</h3>
                <?php
                // Query untuk mengambil data bank
                $select_bank = $conn->query("SELECT * FROM bank");
                ?>
                <select name="bank" id="bank" class="box" style="text-align: center;">
                    <option value="">-- Pilih Bank --</option>
                    <?php while ($fetch_bank = $select_bank->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?= $fetch_bank['id']; ?>"><?= $fetch_bank['name_bank']; ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="name" required class="box" id="name" style="text-align: center;">
                <input type="text" name="no_rek" required class="box" id="no_rek" style="text-align: center;">
            </form><br>
            <form method="post" enctype="multipart/form-data">
                <h3>Bukti Pembayaran</h3>
                <input type="hidden" name="order_id" value="<?= $fetch_products['id']; ?>">
                <input type="text" name="name_bank" placeholder="Nama Bank" class="box" required>
                <input type="text" name="name_sender" placeholder="Nama Kamu" class="box" required>
                <input type="file" name="pay_img" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>

                <div class="flex-btn">
                    <a href="orders.php" class="option-btn">Kembali</a>
                    <input type="submit" value="Bayar" name="payment" class="btn">
                </div>
            </form>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#bank").change(function() {
                var bankId = $(this).val();
                if (bankId != "") {
                    $.ajax({
                        url: "./components/bank_data.php",
                        type: "post",
                        data: {
                            bank_id: bankId
                        },
                        dataType: "json",
                        success: function(response) {
                            $("#name").val(response.name);
                            $("#no_rek").val(response.no_rek);
                        },
                        error: function(xhr, status, error) {
                            alert("Terjadi kesalahan: " + xhr.status + " " + error);
                        }
                    });
                }
            });
        });
    </script>

    <!-- navbar awal-->
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