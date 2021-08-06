<?php
//include filles
include_once 'php/inc/config.php';
session_start();
$id_user= $_GET['id'];
//get data from db
$sq_user=mysqli_query($conn,"SELECT * FROM users WHERE id={$id_user}");
// if have user  
if(mysqli_num_rows($sq_user) > 0 ){
// get data 
    while($user = mysqli_fetch_object($sq_user)){
 
     $firstname= $user -> firstName; //hendle firstName
     $lastname= $user -> lastName; //hendle lastName
     $email= $user -> email; //hendle lastName
     $url_img=$user -> url_img; //hendle url img
     
 }
   //get post from databacse
   $posts= mysqli_query($conn,"SELECT * FROM posts  WHERE id_author= '{$id_user}' ORDER BY id_post DESC");
   $posts_data= mysqli_fetch_all($posts,MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----style------>
              <!----style core------>
                 <link rel="stylesheet" href="../css/core.css">
                <!----style user------>
                 <link rel="stylesheet" href="../css/user.css">
                 <link rel="stylesheet" href="../css/home.css">
                 <link rel="stylesheet" href="../css/sign-up.css">
    <!----style END------>

    <title>User/<?php echo $firstname ." ". $lastname?></title>
</head>
<body>
<!------user-container--->
    <div class="user-container">
    <!-------image----->
  
    <div class="image">
    <img src="../php/image-user/<?php if($url_img != NULL){
        echo $url_img;
    }else{
        echo 'default.png';
    } ?>" alt="<?php echo $firstname.','.$lastname;?>">
    </div>
   
    <!-------image- END---->
    <!--------info---->
    <div class="info">
    <ul>
    <li>Name: <?php echo $firstname . ' '.$lastname?></li>
    <li>Email: <?php echo $email?></li>
    </ul>
    </div>
    <!--------info- END--->
    
       
    <!----form editer ---->
    <?php if($id_user == $_SESSION['id']){?>
    <form class='user-edit sign'>
        <div class="title-form">
            <span> Edit Profile</span>
        </div>
<!---first name div -->
<div class="inputbox " id=firstname>
            <input type="text" required="required" name="firstname" value='<?php echo $firstname?>' />
            <span>FirstName</span>
        </div>
        <!---first name div END -->
        <!---last name div -->
        <div class="inputbox" id=lastname>
            <input type="text" required="required" name="lastname" value='<?php echo $lastname?>' />
            <span>LastName</span>
        </div>
        <!---last name div END -->
        <!---Name input END -->
        <input type="file" class="input-image" name=image_user />
         <!--submit-->
         <button type="submit" class=save>Save</button>
        <!--submit END-->
    </form>
    <?}?>
    <!----form editer END---->
    <!---------user-post---->
    <?php
    if(!empty($posts_data)){?>
    <div class="user-posts">
        
<!------"container-post---->
<div class="container-post">
<div class="title-post">
            <span>
                POST OF <?php echo $firstname?>
            </span>
        </div>
    <?php 
  

    
        // start forech
        foreach ($posts_data as $post){?>



    <!---post-->
    <div class="post">
        <!-----post-header--->
        <div class="post-header">
            <a  href='user/<?php echo $post['id_author'] ?>' class=author-name><?php //get author name
          
  $get_author= mysqli_query($conn,"SELECT * FROM users  WHERE id ={$post['id_author']}");
      // check if come data from db
       if(mysqli_num_rows($get_author) > 0){
        // get all data author
while($author = mysqli_fetch_object($get_author)){
   echo $author -> firstName.' '.$author -> lastName; //echo name author
}
}

?> </a>
            <span class=date-post>
                <?php echo htmlspecialchars($post['date_post'])?>
            </span>
        </div>
        <!------post-header END------->
        <!-----post-content--->
        <section class=content-post>
            <!---context ---->
            <?php 
            if($post['context'] != null){?>
            <p> <?php echo  substr(htmlspecialchars($post['context']),0,30). '...'?>
            </p>
            <?php 
            }
            ?>
             <!---context  END ---->
            <!---image post ----->
            <?php 
            // cheak if post have image will show div image 
            if($post['url_img'] != null){ 
            ?>
            <div class="image-post">
            <img src="../php/image-post/<?php echo $post['url_img']?>" alt="">
            </div>
            <?php 
            }
            ?>
             <!---image post ----->
            <a href="post/<?php echo $post['id_post']?>" class="readmore">Read More</a>
        </section>
        <!-----post-content END--->
        <div class="footer-post">
            <span class=like>like</span>
            <span class=comments>comments</span>
        </div>
    </div>
    <!---post-->
    <?php
}///end  forech

?>
</div>
<!----container-post---->
    </div>
  
    <?php
    }//end if have post 
    ?>
    <!---------user-post---->
    </div>
    <!------user-container END--->
<script src="../js/update-user.js"></script>
</body>
</html>