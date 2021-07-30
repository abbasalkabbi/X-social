<?php 
session_start();
if($_SESSION['id']){
  header("location: home.html");
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
    <title>sign-up</title>
</head>
<!---body -->

<body>
    <form action="" method="post" class="sign" id="sign-up">
        <!---logo---->
        <div class="logo">
            <h1>X</h1>
        </div>
        <!---logo- END--->
        <div class="error-sign">
            <h1>password shoudd be bigger than 8 characters</h1>
        </div>
        <!---Name input -->
        <!---first name div -->
        <div class="inputbox " id=firstname>
            <input type="text" required="required" name="firstname" />
            <span>FirstName</span>
        </div>
        <!---first name div END -->
        <!---last name div -->
        <div class="inputbox" id=lastname>
            <input type="text" required="required" name="lastname" />
            <span>LastName</span>
        </div>
        <!---last name div END -->
        <!---Name input END -->
        <!--email and password input -->
        <!---Email name div -->
        <div class="inputbox" id=email>
            <input type="text" required="required" name="email" />
            <span>Email</span>
        </div>
        <!---Email div END -->
        <!---password div -->
        <div class="inputbox" id='password'>
            <input type="text" required="required" name="password" />
            <span>Password</span>
        </div>
        <!---password div END -->
        <!---email and password input END -->
        <!--submit-->
        <button type="submit">sign-up</button>
        <!--submit END-->
        <!-----a link---->
        <a href="sign-in.php">I have a account</a>
        <!-----a link END---->
    </form>
</body>
<!---body END -->
<script src="./js/sing-up.js"></script>

</html>