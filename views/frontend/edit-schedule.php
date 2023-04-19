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
    <link rel="icon" href="../../img/favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <title> Edit Schedule</title>
    <style>
        body {
            margin: 0;
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            background-color: var(--bs-body-bg);
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
            margin: 30px;
        }
    </style>

</head>


<body?>


    <h3> Edit Schedule</h3>
    <form method="post" action="">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ID</label>
            <input type="integer" value="<?php
                                            echo $rows['device_id']
                                            ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id">

        </div>
        <div class="mb-3">

            <!-- <input type="time" value="<?php
                                            //  echo $rows['name'] 
                                            ?>" class="form-control" id="exampleInputPassword1" name="name"> -->
            <label for="exampleInputEmail1" class="form-label">From:</label><br>
            <input type="time" id="time1" value="09:12"  name="time_start">
        </div>
        <div class="mb-3">

            <!-- <input type="time" value="<?php
                                            //  echo $rows['name'] 
                                            ?>" class="form-control" id="exampleInputPassword1" name="name"> -->
            <label for="exampleInputEmail1" class="form-label">To:</label><br>
            <input type="time" id="time1" value="09:12"  name="time_end">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary" name="edit">Submit</button>
    </form>
    </body>