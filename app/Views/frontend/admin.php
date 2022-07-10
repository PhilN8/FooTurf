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
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('intro')">
                        <i class="fas fa-user"></i><span class="nav__span">Profile</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('intro')">
                        <i class="fas fa-wallet"></i><span class="nav__span">Wallet</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('intro')">
                        <i class="fas fa-chart-bar"></i><span class="nav__span">Analytics</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('intro')">
                        <i class="fas fa-tasks"></i><span class="nav__span">Tasks</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('intro')">
                        <i class="fas fa-cog"></i><span class="nav__span">Settings</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="javascript:void(0)" class="nav__link" onclick="openSection('intro')">
                        <i class="fas fa-question-circle"></i><span class="nav__span">Help</span>
                    </a>
                </li>
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
            echo "BULLSHIVIK " . $_SESSION['name'] . "<br>";
            echo "<a href=" . base_url('/logout') . ">Logout</a>";
            ?>
        </section>
    </main>

    <script src="<?= base_url('scripts/jquery.min.js') ?>"></script>
    <script src="<?= base_url('scripts/toastr.js') ?>"></script>
    <script src="<?= base_url('scripts/admin.js') ?>"></script>
</body>

</html>