<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'connect_db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin Login</title>
    <style type="text/css">
    .devbanban{
    background-color: #ffffff;
    }
    </style>
  </head>
  <body style="background-color: #e3f2e1;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5" style="margin-top: 80px;">
                <div class="card shadow-lg" style="border-radius: 15px; background-color: #f4f1e1;">
                    <div class="card-body">
                        <h4 align="center" style="color: #4b8c4e; font-family: 'Arial', sans-serif; font-weight: bold;">SMC Music & Tea House</h4>
                        <br>
                        <div class="alert alert-warning" role="alert" style="background-color: #c9e6b9; border-color: #a1c49d;">
                            <center><font color="#8e4f23"><b> Login (เฉพาะแอดมินและพนักงานเท่านั้น***) </b></font></center>
                        </div>
                        <hr>
                        <form action="checklogin.php" method="post">
                            <div class="form-group">
                                <label for="username" style="font-size: 1.1em; color: #5d4b31;">Username</label>
                                <input type="text" id="username" name="user_username" class="form-control" required placeholder="Enter your username" style="border-radius: 10px; border: 2px solid #a4c4a2; background-color: #f9f8f3;">
                            </div>
                            <div class="form-group">
                                <label for="password" style="font-size: 1.1em; color: #5d4b31;">Password</label>
                                <input type="password" id="password" name="user_password" class="form-control" required placeholder="Enter your password" style="border-radius: 10px; border: 2px solid #a4c4a2; background-color: #f9f8f3;">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-lg" name="submit" value="Login" style="border-radius: 20px; padding: 10px 20px; background-color: #6a9c61; border-color: #4d7e48; color: white;">Login</button>
                                <button type="button" class="btn btn-danger btn-lg" style="border-radius: 20px; padding: 10px 20px; background-color: #d76c51; border-color: #d65a44;">
                                    <a href="index.php" style="color: white; text-decoration: none;">Back</a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <center><font color="#3e4e3f" style="font-family: 'Arial', sans-serif;">Designed by TUKTUK</font></center>
</body>


    </html>