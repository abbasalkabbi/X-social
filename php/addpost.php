 <?php 
include_once 'inc/config.php';//include filles
session_start();
// check is sign in
if($_SESSION['id']){
$context =$_POST['context'];
//check if not empty input
if(!empty($context)){
    $id=$_SESSION['id'];// get id author
    
$add_post=mysqli_query($conn,"INSERT INTO posts (id_author,context) VALUES ($id,'$context')");

}else{
    //if input empty
    echo 'input empty';
    
   
}
}
 ?>