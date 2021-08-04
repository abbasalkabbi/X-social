 <?php 
include_once 'inc/config.php';//include filles
session_start();
// check is sign in
if($_SESSION['id']){
$id=$_SESSION['id'];
$context =$_POST['context'];
$img_name=$_FILES['image']['name'];// get name image
$img_ext = pathinfo($img_name,PATHINFO_EXTENSION);// get file extension
$img_ext_allowed=array("jpeg","gif","png","jpg");
$tmp_name=$_FILES['image']['tmp_name'];// get where image

if(in_array($img_ext,$img_ext_allowed) === true){
  // if image here 
  $img_name_new=$id.time().'.'.$img_ext;
    if(move_uploaded_file($tmp_name,"image-post/".$img_name_new)){
       // move image to our floder
     if(!empty($context)){
       // if have context
       $add_post=mysqli_query($conn,"INSERT INTO posts (id_author,context,url_img) VALUES ($id,'$context','$img_name_new')");
     }else{
       //if dont have context
       $add_post=mysqli_query($conn,"INSERT INTO posts (id_author,url_img) VALUES ($id,'$img_name_new')");
     }
      }else{
        echo "Something is Wrong";
      }
}else{
  // if not image here
  if(!empty($context)){
    $add_post=mysqli_query($conn,"INSERT INTO posts (id_author,context) VALUES ($id,'$context')");
  }else{
    echo 'input empty';
  }
}

}