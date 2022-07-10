<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | FooTurf</title>

    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/index.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/toastr.css') ?>">
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

    <main class="main animate-opacity">
        <div class="container">
            <section class="hero">
                <p class="hero__title">Welcome to FooTurf</p>
                <p class="hero__text">One-Stop Shop For Your Football Games</p>
                <button class="hero__btn"><a href="#" class="hero__link">Book a Game</a></button>
            </section>
        </div>


        <section class="services" id="services">
            <div class="container services-container">
                <div class="services__col">
                    <h2 class="services__col--title">
                        Passenger Services
                    </h2>
                    <img src="img/bus-2.jpg" alt="image of bus" class="services__col--img">
                    <p class="services__col--text">
                        Our reputation has been built upon being the Number 1
                        transport service in the country. We have a fleet of
                        buses and an experienced team of drivers dedicated to
                        getting you wherever you want to go.
                    </p>
                    <a href="book_online.php" class="services__col--link">Book a Ticket</a>
                </div>
                <div class="services__col">
                    <h2 class="services__col--title">
                        Courier Services
                    </h2>
                    <img src="img/package.jpg" alt="image of person inspecting packages" class="services__col--img">
                    <p class="services__col--text">
                        We use our extensive coverage to deliver packages,
                        letters and other goods. Our aim is to provide customized
                        logistic solutions to our esteemed clients through our extensive
                        network.
                    </p>
                    <a href="services.html" class="services__col--link">More Info</a>
                </div>
            </div>
        </section>

        <section class="inquiry">
            <div class="container inquiry-container">
                <div class="inquiry__col">
                    <!--                    <img src="img/banner-inquiry.jpg" alt="Inquiry banner" class="inquiry__img">-->
                    <p class="inquiry__text--title">Visit Us</p>
                    <p class="inquiry__text--normal">
                        Railways<br />Nairobi, Kenya
                    </p>
                    <p class="inquiry__text--title">Call Us</p>
                    <p class="inquiry__text--normal">
                        0738200301
                    </p>
                    <p class="inquiry__text--title">Write to Us</p>
                    <p class="inquiry__text--normal">
                        info@easycoach.co.ke
                    </p>
                </div>
                <div class="inquiry__col inquiry__col--comment">
                    <h2 class="inquiry__title">Write Us a Comment!</h2>
                    <div class="book__form--box">
                        <input type="text" name="fname" id="fname" class="book__form--input" placeholder=" ">
                        <label for="fname" class="book__form--label">Name</label>
                    </div>

                    <div class="book__form--box">
                        <input type="text" name="email" id="email" class="book__form--input" placeholder=" ">
                        <label for="email" class="book__form--label">Email</label>
                    </div>
                    <div class="book__form--box">
                        <textarea name="comment" id="comment" cols="30" rows="7" class="book__form--input" placeholder=" "></textarea>
                        <label for="comment" class="book__form--label">Comment</label>
                    </div>
                    <button type="submit" class="inquiry__btn" onclick="sendComment()">Submit</button>
                </div>
            </div>
        </section>
    </main>

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
                    <p class="footer__col--title">
                        Quick Links
                    </p>

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
    <script src="<?= base_url('scripts/index.js') ?>"></script>
</body>

</html>