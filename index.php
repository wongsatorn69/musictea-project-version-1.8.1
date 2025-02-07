<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'connect_db.php';
//query
$query_table = "SELECT * FROM tbl_table ORDER BY id ASC";
$result_table = mysqli_query($condb, $query_table);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>แสดงรายชื่อโต๊ะจากฐานข้อมูล PHP+MySQLi+Bootstrap4</title>
  <style type="text/css">
    .devbanban {
      background-color: #ffffff;
    }
  </style>
</head>

<body style="background-color: #e3f2e1;">
  <?php
  session_start();
  ?>
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-7" style="margin-top: 50px;">
      <div class="card shadow-lg" style="border-radius: 15px; background-color: #f4f1e1;">
        <div class="card-body">
        <br>
        <?php if (isset($_SESSION['user_id'])) { ?>
          <h4 align="center" style="color: #4b8c4e; font-family: 'Arial', sans-serif; font-weight: bold;">SMC Music&Tea House : <?php echo $_SESSION['user_username']; ?></h4>
        <?php } else { ?>
          <h4 align="center" style="color: #4b8c4e; font-family: 'Arial', sans-serif; font-weight: bold;">SMC Music&Tea House</h4>
        <?php } ?>
        <br>
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="alert alert-warning" role="alert" style="background-color: #c9e6b9; border-color: #a1c49d;">
              <center><b style="color: #8e4f23;">A = โซนนั่งพื้น, B = โซนนั่งโต๊ะ</b></center>
            </div>
            <hr>
            <div class="row" style="margin-bottom: 20px;">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <?php foreach ($result_table as  $row_table) {
                  if ($row_table['table_status'] == 0) { //ว่าง
                    if ($row_table['table_type'] == 'A') {
                      echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                      echo '<a href="booking.php?id=' . $row_table["id"] . '&act=booking"class="btn btn-primary" target="_blank">' . $row_table['table_type'] . '' . $row_table['table_name'] . '</a></div>';
                    } else {
                      echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                      echo '<a href="booking.php?id=' . $row_table["id"] . '&act=booking"class="btn btn-success" target="_blank">' . $row_table['table_type'] . '' . $row_table['table_name'] . '</a></div>';
                    }
                  } elseif ($row_table['table_status'] == 1) { //ถูกจอง แต่ยังไม่รับโต๊ะ
                    echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                    echo '<a href="checkbooking.php?id=' . $row_table["id"] . '&act=checkbooking" class="btn btn-warning" target="_blank">' . $row_table['table_type'] . '' . $row_table['table_name'] . '</a></div>';
                  } else { //ถูกจอง รับโต๊ะแล้ว
                    echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                    echo '<a href="checkbooking.php?id=' . $row_table["id"] . '&act=checkbooking" class="btn btn-secondary" target="_blank">' . $row_table['table_type'] . '' . $row_table['table_name'] . '</a></div>';
                  }
                } ?>
            </div>
          <?php } else { ?>
            <?php foreach ($result_table as  $row_table) {
                  if ($row_table['table_status'] == 0) { //ว่าง
                    if ($row_table['table_type'] == 'A') {
                      echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                      echo '<a href="booking.php?id=' . $row_table["id"] . '&act=booking"class="btn btn-primary" target="_blank">' . $row_table['table_type'] . '' . $row_table['table_name'] . '</a></div>';
                    } else {
                      echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                      echo '<a href="booking.php?id=' . $row_table["id"] . '&act=booking"class="btn btn-success" target="_blank">' . $row_table['table_type'] . '' . $row_table['table_name'] . '</a></div>';
                    }
                  } elseif ($row_table['table_status'] == 1) { //ถูกจอง แต่ยังไม่รับโต๊ะ
                    echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                    echo '<a href="#" class="btn btn-warning disabled" target="_blank">' . $row_table['table_type'] . '' . $row_table['table_name'] . '</a></div>';
                  } else { //ถูกจอง รับโต๊ะแล้ว
                    echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                    echo '<a href="#" class="btn btn-secondary disabled" target="_blank">' . $row_table['table_type'] . '' . $row_table['table_name'] . '</a></div>';
                  }
                } ?>
          </div>
        <?php } ?>

        <p><b style="color: #4b8c4e;">*น้ำเงิน = ว่าง , เหลือง = ติดจอง , เทา = ไม่ว่าง</b></p>

        <?php if (isset($_SESSION['user_id'])) { ?>
          <a href="checklogin.php?logout" class="btn btn-danger" target="_blank" style="border-radius: 20px; padding: 10px 20px; background-color: #d76c51;">Logout</a>
        <?php } else { ?>
          <a href="login.php" class="btn btn-warning" target="_blank" style="border-radius: 20px; padding: 10px 20px; background-color: #f9aa33;">Login</a>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <center>
    <font color="black"> designed by TUKTUK</font>
  </center>
</body>

</html>