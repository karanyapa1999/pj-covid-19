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
        $sDetect = $_POST["detect$i"] ?? '0';

        $INSERT = "INSERT INTO SARS_CoV_2_Antibidy
                    (
                    Code,
                    Order_Antibidy,
                    Date_Antibidy,
                    Example_type_Antibidy,
                    Station_Antibidy,
                    Result_Antibidy
                    )
        VALUE ('" . $sCode . "'
        ,'" . $sNo . "'
        ,'" . $sKeep_date . "'
        ,'" . $sType . "'
        ,'" . $sStation . "'
        ,'" . $sDetect . "'
        )";

        if ($conn->query($INSERT) === TRUE) {
            $_SESSION["alert_status"] = 1;
            $_SESSION["subject_message"] = "ข้อมูลทางคลินิกตรวจAntibody";   
            if ($_SESSION['Type'] == 1) {
                header('location: ../../?page=clinicAntibody');
            }
            if ($_SESSION['Type'] == 2) {
                header('location: ../../index_data.php?page=clinicAntibody');
            }
            if ($_SESSION['Type'] == "A") {
                header('location: ../../index_data.php?page=clinicAntibody');
            }
        } else {
            // error
            echo "Error: " . $INSERT . "<br>" . $conn->error;
        }
    }
} else if ($api == "edit") {
    $sCode =  $_SESSION["code"];
    $sql_no = "SELECT Order_Antibidy
               FROM SARS_CoV_2_Antibidy
               WHERE Code = '" . $sCode . "'
               ORDER BY SARS_CoV_2_Antibidy.Order_Antibidy DESC";
    $result_no = $conn->query($sql_no);
    $row_no = $result_no->fetch_assoc();
    $round = $row_no["Order_Antibidy"];
    if ($_POST["hideno"] == '') {
        $limit = $round;
    } else {
        $limit = $_POST["hideno"];
    }
    for ($i = 0; $i < $limit; $i++) {
        echo 'เข้านี่ ลำดับที่ ' . $_POST["no$i"] . '<br>';
        if ($_POST["no$i"] <= $round) {
            // update
            $sql_update = "UPDATE SARS_CoV_2_Antibidy 
                            SET Date_Antibidy='" . $_POST["keep_date$i"] . "',
                                Example_type_Antibidy='" . $_POST["type$i"] . "',
                                Station_Antibidy='" . $_POST["station$i"] . "',
                                Result_Antibidy='" . $_POST["detect$i"] . "' 
                            WHERE Order_Antibidy = '" . $_POST["no$i"] . "'";
            if ($conn->query($sql_update) === TRUE) {
                echo 'อัพเดตรอบที่ ' . $i . ' รหัส ' . $_POST["no$i"] . '<br>';
            } else {
                echo 'ผิดพลาด' . $conn->error . '<br>' . $sql_update;
                exit;
            }
        } else {
            $sql_insert = "INSERT INTO SARS_CoV_2_Antibidy(
                    Code,
                    Order_Antibidy,
                    Date_Antibidy,
                    Example_type_Antibidy,
                    Station_Antibidy,
                    Result_Antibidy
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
    $_SESSION["subject_message"] = "ข้อมูลทางคลินิกตรวจAntibody";   
    if ($_SESSION['Type'] == 1) {
        header('location: ../../?page=clinicAntibody');
    }
    if ($_SESSION['Type'] == 2) {
        header('location: ../../index_data.php?page=clinicAntibody');
    }
    if ($_SESSION['Type'] == "A") {
        header('location: ../../index_data.php?page=clinicAntibody');
    }
}
