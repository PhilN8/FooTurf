<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Game | FooTurf</title>

    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/booking.css') ?>">
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
                <li class="nav__item"><a href="<?= base_url('/login') ?>" class="nav__link">Login</a></li>
                <li class="nav__item"><a href="about-us.html" class="nav__link">About Us</a></li>
                <li class="nav__item"><a href="routes.html" class="nav__link">Routes</a></li>
                <li class="nav__item"><a href="services.html" class="nav__link">Services</a></li>
                <li class="nav__item"><a href="javascript:void(0)" class="nav__link nav__link--btn">Book Online</a></li>
            </ul>
        </nav>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </header>

    <main class="main">
        <div class="container">

            <section class="animate-opacity book" id="book">
                <p class="book__title">Book A Game</p>
                <div class="form__container">
                    <div class="form__box">
                        <input type="text" class="form__input" name="team1" id="team1" placeholder=" ">
                        <label for="team1" class="form__label">Team 1 Name</label>
                    </div>
                    <div class="form__box">
                        <input type="text" class="form__input" name="team2" id="team2" placeholder=" ">
                        <label for="team2" class="form__label">Team 2 Name</label>
                    </div>
                    <div class="form__box">
                        <input type="date" class="form__input" name="game-date" id="game-date">
                        <label for="game-date" class="form__label">Date</label>
                    </div>
                    <div class="form__box">
                        <select class="form__input" name="game-time" id="game-time">
                            <option value="1" selected>0800 - 1000hrs</option>
                            <option value="2">1000 - 1200hrs</option>
                            <option value="3">1200 - 1400hrs</option>
                            <option value="4">1400 - 1600hrs</option>
                            <option value="5">1600 - 1800hrs</option>
                            <option value="6">1800 - 2000hrs</option>
                        </select>
                        <label for="game-time" class="form__label">Slots Available</label>
                    </div>
                </div>
                <button class="book__btn">Schedule</button>
            </section>

        </div>
    </main>

    <div class="modal" id="myModal">

        <div class="modal__content">

            <div class="modal__body">
                <p class="modal__body--title">Are You Sure?</p>
                <p class="modal__body--text">Refreshing the page will clear all the details</p>
            </div>

            <a class="modal__btn" id="refreshBtn" href="<?= base_url('booking') ?>">Refresh</a>
            <button class="modal__btn float-right" id="cancelBtn">Cancel</button>
        </div>

    </div>


    <script src="<?= base_url('scripts/jquery.min.js') ?>"></script>
    <script src="<?= base_url('scripts/toastr.js') ?>"></script>
    <script src="<?= base_url('scripts/nav.js') ?>"></script>
    <script src="<?= base_url('scripts/booking.js') ?>"></script>
</body>

</html>