<?php

include 'components/connect.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $loggedIn = true;
} else {
    $loggedIn = false;
}


if (isset($message)) {
    foreach ($message as $message) {
        echo '
<div class="message">
    <span>' . $message . '</span>
    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
</div>
';
    }
}
?>

<div class="overlay"></div>

<nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none">
    <div class="container">

        <button type="button" id="sidebarCollapse" class="header-btn btn-link d-block d-md-none">
            <i class="bx bx-menu icon-single"></i>
        </button>

        <a class="navbar-brand" href="index.php">
            <h4>Create<span class="font-weight-bold">Photo</span></h4>
        </a>

        <ul class="navbar-nav ml-auto d-block d-md-none">
            <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
            ?>

            <li class="nav-item">
                <a class="header-btn" href="wishlist.php"><i class="bx bx-heart icon-single"></i> <span class="badge badge-danger"><?= $total_wishlist_counts; ?></span></a>
            </li>
            <li class="nav-item">
                <a class="header-btn" href="cart.php"><i class="bx bx-cart-alt icon-single"></i> <span class="badge badge-danger"><?= $total_cart_counts; ?></span></a>
            </li>

        </ul>

        <div class="collapse navbar-collapse">
            <form class="form-inline my-2 my-lg-0 mx-auto" method="POST" action="./search_page.php">
                <input class="form-control" type="search" placeholder="Silahkan Cari..." aria-label="Search" name="search_box" required>
                <button class="search-btn btn-success my-2 my-sm-0" type="submit" name="search_btn"><i class="bx bx-search"></i></button>
            </form>

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="header-btn" href="wishlist.php"><i class="bx bx-heart icon-single"></i> <span class="badge badge-danger"><?= $total_wishlist_counts; ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="header-btn" href="cart.php"><i class="bx bx-cart-alt icon-single"></i> <span class="badge badge-danger"><?= $total_cart_counts; ?></span></a>
                </li>
                <li class="nav-item">
                    <a class="header-btn" href="./update_user.php"><i class="bx bx-user-circle icon-single"></i></a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<nav class="navbar navbar-expand-md navbar-light bg-light sub-menu">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mx-auto" style="font-size: 15px;">
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'promo.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="promo.php">Promo</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'shop.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="shop.php">Produk</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo (basename($_SERVER['PHP_SELF']) == 'category.php') ? 'active' : ''; ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 15px; ">
                        <a class="dropdown-item" href="category.php?category=1">Video Landscape</a>
                        <a class="dropdown-item" href="category.php?category=2">Video Potrait</a>
                        <a class="dropdown-item" href="category.php?category=3">Foto Potrait</a>
                    </div>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'orders.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="orders.php">Pesanan</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="contact.php">Kontak</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="about.php">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="search-bar d-block bg-light d-md-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="form-inline mb-3 mx-auto" method="POST" action="./search_page.php">
                    <input class="form-control" type="search" placeholder="Silahkan Cari..." aria-label="Search" name="search_box" required>
                    <button class="search-btn btn-success" type="submit" name="search_btn"><i class="bx bx-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-8 pl-10">
                    <a class="header-btn" href="./update_user.php">
                        <i class="bx bx-user-circle icon-single bx-lg" id="userIcon"></i>
                        <span class="login-text">
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                $user_id = $_SESSION['user_id'];
                                $query = $conn->prepare("SELECT name FROM users WHERE id = ?");
                                $query->execute([$user_id]);
                                $user = $query->fetch();
                                echo "Hai, " . $user['name'];
                            } else {
                                echo "Login";
                            }
                            ?>
                        </span>
                    </a>
                </div>

                <div class="col-2 text-left">
                    <button type="button" id="sidebarCollapseX" class="header-btn btn-link">
                        <i class="bx bx-x icon-single"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <ul class="list-unstyled components links">
        <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
            <a href="index.php"><i class="bx bx-home mr-3"></i> Home</a>
        </li>
        <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'promo.php') ? 'active' : ''; ?>">
            <a href="promo.php"><i class="bx bx-purchase-tag-alt mr-3"></i> Promo</a>
        </li>
        <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'shop.php') ? 'active' : ''; ?>">
            <a href="shop.php"><i class="bx bx-package mr-3"></i> Produk</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bx bx-spreadsheet mr-3"></i>
                Kategori</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'category.php' && isset($_GET['category']) && $_GET['category'] == 1) ? 'active' : ''; ?>">
                    <a href="category.php?category=1">Video Landscape</a>
                </li>
                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'category.php' && isset($_GET['category']) && $_GET['category'] == 2) ? 'active' : ''; ?>">
                    <a href="category.php?category=2">Video Potrait</a>
                </li>
                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'category.php' && isset($_GET['category']) && $_GET['category'] == 3) ? 'active' : ''; ?>">
                    <a href="category.php?category=3">Foto Potrait</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'orders.php') ? 'active' : ''; ?>">
            <a href="orders.php"><i class="bx bx-shopping-bag mr-3"></i> Pesanan</a>
        </li>
        <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : ''; ?>">
            <a href="contact.php"><i class="bx bx-phone mr-3"></i> Kontak</a>
        </li>
        <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>">
            <a href="about.php"><i class="bx bx-help-circle mr-3"></i> Tentang</a>
        </li>
    </ul>


    <h6 class="text-uppercase mb-1" style="font-size: 2rem; margin:2rem; font-weight: bold;">Kategori</h6>
    <ul class="list-unstyled components mb-3">
        <li>
            <a href="category.php?category=1">Video Landscape</a>
        </li>
        <li>
            <a href="category.php?category=2">Video Potrait</a>
        </li>
        <li>
            <a href="category.php?category=3">Foto Potrait</a>
        </li>
    </ul>

    <ul class="social-icons">
        <li><a href="https://bit.ly/3K05V4Y" target="_blank" title=""><i class="bx bxl-whatsapp"></i></a></li>
        <li><a href="https://www.instagram.com/createphoto.id/" target="_blank" title=""><i class="bx bxl-instagram"></i></a></li>
        <li><a href="mailto:createphoto.id@gmail.com" target="_blank" title=""><i class="bx bx-envelope"></i></a></li>
        <!-- <li><a href="#" target="_blank" title=""><i class="bx bxl-linkedin"></i></a></li> -->
    </ul>

    <?php if ($loggedIn) : ?>
        <a href="components/user_logout.php" style="width: auto; padding: 1.3rem 5rem; margin:1rem 0 2rem 3rem;" class="delete-btn" onclick="return confirm('Keluar dari sini?');">Keluar</a>
    <?php endif; ?>

</nav>

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

    // Mengatur aksi ketika ikon pengguna (user) diklik
    document.getElementById("userIcon").addEventListener("click", function() {
        document.querySelector(".profile").classList.toggle("hide");
    });

    // Mengatur aksi ketika ikon profil diklik
    document.getElementById("profileIcon").addEventListener("click", function() {
        // Tampilkan pop-up di sini
        alert("Tampilkan pop-up profil");
    });
</script>