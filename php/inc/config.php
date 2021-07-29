<?php
$host='localhost';
$username='root';
$pass='root';
$db='x-social';
$conn= mysqli_connect($host,$username,$pass,$db);
if(!$conn){
    echo "Error". mysqli_connect_error();
}
if($conn){
    echo 'db  run';
}
?>