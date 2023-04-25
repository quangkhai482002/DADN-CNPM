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

?>
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
        
        <th><span>Vị trí</span></th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <tr>
            <td><?php echo $row['device_id'] ?></td>
            <td class="lalign"><?php echo $row['device_name'] ?></td>
            <td><?php echo $row['subfarm_name'] ?></td>
            
            <td><?php echo $row['location'] ?></td>
            <td><a href="index.php?option=editDevice.php">Edit</a></td>
            <td><a href="">Delete</td>

          </tr>
      <?php
        }
      } ?>




    </tbody>
  </table>

</div>
<script src="assets/css/defaultlayout.js"></script>
