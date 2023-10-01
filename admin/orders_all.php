<?php
error_reporting(0);
session_start();

include '../components/connect.php';

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}

include '../components/orders_value.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Pesanan</title>

    <!-- Icon -->
    <link href="../images/fav.png" rel="icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

    <?php include '../components/admin_header.php'; ?>

    <section class="orders">

        <h1 class="heading">Semua Pesanan</h1>

        <div class="box-container">

            <?php
            $select_orders = $conn->prepare("SELECT * FROM `orders`  ORDER BY payment_status DESC, placed_on DESC");
            $select_orders->execute();
            if ($select_orders->rowCount() > 0) {
                while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                    $payment_status = $fetch_orders['payment_status'];
            ?>
                    <div class="box">
                        <p> Dipesan pada : <span><?= $fetch_orders['placed_on']; ?></span> </p>
                        <p> Nama : <span><?= htmlspecialchars($fetch_orders['name']); ?></span> </p>
                        <p> Nomor : <span><?= htmlspecialchars($fetch_orders['number']); ?></span> </p>
                        <p> Alamat : <span><?= htmlspecialchars($fetch_orders['address']); ?></span> </p>
                        <p> Nama Undangan : <span><?= htmlspecialchars($fetch_orders['total_products']); ?></span> </p>
                        <p> Harga : <span>Rp<?= number_format(($fetch_orders['total_price']), 0, ',', '.'); ?>,-</span> </p>
                        <?php if (!empty($fetch_orders['promo_code']) && !empty($fetch_orders['percent']) && !empty($fetch_orders['grand_total'])) { ?>
                            <p>Promo : <span><?= htmlspecialchars($fetch_orders['promo_code']) . ' ( ' . htmlspecialchars($fetch_orders['percent'])  . '% ) '; ?></span></p>
                            <p>grand harga : <span>Rp<?= number_format(($fetch_orders['grand_total']), 0, ',', '.'); ?>,-</span></p>
                        <?php } ?>
                        <p>
                            Pembayaran:
                            <span style="font-weight: bold; color: <?php echo (!empty($fetch_orders['pay_img'])) ? 'green' : 'red'; ?>">
                                <?php echo (!empty($fetch_orders['pay_img'])) ? 'Sudah Dibayar' : 'Belum Dibayar'; ?>
                            </span>
                        </p>
                        <form action="" method="post">
                            <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
                            <select name="payment_status" class="select">
                                <option selected disabled><?= htmlspecialchars($fetch_orders['payment_status']); ?></option>
                                <option value="pending">pending</option>
                                <option value="completed">completed</option>
                            </select>
                            <div class="flex-btn">
                                <input type="submit" value="perbarui" class="option-btn" name="update_payment">
                                <a href="orders_placed.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('Hapus Pesanan Ini?');">Hapus</a>
                            </div>
                            <input type="button" value="Bukti Pembayaran" class="btn" onclick="showPayment(<?= $fetch_orders['id']; ?>);">
                            <a href="orders_data.php?id=<?= $fetch_orders['id']; ?>" class="home-btn">Data Pemesan</a><br>
                            <?php if ($payment_status == 'completed') { ?>
                                <form method="post">
                                    <div class="flex">
                                        <input type="text" name="name" placeholder="Masukkan link undangan" value="<?= htmlspecialchars($fetch_orders['link_invitation']); ?>" required>
                                        <input type="submit" name="link_invitation" class="link-btn" value="Kirim"></input>
                                    </div>
                                </form>
                            <?php } ?>
                        </form>
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">Belum ada pesanan!</p>';
            }
            ?>

        </div>

    </section>

    </section>

    <script src="../js/admin_script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

</body>

</html>