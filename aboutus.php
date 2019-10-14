<?php
	include 'includes/header.php';
	
?>

<script src="js/SmoothScroll.min.js"></script>

<div class="allBack">
	<div class="aboutus">
	<h1><strong>About Us</strong></h1>
    <p>To save the world by reducing food waste and the environmental impact that comes with it.</p>
	 
	<h1><strong>Who are we?</strong></h1>
	 
	<p>We are five Computer Systems Technology students at BCIT, working on a project.</p>
	<p>Ross is the Time Lord, responsible for organizing and time keeping</p>
	<p>Mark is the team critic, challenging every assumption</p>
	<p>Ki is the Veteran, and brings a strong background of real world experience</p>
	<p>John is our artist, responsible for creating the overal aesthetic of our application</p>
	<p>Jason is our glue, our front man and evangelist</p>
	<p></p>
	<p></p>


    <h1><strong>About Asparagus</strong></h1>
	
	<p>We imagined an application which was not a food tracker, but <a class="easteregg" href="easteregg.php" >instead</a> instead a rate of use calculator which informed users how much perishable product they can safely use before it spoils.</p>
	<p>We focused on making the application as easy to use as possible, so people were more likely to actually use it.</p>
	<p>People can use this application for as many or few items as they'd like,<br> and only need to select a food to track, and input when they use new product</p>
	<p></p>
	<p></p>

	
	<h1><strong>What We've Learned Along the Way</strong></h1>
	<p>How To Handle Time</p>
	<p>The application at some point gives a good idea of how much a person can buy. </p>
	<p>Further use can further refine the calculation, but at some point enough data has been gathered to estimate effectively. </p>
	<p>We ran into the problem that if we use our time variable as number of days between date started tracking and present, <br>if a user stopped using when enough data had been input, number of days would continue to tick up and change the purchasable amount. </p>
	<p>We realized that we could time stamp every user input, but that this would create an overly complicated algorithm. </p>
	<p>We instead settled on offering the user a stop (and possibly restart) button to address this problem.</p>
</div>
</div>
<?php
	include 'includes/footer.php';
?>
