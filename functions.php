<?php 
$dbhost='localhost';
$dbname='codeit';
$dbuser='root';
$dbpass='';

$connection=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if($connection->connect_error)die($connection->connect_error);



function queryMysql($query){
    global $connection;
    $result=$connection->query($query);
    if(!result)die($connection->connection_error);
    return $result;
}
function destroySession(){
    $_SESSION=array();
    if(session_id()!=''||isset($_COOKIE[session_name()]))
    setcookie(session_name(),'', time()-2592000,'/');
    session_destroy();
    header("location:login.php");
}
function dateToMySql($date){
    $temp=explode("/",$date);
    $result=$temp[2]."-".$temp[0]."-".$temp[1];
    return $result;
}

function createTable($name, $query){
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8");
    echo "Table '$name' created! <br>";
}
function initCountries(){
    queryMysql("INSERT INTO country(name) VALUES('Germany')");
    queryMysql("INSERT INTO country(name) VALUES('Urkaine')");
    queryMysql("INSERT INTO country(name) VALUES('The USA')");
    queryMysql("INSERT INTO country(name) VALUES('France')");
    queryMysql("INSERT INTO country(name) VALUES('Spain')");
    echo 'Table country initialized!<br>';
    
}

?>