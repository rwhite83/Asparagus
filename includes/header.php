<?php

session_start();

?>
<!DOCTYPE html>
<html>
    <body>

    <head>
        <title>Asparagus</title>
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <link rel="stylesheet" type="text/css" href="css/howToUse.css">
        <link rel="stylesheet" type="text/css" href="css/signup.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/signup.css" >
        <link rel="stylesheet" type="text/css" href="css/aboutus.css">
        <link rel="stylesheet" type="text/css" href="css/poster.css">
        <link rel="stylesheet" type="text/css" href="css/trackerbuttons.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" >
        <script src="js/menu_toggle.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="js/SmoothScroll.min.js"></script>

    </head>
    <body class="backgroundimg">

        <div id="fb-root"></div>
        <script src="js/fb_connect.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<header>
        <nav class="navbar">
            <div class="logo-icon">
                <a href="index.php" class="logo"><img src="images/logo.png"></a>
            </div>
            <div class="dropdown">
                <button class="hb-button"><i class="fa fa-bars"></i></button>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
				<li><a href="tracker.php">Tracker</a></li>
                <li><a href="howToUse.php">How to Use</a></li>
				<li><a href="aboutus.php">About Us</a></li>	
     			<li><a href="stats.php">Stats</a></li>
				<li><a href="tips.php">Tips</a></li>
                <li><a href="poster.php">Poster</a></li>
				<li><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
    </header>
    
	<script>
	$(document).ready(function(){
        $('.hb-button').on('click', function(){
            $('nav ul').toggleClass('show');
        });
    });
	</script>
	

<?php
if(isset($_GET['Message'])){
    echo "<span id='headermsg'>".$_GET['Message']."</span>";
}
?>
	</div>


</header>

