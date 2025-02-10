<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'connect_db.php';

//print_r($_POST);

if (isset($_POST['table_id']) && isset($_POST['booking_name']) && isset($_POST['booking_date'])) {
	

//ประกาศตัวแปรรับค่าจากฟอร์ม

$booking_name = $_POST['booking_name'];
$booking_people = $_POST['booking_people'];
$booking_date = $_POST['booking_date'];
$booking_time = $_POST['booking_time'];
// แปลงเวลา booking_time เป็น DateTime object
$time = new DateTime($booking_time);

// เพิ่ม 15 นาที
$time->add(new DateInterval('PT15M'));

// ได้เวลาใหม่หลังจากเพิ่ม 15 นาที
$booking_time_out = $time->format('H:i:s'); 
$booking_phone = $_POST['booking_phone'];
$booking_staff = $_POST['booking_staff'];
$booking_status = 0 ;
$booking_bill = 0 ;
$table_id = $_POST['table_id'];
$dateCreate = date('Y-m-d H:i:s'); //วันที่บันทึก

//insert booking
mysqli_query($condb, "BEGIN");
$sqlInsertBooking	= "INSERT INTO  tbl_booking values(null, '$table_id', '$booking_name', '$booking_people' , '$booking_date','$booking_time', '$booking_time_out', '$booking_phone', '$booking_staff', '$dateCreate' , '$booking_status' , '$booking_bill')";
$rsInsertBooking	= mysqli_query($condb, $sqlInsertBooking);
 
//การใช้ Transection ประกอบด้วย  BEGIN COMMIT ROLLBACK 


//update table status
$sqlUpdate ="UPDATE tbl_table SET table_status=1 WHERE id = $table_id"; //1=จอง
$rsUpdate = mysqli_query($condb, $sqlUpdate);


if($rsInsertBooking && $rsUpdate){ //ตรรวจสอบถ้า 2 ตัวแปรทำงานได้ถูกต้องจะทำการบันทึก แต่ถ้าเกิดข้อผิดพลาดจะ Rollback คือไม่บันทึกข้อมูลใดๆ
		mysqli_query($condb, "COMMIT");
		header("Location: success.php?id=".$table_id);
	}else{
		mysqli_query($condb, "ROLLBACK");  
		$msg = 'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ  <a href="index.php"> กลับหน้าหลัก </a>';	
	}
} //iset 
else{
	header("Location: index.php");	
}

?>