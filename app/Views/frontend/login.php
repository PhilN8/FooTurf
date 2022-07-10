<?php
session_start();
if (!isset($_SESSION['user_id'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Login | FooTurf</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/toastr.css') ?>">
        <!--        <link rel="icon" href="img/title.jpeg" type="image/x-icon">-->

    </head>

    <body>

        <header class="header">
            <div class="brand">
                <h1 class="brand__title">
                    <a href="<?= base_url('/') ?>" class="brand__title--link">FooTurf</a>
                </h1>
            </div>

            <nav class="navbar">
                <ul class="nav__list">
                    <li class="nav__item"><a href="<?= base_url('/') ?>" class="nav__link">Home</a></li>
                    <li class="nav__item"><a href="<?= base_url('/stats') ?>" class="nav__link">Top Teams</a></li>
                    <li class="nav__item"><a href="<?= base_url('/login') ?>" class="nav__link">Login</a></li>
                    <li class="nav__item"><a href="<?= base_url('/booking') ?>" class="nav__link nav__link--btn">Book A Game</a></li>
                </ul>
            </nav>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

        </header>


        <section class="login animate-opacity">
            <div class="container">

                <form action="/Login/login" method="post" class="login__form" id="loginForm">
                    <h2 class="login__form--title">Login</h2>

                    <div class="login__form--box">
                        <input type="text" placeholder=" " name="username" id="username" class="login__form--input">
                        <label for="username" class="login__form--label">User Name</label><br>
                    </div>

                    <div class="login__form--box">
                        <input type="password" id="password" name="password" placeholder=" " class="login__form--input w3-input"><br>
                        <label for="password" class="login__form--label">Password</label>
                    </div>

                    <button type="submit" class="login__form--btn">Login</button>
                </form>

            </div>
        </section>

        <footer class="footer">

            <div class="container">
                <div class="footer-container">
                    <section class="footer__col">
                        <p class="footer__col--title">Our Contacts</p>

                        <p class="footer__col--contact">Head Office: Railways Godown, Nairobi</p>
                        <p class="footer__col--contact">Email: info@easycoach.co.ke</p>
                        <p class="footer__col--contact">Phone: 0738200301</p>
                        <p class="footer__col--contact">Website: easycoach.co.ke</p>

                    </section>

                    <section class="footer__col">
                        <p class="footer__col--title">About Us</p>
                        <p class="footer__col--text">
                            Our mission is to be the Best Road Passenger Transport Company in East Africa.

                            We are a passenger transport and courier service provider registered in the
                            Republic of Kenya with an extensive branch network in Western and Nyanza provinces.

                        </p>
                    </section>

                    <section class="footer__col">
                        <p class="footer__col--title">Quick Links</p>

                        <ul class="footer__col--list">
                            <li class="footer__col--item"><a href="<?= base_url('/login') ?>" class="footer__col--link">Admin Login</a></li>
                            <li class="footer__col--item"><a href="services.html" class="footer__col--link">Services</a></li>
                            <li class="footer__col--item"><a href="about-us.html" class="footer__col--link">About Us</a></li>
                            <li class="footer__col--item"><a href="routes.html" class="footer__col--link">Routes</a></li>
                        </ul>
                    </section>
                </div>


            </div>

            <p class="footer__bottom--text">
                © Copyright - FooTurf Ltd <?= date('Y') ?>.
            </p>
        </footer>

        <script src="<?= base_url('scripts/jquery.min.js') ?>"></script>
        <script src="<?= base_url('scripts/toastr.js') ?>"></script>
        <script src="<?= base_url('scripts/nav.js') ?>"></script>
        <script src="<?= base_url('scripts/login.js') ?>"></script>

    </body>

    </html>

<?php } else ($_SESSION['role'] == 2) ?  header('location:homepage.php') : header('location:admin.php');
