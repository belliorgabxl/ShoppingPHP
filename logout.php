
<?php 
session_start(); //ประกาศใช้ session
unset($_SESSION['username']);
session_destroy(); //เคลียร์ค่า session
 header('Location: index.php'); //Logout เรียบร้อยและกระโดดไปหน้าตามที่ต้องการ
//devbanban.com
?>