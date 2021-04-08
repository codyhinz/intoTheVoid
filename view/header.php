<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./view/style.css">
    <link rel="icon" href="./view/images/shadowformicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courgette">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./model/functions.js" defer></script>
    <script src="./model/theme.js" defer></script>
    <?php
        switch($page) {
            case 'home':
                echo "<title>Into the Void</title>";
            case 'pveguide':
                echo "<title>PVE Guide</title>";
            case 'bislist':
                echo "<title>Best in Slot List</title>";
            case 'dpscalculator':
                echo "<title>DPS Calculator</title>";
        }
    ?>
</head>
<body>
    <div class="container-fluid navrow">
        <div class="row">
            <img src="./view/images/shadowformicon.png" width="40" height="41" margin-left="0" alt="Shadow Form Icon">
            <div class="heading navigation col-2" id="<?php if ($page == "home"){ echo "active";}?>"><a href="index.php" class="stretched-link">Home</a></div>
            <div class="heading navigation col-2" id="<?php if ($page == "pveguide"){ echo "active";}?>"><a href="pveguide.php" class="stretched-link">PVE Guides</a></div>
            <div class="heading navigation col-2" id="<?php if ($page == "bislist"){ echo "active";}?>"><a href="#" class="stretched-link">Best in Slot List</a></div>
            <div class="heading navigation col-2" id="<?php if ($page == "dpscalculator"){ echo "active";}?>"><a href="dpscalc.php" class="stretched-link">DPS Calculator</a></div>
            <div class="col-1"></div>
            <div class="heading col-2 align-items-end">
                <div class="container">
                    <label id="switch" class="switch">
                        <input type="checkbox" onchange="toggleTheme()" id="slider">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-11 mobilenav">
        <div class="row">
            <div class="col-2 align-items-end">
                <button class="btn" onclick="nav()">
                    <img src="./view/images/hamburger.png" width="40" height="38" id="hamburgericon">
                </button>
            </div>
            <h1 class="col-5">Into the Void</h1>
            <div class="col-2 heading">
                <div class="container">
                    <label id="switch" class="switch">
                        <input type="checkbox" onchange="toggleTheme()" id="slider">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="navmenu" style="display: none;">
            <a href="index.php"><div class="row justify-content-center topnav" id="<?php if ($page == "home"){ echo "active";}?>">Home</div></a>
            <a href="pveguide.php"><div class="row justify-content-center midnav" id="<?php if ($page == "pveguide"){ echo "active";}?>">PVE Guides</div></a>
            <a href="#"><div class="row justify-content-center midnav" id="<?php if ($page == "bislist"){ echo "active";}?>">Best In Slot List</div></a>
            <a href="dpscalc.php"><div class="row justify-content-center bottomnav" id="<?php if ($page == "dpscalculator"){ echo "active";}?>">DPS Calculator</div></a>
        </div>
    </div>