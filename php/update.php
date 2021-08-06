<?php 
//include filles
include_once '../php/inc/config.php';
session_start();
$id=$_SESSION['id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];

///get image
$img_name=$_FILES['image_user']['name'];// get name image
$img_ext = pathinfo($img_name,PATHINFO_EXTENSION);// get file extension
$img_ext_allowed=array("jpeg","gif","png","jpg");
$tmp_name=$_FILES['image_user']['tmp_name'];// get where image
///get image END
//get old data
$sq_user=mysqli_query($conn,"SELECT * FROM users WHERE id={$id}");
// if have u
if(mysqli_num_rows($sq_user) > 0 ){
// get data 
    while($user = mysqli_fetch_object($sq_user)){
 
     $firstname_old= $user -> firstName; //hendle firstName
     $lastname_old= $user -> lastName; //hendle lastName
     
     
 }

}
//get old data END
if(in_array($img_ext,$img_ext_allowed) === true){
    $img_name_new=$id.time().'.'.$img_ext;
    if(move_uploaded_file($tmp_name,"../php/image-user/".$img_name_new)){
 // move image to our floder 
 // input 
 if($firstname != $firstname_old && $lastname != $lastname_old){
    //check  if not empty input
if(!empty($firstname) && !empty($lastname)){
$update=mysqli_query($conn,"UPDATE users SET firstName ='$firstname', lastName='$lastname',url_img='$img_name_new'  WHERE id={$id}");
if($update){
echo 'Update FirstName And LastName And image';
}
}//check  if not empty input END
//if update firstname  and lastname END
}elseif($firstname != $firstname_old){
    //if  update firstname And image
     //check  if not empty input
    if(!empty($firstname)){
        $update_firstname_image=mysqli_query($conn,"UPDATE users SET firstName ='$firstname',url_img='$img_name_new'  WHERE id={$id}");
        if($update_firstname_image){
        echo 'Update FirstName And image ';
        }
    }
     //check  if not empty input END
    //if  update firstname  And image END
}elseif($lastname != $lastname_old){
    //if  update LastName And image
     //check  if not empty input
    if(!empty($lastname)){
        $update_lastname_image=mysqli_query($conn,"UPDATE users SET lastName ='$lastname',url_img='$img_name_new'  WHERE id={$id}");
        if($update_lastname_image){
        echo 'Update LastName  And image ';
        }
    }
     //check  if not empty input END
    //if  update LastName  And image END
}// input  END
else{
  $update_image=mysqli_query($conn,"UPDATE users SET url_img='$img_name_new'  WHERE id={$id}");
  if($update_image){
    echo 'Update image ';
  }
}
 
}
      
}
else{
//if dont have image 
//if update firstname  and lastname
if($firstname != $firstname_old && $lastname != $lastname_old){
    //check  if not empty input
if(!empty($firstname) && !empty($lastname)){
$update=mysqli_query($conn,"UPDATE users SET firstName ='$firstname', lastName='$lastname'  WHERE id={$id}");
if($update){
echo 'Update FirstName And LastName';
}
}//check  if not empty input END
//if update firstname  and lastname END
}elseif($firstname != $firstname_old){
    //if  update firstname
     //check  if not empty input
    if(!empty($firstname)){
        $update_firstname=mysqli_query($conn,"UPDATE users SET firstName ='$firstname'  WHERE id={$id}");
        if($update_firstname){
        echo 'Update FirstName ';
        }
    }
     //check  if not empty input END
    //if  update firstname END
}elseif($lastname != $lastname_old){
    //if  update LastName
     //check  if not empty input
    if(!empty($lastname)){
        $update_lastname=mysqli_query($conn,"UPDATE users SET lastName ='$lastname'  WHERE id={$id}");
        if($update_lastname){
        echo 'Update LastName ';
        }
    }
     //check  if not empty input END
    //if  update LastName END
}
}//if dont have image

?>