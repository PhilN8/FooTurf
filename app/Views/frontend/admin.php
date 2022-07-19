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
    <title>Admin Page | FooTurf</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/toastr.css') ?>">
</head>

<body>

    <div class="menu-toggle">
        <div class="hamburger">
            <span></span>
        </div>
    </div>

    <aside>
        <nav>
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="#" class="logo">
                        <img src="<?= base_url('img/codeInfo.jpg') ?>" alt="Logo">
                        <span>FooTurf</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('intro')">
                        <i class="fas fa-home"></i><span class="nav__span">Home</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('teams')">
                        <i class="fas fa-users"></i><span class="nav__span">Team Profiles</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('games')">
                        <i class="fas fa-futbol"></i><span class="nav__span">Games</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('payment')">
                        <i class="fas fa-wallet"></i><span class="nav__span">Payments</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('analytics')">
                        <i class="fas fa-chart-bar"></i><span class="nav__span">Analytics</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('stats')">
                        <i class="fas fa-tasks"></i><span class="nav__span">Stats</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('comment')">
                        <i class="fas fa-cog"></i><span class="nav__span">Comments</span>
                    </a>
                </li>
                <!-- <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('intro')">
                        <i class="fas fa-question-circle"></i><span class="nav__span">Help</span>
                    </a>
                </li> -->
                <li class="nav__item">
                    <a href="<?= base_url('/logout') ?>" class="nav__link">
                        <i class="fas fa-sign-out-alt"></i><span class="nav__span">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="main">
        <section class="animate-opacity intro admin-section" id="intro">
            <?php

            echo "BULLSHIVIK " . session()->name . "<br>";
            echo "<a href=" . base_url('/logout') . ">Logout</a>";
            ?>
        </section>



        <section class="animate-opacity admin-section teams" id="teams">
            <h2 class="admin__title">Teams</h2>
            <table class="admin__table">
                <thead>
                    <tr>
                        <th>Team ID</th>
                        <th>Team Name</th>
                        <th>Captain</th>
                        <th>Contact Info</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="admin__table--long">
                    <?php foreach ($teams as $team) { ?>
                        <tr>
                            <td><?= $team['team_id'] ?></td>
                            <td><?= $team['team_name'] ?></td>
                            <td id="captain<?= $team['team_id'] ?>"><?= $team['captain_name'] ?? "Not Set" ?></td>
                            <td id="contact<?= $team['team_id'] ?>"><?php echo $team['contact_info'] != null ?   "0" . $team['contact_info'] :  "Not Set" ?></td>
                            <td><button onclick="editTeam(<?= $team['team_id'] ?>)" class="admin__btn--edit">Edit</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section class="animate-opacity admin-section edit" id="edit">
            <h2 class="admin__title">Edit Team Information</h2>
            <div class="form__container">
                <div class="form__box">
                    <input type="number" value="0" class="form__input" id="team-id" readonly>
                    <label for="team-id" class="form__label">Team ID</label>
                </div>

                <div class="form__box">
                    <input type="text" placeholder=" " class="form__input" id="captain">
                    <label for="captain" class="form__label">Captain Name</label>
                </div>

                <div class="form__box">
                    <input type="number" placeholder=" " class="form__input" id="contact">
                    <label for="contact" class="form__label">Contact</label>
                </div>

                <div class="form__btn--group">
                    <button class="form__btn form__btn--submit" onclick="editTeamInfo()">Update</button>
                    <button class="form__btn form__btn--cancel" onclick="openSection('teams')">Cancel</button>
                </div>
            </div>
        </section>

        <section class="scores animate-opacity admin-section" id="scores">
            <h2 class="admin__title">Add Game Scores</h2>
            <div class="form__container">
                <div class="form__box">
                    <input type="number" value="0" class="form__input" id="game-id" readonly>
                    <label for="game-id" class="form__label">Game ID</label>
                </div>

                <div class="form__box">
                    <input type="number" placeholder=" " class="form__input" id="score1">
                    <label for="score1" class="form__label">Score for <span id="team1-name"></span></label>
                </div>

                <div class="form__box">
                    <input type="number" placeholder=" " class="form__input" id="score2">
                    <label for="score2" class="form__label">Score for <span id="team2-name"></span></label>
                </div>

                <div class="form__btn--group">
                    <button class="form__btn form__btn--submit" onclick="addScores()">Update</button>
                    <button class="form__btn form__btn--cancel" onclick="openSection('games')">Cancel</button>
                </div>
            </div>
        </section>

        <section class="games animate-opacity admin-section" id="games">
            <h2 class="admin__title">Games</h2>

            <p class="admin__title--games">Matches to Update</p>
            <table class="admin__table" id="games-table">
                <thead>
                    <tr>
                        <th>Game ID</th>
                        <th>Match</th>
                        <th>Scores</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($games) > 0) {
                        foreach ($games as $game) { ?>
                            <tr>
                                <td><?= $game['game_id'] ?></td>
                                <td><?= $game['team1_name'] . " vs " . $game['team2_name']  ?></td>
                                <td><?= $game['team1_score'] && $game['team2_score'] ? ($game['team1_score'] . " - " . $game['team2_score']) : "N/A" ?></td>
                                <td><button class="admin__btn--edit" onclick="editScores(<?= $game['game_id'] ?>, '<?= $game['team1_name'] ?>', '<?= $game['team2_name'] ?>')">Add Scores</button></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <script>
                            document.querySelector("#games-table").style.display = 'none'
                        </script>
                        <p class="admin__msg">All Games Accounted For!</p>
                    <?php } ?>
                </tbody>
            </table>

            <p class="admin__title--games">Previous Matches</p>
            <table class="admin__table" id="scores-table">
                <thead>
                    <tr>
                        <th>Game ID</th>
                        <th>Match</th>
                        <th>Scores</th>
                        <th>Played On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($scores as $score) { ?>
                        <tr>
                            <td><?= $score['game_id'] ?></td>
                            <td><?= $score['team1_name'] . " vs " .  $score['team2_name'] ?></td>
                            <td><?= $score['team1_score'] . " - " . $score['team2_score'] ?></td>
                            <td><?= $score['game_date'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section class="payment animate-opacity admin-section" id="payment">
            <h2 class="admin__title">Payments</h2>
            <table class="admin__table">
                <thead>
                    <tr>
                        <th>Game ID</th>
                        <th>Match</th>
                        <th>No. of Hours</th>
                        <th>Cost</th>
                        <th>Played On</th>
                    </tr>
                </thead>
                <tbody class="admin__table--long">
                    <?php $total_cost = 0;
                    foreach ($payments as $payment) {
                        $total_cost += $payment['total_cost']; ?>
                        <tr>
                            <td><?= $payment['game_id'] ?></td>
                            <td><?= $payment['team1_name'] . " vs " .  $payment['team2_name'] ?></td>
                            <td><?= $payment['no_of_hours'] ?></td>
                            <td><?= $payment['total_cost'] ?></td>
                            <td><?= $payment['game_date'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total Matches</td>
                        <td class="has-info"><?= count($payments) ?></td>
                        <td>Total Cost</td>
                        <td class="has-info"><?= $total_cost ?></td>
                        <!-- <td></td> -->
                    </tr>
                </tfoot>
            </table>

            <style>

            </style>
        </section>

        <section class="analytics animate-opacity admin-section" id="analytics">
            <h2 class="admin__title">Analytics</h2>
            <div class="form__btn--group">
                <button class="form__btn form__btn--submit" onclick="openChart('chart_cash')">Cash</button>
                <button class="form__btn form__btn--cancel" onclick="openChart('chart_games')">Games</button>
            </div>
            <div class="admin-chart animate-opacity" id="chart_cash"></div>
            <div class="admin-chart animate-opacity" id="chart_games"></div>
        </section>

        <section class="stats admin-section animate-opacity" id="stats">
            <h2 class="admin__title">Stats</h2>
            <!-- <div class="form__box">
                <input type="text" placeholder=" " class="form__input" id="search-name">
                <label for="search-name" class="form__label">Team Name</label>
            </div>
            <button class="form__btn form__btn--submit" onclick="searchStats()">Update</button> -->
            <table class="admin__table">
                <thead>
                    <tr>
                        <th>Team</th>
                        <!-- <th>Games Booked</th> -->
                        <th>Games Played</th>
                        <th>GD</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody class="admin__table--long" id="statsTable">
                    <?php foreach ($allStats as $key => $stats) { #print_r($stats); 
                        $GF = $stats[2];
                        $GA = $stats[3];
                        $games = $stats[1];

                        if ($games < 1) continue;
                        // if (ratings($games, $GF, $GA) < 0.5) continue;
                    ?>
                        <tr>
                            <td><?= $key ?></td>
                            <!-- <td><?= $stats[0] ?></td> -->
                            <td><?= $stats[1] ?></td>
                            <td><?= $stats[2] - $stats[3] ?></td>
                            <td><?= ratings($games, $GF, $GA) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section class="admin-section animate-opacity comment" id="comment">
            <h2 class="admin__title">Comments</h2>
            <table class="admin__table">
                <thead>
                    <tr>
                        <th>Comment</th>
                        <!-- <th>Games Booked</th> -->
                        <th>Name</th>
                        <th>Number</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody class="admin__table--long" id="commentsTable">
                    <?php foreach ($comments as $comment) { #print_r($stats); 

                    ?>
                        <tr>
                            <td><?= $comment['comment_id'] ?></td>
                            <!-- <td><?= $stats[0] ?></td> -->
                            <td><?= $comment['name'] ?></td>
                            <td><?= $comment['phone_number'] ?></td>
                            <td><?= $comment['comment'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <script>
            function openChart(chart) {
                var x = document.getElementsByClassName("admin-chart");
                for (i = 0; i < x.length; i++) x[i].style.display = "none";

                document.getElementById(chart).style.display = "block";
            }

            function searchStats() {
                var team = $('#search-name').val().trim()

                if (team === '') {
                    toastr.warning("Enter Team Name");
                    $('#search-name').trigger("focus")
                    return;
                }

                $.ajax({
                    url: '/admin/stats',
                    method: 'POST',
                    data: {
                        team: team
                    },
                    success: (result) => console.log(result),
                    error: (data) => {
                        toastr.error("Something Went Wrong")
                        console.error(data.responseText, data.responseJSON)
                    }
                })
            }
        </script>
    </main>

    <script src="<?= base_url('scripts/jquery.min.js') ?>"></script>
    <script src="<?= base_url('scripts/toastr.js') ?>"></script>
    <script src="<?= base_url('scripts/admin.js') ?>"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

        google.charts.load("current", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data_cash = google.visualization.arrayToDataTable([
                ['Day', 'Cash', {
                    role: 'style'
                }],

                <?php
                $days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                $colors = ['red', 'gold', 'silver', 'dodgerblue', 'black', 'blue', 'green'];
                foreach ($cash as $value => $cash) {

                    echo "['" . $days[$value] . "', " . $cash['Cash'] . ", '" . $colors[$value] . "'],";
                } ?>
            ]);

            var view_cash = new google.visualization.DataView(data_cash);
            view_cash.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var data_games = google.visualization.arrayToDataTable([
                ['Day', 'Cash', {
                    role: 'style'
                }],
                <?php foreach ($gamesPerDay as $value => $games)
                    echo "['" . $days[$value] . "', " . $games['Games'] . ", '" . $colors[$value] . "'],";
                ?>
            ])

            var view_games = new google.visualization.DataView(data_games);
            view_games.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var options_cash = {
                title: "Money Collected, per Weekday",
                width: 850,
                height: 400,
                bar: {
                    groupWidth: "95%"
                },
                legend: {
                    position: "none"
                },
            };

            var options_games = {
                title: "Games Played, per Weekday",
                width: 850,
                height: 400,
                bar: {
                    groupWidth: "95%"
                },
                legend: {
                    position: "none"
                },
            };

            var chart_cash = new google.visualization.ColumnChart(document.getElementById("chart_cash"));
            chart_cash.draw(view_cash, options_cash);

            var chart_games = new google.visualization.ColumnChart(document.getElementById("chart_games"));
            chart_games.draw(view_games, options_games);
        }
    </script>

</body>

</html>