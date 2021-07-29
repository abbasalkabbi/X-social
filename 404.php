<?php 
$error =$_SERVER['REDIRECT_STATUS'];
$errpath=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
if($error == 404 ){
    $err =array(
        'name' => '404',
        'des' => "Can't Found The Page 
        <span>
        (
       $errpath
       )
        </span>
        "
    );
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $err['name'];?></title>
</head>

<body>
    <?php  echo $err['des'];?>

</body>

</html>