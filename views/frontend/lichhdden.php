<?php if (!isset($_SESSION)) {
    session_start();
} ?>
<?php
$a = $_SESSION['user_name'];
include "./includes/config.php";
$sql = "SELECT distinct * FROM `user`, `farm`, `subfarm` where 
user.user_name= '$a' and user.user_id=farm.user_id and farm.farm_id=subfarm.farm_id 
";
$result = mysqli_query($conn, $sql);
// $c = "SELECT date_format(`time_start`,'%h:%i %p') as time_start from `schedule`";
// $result_1 = mysqli_query($conn, $c);


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
    <H2 class="title">LỊCH HOẠT ĐỘNG CỦA HỆ THỐNG ÁNH SÁNG</H2>
        <p class="credit"> <i class="icon fas fa-ellipsis-v mr-5"></i> Lịch hoạt động <i
            class="fas fa-caret-right mr-5"></i> Hệ thống ánh sáng</p>
            <form action="" method="POST">
        <div class="phankhu">
            <select class="dropdown" placeholder="Please choose" name="phankhu">
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <option method="POST" type="submit">

                            <?php
                            echo $row['subfarm_name']
                            ?>
                        </option>
                <?php
                    }
                }
                ?>
                <input class="showbtn" type="submit" name="" value="chọn">
            </select>
        </div>
        </form>



        <?php
            $b = null;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $b = $_POST['phankhu'];
            }
            ?>

        <?php
            $dv = "SELECT distinct device.device_id ,schedule.schedule_id,schedule.date_type, date_format(`time_start`,'%h:%i %p') as time_start ,date_format(`time_end`,'%h:%i %p') as time_end FROM `user`, `farm`, `subfarm`,`device`,`schedule` where 
            user.user_name= '$a' and user.user_id=farm.user_id and farm.farm_id=subfarm.farm_id 
            and subfarm.subfarm_name= '$b'and subfarm.subfarm_id=device.subfarm_id and device.device_name='den'
            and schedule.device_id= device.device_id;
                ";
            $result_dv = mysqli_query($conn, $dv);
            ?>


        <div class="schedule-container">
          <div class="grid">
            <div class="row">

            <?php
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result_dv)) {
                ?>

            <div class="c-6">
                <div class="schedule-2">
                  <div class="background12">
                    <div class="statuscolor"></div>
                    <div class="details">
                      <div class="chiu-sng-bui">Lịch chiếu sáng</div>
                      <div class="xx"><?php echo "#" . $row['device_id'] ?></div>
                      
                      <div class="date">
                        <img class="calendar-icon" alt="" src="assets/svg/calendar.svg" />
                        <div class="hng-ngy"><?php echo $row['date_type'] ?></div>
                      </div>
                      <div class="hours">
                        <img class="calendar-icon" alt="" src="assets/svg/clock.svg" />
                        <div class="hng-ngy"><?php echo $row['time_start'] . '-' . $row['time_end'] ?></div>
                      </div>
                    </div>
                    <div class="iconEdit">
                      <div onclick="toggleEditSchedule()">
                        <img class="dots-icon" alt="" src="assets/svg/dots.svg" />
                        </div>
    
                        <ul id="editSchedule" class="editSchedule">
                          <li><a href="index.php?option=edit-schedule.php&id=<?php echo $row['device_id'] ?>">Chỉnh sửa</a></li>
                          <li><a href="index.php?option=edit-schedule.php&id=<?php echo $row['device_id'] ?>">Xóa</a></li>
                        </ul>
                    </div>
                    
                  </div>
                </div>
              </div>

              <?php
                        }
                    }
                    ?>
              
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