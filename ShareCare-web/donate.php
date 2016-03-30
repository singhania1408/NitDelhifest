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
                                                    <a href="http://healthlitmus.com/login">Test</a>
						</li>
					</ul>
				</div>
				<div>
					<h2>Care Tip for the Day</h2>
					<p>
						We think the healthy way to live is to make friends with the beast inside oneself, and that means not the beast but the shadow. The dark side of one's nature. Have fun with it and you know, is to accept everything about ourselves.
					</p>
				</div>
			</div>
                    <?php
                     include('connection.php');
                    if(isset($_POST['submitted']) == 1){
                       
                        $first_name=  $_POST['first_name'];
                        $last_name=  $_POST['last_name'];
                         $dob=  $_POST['dob'];
                        $city=  $_POST['city'];
                        $email=   $_POST['email'];
                         $area=  $_POST['area'];
                        $contact=   $_POST['contact'];
                         $blood_group=  $_POST['blood_group'];
                        
     $q ="INSERT INTO doner(first_name,last_name,dob,email,city,area,contact,blood_group) VALUES ('$first_name','$last_name','$dob','$email','$city','$area','$contact','$blood_group')";
                        $r = mysqli_query($dbc,$q);
                    
                    if($r){
                        header("Location:donate.php"); 
                        
                    }
                        
                    else{
                        $m= '<p>Page could not be loaded because '.mysqli_errno($dbc);
                        $m.= '<p>'.$q.'</p>';
                    }
                    }
                    ?>
			<div class="main">
				<h1>DONATE</h1>
                                <form action=donate.php method="post" role=form>
                                    
	First Name: <input type="text" name="first_name" id="first_name" placeholder="first name"><br><br>

                Last Name: <input type="text" name="last_name" id="last_name" placeholder="sur name"><br><br>

                Date Of Birth: <input type="date" name="dob" id="dob" placeholder="yyyy-mm-dd"><br><br>

                Email: <input type="text" name="email" id="email" placeholder="email-id"><br><br>

                Contact No: <input type="text" name= "contact" id="contact" placeholder="mobile number"><br><br>

                City: <select name="cities" id="cities">
                              <option value="Delhi">Delhi</option>
                              <option value="Noida">Noida</option>
  							  <option value="Kanpur">Kanpur</option>
  						 	  <option value="Mumbai">Mumbai</option>
  						 	  <option value="Kolkata">Kolkata</option>
                              <option value="Varanasi">Varanasi</option>
  							  <option value="Chandigarh">Chandigarh</option>
                              </select><br><br>

                Area: <input type="text" name="area" id="area" placeholder="area"><br><br>

                 Blood Group: <select name="blood_group" id="blood_group">
                              <option value="A+">A+</option>
                              <option value="B+">B+</option>
  							  <option value="AB+">AB+</option>
  						 	  <option value="AB-">AB-</option>
  						 	  <option value="O+">O+</option>
                              <option value="O-">O-</option>
  							  <option value="A-">A-</option>
  						 	  <option value="B-">B-</option>
                              
                              </select><br><br>
                Gender: <input type="radio" name="gender"
                <?php if (isset($gender) && $gender=="female") ?>
                value="female">Female
                <input type="radio" name="gender"
                <?php if (isset($gender) && $gender=="Male") ?>
                value="Male">Male<br><br>
                <input type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
	<?php include('footer.php');?>
</body>
</html>