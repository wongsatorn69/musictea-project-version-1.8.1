    <?php
    require_once 'connect_db.php';
    session_start();
    ?>

    <?php
    if (isset($_GET['cancel_table'])) {

        $query = "SELECT * FROM tbl_booking WHERE booking_id=$_GET[cancel_table]";
        $result = mysqli_query($condb, $query);
        $row = mysqli_fetch_array($result);

        $sql_del = "DELETE FROM tbl_booking WHERE booking_id = '$_GET[cancel_table]' ";
        $result_del = mysqli_query($condb, $sql_del);

        $sqlUpdate = "UPDATE tbl_table SET table_status=0 WHERE id = '$row[table_id]' ";
        $rsUpdate = mysqli_query($condb, $sqlUpdate);

        if ($result_del = mysqli_query($condb, $sql_del) && $rsUpdate = mysqli_query($condb, $sqlUpdate)) {
            header("Location: canceltable.php");
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('ลบไม่สำเร็จ');";
            echo "window.location = 'index.php'; ";
            echo "</script>";
        }
    }

    ?>

    <?php
    if (isset($_GET['confirm_table'])) {

        $query = "SELECT * FROM tbl_booking WHERE booking_id=$_GET[confirm_table]";
        $result = mysqli_query($condb, $query);
        $row = mysqli_fetch_array($result);

        // $confirm_table = $_GET['confirm_table'];
        // $table_id = $row['table_id'];

        $sql_con = "UPDATE tbl_booking SET booking_status = 1 WHERE booking_id = '$_GET[confirm_table]'";
        $result_con = mysqli_query($condb, $sql_con);

        $sqlUpdate = "UPDATE tbl_table SET table_status= 2 WHERE id = '$row[table_id]'";
        $rsUpdate = mysqli_query($condb, $sqlUpdate);

        if ($result_con = mysqli_query($condb, $sql_con) && $rsUpdate = mysqli_query($condb, $sqlUpdate)) {
            header("Location: confirmtable.php");
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('ยืนยันไม่สำเร็จ');";
            echo "window.location = 'index.php'; ";
            echo "</script>";
        }
    }

    ?>

    <?php
    if (isset($_GET['finish_table'])) {

        $query = "SELECT * FROM tbl_booking WHERE booking_id=$_GET[finish_table]";
        $result = mysqli_query($condb, $query);
        $row = mysqli_fetch_array($result);

        // $finish_table = $_GET['finish_table'];
        // $table_id = $row['table_id'];

        $sql_fin = "UPDATE tbl_booking SET booking_status = 2 WHERE booking_id = '$_GET[finish_table]'";
        $result_fin = mysqli_query($condb, $sql_fin);

        $sqlUpdate = "UPDATE tbl_table SET table_status = 0 WHERE id = '$row[table_id]'";
        $rsUpdate = mysqli_query($condb, $sqlUpdate);

        if ($result_fin = mysqli_query($condb, $sql_fin) && $rsUpdate = mysqli_query($condb, $sqlUpdate)) {
            header("Location: finishtable.php");
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('ยืนยันไม่สำเร็จ');";
            echo "window.location = 'index.php'; ";
            echo "</script>";
        }
    }
    ?>