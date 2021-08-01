 <?php 
include_once 'inc/config.php';//include filles
session_start();
// check is sign in
if($_SESSION['id']){
$context =$_POST['context'];


//check if not empty input
if(!empty($context)){
    $id=$_SESSION['id'];// get id author
    $tmp_name=null;
    $img_name=$_FILES['image']['name'];// get name image
    $img_ext = pathinfo($img_name,PATHINFO_EXTENSION);// get file extension
    $img_ext_allowed=array("jpeg","gif","png","jpg");
    if(in_array($img_ext,$img_ext_allowed) === true)
    {
      $tmp_name=$_FILES['image']['tmp_name'];// get where image 
    }
    $new_name_img=$id.$img_name;// new name image_post
//
          if(!empty($tmp_name)){
              if(move_uploaded_file($tmp_name,"./image-post/".$img_name)){
                  // if image move to our folder
                   //$add_post=mysqli_query($conn,"INSERT INTO posts (id_author,context) VALUES ($id,'$context')");
                    echo 'image';
              }
          }else{
            //$add_post=mysqli_query($conn,"INSERT INTO posts (id_author,context) VALUES ($id,'$context')");
            echo 'no iamge';
          }
}else{
    //if input empty
    echo 'input empty';
    
   
}
}
 ?>