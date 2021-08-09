

<?php 
include_once "php/inc/config.php";

$id_post=$_GET["id"];
$get_post=mysqli_query($conn,"SELECT * FROM posts WHERE id_post='{$id_post}' "); // get post 
if(mysqli_num_rows($get_post) > 0 ){
 //if have post seem id_pot
    while($post = mysqli_fetch_object($get_post)){
   // Get post data
   $id_author= $post -> id_author;
   $context= $post -> context;
   $date_post= $post -> date_post;
   $url_img= $post -> url_img;
 }
}
else{
    //if dont have post id error
    header("location: ../404.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/core.css" />
    <!----header css--->
    <link rel="stylesheet" href="../css/components/header.css" />
   
    <!----posts css--->
    <link rel="stylesheet" href="../css/post.css" />
    <title><?php echo 'post/'.substr($context,0,20).'...'; ?></title>
</head>
<body>
    

<!---container post-->
<div class="container-post">
   
    <div class="post">
        <!-----post-header--->
        <div class="post-header">
        <?php //get author info
          
          $get_author= mysqli_query($conn,"SELECT * FROM users WHERE id ={$id_author}");
              // check if come data from db
               if(mysqli_num_rows($get_author) > 0){
                // get all data author
        while($author = mysqli_fetch_object($get_author)){
           $name_author= $author -> firstName.' '.$author -> lastName; //echo name author
           $img_author=$author ->url_img;
        }
        }
        
        ?>
        
        <a  href='../user/<?php echo $id_author ?>' class=author-name> 
            <img src="../php/image-user/<?php 
            if($img_author != NULL){
                echo $img_author;
            }else{
                echo 'default.png';
            }
            ?>" alt="">
            <?php echo $name_author?> </a>
            <span class=date-post>
                <?php echo htmlspecialchars($date_post)?>
            </span>
        </div>
        <!------post-header END------->
        <!-----post-content--->
        <section class=content-post>
            <!---context ---->
            <?php 
            if($context != null){?>
            <p> <?php echo htmlspecialchars($context)?>
            
            </p>
            <?php 
            }
            ?>
             <!---context  END ---->
            <!---image post ----->
            <?php 
            // cheak if post have image will show div image 
            if($url_img != null){ 
            ?>
            <div class="image-post">
            <img src="../php/image-post/<?php echo $url_img?>" alt="">
            </div>
            <?php 
            }
            ?>
             <!---image post ----->
            
        </section>
        <!-----post-content END--->
        <div class="footer-post">
            <span class=like>like</span>
            <span class=comments>comments</span>
        </div>
    </div>
    <!---post-->
    <!---add-comments--->
    <form class="add-comment">
      <!--add-comment-header--->
      <div class="add-comment-header">
        <h2 >Add New Comment</h2>
        <input type="hidden"  name="id-post" value="<?php echo $id_post;?>">


    </div>
    <!--add-comment-header--->
    <!---comment-context-->
    <textarea class="add-comment-context" role="textbox" contenteditable name="context"></textarea>
    <!---comment-context END-->

    <!---button -->
    <div class="buttons">
        <button type="submit" id=submit >Publish</button>
        <input type="file" class="input-image" name=image />
    </div>
    <!---button  END-->
    </form>
    <!---add-comments-END-->
    <!------------comments-container------>
    <?php 
    //get comments on post
        $comments_sql=mysqli_query($conn,"SELECT * FROM comments WHERE id_post={$id_post}");
        $comments_data= mysqli_fetch_all($comments_sql,MYSQLI_ASSOC);
        ?>
    <?php //check if here comments
        if(!empty($comments_data)){
    ?>
   <div class="comments-container">
   <!------comment----->
   <?php 
   // start forech
            foreach ($comments_data as $comments){
     ?>
   <div class="comment">
   <!----head--->
   <div class="head">
   <!-----info-author--->
   <div class="info-author">
   <?php //get author name
          
          $get_author= mysqli_query($conn,"SELECT * FROM users WHERE id ={$comments['id_author']}");
              // check if come data from db
               if(mysqli_num_rows($get_author) > 0){
                // get all data author
        while($author = mysqli_fetch_object($get_author)){
           $name= $author -> firstName.' '.$author -> lastName; //echo name author
           $url_img=$author-> url_img;
        }
}?>
   <img src="../php/image-user/<?php if($url_img != null){echo htmlspecialchars($url_img);}else{echo 'default.png';}?>" alt="">
   <a href="../user/<?php echo htmlspecialchars($comments['id_author'])?>"><?php echo htmlspecialchars($name)?></a>
   </div>
    <!-----info-author-END-->
    <!------date comment------->
    <div class="date-comment">
        <span><?php echo htmlspecialchars($comments['date']);?></span>
    </div>
    <!------date comment END------->
   </div>
   <!----head-END-->
   <!----context-->
   <section class=content>
     <!---context ---->
     <?php 
            if($comments['context'] != null){?>
            <p> <?php echo  htmlspecialchars($comments['context'])
            ?>
            </p>
            <?php 
            }
            ?>
             <!---context  END ---->
            <!---image comment ----->
            <?php 
            // cheak if comment have image will show div image 
            if($comments['url_img'] != null){ 
            ?>
            <div class="image-comment">
            <img src="../php/image-comments/<?php echo $comments['url_img']?>" alt="">
            </div>
            <?php 
            }
            ?>
             <!---image comment ----->
   </section>
    <!----context-END--->
   </div>
   <!------comment--END--->
<?php }
// END foreach
 ?>
   </div>
    <?php }
        //check if here comments END
    ?>
   <!------------comments-container--END---->
</div>
<!----container-post---->
<script src="../js/add-comments.js"></script>
</body>
</html>