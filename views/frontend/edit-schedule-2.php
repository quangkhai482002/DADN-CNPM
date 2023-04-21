<?php if (!isset($_SESSION)) {
    session_start();
} ?>
<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>
<?php
$a = $_SESSION['user_name'];
include "./includes/config.php";
$sql = "SELECT distinct * FROM `user`, `farm`, `subfarm`,`device`,`schedule` where 
user.user_name= '$a' and user.user_id=farm.user_id and farm.farm_id=subfarm.farm_id 
and subfarm.subfarm_id=device.subfarm_id and device.device_id=schedule.device_id 
and schedule.device_id=$id
";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>
<?php
if (isset($_POST["edit"])) {

    $id = $_POST["id"];
    $time_start = date('H:i:s', strtotime($_POST['time_start']));
    $time_end = date('H:i:s', strtotime($_POST['time_end']));
    if (
        !empty($id) &&
        !empty($time_start) &&
        !empty($time_end)

    ) {
        $sql = "UPDATE `schedule`   SET schedule_id ='$id',time_start = '$time_start', time_end ='$time_end'
        WHERE schedule_id = $id";
        $result = mysqli_query($conn, $sql);
        header("location:index.php?option=lichhdden.php");
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


<body?>

<div class="wrapper">

<?php include_once("includes/header.php"); ?>

<div class="container">

<?php include_once("includes/sidebar.php"); ?>

    <div class="content">
        <H2 class="title">Chỉnh Sửa Lịch Hoạt Động</H2>
        <div class="device-container">
          <div class="grid">
            <div class="row">

                    <div class="c-12">
                        <div class="form-group">
                            <label class = "prf_title">Mã thiết bị:</label>
                            <input name="id" id="exampleInputEmail1" class="form-control" type="integer" required="true" autocomplete="off" value="<?php echo $rows['device_id']?>">
                        </div>
                    </div>
                    <div class="c-6">
                        <div class="form-group">
                            <label class = "prf_title">From:</label>
                            <input name="time_start" id="time1" class="form-control-1" type="time" placeholder="" required="true" autocomplete="off" value="09:12">
                        </div>
                    </div>
                    <div class="c-6">
                        <div class="form-group">
                            <label class = "prf_title">To:</label>
                            <input name="time_end" id="time1" class="form-control-1" type="time" placeholder="" required="true" autocomplete="off" value="09:12">
                        </div>
                    </div>
                    <div class="c-12">
                        <div class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label for="exampleCheck1">Check me out</label>
                        </div>
                        
                    </div>

                    <div class="c-6">
                    <a href="index.php?option=lichhdmaybom.php">
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
                                <button class="update_btn" name="new_update" id="new_update" data-toggle="modal">Lưu &&nbsp;Cập nhật</button>
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