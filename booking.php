<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'connect_db.php';
//query
$query = "SELECT * FROM tbl_table WHERE id=$_GET[id]";
$result = mysqli_query($condb, $query);
$row = mysqli_fetch_array($result);
//print_r($row);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>แสดงข้อมูลโต๊ะเพื่อทำการจอง</title>
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
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-7" style="margin-top: 50px;">
        <div class="card shadow-lg" style="border-radius: 15px; background-color: #f4f1e1;">
          <div class="card-body">
            <?php if (isset($_SESSION['user_id'])) { ?>
              <h4 align="center" style="color: #4b8c4e; font-family: 'Arial', sans-serif; font-weight: bold;">SMC Music&Tea House : <?php echo $_SESSION['user_username']; ?></h4>
            <?php } else { ?>
              <h4 align="center" style="color: #4b8c4e; font-family: 'Arial', sans-serif; font-weight: bold;">SMC Music&Tea House</h4>
            <?php } ?>
            <br>
            <div class="alert alert-warning" role="alert" style="background-color: #c9e6b9; border-color: #a1c49d;">
              <center><font color="#8e4f23"><b> บันทึกการเลือกโต๊ะ *ให้พนักงานเลือกให้ เลือกและจองวันต่อวัน </b></font></center>
            </div>
            <hr>
            <form action="save_booking.php" method="post">
              <div class="form-group row">
                <label class="col-sm-3" style="color: #5d4b31;">เลขโต๊ะ</label>
                <div class="col-sm-9">
                  <input type="text" name="table_name" class="form-control" disabled value="<?php echo $row['table_type'].''.$row['table_name']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3" style="color: #5d4b31;">ผู้จอง</label>
                <div class="col-sm-9">
                  <input type="text" name="booking_name" class="form-control" required placeholder="ชื่อผู้จอง" style="border-radius: 10px; background-color: #f9f8f3;">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3" style="color: #5d4b31;">วันที่</label>
                <div class="col-sm-6">
                  <input type="date" name="booking_date" class="form-control" required value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" style="border-radius: 10px; background-color: #f9f8f3;">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3" style="color: #5d4b31;">เวลา</label>
                <div class="col-sm-6">
                  <input type="time" name="booking_time" class="form-control" required placeholder="เวลา" style="border-radius: 10px; background-color: #f9f8f3;">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3" style="color: #5d4b31;">เบอร์โทร</label>
                <div class="col-sm-9">
                  <input type="text" name="booking_phone" class="form-control" required placeholder="เบอร์โทร" minlength="10" maxlength="10" style="border-radius: 10px; background-color: #f9f8f3;">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3" style="color: #5d4b31;">ผู้บันทึก</label>
                <div class="col-sm-9">
                  <?php if (isset($_SESSION['user_id'])) { ?>
                    <input type="text" name="booking_staff" class="form-control" readonly value="<?php echo $_SESSION['user_username']; ?>" style="border-radius: 10px; background-color: #f9f8f3;">
                  <?php } else { ?>
                    <input type="text" name="booking_staff" class="form-control" readonly value="ลูกค้า" style="border-radius: 10px; background-color: #f9f8f3;">
                  <?php } ?>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3"></label>
                <div class="col-sm-9">
                  <input type="hidden" name="table_id" value="<?php echo $_GET['id']; ?>">
                  <button type="submit" class="btn btn-success btn-lg" style="border-radius: 20px; padding: 10px 20px; background-color: #6a9c61;">บันทึกการจอง</button>
                  <button class="btn btn-danger btn-lg" style="border-radius: 20px; padding: 10px 20px; background-color: #d76c51;">
                    <a href="index.php" target="_blank" style="color: white; text-decoration: none;">ยกเลิก</a>
                  </button>
                  </div>
                  </div>
                </div>
              </div>
            </form>
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