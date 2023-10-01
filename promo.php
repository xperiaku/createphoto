<?php

session_start();

include 'components/connect.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promo Kami</title>

    <!-- Icon -->
    <link href="images/fav.png" rel="icon">

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- navbar awal-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <style>

    </style>

</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <section class="promo">
        <div class="slider">

            <?php
            $select_products = $conn->prepare("SELECT * FROM `promo` WHERE expire_datetime > NOW() ORDER BY id DESC");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
                while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <div class="promo-box">
                        <img class="slider-img" src="promo_img/<?= $fetch_product['image_01']; ?>" alt="">
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <section class="products">
        <h1 class="heading">Promo</h1>
        <div class="box-container">

            <?php
            $select_products = $conn->prepare("SELECT * FROM `promo` WHERE expire_datetime > NOW() ORDER BY id ASC");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
                while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <form action="" method="post" class="box">
                        <img src="promo_img/<?= $fetch_product['image_01']; ?>" alt="">
                        <div class="flex">
                            <div class="name" style="font-weight: bold;">Kode : <?= $fetch_product['code']; ?></div>
                        </div>
                        <div class="category">
                            <div class="price">Diskon : <?= $fetch_product['discount']; ?><span> %</span></div>
                        </div>

                        <div style="font-size: 1.3rem; float: right;">
                            <?= date('d F Y', strtotime($fetch_product['expire_datetime'])); ?>
                        </div>

                    </form>
            <?php
                }
            } else {
                echo '<p class="empty">tidak ada Promo ditemukan!</p>';
            }
            ?>

        </div>

    </section>



    <?php include 'components/whatsapp.php'; ?>
    <?php include 'components/footer.php'; ?>

    <script src="js/script.js"></script>
    <script>
        $(document).ready(function() {
            function setSliderImageAspectRatio() {
                var sliderWidth = $('.slider').width();
                var calculatedHeight = sliderWidth / 16 * 9;

                // Menghitung tinggi maksimal (80% dari tinggi layar)
                var viewportHeight = $(window).height();
                var maxHeight = 0.75 * viewportHeight;

                // Memastikan tinggi slider tidak melebihi tinggi maksimal
                var sliderHeight = Math.min(calculatedHeight, maxHeight);

                $('.slider img').height(sliderHeight);
            }

            $('.slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [{
                    breakpoint: 784,
                    settings: {
                        arrows: false
                    }
                }]
            });

            setSliderImageAspectRatio();

            $(window).resize(function() {
                setSliderImageAspectRatio();
            });
        });
    </script>



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
</body>

</html>