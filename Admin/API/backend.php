<?php
session_start();
require("../../database/connection.php");
$api = isset($_GET["api"]) ? $_GET["api"] : '';
$type = isset($_GET["type"]) ? $_GET["type"] : '';

if ($api == "search") {
} else if ($api == "reset_user") {
  //function random($type){
  //  if($type == 1){
  //    $username = "SAT".(rand(1,999999))."";
  //}else if($type == 2){
  //   $username = "OPERA".(rand(1,999999))."";
  // }else {
  //   $username = "ADMIN".(rand(1,999999))."";
  // }
  // return $username;
  //}
  $sNo = isset($_GET["no"]) ? $_GET["no"] : '';
  if ($type == 1) {
    $username = "SAT" . (rand(1, 999999)) . "";
    $password = (rand(1, 999999));
  } else if ($type == 2) {
    $username = "OPERA" . (rand(1, 999999)) . "";
    $password = (rand(1, 999999));
  } else {
    $username = "ADMIN" . (rand(1, 999999)) . "";
    $password = (rand(1, 999999));
  }

  $user_check = "SELECT * FROM Login WHERE Username = '$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check);
  $user = mysqli_fetch_assoc($result);
  if ($user['Username'] ==  $username) {
    header("Refresh:0");
  } else {
     $passwordenc = md5($password);
    $sql_change = "UPDATE `Login` SET Username = '" . $username . "'
                                     ,password = '" . $passwordenc . "'
                                      WHERE No = '" . $sNo . "'
  ";
  if ($conn->query($sql_change) === TRUE) {
    echo '<script>alert("username : '.$username.'\npassword : '.$password.'");
    location.href = "../";</script>';
   } else {
    echo "Error: " . $sql_change . "<br>" . $conn->error;
}
  }
} else if ($api == "manage_user") {

  $sNo = $_POST["No"];
  $Username = $_POST["Username"];
  $Name  = $_POST["Name"];
  $Lastname  = $_POST["Lastname"];
  $Phone  = $_POST["Phone"];
  $Type = $_POST["Type"];
  $sql_login = "UPDATE `Login` SET Username = '" . $Username . "'
    , Name = '" . $Name . "'
    , Lastname = '" . $Lastname . "'
    , Phone = '" . $Phone . "'
    , Type = '" . $Type . "'
    WHERE No = '" . $sNo . "'";
  if ($conn->query($sql_login) == TRUE) {
    echo "<script>alert('แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว'); 
        location.href = '../';</script>";
  } else {
    echo 'ผิดพลาด : ' . $conn->error;
  }
} else if ($api == "delete_user") {
  $sNo = isset($_GET["no"]) ? $_GET["no"] : '';
  if ($sNo != '') {
    $sql = "DELETE FROM Login WHERE No ='" . $sNo . "'";
    if ($conn->query($sql) == TRUE) {
      echo "<script>alert('ลบบัญชีผู้ใช้งานนี้เรียบร้อยแล้ว'); location.href = '../'; </script>";
    } else {
      echo "มีปัญหาโปรดสวดมนต์";
    }
  }
} else if ($api == "insert_sunchart") {
  $Nationality = $_POST["Nationality"];
  $check = "select * from Nationality where Nationality = '$Nationality' ";
  $result1 = $conn->query($check);
  if ($result1->num_rows > 0) {
    echo "<script>alert('สัญชาตินี้ใช้งานนี้เรียบร้อยแล้ว'); location.href = '../?page=dashboard2'; </script>";
  } else {
    $sql_Nationality = "INSERT INTO `Nationality`(
          Nationality 
      )VALUE
      ('" . $Nationality . "')";

    if ($conn->query($sql_Nationality) == TRUE) {
      echo "<script>alert('เพิ่มเรียบร้อย'); 
              location.href = '../?page=dashboard2';</script>";
    } else {
      echo 'ผิดพลาด : ' . $conn->error;
    }
  }
} else if ($api == "edit_sunchart") {
  $sNo = isset($_GET["no"]) ? $_GET["no"] : '';
  $Nationality = $_POST["Nationality"];

  $sql_Nationality = "UPDATE `Nationality` SET
    Nationality = '" . $Nationality . "' WHERE No = '" . $sNo . "' ";

  if ($conn->query($sql_Nationality) == TRUE) {
    echo "<script>alert('แก้ไขเรียบร้อย'); 
        location.href = '../?page=dashboard2';</script>";
  } else {
    echo 'ผิดพลาด : ' . $conn->error;
  }
} else if ($api == "delete_Nationality") {
  $sNo = isset($_GET["no"]) ? $_GET["no"] : '';
  if ($sNo != '') {
    $sql = "DELETE FROM Nationality WHERE No ='" . $sNo . "'";
    if ($conn->query($sql) == TRUE) {
      echo "<script>alert('ลบสัญชาตินี้เรียบร้อยแล้ว'); location.href = '../?page=dashboard2'; </script>";
    } else {
      echo "มีปัญหาโปรดสวดมนต์";
    }
  }
} else if ($api == "insert_Career") {

  $Career = $_POST["Career"];
  $check = "select * from Career where Career = '$Career' ";
  $result1 = $conn->query($check);
  if ($result1->num_rows > 0) {
    echo "<script>alert('อาชีพนี้ใช้งานนี้เรียบร้อยแล้ว'); location.href = '../?page=dashboard3'; </script>";
  } else {
    $sql_Career = "INSERT INTO `Career`(
    Career 
)VALUE
('" . $Career . "')";

    if ($conn->query($sql_Career) == TRUE) {
      echo "<script>alert('เพิ่มเรียบร้อย'); 
        location.href = '../?page=dashboard3';</script>";
    } else {
      echo 'ผิดพลาด : ' . $conn->error;
    }
  }
} else if ($api == "edit_Career") {
  $sNo = isset($_GET["no"]) ? $_GET["no"] : '';
  $Career = $_POST["Career"];

  $sql_Career = "UPDATE `Career` SET
    Career = '" . $Career . "' WHERE No = '" . $sNo . "' ";

  if ($conn->query($sql_Career) == TRUE) {
    echo "<script>alert('แก้ไขเรียบร้อย'); 
        location.href = '../?page=dashboard3';</script>";
  } else {
    echo 'ผิดพลาด : ' . $conn->error;
  }
} else if ($api == "delete_Career") {
  $sNo = isset($_GET["no"]) ? $_GET["no"] : '';
  if ($sNo != '') {
    $sql = "DELETE FROM Career WHERE No ='" . $sNo . "'";
    if ($conn->query($sql) == TRUE) {
      echo "<script>alert('ลบอาชีพนี้เรียบร้อยแล้ว'); location.href = '../?page=dashboard3'; </script>";
    } else {
      echo "มีปัญหาโปรดสวดมนต์";
    }
  }
}
