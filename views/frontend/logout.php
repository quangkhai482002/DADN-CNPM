<?php
session_start(); // Khởi động phiên làm việc

// Xóa toàn bộ các biến phiên làm việc
$_SESSION = array();

// Nếu sử dụng cookie để lưu phiên làm việc, xóa cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Hủy phiên làm việc
session_destroy();

// Điều hướng người dùng đến trang đăng nhập hoặc trang chính của ứng dụng
header('Location: index.php');
?>