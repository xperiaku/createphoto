<?php
// Koneksi ke database
include '../components/connect.php';

// Ambil ID pesanan dari parameter URL
$order_id = $_GET['order_id'];

// Query untuk mengambil data pesanan
$select_order = $conn->prepare("SELECT * FROM orders WHERE id = ?");
$select_order->execute([$order_id]);

// Ambil data pesanan
$fetch_order = $select_order->fetch(PDO::FETCH_ASSOC);

// Ambil nama file gambar bukti pembayaran dari database
$pay_img = $fetch_order['pay_img'];

// Tampilkan gambar bukti pembayaran jika file ada
if (!empty($pay_img) && file_exists("../payment_img/$pay_img")) {
    echo "<img src='../payment_img/$pay_img' alt='Bukti Pembayaran'><br>";
} else {
    echo "File bukti pembayaran tidak ditemukan<br>";
}

// Tampilkan nama bank dan nama pengirim jika sudah ada
if (!empty($fetch_order['name_bank'])) {
    echo "Bank : " . $fetch_order['name_bank'] . "<br>";
}
if (!empty($fetch_order['name_sender'])) {
    echo "Pengirim : " . $fetch_order['name_sender'] . "<br>";
}
