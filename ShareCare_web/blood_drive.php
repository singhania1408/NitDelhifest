<!DOCTYPE HTML>

<html>
<head>
	<meta charset="UTF-8">
	<title>Facilities- ShareCare</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<?php
        include('header.php');
        ?>
	<div id="contents">
		<div class="clearfix">
			<div class="sidebar">
				<div>
					<h2>Facilities</h2>
					<ul>
						<li>
                                                    <a href="donate.php">Donate</a>
						</li>
						<li>
                                                    <a href="take.php">Take</a>
						</li>
						<li>
                                                    <a href=http://healthlitmus.com/login">Test</a>
						</li>
					</ul>
				</div>
				<div>
					<h2>Care Tip for the Day</h2>
					<p>
						I think the healthy way to live is to make friends with the beast inside oneself, and that means not the beast but the shadow. The dark side of one's nature. Have fun with it and you know, is to accept everything about ourselves.
					</p>
				</div>
			</div>
			<div class="main">
				<h1>Host a blood drive</h1>
				<form action=index.html method="post" role=form>
				Organization Name: <input type="text" name="organization_name" placeholder="organization name"><br><br>

                Email: <input type="text" name="email_id" placeholder="email-id"><br><br>

                Contact No: <input type="text" name= "contact_no" placeholder="mobile number"><br><br>

                City: <select name="Cities">
                              <option value="Delhi">Delhi</option>
                              <option value="Noida">Noida</option>
  							  <option value="Kanpur">Kanpur</option>
  						 	  <option value="Mumbai">Mumbai</option>
  						 	  <option value="Kolkata">Kolkata</option>
                              <option value="Varanasi">Varanasi</option>
  							  <option value="Chandigarh">Chandigarh</option>
                              </select><br><br>
                Area: <input type="text" name="area" placeholder="area"><br><br>

                		</form>
			</div>
		</div>
	</div>
	<?php include('footer.php');?>
</body>
</html>