<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | FooTurf</title>

    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/toastr.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/stats.css') ?>">
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
        <!-- <div class="container"> -->
        <section class="hero animate-opacity" id="hero">
            <div class="container">
                <h2 class="hero__title">Top Teams</h2>
                <?php foreach ($teams as $team) { ?>
                    <p class="hero__text"><?= $team['team_name'] ?></p>
                <?php } ?>
            </div>
        </section>

        <style>
            .match-container {
                display: flex;
                gap: 1.5rem;
            }

            .match-row {
                padding: 25px 30px;
                background-color: var(--nav-light);
                color: var(--nav-primary);
            }
        </style>

        <section class="match animate-opacity" id="match">
            <div class="container">
                <h2 class="match__title">Today's Matches</h2>
                <div class="match-container">
                    <?php foreach ($games as $game) { ?>
                        <div class="match-row">
                            <p class="match-title">Match:
                                <a href="<?= base_url('team/' . $game['team1_name']) ?>"><?= $game['team1_name'] ?><a>
                                        vs <a href="<?= base_url('team/' . $game['team2_name']) ?>"><?= $game['team2_name'] ?><a>
                            </p>
                            <p class="match-time">Time: <?= substr($game['game_start'], 0, 5) . " - " . substr($game['game_end'], 0, 5) ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </section>
        <!-- </div> -->
    </main>

    <script src="<?= base_url('scripts/jquery.min.js') ?>"></script>
    <script src="<?= base_url('scripts/toastr.js') ?>"></script>
    <script src="<?= base_url('scripts/nav.js') ?>"></script>
    <script src="<?= base_url('scripts/stats.js') ?>"></script>
</body>

</html>