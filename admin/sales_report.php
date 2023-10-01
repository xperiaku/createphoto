<?php

session_start();

include '../components/connect.php';

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
};


// handle filter
if (isset($_POST['filter'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $payment_status = 'completed';
    $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE placed_on BETWEEN ? AND ? AND payment_status = ?");
    $select_orders->execute([$from, $to, $payment_status]);
} else {
    $select_orders = $conn->prepare("SELECT * FROM `orders` where payment_status = ?");
    $select_orders->execute(['completed']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Terjual</title>

    <!-- Icon -->
    <link href="../images/fav.png" rel="icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">
    <link rel="stylesheet" href="../css/table.css">

</head>

<body>

    <?php include '../components/admin_header.php'; ?>

    <section class="report">
        <h1 class="heading">Laporan Penjualan</h1>
        <form method="post">
            <table>
                <tr>
                    <th><input type="date" name="from"></th>
                    <th><input type="date" name="to"></th>
                    <th><input type="submit" class="btn" name="filter" value="filter"></th>
                </tr>
            </table>
        </form>
        <?php
        if ($select_orders->rowCount() > 0) {
        ?>
            <table class="table_order">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Produk</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total_price = 0;
                    $total_products = 0;
                    while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                        $price = $fetch_orders['total_price'];
                        $grand_total = $fetch_orders['grand_total'];
                        if (!empty($fetch_orders['grand_total'])) {
                            $total_price += $grand_total;
                        } else {
                            $total_price += $price;
                        }

                        $last_order = $fetch_orders; // Simpan pesanan terakhir
                    ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td><?= $fetch_orders['placed_on']; ?></td>
                            <td><?= $fetch_orders['name']; ?></td>
                            <td class="center"><?= $fetch_orders['total_products']; ?></td>
                            <td><span>Rp</span><?php if (empty($grand_total)) {
                                                    echo number_format($price, 0, ',', '.');
                                                } else {
                                                    echo number_format($grand_total, 0, ',', '.');
                                                } ?><span>,-</span></td>

                            <td><?= $fetch_orders['payment_status']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr class="total">
                        <td></td>
                        <td colspan="3" class="right" style="text-align: center; font-size: medium; font-weight: bold;">Total</td>
                        <td colspan="2" class="right" style="text-align: center; font-size: medium; font-weight: bold;"><span>Rp</span><?= number_format($total_price, 0, ',', '.'); ?><span>,-</span></td>
                    </tr>
                </tfoot>
            </table>
            <div class="print">
                <?php
                if (isset($from) && isset($to)) {
                ?>
                    <button class="print-btn" onclick="window.open('../components/printPDF.php?from=<?php echo $from; ?>&to=<?php echo $to; ?>')">Cetak PDF</button>
                <?php
                } else {
                ?>
                    <button class="print-btn" onclick="alert('Silahkan pilih tanggal')">Cetak PDF</button>
                <?php
                }
                ?>
                <button class="print-btn" onclick="printLastOrder()">Cetak Pesanan Terakhir</button>
            </div>
        <?php
        } else {
            echo '<p class="empty">Belum ada pesanan yang ditempatkan!</p>';
        }
        ?>


        </form>

    </section>

    <script>
        function printLastOrder() {
            const from = '<?= $last_order['placed_on'] ?>';
            const to = '<?= $last_order['placed_on'] ?>';
            window.open(`../components/printPDF.php?from=${from}&to=${to}`);
        }
    </script>

    <script src="../js/admin_script.js"></script>

</body>

</html>