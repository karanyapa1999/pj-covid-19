<?php
session_start();
require("../../database/connection.php");
$api = isset($_GET["api"]) ? $_GET["api"] : '';
if ($api == "search") {
} else if ($api == "insert_details") {
  for ($x = 1; $x <= 14; $x++) {
    $sCode =  $_SESSION["code"];
    $sAB14_Order = $x;
    $sAB14_Date = $_POST["AB14_Date$x"] ?? '';
    $sAB14_Activity = $_POST["AB14_Activity$x"] ?? '';
    $sAB14_Number = $_POST["AB14_Number$x"] ?? '';

    $sAA14_Order = $x;
    $sAA14_Date = $_POST["AA14_Date$x"] ?? '';
    $sAA14_Activity = $_POST["AA14_Activity$x"] ?? '';
    $sAA14_Number = $_POST["AA14_Number$x"] ?? '';


    $Activity_Before_14 = "INSERT INTO Activity_Before_14
    (
    Code,
    AB14_Order,
    AB14_Date,
    AB14_Activity,
    AB14_Number
    )
VALUE ('" . $sCode . "'
,'" . $sAB14_Order . "'
,'" . $sAB14_Date . "'
,'" . $sAB14_Activity . "'
,'" . $sAB14_Number . "'
)";

    $Activity_After_14 = "INSERT INTO Activity_After_14
(
Code,
AA14_Order,
AA14_Date,
AA14_Activity,
AA14_Number
)
VALUE ('" . $sCode . "'
    ,'" . $sAA14_Order . "'
    ,'" . $sAA14_Date . "'
    ,'" . $sAA14_Activity . "'
    ,'" . $sAA14_Number . "'
)";

    $stmt1 = $conn->prepare($Activity_After_14);
    $stmt1->execute();
    $stmt1->close();
    $stmt2 = $conn->prepare($Activity_Before_14);
    $stmt2->execute();
    $stmt2->close();
  }

  $_SESSION["alert_status"] = 1;
  $_SESSION["subject_message"] = "รายละเอียดเหตุการณ์";                           
        if($_SESSION['Type'] ==1){
            header('location: ../../?page=details');
        }
        if($_SESSION['Type'] ==2){
            header('location: ../../index_data.php?page=details');
        }
        if($_SESSION['Type'] =="A"){
          header('location: ../../index_data.php?page=details');
        }
} else if ($api == "edit_details") {

  for ($x = 1; $x <= 14; $x++) {

    $sCode =  $_SESSION["code"];
    $sNo = $_POST["No$x"];
    $sAB14_Order = $x;
    $sAB14_Date = $_POST["AB14_Date$x"] ? $_POST["AB14_Date$x"] : '-';
    $sAB14_Activity = $_POST["AB14_Activity$x"] ? $_POST["AB14_Activity$x"] : '-';
    $sAB14_Number = $_POST["AB14_Number$x"] ? $_POST["AB14_Number$x"] : '-';

    $sAA14_Order = $x;
    $sAA14_Date = $_POST["AA14_Date$x"] ? $_POST["AA14_Date$x"] : '-';
    $sAA14_Activity = $_POST["AA14_Activity$x"] ? $_POST["AA14_Activity$x"] : '-';
    $sAA14_Number = $_POST["AA14_Number$x"] ? $_POST["AA14_Number$x"] : '-';

    $sql_AB14 = 'UPDATE Activity_Before_14 SET 
    AB14_Order = "' . $sAB14_Order . '"
    ,AB14_Date = "' . $sAB14_Date . '"
    ,AB14_Activity = "' . $sAB14_Activity . '"
    ,AB14_Number = "' . $sAB14_Number . '"
    WHERE No = ' . $sNo . '';

    $sql_AA14 = 'UPDATE Activity_After_14 SET 
    AA14_Order = "' . $sAA14_Order . '"
    ,AA14_Date = "' . $sAA14_Date  . '"
    ,AA14_Activity = "' . $sAA14_Activity . '"
    ,AA14_Number = "' . $sAA14_Number . '"
    WHERE No = ' .  $sNo . '';

    if ($conn->query($sql_AB14) === TRUE) {
      if ($conn->query($sql_AA14) === TRUE) {
        echo 'เข้าแล้ว รอบที่ = ' . $x . "<br>";
      } else {
        echo "มีปัญหารอบที่ " . $x . " : " . $sql_AA14 . "<br>" . $conn->error;
        break;
      }
    } else {
      echo "มีปัญหารอบที่ " . $x . " : " . $sql_AB14 . "<br>" . $conn->error;
      break;
    }
  }

  $_SESSION["alert_status"] = 1;
  $_SESSION["subject_message"] = "รายละเอียดเหตุการณ์";                           
        if($_SESSION['Type'] ==1){
            header('location: ../../?page=details');
        }
        if($_SESSION['Type'] ==2){
            header('location: ../../index_data.php?page=details');
        }
        if($_SESSION['Type'] =="A"){
          header('location: ../../index_data.php?page=details');
        }
}
