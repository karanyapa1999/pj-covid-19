<?php
session_start();
require("../../database/connection.php");
$api = isset($_GET["api"]) ? $_GET["api"] : '';
if ($api == "search") {
} else if ($api == "insert") {
    $sCode = $_SESSION["code"];
    if (isset($_POST["hide_order"])) {
        $number = $_POST["hide_order"];
    } else {
        $number = 1;
    }
    for ($i = 1; $i <= $number; $i++) {
        $sName = $_POST["name_lastname$i"];
        $sOld = $_POST["old$i"];
        $sSex = $_POST["sex$i"];
        $sAddrass = $_POST["addrass$i"];
        $sDate_tush = $_POST["date_tush$i"];
        $sType_tush = $_POST["type_tush$i"];
        $sSick = $_POST["sick$i"];
        $sDef = $_POST["def$i"];
        $sDate_vacsin = $_POST["date_vacsin$i"];

        $Close_Person = "INSERT INTO Close_Person
                (
                Code,
                CS_Order,
                CS_Name,
                CS_Sex,
                CS_Age,
                CS_Address,
                CS_Date,
                CS_Stance,
                CS_YN_Patient,
                CS_Protected,
                CS_Vaccine_Date
                )
                VALUE ('" . $sCode . "'
                ,'" . $i . "'
                ,'" . $sName . "'
                ,'" . $sSex . "'
                ,'" . $sOld . "'
                ,'" . $sAddrass . "'
                ,'" . $sDate_tush . "'
                ,'" . $sType_tush . "'
                ,'" . $sSick . "'
                ,'" . $sDef . "'
                ,'" . $sDate_vacsin . "'
                )";

        if ($conn->query($Close_Person) === TRUE) {
            //
        } else {
            echo "Error: " . $Close_Person . "<br>" . $conn->error;
            exit;
        }
    }
    $_SESSION["alert_status"] = 1;
    $_SESSION["subject_message"] = "การค้นหาผู้สัมผัส";                       
    if($_SESSION['Type'] ==1){
        header('location: ../../?page=search');
    }
    if($_SESSION['Type'] ==2){
        header('location: ../../index_data.php?page=search');
    }
    if($_SESSION['Type'] =="A"){
      header('location: ../../index_data.php?page=search');
    }

} else if ($api == "edit") {
    $sCode = $_SESSION["code"];
    $order = isset($_GET["order"]) ? $_GET["order"] : '';
    $sName = $_POST["name_lastname1"];
    $sOld = $_POST["old1"];
    $sSex = $_POST["sex1"];
    $sAddrass = $_POST["addrass1"];
    $sDate_tush = $_POST["date_tush1"];
    $sType_tush = $_POST["type_tush1"];
    $sSick = $_POST["sick1"];
    $sDef = $_POST["def1"];
    $sDate_vacsin = $_POST["date_vacsin1"];

    $Close_Person = "UPDATE Close_Person 
                    SET CS_Name='" . $sName . "',
                        CS_Sex='" . $sSex . "',
                        CS_Age='" . $sOld . "',
                        CS_Address='" . $sAddrass . "',
                        CS_Date='" . $sDate_tush . "',
                        CS_Stance='" . $sType_tush . "',
                        CS_YN_Patient='" . $sSick . "',
                        CS_Protected='" . $sDef . "',
                        CS_Vaccine_Date='" . $sDate_vacsin . "' 
                    WHERE Code = '" . $sCode . "' AND CS_Order='" . $order . "'";
    if ($conn->query($Close_Person) === TRUE) {
        $_SESSION["alert_status"] = 1;
        $_SESSION["subject_message"] = "การค้นหาผู้สัมผัส";                     
        if($_SESSION['Type'] ==1){
            header('location: ../../?page=search');
        }
        if($_SESSION['Type'] ==2){
            header('location: ../../index_data.php?page=search');
        }
        if($_SESSION['Type'] =="A"){
          header('location: ../../index_data.php?page=search');
        }

     
    } else {
        echo "Error: " . $Close_Person . "<br>" . $conn->error;
        exit;
    }
}
