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

// Xử lý khi người dùng nhấn nút "Thêm"
if (isset($_POST['new_update'])) {
    $device_id = $_POST['device_id'];
    $device_name = $_POST['device_name'];
    $subfarm_name = $_POST['subfarm_name'];
    $location = $_POST['location'];

    // Thực hiện truy vấn để thêm thiết bị mới vào cơ sở dữ liệu
    $sql = "INSERT INTO device (device_id, device_name, subfarm_id, location) VALUES ('$device_id', '$device_name', (SELECT subfarm_id FROM subfarm WHERE subfarm_name='$subfarm_name'), '$location')";
    $result = mysqli_query($conn, $sql);

    // Kiểm tra kết quả và hiển thị thông báo tương ứng
    if ($result) {
        echo "<script>alert('Thêm thiết bị thành công!')</script>";
        echo "<script>window.location.href='index.php?option=home.php&tuychon=managedevice.php'</script>";
    } else {
        echo "<script>alert('Lỗi khi thêm thiết bị!')</script>";
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
    <title>Thêm thiết bị</title>
    <style>
       
    </style>
</head>

<body>

    <div class="wrapper">

        <?php include_once("includes/header.php"); ?>

        <div class="container">

            <?php include_once("includes/sidebar.php"); ?>

            <div class="content">
                <h2 class="title">Thêm Thiết Bị</h2>
                <div class="device-container">
                    <div class="grid">
                    <form method="post">

                        <div class="row">


                                <div class="c-12">
                                    <div class="form-group">
                                        <label class="prf_title">Mã thiết bị:</label>
                                        <input name="device_id" class="form-control" type="text" required="true" autocomplete="off">
                                    </div>
                                </div>
                                <div class="c-12">
                                    <div class="form-group">
                                        <label class="prf_title">Tên thiết bị:</label>
                                        <select name="device_name" class="form-control" required="true">
                                            <option value="">Chọn loại thiết bị</option>
                                            <option value="den">Đèn</option>
                                            <option value="bom nuoc">Bơm nước</option>
                                            <option value="cam bien anh sang">Cảm biến ánh sáng</option>
                                            <option value="cam bien nhiet do">Cảm biến nhiệt độ</option>
                                            <option value="do am">Cảm biến độ ẩm</option>
                                            <option value="cam bien do am dat">Cảm biến độ ẩm đất</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="c-12">

                                    <div class="c-12">
                                        <div class="form-group">

                                            <label class="prf_title">Tên phân khu:</label>
                                            <select name="subfarm_name" class="form-control" required="true">
                                                <option value="">Chọn phân khu</option>
                                                <option value="Phân khu A">Phân khu A</option>
                                                <option value="Phân khu B">Phân khu B</option>
                                                <option value="Phân khu C">Phân khu C</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="c-12">
                                    <div class="form-group">
                                        <label class="prf_title">Vị trí:</label>
                                        <select name="location" class="form-control" required="true">
                                            <option value="">Chọn vị trí</option>
                                            <option value="hàng 1">hàng 1</option>
                                            <option value="hàng 2">hàng 2</option>
                                            <option value="hàng 3">hàng 3</option>
                                            <option value="hàng 4">hàng 4</option>
                                            <option value="hàng 5">hàng 5</option>
                                            <option value="hàng 6">hàng 6</option>
                                            <option value="hàng 7">hàng 7</option>
                                            <option value="hàng 8">hàng 8</option>
                                            <option value="hàng 9">hàng 9</option>
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
                                            <button class="update_btn" name="new_update" id="new_update" data-toggle="modal">Thêm</button>
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
</body>

</html>