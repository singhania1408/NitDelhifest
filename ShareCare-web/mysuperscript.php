<?php
include('connection.php');
                    if(isset($_POST['submitted']) == 1){
                        $user_name=  $_POST['user_name'];
                        $email=   $_POST['email'];
                        $password= SHA1( $_POST['password']);
                        $Contact=   $_POST['Contact'];
                        
                        
     $q ="INSERT INTO userinfo(user_name,email,password,Contact) VALUES ('$user_name','$email','$password','$Contact')";
                        $r = mysqli_query($dbc,$q);
                    
                    if($r){
                        session_start();
                       $_SESSION['user_name']= $_POST['email'];
                        header("Location:index.php");
                        
                    }
                    else{
                        $m= '<p>Page could not be loaded because '.mysqli_errno($dbc);
                        $m.= '<p>'.$q.'</p>';
                    }
                    }
                    ?>
