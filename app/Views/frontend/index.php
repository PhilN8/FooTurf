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
                <button class="hero__btn"><a href="<?= base_url('/booking') ?>" class="hero__link">Book a Game</a></button>
            </section>
        </div>



        <section class="location">
            <div class="container location-container">
                <div class="location__info">
                    <h2 class="location__info--title">Where We are Located
                    </h2>
                    <p class="location__info--text">Plainsview Road</p>
                    <p class="location__info--text">Next to Gate A (Plainsview Estate)</p>
                    <p class="location__info--text">South B, Nairobi</p>
                </div>
                <!-- COUNT(b.team2_score) AS goalsFor2 -->
                <!-- SELECT a.team_name, SUM(b.team1_score) as goalsFor1, SUM(b.team1_score) as goalsFor2 FROM `tbl_teams` AS a INNER JOIN `tbl_games` AS b ON (a.team_name = b.team1_name OR a.team_name=b.team2_name) GROUP BY a.team_name -->
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe id="gmap_canvas" width="100%" height="100%" src="https://maps.google.com/maps?q=Turf%20South%20B&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2piratebay.org"></a><br>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                height: min(50vh, 400px);
                                width: min(100%, 600px);
                            }
                        </style>
                        <a href="https://www.embedgooglemap.net">google map html widget</a>
                        <style>
                            .gmap_canvas {
                                overflow: hidden;
                                margin-inline: auto;
                                /* object-fit: cover; */
                                background: none !important;
                                /* height: 500px; */
                                /* width: 600px; */

                                height: 100%;
                                width: min(100%, 600px);
                            }

                            iframe {
                                display: block;
                                max-width: 100%;
                                object-fit: cover;
                            }
                        </style>
                    </div>
                </div>


            </div>
        </section>

        <style>
            .location__info--title {
                font-size: 2rem;
            }

            .location__info--text {
                font-size: 1.1rem;
            }

            .location__info {
                text-align: center;
                margin-bottom: 1.2rem;
            }

            @media screen and (min-width: 850px) {
                .location-container {
                    display: flex;
                    /* gap: 2.5rem; */
                    justify-content: space-between;
                    /* flex-direction: row-reverse; */
                }

                .mapouter {
                    /* flex-basis: 70%; */
                    flex-grow: 1;
                    align-self: center;
                }

                .location__info {
                    flex-basis: 30%;
                    margin-bottom: 0;
                    align-self: center;
                }
            }

            .location {
                padding-block: 2.5rem;
                background-color: var(--nav-primary);
                background-color: #eee;
                color: black;
            }
        </style>

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

        <!-- <div class="container">
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


        </div> -->

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

<!-- SELECT a.team_name, SUM(b.team1_score) as goalsFor1, SUM(b.team2_score) as goalsFor2 FROM `tbl_teams` AS a INNER JOIN `tbl_games` AS b ON (b.team1_name = "Panenka" OR b.team2_name='Panenka') GROUP BY a.team_name -->

<!-- SELECT a.team_name AS team, SUM(b.team1_score) as goalsForHome FROM `tbl_teams` AS a INNER JOIN `tbl_games` AS b ON (b.team1_name =a.team_name) GROUP BY a.team_name -->
<!-- SELECT a.team_name AS team, SUM(b.team2_score) as goalsForAway FROM `tbl_teams` AS a INNER JOIN `tbl_games` AS b ON (b.team2_name =a.team_name) GROUP BY a.team_name -->

<!-- SELECT a.team_name AS team, COUNT(b.game_id) as gamesHome FROM `tbl_teams` AS a INNER JOIN `tbl_games` AS b ON (b.team1_name =a.team_name) GROUP BY a.team_name -->
<!-- SELECT a.team_name AS team, COUNT(b.game_id) as gamesAway FROM `tbl_teams` AS a INNER JOIN `tbl_games` AS b ON (b.team2_name =a.team_name) GROUP BY a.team_name -->