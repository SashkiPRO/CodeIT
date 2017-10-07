<?php
session_start();
require_once 'functions.php';

if(!isset($_SESSION['user'])){
     header("location:login.php");
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
        <title>Main page</title>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="jv/dist/jquery.validate.min.js"></script>
        <script src="js/myscript.js"></script>
        
	</head>
    <body>
        <div class="container">
            <header>
                <h1>Welocme</h1>
	
			</header>
            <section>				
                <div id="container_demo" >
                <p>Your name: <span><?php echo $_SESSION['user']?></span></p>
                <p>Your email: <span><?php echo $_SESSION['email']?></span></p>
                <a href="logout.php">Log out</a>
                 	</div>  
			</section>
		</div>
	</body>
</html>