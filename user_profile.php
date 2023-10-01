<?php

session_start();

include 'components/connect.php';


if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
    header('location:user_login.php');
};

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ? WHERE id = ?");
    $update_profile->execute([$name, $email, $user_id]);

    $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    $prev_pass = $_POST['prev_pass'];
    $old_pass = sha1($_POST['old_pass']);
    $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
    $new_pass = sha1($_POST['new_pass']);
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    if ($old_pass == $empty_pass) {
        $message[] = 'tolong masukkan kata sandi lama!';
    } elseif ($old_pass != $prev_pass) {
        $message[] = 'kata sandi lama tidak cocok!';
    } elseif ($new_pass != $cpass) {
        $message[] = 'konfirmasi kata sandi tidak cocok!';
    } else {
        if ($new_pass != $empty_pass) {
            $update_admin_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
            $update_admin_pass->execute([$cpass, $user_id]);
            $message[] = 'kata sandi berhasil diperbarui!';
        } else {
            $message[] = 'silakan masukkan kata sandi baru!';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbarui Akun</title>

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

    <section class="form-container>
        <?php
        $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
        $select_profile->execute([$user_id]);
        if ($select_profile->rowCount() > 0) {
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        ?>
            <p style=" text-align: center; font-size: large;"><?= $fetch_profile["name"]; ?></p>
        <a href="update_user.php" class="home-btn">perbarui profil</a>
        <div class="flex-btn">
            <a href="user_register.php" class="option-btn">daftar</a>
            <a href="user_login.php" class="btn">masuk</a>
        </div>
        <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('keluar dari sini?');">keluar</a>
    <?php
        } else {
            header('location:user_login.php');
        }
    ?>
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