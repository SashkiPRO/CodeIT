<?php 
require_once 'functions.php';
if($_GET['type'] == "check_login"){
if(isset($_POST['userlogin'])) { check_login($_POST['userlogin']); }
}
if($_GET['type'] == "check_email"){
if(isset($_POST['emailsignup'])) { check_email($_POST['emailsignup']); }
}


 
function check_login($username) {
$login = $username;


$query = ("SELECT id FROM user WHERE login='$login'");
$result=queryMysql($query);

if ($result->num_rows) {
$error = '"This login already exists"';
} else {
$error = 'true';
}

echo $error;
}
function check_email($emailsignup) {
$email = $emailsignup;


$query = ("SELECT id FROM user WHERE email='$email'");
$result=queryMysql($query);

if ($result->num_rows) {
$error = '"User with this email already exists"';
} else {
$error = 'true';
}

echo $error;
}
?>