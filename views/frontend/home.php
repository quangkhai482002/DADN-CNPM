<?php 
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/grid.css" />
    <link rel="stylesheet" href="assets/css/defaultlayout.css" />
    <title>home</title>
</head>

<body>
 <?php 
//  echo "hello ". $_SESSION['user_name'] 
 ?>

<div class="wrapper">
    <?php include_once("includes/header.php"); ?>

    <div class="container">
        <?php include_once("includes/sidebar.php"); ?>

        <div class="content">
            <?php include_once($_GET['tuychon']) ;?>
        </div>
    </div>
</div>

</body>

</html>