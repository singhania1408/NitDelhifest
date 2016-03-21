<div id="header">
		<div class="clearfix">
			<div class="logo">
                            <a href="index.php"><img src="images/logosharecare.png" alt="LOGO" height="152" width="300"></a>
			</div>
			<ul class="navigation">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="practices.php">Facilities</a>
				</li>
				
				<li>
					<a href="contact.php">Contact</a>
				</li>
                                 <?php
                                 include('mysuperscript.php');
                                 if(isset($_SESSION['user_name'])){?>
                                 <li>
					<a href="login.php">Login/Signup</a>
				</li>
                                <?php }else{?>
                                      <li>
					<a href="logout.php">Logout</a>
				</li>
                               <?php  }?>                                    
                               
			</ul>
		</div>
	</div>