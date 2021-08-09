<?php 
//include filles
include_once '../php/inc/config.php';
session_start();

$id_post=$_POST['id-post'];
$id_user=$_SESSION['id'];


$liked=mysqli_query($conn,"SELECT * FROM like_post WHERE id_user = {$id_user} AND id_post={$id_post}");
if(mysqli_num_rows($liked) > 0){
   $unlike=mysqli_query($conn,"DELETE FROM like_post WHERE id_user = {$id_user} AND id_post={$id_post}");
   echo "unlike";
}else{
    $like=mysqli_query($conn,"INSERT INTO like_post (id_user,id_post) VALUES ($id_user,$id_post)");
    echo "like";
}
?>