<?php if (!isset($_SESSION)) {
    session_start();
} ?>

<?php
$a = $_SESSION['user_name'];
include "./includes/config.php";
$sql = "SELECT distinct * FROM `user` where 
user.user_name= '$a' ";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
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
    <title>Profile</title>
</head>

<body>


<div class="wrapper">

<?php include_once("includes/header.php"); ?>

<div class="container">

<?php include_once("includes/sidebar.php"); ?>

    <div class="content">
    <H2 class="title">Thông tin cá nhân</H2>
        <div class="device-container">
          <div class="grid">
            <div class="row">

                    <div class="c-12">
                        <div class="form-group">
                            <label class = "prf_title">Họ và tên:</label>
                            <input name="fname" class="form-control" type="text" required="true" autocomplete="off" value="<?php echo $rows['user_name'] ?>">
                        </div>
                    </div>
                    <div class="c-12">
                        <div class="form-group">
                            <label class = "prf_title">Email:</label>
                            <input name="email" class="form-control" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $rows['email'] ?>">
                        </div>
                    </div>
                    <div class="c-12">
                        <div class="form-group">
                            <label class = "prf_title">Số điện thoại:</label>
                            <input name="phonenumber" class="form-control" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $rows['phone'] ?>">
                        </div>
                    </div>
                    <div class="c-12">
                        <div class="form-group">
                            <label class = "prf_title">Địa chỉ:</label>
                            <input name="dob" class="form-control" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $rows['address'] ?>">
                        </div>
                    </div>
                    <div class="c-12">
                        <div class="form-group">
                            <label class = "prf_title">CMND/CCCD:</label>
                            <input name="address" class="form-control" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $rows['CCCD'] ?>">
                        </div>
                    </div>

                    <div class="c-12">
                        <div class="form-group">
                            <label></label>
                            <div class="modal_btn">
                                <button class="update_btn" name="new_update" id="new_update" data-toggle="modal">Lưu & &nbsp;Cập nhật</button>
                            </div>
                        </div>
                    </div>
                
              
            </div>
          </div>
        </div>

    </div>


</div>
</div>

<script src="assets/css/defaultlayout.js"></script>
<script src="assets/css/controlitem.js"></script>


</body>

</html>