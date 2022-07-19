<?php
function ratings($games, $goalsFor, $goalsAgainst)
{
    return round((100 * ($goalsFor * 0.5 - $goalsAgainst * 0.3) / $games), 2);
}
?>
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
        <section class="hero">
            <div class="hero-container container">
                <div class="hero-col">
                    <h2 class="team__title">Team Details</h2>
                    <p class="hero__text">Team Name: <span><?= $team['team_name'] ?? "N/A" ?></span></p>
                    <p class="hero__text">Captain Name: <span><?= $team['captain_name'] ?? "N/A" ?></span></p>
                    <p class="hero__text">Contact Info: <span><?php echo "0" . $team['contact_info'] ?? "N/A" ?></span></p>
                    <!-- <p class="hero__text">First Game on: <span><?= substr($team['created_at'], 0, 10) ?></span></p> -->
                    <a href="<?= base_url('/booking?team1=' . $team['team_name']) ?>" class="hero__btn hero__link">Challenge Them</a>
                </div>

                <div class="hero-col">
                    <h2 class="team__title">Team Stats</h2>
                    <p class="hero__text">Games Played: <span><?php echo $stats[1] . " (" . $team['games_won'] . "W, " . $team['games_drawn'] . "D, " . $team['games_lost'] . "L)"  ?></span></p>
                    <p class="hero__text">Goals Scored: <span><?= $stats[2] ?></span></p>
                    <p class="hero__text">Goals Conceded: <span><?= $stats[3] ?></span></p>
                    <p class="hero__text">Overall Rating: <span><?= ratings($stats[1], $stats[2], $stats[3]) ?></span></p>
                </div>
            </div>
        </section>

        <section class="similar">
            <div class="container">
                <h2 class="team__title">Similar Teams</h2>
                <table class="stats__table small">
                    <thead>
                        <tr>
                            <th>Team</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($similar as $name => $rating) {
                            if ($team['team_name'] === $name) continue; ?>
                            <tr>
                                <td><?= $name ?></td>
                                <td><?= $rating ?></td>
                                <td class="center"><a class="hero__btn hero__link" href="<?= base_url('/booking?team1=' . $name . '&team2=' . $team['team_name']) ?>">Play</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="stats">
            <div class="container">
                <h2 class="team__title">Last 5 Matches</h2>
                <?php if (count($matches) > 0) { ?>
                    <table class="stats__table">
                        <thead>
                            <tr>
                                <th>Match</th>
                                <th>Score</th>
                                <th>Game Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($matches as $match) { ?>
                                <tr>
                                    <td><?= $match['team1_name'] . " vs " . $match['team2_name'] ?></td>
                                    <td><?= $match['team1_score'] !== null ? $match['team1_score'] . " - " . $match['team2_score'] : "Not Yet Set" ?></td>
                                    <td><?= $match['game_date'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p class="stats__msg">No Matches Played <?= date("Y-m-d") . "  " .  date("now") ?></p>
                <?php } ?>
            </div>
        </section>

        <section class="future">
            <div class="container">
                <h2 class="team__title">Future Matches</h2>
                <?php if (count($future) > 0) { ?>
                    <table class="stats__table">
                        <thead>
                            <tr>
                                <th>Match</th>
                                <th>Game Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($future as $match) { ?>
                                <tr>
                                    <td><?= $match['team1_name'] . " vs " . $match['team2_name'] ?></td>
                                    <!-- <td><?= $match['team1_score'] . " - " . $match['team2_score'] ?></td> -->
                                    <td><?= $match['game_date'] ?></td>
                                    <td><?= substr($match['game_start'], 0, 5) . " - " . substr($match['game_end'], 0, 5) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p class="stats__msg">No Matches Scheduled Yet</p>
                <?php } ?>
            </div>
        </section>
    </main>


    <script src="<?= base_url('scripts/jquery.min.js') ?>"></script>
    <script src="<?= base_url('scripts/toastr.js') ?>"></script>
    <script src="<?= base_url('scripts/nav.js') ?>"></script>
    <script src="<?= base_url('scripts/stats.js') ?>"></script>
</body>

</html>