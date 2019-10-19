<?php
include 'includes/comments.inc.php';
include 'includes/dbh.inc.php';
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--Custom page CSS-->
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/animation.css">

    <!--Hamburger menu CSS-->
    <link href="css/hamburgers.css" rel="stylesheet">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Home Sweet home</title>
</head>

<body>
    <!--HEADER STARTS HERE-->
    <header class="fixed-top py-0 mb-5">
        <div class="container">
            <nav class="navbar navbar-expand-md  p-0 ">
                <a class="navbar-brand py-0" href="#">
                    <img src="images/assets/logo.png" alt="logo">
                </a>

                <!--HAMBURGER MENU STARTS HERE-->
                <button class="hamburger hamburger--spin navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation"" type=" button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
                <!--HAMBURGER MENU ENDS HERE-->


                <!--MAIN MENU STARTS HERE-->
                <div class="collapse navbar-collapse" id="main_menu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html#beggin">Naslovna <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#about">O nama</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="cakes.html">Torte
                                <span class="fa fa-caret-down position-absolute"></span> </a>
                            <!--SUBMENU STARTS HERE-->
                            <ul class="submenu list-unstyled">
                                <li class="submenu-item">
                                    <a href="cakes_kids.html" class="submenu-link cake_kids">Za decu</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="cakes_18th.html" class="submenu-link cake_18th">Za 18.rodjendan</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="cakes_wedding.html" class="submenu-link cake_wedding">Za vencanje</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="cakes_creative.html" class="submenu-link cake_creative">Razni oblici</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="cakes_adults.html" class="submenu-link cake_adult">Svecane</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="my_cookie.html" class="submenu-link my_cookie" href="#">Kolaci</a>
                                </li>
                            </ul>
                            <!--SUBMENU ENDS HERE-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="comments.php">Komentari</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#contact">Kontakt</a>
                        </li>
                        <?php
                        if (isset($_SESSION['userId'])) {

                           echo '<li class="nav-item">
                            <a class="nav-link" href="includes/logout.inc.php">Odjava<span class="fa fa-user"></span></a>
                        </li>';
                        } else {
                            echo ' <li class="nav-item">
                            <a class="nav-link active" href="login.php">Prijavite se<span class="fa fa-user"></span></a>
                        </li>';
                        }
                        ?>

                    </ul>
                </div>
            </nav>
        </div>
        <!--MAIN MENU ENDS HERE-->
    </header>
    <!--HEADER ENDS HERE-->
