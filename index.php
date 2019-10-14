<?php
	include 'includes/header.php';
?>

<?php
	if($_SESSION) {
	    header("location:tracker.php");
	}
?>
	
	<script src="js/SmoothScroll.min.js"></script>
	
	<div class="container">
	    <div class="row" >
			<h1><strong>Welcome </strong><br/>Please Login</h1>
                <form action="includes/login.inc.php" method="POST">
    		
    		        <div class="group">
						<i class="fa fa-user prefix"></i>
						<input type="text" name="username" placeholder="Username/E-mail" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
					</div>
    		        
    		        <div class="group">
						<i class="fa fa-eye-slash"></i>
						<input type="password" name="password" placeholder="Password" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
					</div>
    	            <a href="signup.php">Need to Sign Up?</a>
      			    <div class="form-actions">
                        <button class="form-btn" type="submit" name="submit" value="Login" action='includes/login.inc.php'>Submit</button>
                    </div>
			    </form>
	        </div>
        </div>
	
	<script src="js/index.js"></script>

<?php
	include 'includes/footer.php';
?>