<?php

include 'connect.php';
// Ambil id bank dari permintaan Ajax
$bankId = $_POST['bank_id'];

// Query untuk mengambil data bank
$select_bank = $conn->prepare("SELECT * FROM bank WHERE id = :id");
$select_bank->bindParam(':id', $bankId);
$select_bank->execute();
$bankData = $select_bank->fetch(PDO::FETCH_ASSOC);

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($bankData);
