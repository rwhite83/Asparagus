<?php
	include 'includes/header.php';
?>	
	     <script src="js/SmoothScroll.min.js"></script>
		 
		<div class="container">
		    
			<div class="row" >
				
						<h1><strong>Sign Up</strong></h1>

						<!--Naked Form-->

							<!--Body-->
							<form action="includes/signup.inc.php" method="POST">
                                
                                <div class="group">
								<!-- Basic textbox -->
								    <h5>Username <i class="fa fa-user prefix"></i></h5>
								    <input type="text" name="username" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
							    </div>

								<!--Email validation-->
								
                                <div class="group">
								    <h5>E-mail <i class="fa fa-envelope prefix"></i></h5>
								    <input type="email" name="email" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
							    </div>

								<!--Pass with icon-->
								<div class="group">
								    <h5>Password <i class="fa fa-eye-slash"></i></h5>
								    <input type="password" name="password" required/>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
							    </div>
							
								<div class="group">
								    <h5>Confirm Password <i class="fa fa-eye-slash"></i></i></h5>
								    <input type="password" name="REpassword" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
							    </div>
			
							    <div class="form-actions">
                                    <button class="form-btn" type="submit" name="submit" value="submit">Submit</button>
                                    <button class="form-btn-cancel -nooutline" type="reset">Cancel</button>
                                </div>
                  
                            </form>	
			</div>
		</div>
	

<?php
	include 'includes/footer.php';
?>
