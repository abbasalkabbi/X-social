<?php 
//include filles
include_once'inc/config.php';
session_start();
// get input data
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
// check is input not empty
if(!empty($firstname) && !empty($lastname)&& !empty($email) && !empty($password)){
    // input not empty 
if (filter_var($email,FILTER_VALIDATE_EMAIL)){
    // if email is currect 

    //search is email is already sign i
    $email_check=mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}'");
    if(mysqli_num_rows($email_check) > 0){
        // email is already sign in 
        echo "This email ($email) already exist!";
    }else{
        // email is new 
        if( strlen($firstname) >= 3 && strlen($lastname) >= 3){
           // if the name is big than two characters
             if(strlen($password) >= 8){
             // if the password is big than (8) characters
                 // insert data
                 $insert_form_sign_up=mysqli_query($conn,"INSERT INTO users (firstname,lastname,email,password) VALUES ('$firstname','$lastname','$email','$password')") ;
                 if($insert_form_sign_up){
                     //if insert_form_sign_up
                     //get _SESSION
                  $login= mysqli_query($conn,"SELECT * FROM users WHERE email ='{$email}' AND password = '{$password}'");
      // check if input is login
       if(mysqli_num_rows($login) > 0){
        // get Unique_id
while($obj = mysqli_fetch_object($login)){

    $id= $obj -> id; //hendle Unique_id
    
}
$_SESSION['id']=$id; 
                 }
                 //END _SESSION
                 }// END insert_form_sign_up
             }else{
              // if the password is less than two characters
              echo 'password shoudd be bigger than 8 characters';
             }
        }else{
            // if the name is less than two characters
            echo 'The name should be bigger than 2 characters';
        }
    }
}else{
     // if email is uncurrect 
     echo "$email - not validate";
}
}else{
    // if input is empty 
    echo "All input is Required";
}

?>