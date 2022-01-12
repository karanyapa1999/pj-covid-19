<?php
session_start();
require("../../database/connection.php");
$api = isset($_GET["api"]) ? $_GET["api"] : '';
if ($api == "search") {
} else if ($api == "insert") {
    for ($i = 0; $i <= $_POST["no_hide"]; $i++) {
        $sCode =  $_SESSION["code"];
        $sNo = $_POST["no$i"];
        $sKeep_date = $_POST["keep_date$i"];
        $sType = $_POST["type$i"];
        $sStation = $_POST["station$i"];
        $sDetect_type = $_POST["detect$i"];


        $INSERT = "INSERT INTO SARS_CoV_2_PCR
                    (
                    Code,
                    Order_PCR,
                    Date_PCR,
                    Example_type_PCR,
                    Station_PCR,
                    Detected_type
                    )
        VALUE ('" . $sCode . "'
        ,'" . $sNo . "'
        ,'" . $sKeep_date . "'
        ,'" . $sType . "'
        ,'" . $sStation . "'
        ,'" . $sDetect_type . "'
   
        )";

        if ($conn->query($INSERT) === TRUE) {

            $_SESSION["alert_status"] = 1;
            $_SESSION["subject_message"] = "ข้อมูลทางคลินิกผลตรวจPCR";   
            if ($_SESSION['Type'] == 1) {
                header('location: ../../?page=clinicPCR');
            }
            if ($_SESSION['Type'] == 2) {
                header('location: ../../index_data.php?page=clinicPCR');
            }
            if ($_SESSION['Type'] == "A") {
                header('location: ../../index_data.php?page=clinicPCR');
            }
        } else {
            // error
            echo "Error: " . $INSERT . "<br>" . $conn->error;
        }
    }
} else if ($api == "edit") {
    $sCode =  $_SESSION["code"];
    $sql_no = "SELECT Order_PCR
               FROM SARS_CoV_2_PCR
               WHERE Code = '" . $sCode . "'
               ORDER BY SARS_CoV_2_PCR.Order_PCR DESC";
    $result_no = $conn->query($sql_no);
    $row_no = $result_no->fetch_assoc();
    $round = $row_no["Order_PCR"];
    if ($_POST["hideno"] == '') {
        $limit = $round;
    } else {
        $limit = $_POST["hideno"];
    }
    for ($i = 0; $i < $limit; $i++) {
        echo 'เข้านี่ ลำดับที่ ' . $_POST["no$i"] . '<br>';
        if ($_POST["no$i"] <= $round) {
            // update
            $sql_update = "UPDATE SARS_CoV_2_PCR 
                            SET Date_PCR='" . $_POST["keep_date$i"] . "',
                                Example_type_PCR='" . $_POST["type$i"] . "',
                                Station_PCR='" . $_POST["station$i"] . "',
                                Detected_type='" . $_POST["detect$i"] . "' 
                            WHERE Order_PCR = '" . $_POST["no$i"] . "'";
            if ($conn->query($sql_update) === TRUE) {
                echo 'อัพเดตรอบที่ ' . $i . ' รหัส ' . $_POST["no$i"] . '<br>';
            } else {
                echo 'ผิดพลาด' . $conn->error . '<br>' . $sql_update;
                exit;
            }
        } else {
            $sql_insert = "INSERT INTO SARS_CoV_2_PCR(
                    Code,
                    Order_PCR,
                    Date_PCR,
                    Example_type_PCR,
                    Station_PCR,
                    Detected_type
                    ) 
                    VALUES (
                    '" . $sCode . "',
                    '" . $_POST["no$i"] . "',
                    '" . $_POST["keep_date$i"] . "',
                    '" . $_POST["type$i"] . "',
                    '" . $_POST["station$i"] . "',
                    '" . $_POST["detect$i"] . "'
                    )";
            if ($conn->query($sql_insert) === TRUE) {
                echo 'เพิ่มใหม่รอบที่ : ' . $i . ' ' . $_POST["no$i"] . '<br>';
            } else {
                echo 'ผิดพลาด' . $conn->error . '<br>' . $sql_insert;
                exit;
            }
        }
    }
    $_SESSION["alert_status"] = 1;
    $_SESSION["subject_message"] = "ข้อมูลทางคลินิกผลตรวจPCR";   
    if ($_SESSION['Type'] == 1) {
        header('location: ../../?page=clinicPCR');
    }
    if ($_SESSION['Type'] == 2) {
        header('location: ../../index_data.php?page=clinicPCR');
    }
    if ($_SESSION['Type'] == "A") {
        header('location: ../../index_data.php?page=clinicPCR');
    }
}
