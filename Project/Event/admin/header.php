<?php
require 'database.php';
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale01.0">
        <title>Responsive Multipage blog Website</title>
        <!---   CUSTOM STYLESHEET  -->
        <link rel="stylesheet" href="../css/style.css">
        <!---   CUSTOM STYLESHEET OF ICON  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <!---   Google Montserrat  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <nav>
            <div class="container nav__container">
                <a href="index.php" class="nav__logo">Event Management</a>
                <ul class="nav__items">
                    <li><a href="../view/home.php">HOME</a></li>
                    
                    <li><a href="gallery.php">GALLERY</a></li>
                    <li><a href="contact.php">CONTACT</a></li>                                          
                    <li><a href="eventguide.php">EVENT GUIDE</a></li>
                    <li><a href="packageplan.php">PACKAGE PLAN</a></li> 
                    
                    <li class="nav__profile">
                        <div class="avatar">
                            <img src="./images/logo.jpg">
                        </div>
                        <ul>
                            <li><a href="dashboard.php">DASHBOARD</a></li>
                            <li><a href="logout.php">LOG OUT</a></li>
                        </ul>
                    </li>
                </ul>
                <button id="open__nav-btn"><i class="uis uis-bars"></i></button>
                <button id="close__nav-btn"><i class="uis uis-times"></i></button>

            </div>
        </nav>