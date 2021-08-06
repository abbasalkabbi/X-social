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