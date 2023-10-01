<?php

if (isset($_POST['update'])) {

    if ($user_id == '') {
        header('location:user_login.php');
    } else {

        $id = $_POST['id'];

        // data pemesan
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $number = $_POST['number'];
        $number = filter_var($number, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $address = $_POST['address'];
        $address = filter_var($address, FILTER_SANITIZE_STRING);

        // Data Mempelai Pria
        $name_men = $_POST['name_men'];
        $name_men = filter_var($name_men, FILTER_SANITIZE_STRING);
        $nickname_men = $_POST['nickname_men'];
        $nickname_men = filter_var($nickname_men, FILTER_SANITIZE_STRING);
        $father_men = $_POST['father_men'];
        $father_men = filter_var($father_men, FILTER_SANITIZE_STRING);
        $mother_men = $_POST['mother_men'];
        $mother_men = filter_var($mother_men, FILTER_SANITIZE_STRING);
        $child_men = $_POST['child_men'];
        $child_men = filter_var($child_men, FILTER_SANITIZE_STRING);

        // Data Memepelai Wanita 
        $name_women = $_POST['name_women'];
        $name_women = filter_var($name_women, FILTER_SANITIZE_STRING);
        $nickname_women = $_POST['nickname_women'];
        $nickname_women = filter_var($nickname_women, FILTER_SANITIZE_STRING);
        $father_women = $_POST['father_women'];
        $father_women = filter_var($father_women, FILTER_SANITIZE_STRING);
        $mother_women = $_POST['mother_women'];
        $mother_women = filter_var($mother_women, FILTER_SANITIZE_STRING);
        $child_women = $_POST['child_women'];
        $child_women = filter_var($child_women, FILTER_SANITIZE_STRING);

        // Data Akad Pernikahan
        $marriage_date = $_POST['marriage_date'];
        $marriage_date = filter_var($marriage_date, FILTER_SANITIZE_STRING);
        $marriage_time = $_POST['marriage_time'];
        $marriage_time = filter_var($marriage_time, FILTER_SANITIZE_STRING);
        $marriage_place = $_POST['marriage_place'];
        $marriage_place = filter_var($marriage_place, FILTER_SANITIZE_STRING);
        $marriage_link = $_POST['marriage_link'];
        $marriage_link = filter_var($marriage_link, FILTER_SANITIZE_STRING);

        // Data Resepsi Pernikahan
        $reception_date = $_POST['reception_date'];
        $reception_date = filter_var($reception_date, FILTER_SANITIZE_STRING);
        $reception_time = $_POST['reception_time'];
        $reception_time = filter_var($reception_time, FILTER_SANITIZE_STRING);
        $reception_place = $_POST['reception_place'];
        $reception_place = filter_var($reception_place, FILTER_SANITIZE_STRING);
        $reception_link = $_POST['reception_link'];
        $reception_link = filter_var($reception_link, FILTER_SANITIZE_STRING);

        // Data Pelengkap
        $wa_men = $_POST['wa_men'];
        $wa_men = filter_var($wa_men, FILTER_SANITIZE_STRING);
        $ig_men = $_POST['ig_men'];
        $ig_men = filter_var($ig_men, FILTER_SANITIZE_STRING);
        $wa_women = $_POST['wa_women'];
        $wa_women = filter_var($wa_women, FILTER_SANITIZE_STRING);
        $ig_women = $_POST['ig_women'];
        $ig_women = filter_var($ig_women, FILTER_SANITIZE_STRING);
        $photos_link = $_POST['photos_link'];
        $photos_link = filter_var($photos_link, FILTER_SANITIZE_STRING);

        // Data Bank
        $bank_name = $_POST['bank_name'];
        $bank_name = filter_var($bank_name, FILTER_SANITIZE_STRING);
        $bank_number = $_POST['bank_number'];
        $bank_number = filter_var($bank_number, FILTER_SANITIZE_STRING);
        $bank_name2 = $_POST['bank_name2'];
        $bank_name2 = filter_var($bank_name2, FILTER_SANITIZE_STRING);
        $bank_number2 = $_POST['bank_number2'];
        $bank_number2 = filter_var($bank_number2, FILTER_SANITIZE_STRING);


        $update_product = $conn->prepare("UPDATE `orders` SET name=?, number=?, email=?, address=?, 
    name_men=?, nickname_men=?, father_men=?, mother_men=?, child_men=?, 
    name_women=?, nickname_women=?, father_women=?, mother_women=?, child_women=?, 
    marriage_date=?, marriage_time=?, marriage_place=?, marriage_link=?, 
    reception_date=?, reception_time=?, reception_place=?, reception_link=?, 
    wa_men=?, ig_men=?, wa_women=?, ig_women=?, photos_link=?, 
    bank_name=?, bank_number=?, bank_name2=?, bank_number2=? WHERE id=?");

        $update_product->execute([
            $name, $number, $email, $address,
            $name_men, $nickname_men, $father_men, $mother_men, $child_men,
            $name_women, $nickname_women, $father_women, $mother_women, $child_women,
            $marriage_date, $marriage_time, $marriage_place, $marriage_link,
            $reception_date, $reception_time, $reception_place, $reception_link,
            $wa_men, $ig_men, $wa_women, $ig_women, $photos_link,
            $bank_name, $bank_number, $bank_name2, $bank_number2, $id
        ]);
        $message[] = 'Data Pesanan berhasil diupdate!';
        header('location:orders.php');
    }
}



if (isset($_POST['order'])) {

    if ($user_id == '') {
        header('location:user_login.php');
    } else {
        // data pemesan
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $number = $_POST['number'];
        $number = filter_var($number, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $address = $_POST['address'];
        $address = filter_var($address, FILTER_SANITIZE_STRING);

        // Data Mempelai Pria
        $name_men = $_POST['name_men'];
        $name_men = filter_var($name_men, FILTER_SANITIZE_STRING);
        $nickname_men = $_POST['nickname_men'];
        $nickname_men = filter_var($nickname_men, FILTER_SANITIZE_STRING);
        $father_men = $_POST['father_men'];
        $father_men = filter_var($father_men, FILTER_SANITIZE_STRING);
        $mother_men = $_POST['mother_men'];
        $mother_men = filter_var($mother_men, FILTER_SANITIZE_STRING);
        $child_men = $_POST['child_men'];
        $child_men = filter_var($child_men, FILTER_SANITIZE_STRING);

        // Data Memepelai Wanita 
        $name_women = $_POST['name_women'];
        $name_women = filter_var($name_women, FILTER_SANITIZE_STRING);
        $nickname_women = $_POST['nickname_women'];
        $nickname_women = filter_var($nickname_women, FILTER_SANITIZE_STRING);
        $father_women = $_POST['father_women'];
        $father_women = filter_var($father_women, FILTER_SANITIZE_STRING);
        $mother_women = $_POST['mother_women'];
        $mother_women = filter_var($mother_women, FILTER_SANITIZE_STRING);
        $child_women = $_POST['child_women'];
        $child_women = filter_var($child_women, FILTER_SANITIZE_STRING);

        // Data Akad Pernikahan
        $marriage_date = $_POST['marriage_date'];
        $marriage_date = filter_var($marriage_date, FILTER_SANITIZE_STRING);
        $marriage_time = $_POST['marriage_time'];
        $marriage_time = filter_var($marriage_time, FILTER_SANITIZE_STRING);
        $marriage_place = $_POST['marriage_place'];
        $marriage_place = filter_var($marriage_place, FILTER_SANITIZE_STRING);
        $marriage_link = $_POST['marriage_link'];
        $marriage_link = filter_var($marriage_link, FILTER_SANITIZE_STRING);

        // Data Resepsi Pernikahan
        $reception_date = $_POST['reception_date'];
        $reception_date = filter_var($reception_date, FILTER_SANITIZE_STRING);
        $reception_time = $_POST['reception_time'];
        $reception_time = filter_var($reception_time, FILTER_SANITIZE_STRING);
        $reception_place = $_POST['reception_place'];
        $reception_place = filter_var($reception_place, FILTER_SANITIZE_STRING);
        $reception_link = $_POST['reception_link'];
        $reception_link = filter_var($reception_link, FILTER_SANITIZE_STRING);

        // Data Pelengkap
        // Data Pelengkap
        $wa_men = !empty($_POST['wa_men']) ? intval($_POST['wa_men']) : null;
        $ig_men = !empty($_POST['ig_men']) ? filter_var($_POST['ig_men'], FILTER_SANITIZE_STRING) : null;
        $wa_women = !empty($_POST['wa_women']) ? intval($_POST['wa_women']) : null;
        $ig_women = !empty($_POST['ig_women']) ? filter_var($_POST['ig_women'], FILTER_SANITIZE_STRING) : null;
        $photos_link = !empty($_POST['photos_link']) ? filter_var($_POST['photos_link'], FILTER_SANITIZE_STRING) : null;


        // Data Bank
        $bank_name = $_POST['bank_name'];
        $bank_name = filter_var($bank_name, FILTER_SANITIZE_STRING);
        $bank_name2 = $_POST['bank_name2'];
        $bank_name2 = filter_var($bank_name2, FILTER_SANITIZE_STRING);
        $bank_number = !empty($_POST['bank_number']) ? intval($_POST['bank_number']) : null;
        $bank_number2 = !empty($_POST['bank_number2']) ? intval($_POST['bank_number2']) : null;



        $total_products = $_POST['total_products'];
        $total_price = $_POST['total_price'];

        $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
        $check_cart->execute([$user_id]);

        if ($check_cart->rowCount() > 0) {

            $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, address, 
        name_men, nickname_men, father_men, mother_men, child_men, 
        name_women, nickname_women, father_women, mother_women, child_women, 
        marriage_date, marriage_time, marriage_place, marriage_link,
        reception_date, reception_time, reception_place, reception_link,
        wa_men, ig_men, wa_women, ig_women, photos_link,
        bank_name, bank_number, bank_name2, bank_number2, total_products, total_price) 
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $insert_order->execute([
                $user_id, $name, $number, $email, $address,
                $name_men, $nickname_men, $father_men, $mother_men, $child_men,
                $name_women, $nickname_women, $father_women, $mother_women, $child_women,
                $marriage_date, $marriage_time, $marriage_place, $marriage_link,
                $reception_date, $reception_time, $reception_place, $reception_link,
                $wa_men, $ig_men, $wa_women, $ig_women, $photos_link,
                $bank_name, $bank_number, $bank_name2, $bank_number2,
                $total_products, $total_price
            ]);

            $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
            $delete_cart->execute([$user_id]);

            header('location:orders.php');
        } else {

            $message[] = 'Keranjang kamu kosong!';
        }
    }
}
