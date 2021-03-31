<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./view/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courgette">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
            <img src="./view/shadowformicon.jpg" width="40" height="41" margin-left="0" alt="Shadow Form Icon">
            <div class="heading navigation col-2" id="<?php if ($page == "home"){ echo "active";}?>"><a href="#" class="stretched-link">Home</a></div>
            <div class="heading navigation col-2" id="<?php if ($page == "pveguide"){ echo "active";}?>"><a href="#">PVE Guides</a></div>
            <div class="heading navigation col-2" id="<?php if ($page == "bislist"){ echo "active";}?>"><a href="#">Best In Slot List</a></div>
            <div class="heading navigation col-2" id="<?php if ($page == "dpscalulator"){ echo "active";}?>"><a href="#">DPS Calculator</a></div>
            <div class="col-1"></div>
            <div class="heading col-2">
                <div class="container">
                    <label id="switch" class="switch">
                        <input type="checkbox" onchange="toggleTheme()" id="slider">
                        <span class="slider round"></span>
                    </label>
                </div>
            <script>
                // function to set a given theme/color-scheme
                function setTheme(themeName) {
                    localStorage.setItem('theme', themeName);
                    document.documentElement.className = themeName;
                }

                // function to toggle between light and dark theme
                function toggleTheme() {
                    if (localStorage.getItem('theme') === 'theme-dark') {
                        setTheme('theme-light');
                    } else {
                        setTheme('theme-dark');
                    }
                }

                // Immediately invoked function to set the theme on initial load
                (function () {
                    if (localStorage.getItem('theme') === 'theme-dark') {
                        setTheme('theme-dark');
                        document.getElementById('slider').checked = false;
                    } else {
                        setTheme('theme-light');
                    document.getElementById('slider').checked = true;
                    }
                })();
            </script>
            </div>
        </div>
    </div>