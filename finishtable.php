<?php
require_once 'connect_db.php';
$query = "SELECT * FROM tbl_booking WHERE booking_id=$_GET[id]";
$result = mysqli_query($condb, $query);
$row = mysqli_fetch_array($result);
?>

<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="up.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>FINISH</title>
  <style type="text/css">
    .devbanban {
      background-color: #ffffff;
    }
  
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    img {
      max-width: 40%;
      height: auto;
    }

    .btn {
      border-radius: 20px;
      padding: 10px 20px;
      background-color: #d76c51;
      text-align: center;
    }
    .btn a {
      color: white;
      text-decoration: none;
    }
    .btn:hover {
      background-color: #c4543b; /* Darker shade on hover */
    }
  </style>
</head>

<body style="background-color: #e3f2e1;">
  <?php
  session_start();
  ?>
  <?php
    if (isset($_SESSION['user_id'])) {
    } else {
        echo "<script type='text/javascript'>";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }
    ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-7" style="margin-top: 50px;">
        <div class="card shadow-lg" style="border-radius: 15px; background-color: #f4f1e1;">
          <div class="card-body">                    
            <h4 align="center" style="color: #4b8c4e; font-family: 'Arial', sans-serif; font-weight: bold;">SMC Music&Tea House</h4>
            <h5 align="center" style="color: #4b8c4e; font-family: 'Arial', sans-serif; font-weight: bold; font: size 25em;;">โต๊ะว่าง</h5>           
            <br>
            <img src="sucsym.png" alt="Description of Image" class="center">
            <br>
            <div class="alert alert-warning" role="alert" style="background-color: #c9e6b9; border-color: #a1c49d;">
              <center>
                <font color="#a82525"><b>เช็คบิลเรียบร้อย! <?php echo $row['booking_bill']?> บาท</b></font>
              </center>
            </div>
            <br>
            <button class="btn btn-danger btn-lg">
              <a href="index.php">กลับสู่หน้าหลัก</a>
            </button>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <center>
    <font color="#3e4e3f" style="font-family: 'Arial', sans-serif;">Designed by TUKTUK</font>
  </center>
</body>


</html>