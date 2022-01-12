<?php
session_start();
require("../../database/connection.php");
$api = isset($_GET["api"]) ? $_GET["api"] : '';


$username = $_POST['Username'];
$password = $_POST['password'];
$re_password = $_POST['Re_Password'];
$user_check = "SELECT * FROM Login WHERE Username = '$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check);
  $user = mysqli_fetch_assoc($result);

     if($username == $_SESSION['username']){
      if ($password != $re_password) {

        echo "<script>alert('รหัสผ่านทั้ง 2 ช่องไม่ตรงกัน');
      location.href = '../../?page=change_user';</script>";
      } else {
  
        $no = $_SESSION['no'];
  
        $passwordenc = md5($password);
  
        $sql_change = "UPDATE Login SET Username = '".$username."'
                                  ,password = '".$passwordenc."'
                                  WHERE No = '".$no."' ";
                        
        
  
        if ($conn->query($sql_change) === TRUE)  {
          $_SESSION['alert_status'] = 1;
          $_SESSION['change_user'] = 1;
          header("Location: ../../?page=change_user");
        } else {
        
          echo "Error: " . $sql_change . "<br>" . $conn->error;
        }
      }
     }else{

  if ($user['Username'] == $username) {

    echo "<script>alert('ชื่อผู้งานนี้ มีผู้ใช้งานแล้ว');
    location.href = '../../?page=change_user';</script>";
 
  } else {
    if ($password != $re_password) {

      echo "<script>alert('รหัสผ่านทั้ง 2 ช่องไม่ตรงกัน');
      location.href = '../../?page=change_user';</script>";
   
    } else {

      $no = $_SESSION['no'];

      $passwordenc = md5($password);

      $sql_change = "UPDATE Login SET Username = '".$username."'
                                ,password = '".$passwordenc."'
                                WHERE No = '".$no."' ";
                      
      

      if ($conn->query($sql_change) === TRUE)  {
        $_SESSION['alert_status'] = 1;
        $_SESSION['change_user'] = 1;
        header("Location: ../../?page=change_user");
      } else {
      
        echo "Error: " . $sql_change . "<br>" . $conn->error;
      }
    }
  }
}
