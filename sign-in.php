<?php 
session_start();
if($_SESSION['id']){
 header("location: index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!---css style link-->
    <link rel="stylesheet" href="./css/core.css" />
    <link rel="stylesheet" href="./css/sign-up.css" />
    <!---css style link  END-->
    <title>sign-in</title>
</head>
<!---body -->

<body>
    <form action="" method="post" class="sign" id="sign-in">
        <!---logo---->
        <div class="logo">
            <h1>X</h1>
        </div>
        <!---logo- END--->
        <!--email and password input -->
        <!---Email name div -->
        <div class="inputbox" id=email>
            <input type="text" required="required" name="email" />
            <span>Email</span>
        </div>
        <!---Email div END -->
        <!---password div -->
        <div class="inputbox" id=password>
            <input type="text" required="required" name="password" />
            <span>Password</span>
        </div>
        <!---password div END -->
        <!---email and password input END -->

        <!--submit-->
        <button type="submit">sign-in</button>
        <!--submit END-->
        <!-----a link---->
        <a href="sign-up.php">Create New Account</a>
        <!-----a link END---->
    </form>
</body>
<!---body END -->
<script src="./js/sign-in.js"></script>

</html>