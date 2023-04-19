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
    <title>Lịch hoạt động đèn</title>
</head>

<body>


<div class="wrapper">

<?php include_once("includes/header.php"); ?>

<div class="container">

<?php include_once("includes/sidebar.php"); ?>

    <div class="content">
    <H2 class="title">Thêm Thiết Bị</H2>
        <div class="device-container">
          <div class="grid">
            <div class="row">

                    <div class="c-12">
                        <div class="form-group">
                            <label class = "prf_title">Mã thiết bị:</label>
                            <input name="fname" class="form-control" type="text" required="true" autocomplete="off" value="?php echo $row">
                        </div>
                    </div>
                    <div class="c-12">
                        <div class="form-group">
                            <label class = "prf_title">Tên thiết bị:</label>
                            <input name="email" class="form-control" type="text" placeholder="" required="true" autocomplete="off" value="?php echo $row">
                        </div>
                    </div>
                    <div class="c-12">
                        <div class="form-group">
                            <label class = "prf_title">Tên phân khu:</label>
                            <input name="phonenumber" class="form-control" type="text" placeholder="" required="true" autocomplete="off" value="?php echo $row">
                        </div>
                    </div>
                    <div class="c-12">
                        <div class="form-group">
                            <label class = "prf_title">Loại thiết bị:</label>
                            <input name="dob" class="form-control" type="text" placeholder="" required="true" autocomplete="off" value="?php echo $row">
                        </div>
                    </div>

                    <div class="c-6">
                    <a href="index.php?option=home.php&tuychon=managedevice.php">
                        <div class="form-group">
                            <div class="modal_btn-1">
                                <button class="update_btn" name="new_update" id="new_update" data-toggle="modal">Quay lại</button>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="c-6">
                        <div class="form-group">
                            <div class="modal_btn">
                                <button class="update_btn" name="new_update" id="new_update" data-toggle="modal">Thêm</button>
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