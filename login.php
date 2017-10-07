<?php
session_start();
require_once 'functions.php';

$userstr='(Guest)';

if(isset($_SESSION['user'])){
   header("location:index.php");
}

if(isset($_POST['username'])){
    
    if($_POST['username']==" "||$_POST['password'==" "]){
        die("All fields are reguired!");
    }else{
        $user=$_POST['username'];
        $pass=$_POST['password'];
               
 

        $query="SELECT*FROM user WHERE email='$user'OR login='$user'";
        $result=queryMysql($query);
        if($result->num_rows){
            $result->data_seek(0);
            $field=$result->fetch_assoc();
            $hashed_password=trim($field['password']);
            $email=$field['email'];
            $real_name=$field['real_name'];
            if (password_verify($pass, $hashed_password)) {
   $_SESSION['user']="$real_name";
   $_SESSION['email']="$email";
        header("location:index.php");
}else{
        $_SESSION['password_error']='Wrong password!';
                header("location:login.php?field=$user");
            }
            
        }else{
              $_SESSION['password_error']='Incorrect password or login!';
                header("location:login.php?field=$user");
        }
    }
}
 ?>
<!DOCTYPE html>

<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-js"> 
	<!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Login page</title>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="jv/dist/jquery.validate.min.js"></script>
        <script src="js/mysqcript.js"></script>
        
	</head>
    <body>
        <div class="container">
            <header>
                <h1>Login form</h1>
	
			</header>
            <section>				
                <div id="container_demo" >
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login.php" autocomplete="on" method="post" id="login_form"> 
                                <h1>Login</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Enter your login or email</label>
                                    <input id="username" name="username" <?php if(isset($_GET['field']))echo "value='$_GET[field]'"?>  type="text" placeholder="login or email@user.com"/>
								</p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Enter your password</label>
                                    <input id="password" name="password"  type="password" placeholder="example 123456" /> 
                                    <?php if(isset($_SESSION['password_error']))echo $_SESSION['password_error'] ?>
								</p>
                            
                                <p class="login button"> 
                                    <input type="submit" value="Sign up" /> 
								</p>
                                <p class="change_link">
									Go to registration
									<a href="register.php" class="to_register">Join us</a>
								</p>
							</form>
						</div>
						
                    					
					</div>
				</div>  
			</section>
		</div>
	</body>
</html>