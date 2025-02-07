<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checklogin</title>
</head>

<body>
    <?php
    session_start();
    include 'connect_db.php';

    if (isset($_POST['submit'])) {
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];

        $sql_check = "SELECT * FROM tbl_user WHERE user_username = '$user_username' and user_password = '$user_password'";
        $result = mysqli_query($condb, $sql_check);
        $num_row = mysqli_num_rows($result);
        $session = mysqli_fetch_assoc($result);

        if ($num_row <= 0) {
            echo "<script type='text/javascript'>";
            echo "alert('username หรือ password ไม่ถูกต้อง');";
            echo "window.location = 'login.php'; ";
            echo "</script>";
        } else {
            $_SESSION['user_id'] = $session['user_id'];
            $_SESSION['user_username'] = $session['user_username'];
            header("location:index.php");
        }

    }
    if (isset($_GET['logout'])) {
        session_destroy();
        header("location:index.php");
    }
    ?>
</body>

</html>