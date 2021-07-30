<?php
 
//include filles
include_once'inc/config.php';
session_start();
// get input data

$email=$_POST['email'];
$password=$_POST['password'];
//search for email 
$sign_in_check=mysqli_query($conn,"SELECT * FROM users WHERE email= '{$email}' AND password = '{$password}' ");
// if email is currect 
if(mysqli_num_rows($sign_in_check) > 0 ){
 
   while($obj = mysqli_fetch_object($sign_in_check)){

    $id= $obj -> id; //hendle Unique_id
    
}
$_SESSION['id']=$id; 
if($_SESSION['id']){
    echo 'sign-in';
}
}
?>