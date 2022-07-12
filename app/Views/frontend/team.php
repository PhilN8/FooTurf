<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $team['team_name'] ?? "Team" ?> | FooTurf</title>

    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/toastr.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/team.css') ?>">
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

    <main class="main">
        <div class="container">
            <section class="hero">
                <h1 class="stats__title">Team Details: <?= $team['team_name'] ?? "Team" ?></h1>
                <div class="hero__details">
                    <p class="hero__text">Captain Name: <?= $team['captain_name'] ?? "N/A" ?></p>
                    <p class="hero__text">Contact Info: <?= $team['contact_info'] ?? "N/A" ?></p>
                    <p class="hero__text">Date Formed: <?= substr($team['created_at'], 0, 10) ?></p>
                </div>
            </section>

            <section class="stats">
                <h2 class="stats__title">Last 5 Matches</h2>
                <table class="stats__table">
                    <?php
                    echo "<pre>";
                    print_r($matches);
                    echo "</pre>";
                    ?></table>
            </section>
        </div>
    </main>


    <script src="<?= base_url('scripts/jquery.min.js') ?>"></script>
    <script src="<?= base_url('scripts/toastr.js') ?>"></script>
    <script src="<?= base_url('scripts/nav.js') ?>"></script>
    <script src="<?= base_url('scripts/stats.js') ?>"></script>
</body>

</html>