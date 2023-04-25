
<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "farm");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$current_time = date('Y-m-d');
$query = "
SELECT data, UNIX_TIMESTAMP(action_time) AS datetime FROM statistic WHERE device_id=5 AND DATE(action_time) = '" .$current_time. "'
";
$result = mysqli_query($connect, $query);
$rows = array();
$table = array();

$table['cols'] = array(
 array(
  'label' => 'Date Time', 
  'type' => 'datetime'
 ),
 array(
  'label' => '%', 
  'type' => 'number'
 )
);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$current_time = date('Y-m-d');
$sub_array = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $datetime = explode(".", $row["datetime"]);
 $sub_array[] =  array(
    "v" => 'Date(' . date('Y', $datetime[0]) . ', ' . (date('n', $datetime[0]) - 1) . ', ' . date('j', $datetime[0]) . ', ' . date('G', $datetime[0]) . ', ' . date('i', $datetime[0]) . ', ' . date('s', $datetime[0]) . ')'
 );
 $sub_array[] =  array(
      "v" => $row["data"]
 );
 $rows[] =  array(
     "c" => $sub_array
    );
}


$table['rows'] = $rows;

$jsonTable = json_encode($table);

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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
    function drawChart()
    {
      var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

      var options = {
      title:'Độ ẩm(%)',
      legend:{position:'bottom'},
      chartArea:{width:'95%', height:'65%'}
      };

      var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

      chart.draw(data, options);
    }
    init_reload();
    function init_reload(){
          setInterval( function(){
              window.location.reload();
          },5000);
    }
    </script>
    <style>
    .page-wrapper
    {
    width: 1000px;
    margin:0;
    margin-left: 225.7px;
    }
    </style>
    <title>Điều khiển đèn</title>
</head>

<body>



    <div class="wrapper">

        <?php include_once("includes/header.php"); ?>
    
        <div class="container">

            <?php include_once("includes/sidebar.php"); ?>

            <div class="page-wrapper">
            <br />
            <h2 align="center">Biểu đồ dữ liệu cảm biến độ ẩm</h2>
            <div id="line_chart" style="width: 100%; height: 500px"></div>
            </div>

        </div>
    </div>
                                          

</body>

</html>