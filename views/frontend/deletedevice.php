<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "1234567890danh";
$dbname = "farm";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Xác định ID sản phẩm cần xóa

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Thực hiện truy vấn để xóa sản phẩm khỏi cơ sở dữ liệu
    $sql = "DELETE FROM `device` WHERE device_id='$id'";
    if (mysqli_query($conn, $sql)) {
        $message = "Xóa sản phẩm thành công";
    } else {
        $message = "Lỗi xóa sản phẩm: " . mysqli_error($conn);
    }
} else {
    $message = "Không tìm thấy ID sản phẩm";
}

// Chuyển hướng người dùng đến trang quản lý sản phẩm và hiển thị thông báo
header("location:index.php?option=home.php&tuychon=managedevice.php&message=$message");
// Thực hiện truy vấn để xóa sản phẩm khỏi cơ sở dữ liệu

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>