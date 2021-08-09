<?php 
//include filles
include_once '../php/inc/config.php';
session_start();



// check is sign in
if($_SESSION['id']){
$id=$_SESSION['id'];
$id_post=$_POST['id-post'];
$context =$_POST['context'];
$img_name=$_FILES['image']['name'];// get name image
$img_ext = pathinfo($img_name,PATHINFO_EXTENSION);// get file extension
$img_ext_allowed=array("jpeg","gif","png","jpg");
$tmp_name=$_FILES['image']['tmp_name'];// get where image


if(in_array($img_ext,$img_ext_allowed) === true){
  // if image here 
  $img_name_new=$id.time().'.'.$img_ext;
    if(move_uploaded_file($tmp_name,"image-comments/".$img_name_new)){
       // move image to our floder
     if(!empty($context)){
       // if have context
       $add_comments=mysqli_query($conn,"INSERT INTO comments (id_author,id_post,context,url_img) VALUES ($id,$id_post,'$context','$img_name_new')");
     }else{
       //if dont have context
      
       $add_comments=mysqli_query($conn,"INSERT INTO comments (id_author,id_post,url_img) VALUES ($id,$id_post,'$img_name_new')");
     }
      }else{
        echo "Something is Wrong";
      }
}else{
  // if not image here
  if(!empty($context)){
    $add_comments=mysqli_query($conn,"INSERT INTO comments (id_author,id_post,context) VALUES ($id,$id_post,'$context')");
  }else{
    echo'input empty';
  }
}

}
?>