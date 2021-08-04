<?php 
include_once 'php/inc/config.php';
session_start();
//check if your sign in
if(!$_SESSION['id']){
    header("location: sign-in");
}
?>



<?php 
//get header
$title="Home";
 include_once 'components/header.php'
?>

<?php 
include_once 'components/add-post.php'
?>
<div class="container-post">
    <?php 
    //get post from databacse
    $posts= mysqli_query($conn,'SELECT * FROM posts');
    $posts_data= mysqli_fetch_all($posts,MYSQLI_ASSOC);

    if(!empty($posts_data)){
        // start forech
        foreach ($posts_data as $post){?>



    <!---post-->
    <div class="post">
        <!-----post-header--->
        <div class="post-header">
            <h3 class=author-name><?php //get author name
          
  $get_author= mysqli_query($conn,"SELECT * FROM users WHERE id ={$post['id_author']}");
      // check if come data from db
       if(mysqli_num_rows($get_author) > 0){
        // get all data author
while($author = mysqli_fetch_object($get_author)){
   echo $author -> firstName.' '.$author -> lastName; //echo name author
}
}

?> </h3>
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
            <p> <?php echo htmlspecialchars($post['context'])?>
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
            <a href="" class="readmore">Read More</a>
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
}//end if have post 
?>
</div>
<!----container-post---->
<?php 
//get footer
include_once 'components/footer.php'
?>