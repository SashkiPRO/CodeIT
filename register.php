<?php
session_start();
require_once 'functions.php';
require_once 'check_data.php';

if(isset($_SESSION['user'])){
    header("location:index.php");
};

    if(isset($_POST['usernamesignup'])){
        $user = $_POST['usernamesignup'];
        $country_id=$_POST['country_choise'];
        $date_birth=$_POST['userbirth'];
        $email=$_POST['emailsignup'];
        $mysql_date= dateToMySql($date_birth);
        $pass=$_POST['passwordsignup'];
        $conf_pass=$_POST['passwordsignup_confirm'];
        $login=$_POST['userlogin'];

        
       if($user==" "||$country_id==" "||$mysql_date==" "||$email==" "||$pass==" "||$conf_pass==" "||$login==" "){
           echo <<<END
           $user.$country_id.$mysql_date.$email.$pass.$conf_pass
END;
        }else{
            $result=queryMysql("SELECT * FROM user WHERE email='$email' OR login='$login'");
            if($result->num_rows){
                die("User with the same login or email already exists!");
            }else if($pass!=$conf_pass){
                die("Passwords don't equal!");
            }else{
                 
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);;
        $unixTimestamp=strtotime("now");

            queryMysql("INSERT INTO user(real_name,email,date_birth,timestamp,country_id,login,password) VALUES('$user','$email','$mysql_date', $unixTimestamp,$country_id,'$login', '$hashed_password')");
       $_SESSION['user']="$user";
       $_SESSION['email']="$email";
        header("location:index.php");
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
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
   <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="jv/dist/jquery.validate.min.js"></script>
        <script src="js/mysqcript.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#date_birth" ).datepicker();
  } );
  </script>
  <script type="text/javascript">
$(document).ready(function(){

  $('#confirm_button').prop('disabled', true);

  $('#checkbox_confirm').change(function() {

      $('#confirm_button').prop('disabled', function(i, val) {
        return !val;
      })
  });
})
</script>
	</head>
    <body>
        <div class="container">
            <header>
                <h1>Registration form</h1>
	
			</header>
            <section>				
                <div id="container_demo" >
                
                    <div id="wrapper">
                         <div id="register2" class="animate form">
                            <form  action="register.php" autocomplete="on" method="post" id="register_form"> 
                                <h1> Registration </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Enter name</label>
                                    <input id="usernamesignup" name="usernamesignup"  type="text" placeholder="myname" />
								</p>
                                 <p> 
                                    <label for="userlogin" class="uname" data-icon="u">Enter login</label>
                                    <input id="userlogin" name="userlogin" type="text" placeholder="myname1223" />
								</p>
                                <p> 
                                    <label for="date_birth" class="uname" data-icon="u">Enter birth date</label>
                                    <input id="date_birth" name="userbirth"  type="text" placeholder="mm/dd/yyyy" />
								</p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Enter e-mail</label>
                                    <input id="emailsignup" name="emailsignup"  type="email" placeholder="sitehere.ru@my.com"/> 
								</p>
                                <p> 
                                    <label for="country_choise" class="country"> Select country</label>
                                  
                                  
                                <select name="country_choise">
                                
                                <?php 
                                $query="SELECT * FROM country";
                                $result = queryMysql($query);
                                $rows = $result->num_rows;
                                $dd="sds";
                                for($j=0;$j<$rows;$j++){
                                $result->data_seek($j);
                                $row=$result->fetch_array(MYSQLI_ASSOC);
        
echo <<<END
<option value="$row[country_id]"> $row[name]</option>;
END;
                                
                                }

                                
                                ?>
                                

                                </select>
                                
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Enter password </label>
                                    <input id="passwordsignup" name="passwordsignup"  type="password" placeholder="123456"/>
								</p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Confirm password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm"  type="password" placeholder="123456"/>
								</p>
                                <p>
                                <label for="checkbox_confirm">Do you accept agreement?</label>
                                <input type="checkbox" id="checkbox_confirm" />
                                </p>
                                <p class="signin button"> 
                                
									<input type="submit" value="Registration"  id="confirm_button"/> 
								</p>
                                <p class="change_link">  
									Have you aleady registered ?
									<a href="login.php" class="to_register"> Sign Up </a>
								</p>
							</form>
						</div>						
				
                    					
					</div>
				</div>  
			</section>
		</div>
	</body>
</html>