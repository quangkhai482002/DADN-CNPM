
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

    <title>Điều khiển đèn</title>
</head>

<body>



    <div class="wrapper">

        <?php include_once("includes/header.php"); ?>
    
        <div class="container">

            <?php include_once("includes/sidebar.php"); ?>
            <div class="content">
            <H2 class="title">ĐIỀU KHIỂN THIẾT BỊ</H2>
            <p class="credit"> <i class="icon fas fa-calendar-week mr-5"></i> Điều khiển thiết bị <i class="fas fa-caret-right mr-5"></i> Điều khiển máy bơm</p>
                <div class="phankhu">
                    <select style=" 
                    float: center;
                        color: var(--text);
                        font-size: 18px;
                        width: 200px;
                        height: 50px;
                        font-weight: 600;
                        text-align: center;
                        border-radius: 10px;
                        margin-bottom: 20px;
                        margin-left: 100px;
                        
                        border: 3px solid blue;
                        " class="dropdown" placeholder="Please choose" id="select" required>
                        <option value="0"></option>
                        <option value="1">Phân khu A</option>
                        <option value="1">Phân khu B</option>
                        <option value="1">Phân khu C</option>
                        <option value="1">Phân khu D</option>
                    </select>
                    <button class="showbtn" id="show">Chọn</button>
                </div>

                <div class="dev-control-container" style="display:none;" id="control">
                    <div class="grid">
                        <div class="row">
                            <div class="dev-control c-6">
                                <div class="dev-control-content-container">
                                    <div class="dev-control-content" >
                                        <div class="Den"></div>
                                        <div class="dev-text">
                                            <b class="dev-name">Máy bơm</b>
                                            <div class="dev-code">#abc12345</div>
                                        </div>
                                    </div>
                                    <div class="control-content" >
                                        <p style="font-weight: bold;">Mức:</p>
                                        <div class="slider-content" >
                                            <div class="value"><?php
                                                require_once('connectDatabase.php');
                                                $connect = Connect();
                                                $result = $connect->query("SELECT data FROM statistic WHERE action_time = (SELECT MAX(action_time) FROM statistic WHERE device_id=2);");
                                                while ($row = $result->fetch_assoc()) {
                                                    if($row["data"] == 0){
                                                        echo "Tắt";
                                                    } else if ($row["data"] == 25){
                                                        echo "1";
                                                    } else if ($row["data"] == 50){
                                                        echo "2";
                                                    } else if ($row["data"] == 75){
                                                        echo "3";
                                                    } else if ($row["data"] == 100){
                                                        echo "Mạnh nhất";
                                                    }  else {
                                                        //Nothing
                                                    }
                                                }   
                                                ?></div>
                                            
                                        </div>
                                        <button class="showbtn"><a href="index.php?option=home.php&tuychon=dieuchinhgiatribom.php">Setting</a></button>
                                    </div>
                                </div>


                            </div>
            </div>



        </div>
    </div>

    <script src="assets/css/defaultlayout.js"></script>
    <script src="assets/css/controlitem.js"></script>
    <script>
         document.getElementById('show').addEventListener('click', function(e) {
        e.preventDefault();
        if(document.getElementById('select').value == "1"){
            document.getElementById('control').style.display = 'block';
        } else {
            document.getElementById('control').style.display = 'none';
        }
      });
      document.getElementById('submit').addEventListener('click', function(e) {
        e.preventDefault();
       
      });

    </script>                                           

</body>

</html>