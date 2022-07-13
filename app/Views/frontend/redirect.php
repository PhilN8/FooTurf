<?php

use CodeIgniter\HTTP\Response;

if (isset($_GET['id'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Game Details | FooTurf</title>
        <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/toastr.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/redirect.css') ?>">
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
                    <li class="nav__item"><a href="<?= base_url('/booking') ?>" class="nav__link nav__link--btn">Book Online</a></li>
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
                <section class="intro animate-opacity" id="intro">
                    <h2 class="intro__title">Enjoy Your Game</h2>
                    <p class="intro__text">
                        Thank you for booking a match.
                    </p>

                    <div class="intro__links">
                        <a class="intro__links--btn" href="<?= base_url('/') ?>">Home</a>
                        <a class="intro__links--btn" href="<?= base_url('/booking') ?>">Book Another</a>
                    </div>
                </section>

                <section class="info animate-opacity" id="info">
                    <table class="info__table">
                        <thead>
                            <tr>
                                <th colspan="2">Match Info</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Match</td>
                                <td class="have-id" id="match"></td>
                            </tr>
                            <tr>
                                <td>Game Time</td>
                                <td class="have-id" id="time"></td>
                            </tr>
                            <tr>
                                <td>Game Date</td>
                                <td class="have-id" id="date"></td>
                            </tr>
                            <tr>
                                <td>Booked On</td>
                                <td class="have-id" id="booked"></td>
                            </tr>
                            <tr>
                                <td>Total Cost</td>
                                <td class="have-id" id="cost"></td>
                            </tr>
                            <!-- <tr>
                                <td>Seat Numbers</td>
                                <td class="have-id" id="seats"></td>
                            </tr>
                            <tr>
                                <td>Total Cost</td>
                                <td class="have-id" id="total-cost"></td>
                            </tr> -->
                        </tbody>
                    </table>
                </section>
            </div>
        </main>



        <script src="<?= base_url('scripts/jquery.min.js') ?>"></script>
        <script src="<?= base_url('scripts/toastr.js') ?>"></script>
        <script src="<?= base_url('scripts/nav.js') ?>"></script>
        <script src="<?= base_url('scripts/redirect.js') ?>"></script>
    </body>

    </html>

<?php } else {
    // $this->load->helper('url');
    helper(['url']);
    return redirect()->to(base_url('/booking'));
}
    // return (new Response)->redirect(base_url('/booking'));
    // return $this->response->redirect(base_url('/booking'));
