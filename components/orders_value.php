<?php

if (isset($_POST['update_payment'])) {
    $order_id = $_POST['order_id'];
    $payment_status = $_POST['payment_status'];

    // Validasi bahwa payment_status tidak kosong
    if (empty($payment_status)) {
        $message[] = 'Harap pilih status pembayaran';
    } else {
        $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);

        // Validasi bahwa payment_status adalah nilai yang valid
        if ($payment_status != "pending" && $payment_status != "completed") {
            $message[] = 'Status pembayaran yang dipilih tidak valid';
        } else {
            $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
            $update_payment->execute([$payment_status, $order_id]);
            $message[] = 'Status pembayaran berhasil diperbarui!';
        }
    }
}


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_order_image = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
    $delete_order_image->execute([$delete_id]);
    $fetch_delete_image = $delete_order_image->fetch(PDO::FETCH_ASSOC);
    unlink('../payment_img/' . $fetch_delete_image['pay_img']);
    $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
    $delete_order->execute([$delete_id]);
    header('location:orders_all.php');
}

if (isset($_POST['link_invitation'])) {

    $order_id = $_POST['order_id'];

    $link_invitation = $_POST['name'];
    $link_invitation = filter_var($link_invitation, FILTER_SANITIZE_STRING);

    $insert_link = $conn->prepare("UPDATE `orders` SET link_invitation=? where id=?");
    $insert_link->execute([$link_invitation, $order_id]);
    $message[] = 'Link undangan berhasil dikirim!';
}
