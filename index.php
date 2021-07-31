<?php 
session_start();
//check if your sign in
if(!$_SESSION['id']){
    header("location: sign-in.php");
}
?>

<?php 
$title="Home";
?>

<?php 
//get header
 include_once 'components/header.php'
?>

<?php 
include_once 'components/add-post.php'
?>

<?php 
//get footer
include_once 'components/footer.php'
?>