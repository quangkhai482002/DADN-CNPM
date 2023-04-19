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
    <H2 class="title">QUẢN LÍ THIẾT BỊ</H2>

<div class="addbtn">
  <a href="index.php?option=addDevice.php">Thêm thiết bị</a>
</div>
<div class="manageDevice-container">

  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>Mã thiết bị</span></th>
        <th><span>Tên thiết bị</span></th>
        <th><span>Tên phân khu</span></th>
        <th><span>Loại thiết bị</span></th>
        <th><span>Vị trí</span></th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>6,000</td>
        <td class="lalign">silly tshirts</td>
        <td>110</td>
        <td>1.8%</td>
        <td>Vi tri 1</td>
        <td><a href="index.php?option=editDevice.php">Edit</a></td>
        <td><a href="">Delete</td>
        
      </tr>
      <tr>
        <td>2,200</td>
        <td class="lalign">desktop workspace photos</td>
        <td>500</td>
        <td>22%</td>
        <td>8.9</td>
        <td><a href="">Edit</td>
          <td><a href="">Delete</td>

      </tr>
      <tr>
        <td>13,500</td>
        <td class="lalign">Cảm biến nhiệt độ, độ ẩm</td>
        <td>900</td>
        <td>6.7%</td>
        <td>12.0</td>
        <td><a href="">Edit</td>
          <td><a href="">Delete</td>

      </tr>
      <tr>
        <td>8,700</td>
        <td class="lalign">popular web series</td>
        <td>350</td>
        <td>4%</td>
        <td>7.0</td>
        <td><a href="">Edit</td>
          <td><a href="">Delete</td>

      </tr>
      <tr>
        <td>9,900</td>
        <td class="lalign">2013 webapps</td>
        <td>460</td>
        <td>4.6%</td>
        <td>11.5</td>
        <td><a href="index.php?option=editDevice.php">Edit</a></td>
          <td><a href="">Delete</td>

      </tr>
    </tbody>
  </table>
  
</div>

    </div>


</div>
</div>

<script src="assets/css/defaultlayout.js"></script>
<script src="assets/css/controlitem.js"></script>


</body>

</html>