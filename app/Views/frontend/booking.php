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
                <li class="nav__item"><a href="<?= base_url('/') ?>" class="nav__link">Home</a></li>
                <li class="nav__item"><a href="<?= base_url('/stats') ?>" class="nav__link">Top Teams</a></li>
                <li class="nav__item"><a href="<?= base_url('/login') ?>" class="nav__link">Login</a></li>
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

                    <!-- <div class="form__box">
                        <select class="form__input" name="game-time" id="game-time">
                            <option value="1" selected>0800 - 1000hrs</option>
                            <option value="2">1000 - 1200hrs</option>
                            <option value="3">1200 - 1400hrs</option>
                            <option value="4">1400 - 1600hrs</option>
                            <option value="5">1600 - 1800hrs</option>
                            <option value="6">1800 - 2000hrs</option>
                        </select>
                        <label for="game-time" class="form__label">Slots Available</label>
                    </div> -->

                    <div class="form__box">
                        <select name="game-start" id="game-start" class="form__input">
                            <option value="080000" selected>8am</option>
                            <option value="090000">9am</option>
                            <option value="100000">10am</option>
                            <option value="110000">11am</option>
                            <option value="120000">12pm</option>
                            <option value="130000">1pm</option>
                            <option value="140000">2pm</option>
                            <option value="150000">3pm</option>
                            <option value="160000">4pm</option>
                            <option value="170000">5pm</option>
                            <option value="180000">6pm</option>
                            <option value="190000">7pm</option>
                            <option value="200000">8pm</option>
                            <option value="210000">9pm</option>
                            <option value="220000">10pm</option>
                        </select>
                        <label for="game-start" class="form__label">Start Time</label>
                    </div>

                    <div class="form__box">
                        <select name="game-end" id="game-end" class="form__input">
                            <option value="090000" selected>9am</option>
                            <option value="100000">10am</option>
                            <option value="110000">11am</option>
                            <option value="120000">12pm</option>
                            <option value="130000">1pm</option>
                            <option value="140000">2pm</option>
                            <option value="150000">3pm</option>
                            <option value="160000">4pm</option>
                            <option value="170000">5pm</option>
                            <option value="180000">6pm</option>
                            <option value="190000">7pm</option>
                            <option value="200000">8pm</option>
                            <option value="210000">9pm</option>
                            <option value="220000">10pm</option>
                            <option value="230000">11pm</option>
                        </select>
                        <label for="game-end" class="form__label">End Time</label>
                    </div>

                    <div class="form__box">
                        <input type="number" class="form__input" name="hours" id="hours" min="1" max="3" value="1">
                        <label for="hours" class="form__label">Number of Hours</label>
                    </div>

                    <div class="form__box">
                        <input type="number" class="form__input" name="game-cost" id="game-cost" value="2000" readonly>
                        <label for="game-cost" class="form__label">Cost Per Hour</label>
                    </div>

                    <div class="form__box">
                        <input type="number" class="form__input" name="total-cost" id="total-cost" value="2000" readonly>
                        <label for="total-cost" class="form__label">Total</label>
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