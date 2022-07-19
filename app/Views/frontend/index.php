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

        <section class="services">
            <div class="container">
                <p class="services__title">What We Offer</p>
                <div class="services-container">
                    <div class="services__col">
                        <p class="services__col--number">1</p>
                        <p class="services__col--title">Online Booking</p>
                        <p class="services__col--text">Get instant information when scheduling a match, and allows for payment of matches via online payments</p>
                    </div>
                    <div class="services__col">
                        <p class="services__col--number">2</p>
                        <p class="services__col--title">Connect With Other Teams</p>
                        <p class="services__col--text">Contact Info for each Team Captain© is available to easily reach out and connect with new teams</p>
                    </div>
                    <div class="services__col">
                        <p class="services__col--number">3</p>
                        <p class="services__col--title">Tracking of Stats</p>
                        <p class="services__col--text">
                            We keep detailed statistics on all teams which help connect similarly-skilled teams
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <style>
            .services {
                background-color: var(--nav-primary);
                color: var(--nav-light);
                padding-block: 2rem;
            }

            .services__title {
                font-size: 2rem;
                font-weight: 700;
                text-align: center;
                margin-bottom: 1.2rem;
            }

            .services__col {
                background-color: var(--nav-light);
                color: var(--nav-primary);
                padding: 2.5rem 20px 1rem;
                text-align: center;
                margin-bottom: 1.5rem;
            }

            .services__col--title {
                font-size: 1.25rem;
                margin-bottom: 0.5rem;
                font-weight: 700;
            }

            .services__col--number {
                margin-bottom: 1rem;
                height: 60px;
                width: 60px;
                display: grid;
                place-content: center;
                border-radius: 50%;
                text-align: center;
                background-color: var(--nav-primary);
                color: var(--nav-light);
                font-size: 1.5rem;
                margin-inline: auto;
            }

            @media all and (min-width: 768px) {
                .services-container {
                    display: flex;
                    justify-content: space-between;
                    gap: 2rem;
                }
            }
        </style>


        <section class="location">
            <div class="container location-container">
                <div class="location__info">
                    <h2 class="location__info--title">Where We are Located
                    </h2>
                    <p class="location__info--text">Plainsview Road</p>
                    <p class="location__info--text">Next to Gate A (Plainsview Estate)</p>
                    <p class="location__info--text">South B, Nairobi</p>
                </div>

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
            <div class="container">

                <div class="inquiry__box">
                    <h2 class="inquiry__title">Write Us a Comment!</h2>
                    <div class="book__form--box">
                        <input type="text" name="fname" id="fname" class="book__form--input" placeholder=" ">
                        <label for="fname" class="book__form--label">Name</label>
                    </div>

                    <div class="book__form--box">
                        <input type="number" name="phone" id="phone" class="book__form--input" placeholder=" ">
                        <label for="phone" class="book__form--label">Phone Number</label>
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