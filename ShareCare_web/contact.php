<!DOCTYPE HTML>

<html>
<head>
	<meta charset="UTF-8">
	<title>ShareCare</title>
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
					<h2>Contact Info</h2>
					<ul class="contact">
						<li>
							<p class="phone">
								Phone: (+20) 000 222 999
							</p>
						</li>
						<li>
							<p class="fax">
								Fax: (+20) 000 222 988
							</p>
						</li>
						<li>
							<p class="mail">
								Email: support@sharecare.com
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="main">
				<h1>Contact</h1>
				<h2>Send Us a Quick Message</h2>
				<p>
					ShareCare provides a great deal of opportunities for all those who really want to serve the people.For all the queries you can just send us a quick message.
				</p>
				<form action="index.php" method="post" class="message">
					<label>First Name</label>
					<input type="text" value="">
					<label>Last Name</label>
					<input type="text" value="">
					<label>Email Address</label>
					<input type="text" value="">
					<label>Message</label>
					<textarea></textarea>
					<input type="submit" value="Send Message">
				</form>
			</div>
		</div>
	</div>
	<?php include('footer.php');?>
</body>
</html>