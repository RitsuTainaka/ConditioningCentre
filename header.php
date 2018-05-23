<?php
/**
 * Created by PhpStorm.
 * User: rukia
 * Date: 5/19/2018
 * Time: 3:35 AM
 */
session_start();
include_once('include/core.php');
debug();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

</head>
<body>
<div class="grid-container">
    <div class="header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <?php if(isset($_SESSION['login_user'])) {
                        ?>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php
                    }
                    ?>
                    <div class="navbar-brand">
                        <a href="#" style="visibility: hidden" id="navback"><span class="fas fa-arrow-circle-left backicon">&nbsp;</span></a>
                        <span id="navbartext" class="brandingtext"></span>
                    </div>
                </div>

                <?php if(isset($_SESSION['login_user'])) {
                    ?>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="program.php">Programs</a></li>
                            <?php
                            if($_SESSION['accesslevel'] == 100){
                                echo '<li><a href="admin.php">Admin</a></li>';
                            }
                            ?>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>
        </nav>
    </div>

