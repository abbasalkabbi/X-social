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
    
    <title><?php echo $title?></title>
</head>

<body>
    <div class="header">
        <nav>
            <ul>
                <a href="./index" class="<?php if($title == 'Home'){echo'a-active';}?>">Home</a>
                <a href="">add friends</a>
                <a href="">settings</a>
            </ul>
        </nav>
    </div>
    <!---END Header -->