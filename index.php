<?php 
include_once 'php/inc/config.php';
session_start();
//check if your sign in
if(!$_SESSION['id']){
    header("location: sign-in");
}
?>



<!----header -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
    
     
    <link rel="stylesheet" href="./css/core.css" />
    <!----header css--->
    <link rel="stylesheet" href="./css/components/header.css" />
    <!----add post css--->
    <link rel="stylesheet" href="./css/components/add-post.css" />
    <!----posts css--->
    <link rel="stylesheet" href="./css/home.css" />
    
    <title>Home</title>
</head>

<body>
    <div class="header">
        <nav>
            <ul>
                <a href="./" class="a-active">Home</a>
               
                <a href="user/<?php echo $_SESSION['id']?>">Profile</a>
            </ul>
        </nav>
        <button class=log-out>log out</button>
    </div>
    <!---END Header -->
<!---add new post form-->
<form class="add-post" enctype=multipart/form-data>
    <!--add-post-header--->
    <div class="add-post-header">
        <h2>Add New Post</h2>
    </div>
    <!--add-post-header--->
    <!---post-context-->
    <textarea class="post-context" role="textbox" contenteditable name="context"></textarea>
    <!---post-context END-->

    <!---button -->
    <div class="buttons">
        <button id=submit>Publish</button>
        <input type="file" class="input-image" name=image />
    </div>
    <!---button  END-->
</form>
<!---add new post form END-->
<!-----add-post-action----->
<div class="add-post-action">
    <!------action----->
    <div class="action">
    <p></p>
    <button></button>
    </div>
    <!------action-END---->
</div>
<!-----add-post-action-END---->
<!------"container-post---->
<div class="container-post">
    <?php 
    //get post from databacse
    $posts= mysqli_query($conn,'SELECT * FROM posts ORDER BY id_post DESC');
    $posts_data= mysqli_fetch_all($posts,MYSQLI_ASSOC);

    if(!empty($posts_data)){
        // start forech
        foreach ($posts_data as $post){?>



    <!---post-->
    <div class="post">
        <!-----post-header--->
        <div class="post-header">
        <?php //get author info
          
          $get_author= mysqli_query($conn,"SELECT * FROM users WHERE id ={$post['id_author']}");
              // check if come data from db
               if(mysqli_num_rows($get_author) > 0){
                // get all data author
        while($author = mysqli_fetch_object($get_author)){
           $name_author= $author -> firstName.' '.$author -> lastName; //echo name author
           $img_author=$author ->url_img;
        }
        }
        
        ?>
            <a  href='user/<?php echo $post['id_author'] ?>' class=author-name> 
            <img src="php/image-user/<?php 
            if($img_author != NULL){
                echo $img_author;
            }else{
                echo 'default.png';
            }
            ?>" alt="">
            <?php echo $name_author?> </a>
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
            <img src="php/image-post/<?php echo $post['url_img']?>" alt="">
            </div>
            <?php 
            }
            ?>
             <!---image post ----->
            <a href="post/<?php echo $post['id_post']?>" class="readmore">Read More</a>
        </section>
        <!-----post-content END--->
        <form class="footer-post">
            <button class="like <?php 
           
            $is_liked=mysqli_query($conn,"SELECT * FROM like_post WHERE id_user = {$_SESSION['id']} AND id_post={$post['id_post']}");
            if(mysqli_num_rows($is_liked) > 0){
                     
                         echo "like-active";
                         $like="liked";
                         }else{$like="like";}?>"  ><?echo$like?></button>
            <input type="hidden" name="id-post" value="<?php echo $post['id_post'] ?>">
            <button class=comments>comments</button>
        </form>
    </div>
    <!---post-->
    <?php
}///end  forech
}//end if have post 
?>
</div>
<!----container-post---->
<!---Footer -->
</body>
<script src="./js/components/add-post.js"></script>
<script src="js/like-post.js"></script>
<script src="js/log-out.js"></script>
</html>
<!---END Footer -->