<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .footer-clean {
            padding: 50px 0;
            background-color: #fff;
            color: #4b4c4d;
        }

        .footer-clean h3 {
            margin-top: 0;
            margin-bottom: 12px;
            font-weight: bold;
            font-size: 16px;
        }

        .footer-clean ul {
            padding: 0;
            list-style: none;
            line-height: 2;
            font-size: 14px;
            margin-bottom: 0;
        }

        .footer-clean ul a {
            color: inherit;
            text-decoration: none;
            opacity: 0.8;
        }

        .footer-clean ul a:hover {
            opacity: 1;
        }

        .footer-clean .item.social {
            text-align: right;
        }

        @media (max-width:767px) {
            .footer-clean .item {
                text-align: center;
                padding-bottom: 20px;
            }
        }

        @media (max-width: 768px) {
            .footer-clean .item.social {
                text-align: center;
            }
        }

        .footer-clean .item.social>a {
            font-size: 24px;
            width: 40px;
            height: 40px;
            line-height: 40px;
            display: inline-block;
            text-align: center;
            border-radius: 50%;
            border: 1px solid #ccc;
            margin-left: 10px;
            margin-top: 22px;
            color: inherit;
            opacity: 0.75;
        }

        .footer-clean .item.social>a:hover {
            opacity: 0.9;
        }

        @media (max-width:991px) {
            .footer-clean .item.social>a {
                margin-top: 40px;
            }
        }

        @media (max-width:767px) {
            .footer-clean .item.social>a {
                margin-top: 10px;
            }
        }

        .footer-clean .copyright {
            margin-top: 14px;
            margin-bottom: 0;
            font-size: 13px;
            opacity: 0.6;
        }
    </style>
</head>

<body>
    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Link Cepat</h3>
                        <ul>
                            <li><a href="update_user.php">Profile</a></li>
                            <li><a href="promo.php">Promo</a></li>
                            <li><a href="shop.php">Product</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Tambahan</h3>
                        <ul>
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="orders.php">Orders</a></li>
                            <li><a href="wishlist.php">Wishlist</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Akses</h3>
                        <ul>
                            <li><a href="user_login.php">Login</a></li>
                            <li><a href="user_register.php">Register</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social">
                        <a href="mailto:createphoto.id@gmail.com"><i class='bx bx-envelope'></i></a>
                        <a href="https://maps.app.goo.gl/NbMBMqKvC2QgWsba9"><i class='bx bx-map'></i></a>
                        <a href="https://www.instagram.com/createphoto.id/"><i class='bx bxl-instagram'></i></a>
                        <a href="https://bit.ly/3K05V4Y"><i class='bx bxl-whatsapp'></i></a>
                        <p class="copyright">
                            CreatePhoto © <?php echo date("Y"); ?>
                        </p>

                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>