
<?php
include('connection.php');
include('mysuperscript.php');
?>
<!DOCTYPE html>
<html lang="en" class="no-js"> 
    <head>
        
        <title>Login and Registration Form </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
       <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            
            <header>
                <h1>Login and Registration Form</h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="index.php" autocomplete="on"> 
                                
                                 <?php if(isset($m)) {echo $m ; }?>
                                <form action="index.php" method="post" role="form">
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="user_name" class="username" data-icon="u" > Your email or username </label>
                                    <input id="user_name" name="user_name" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" />
                                    <input type="hidden" name="submitted" value="1">
		                  </p>
                <?php
                 if(isset($_POST['submitted']) == 1){
                     $_SESSION['user_name']=$_POST['email'];
                    header('Location:index.php');
                                        
                                        }else{  
                
                ?>
                                <p class="change_link">
				Not a member yet ?
				<a href="#toregister" class="to_register">Join us</a>
			</p>
                            </form>
                        </div>
                                        <?php }?>
                        <div id="register" class="animate form">
                             <?php if(isset($m)) {echo $m ; }?>
                             <form action="login.php" method="post" role="form">
                            <form  action="login.php" autocomplete="on"> 
                                <h1> Sign up </h1> 
                       <p> 
                 <label for="user_name" class="uname" data-icon="u">Your username</label>
                 <input id="user_name" name="user_name" required="required" type="text" placeholder="mysuperusername690" />
                       </p>
                        <p> 
                      <label for="email" class="youmail" data-icon="e" > Your email</label>
                       <input id="email" name="email" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                          </p>
                        <p> 
                   <label for="password" class="youpasswd" data-icon="p">Your password </label>
                <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                          </p>
                       
                          <p> 
             <label for="Contact" class="Contact" data-icon="c">Your Contact </label>
           <input id="Contact" name="Contact" required="required" type="Contact" placeholder="eg. 9654752347"/>
                        </p>
                            <p class="signin button"> 
                        <input type="submit" value="Sign up"/> 
                         <input type="hidden" name="submitted" value="1">
                                </p>
                                
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>