<?php if (!isset($_SESSION)) {
    session_start();
} ?>

<?php
$a = $_SESSION['user_name'];
include "./includes/config.php";
$sql = "SELECT distinct * FROM `user`, `farm`, `subfarm`,`device` where 
user.user_name= '$a' and user.user_id=farm.user_id and farm.farm_id=subfarm.farm_id 
and subfarm.subfarm_id=device.subfarm_id ;
";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<?php

if (isset($_POST['new_update'])) { // Kiểm tra xem người dùng đã nhấn nút Lưu & Cập nhật hay chưa

    

    // Nhận các giá trị mới từ form
    $device_id = $_POST['device_id'];
    $location = $_POST['location'];

    // Thực hiện câu lệnh SQL để update các giá trị mới lên database
    $sql = "UPDATE `device` SET `location`='$location' WHERE `device_id`='$device_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Nếu update thành công, chuyển hướng người dùng về trang quản lý thiết bị
        header("Location: index.php?option=home.php&tuychon=managedevice.php");
        exit();
    } else {
        // Nếu update không thành công, hiển thị thông báo lỗi
        $error_message = "Lỗi: Không thể cập nhật thiết bị.";
    }
}

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
    <title>Lịch hoạt động đèn</title>
</head>

<body>


    <div class="wrapper">

        <?php include_once("includes/header.php"); ?>

        <div class="container">

            <?php include_once("includes/sidebar.php"); ?>

            <div class="content">
                <H2 class="title">Chỉnh Sửa Thiết Bị</H2>
                <div class="device-container">
                    <div class="grid">
                        <form action="" method="POST">
                            <div class="row">

                                <div class="c-12">
                                    <div class="form-group">
                                        <label class="prf_title">Mã thiết bị:</label>
                                        <input name="device_id" class="form-control" type="text" required="true" autocomplete="off" value="<?php echo $row['device_id'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="c-12">
                                    <div class="form-group">
                                        <label class="prf_title">Tên thiết bị:</label>
                                        <input name="device_name" class="form-control" type="text" required="true" autocomplete="off" value="<?php echo $row['device_name'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="c-12">
                                    <div class="form-group">
                                        <label class="prf_title">Tên phân khu:</label>
                                        <input name="subfarm_name" class="form-control" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['subfarm_name'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="c-12">
                                    <div class="form-group">
                                        <label class="prf_title">Vị trí:</label>
                                        <select name="location" class="form-control" required="true">
                                            <option value="">Chọn vị trí</option>
                                            <option value="hàng 1" <?php if ($row['location'] == 'hàng 1') echo 'selected'; ?>>Hàng 1</option>
                                            <option value="hàng 2" <?php if ($row['location'] == 'hàng 2') echo 'selected'; ?>>Hàng 2</option>
                                            <option value="hàng 3" <?php if ($row['location'] == 'hàng 3') echo 'selected'; ?>>Hàng 3</option>
                                            <option value="hàng 4" <?php if ($row['location'] == 'hàng 4') echo 'selected'; ?>>Hàng 4</option>
                                            <option value="hàng 5" <?php if ($row['location'] == 'hàng 5') echo 'selected'; ?>>Hàng 5</option>
                                            <option value="hàng 6" <?php if ($row['location'] == 'hàng 6') echo 'selected'; ?>>Hàng 6</option>
                                            <option value="hàng 7" <?php if ($row['location'] == 'hàng 7') echo 'selected'; ?>>Hàng 7</option>
                                            <option value="hàng 8" <?php if ($row['location'] == 'hàng 8') echo 'selected'; ?>>Hàng 8</option>
                                            <option value="hàng 9" <?php if ($row['location'] == 'hàng 9') echo 'selected'; ?>>Hàng 9</option>
                                            <!-- Thêm các tùy chọn khác tại đây -->
                                        </select>
                                    </div>
                                </div>

                                <div class="c-6">
                                    <a href="index.php?option=home.php&tuychon=managedevice.php">
                                        <div class="form-group">
                                            <div class="modal_btn-1">
                                                <button class="update_btn" name="" id="new_update" data-toggle="modal">Quay lại</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="c-6">
                                    <div class="form-group">
                                        <div class="modal_btn">
                                            <button class="update_btn" name="new_update" id="new_update" data-toggle="modal">Lưu &&nbsp;Cập nhật</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <script src="assets/css/defaultlayout.js"></script>
    <script src="assets/css/controlitem.js"></script>


</body>

</html>