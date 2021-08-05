

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
            <h3 class=author-name><?php //get author name
          
  $get_author= mysqli_query($conn,"SELECT * FROM users WHERE id ={$id_author}");
      // check if come data from db
       if(mysqli_num_rows($get_author) > 0){
        // get all data author
while($author = mysqli_fetch_object($get_author)){
   echo $author -> firstName.' '.$author -> lastName; //echo name author
}
}

?> </h3>
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
   
</div>
<!----container-post---->
</body>
</html>