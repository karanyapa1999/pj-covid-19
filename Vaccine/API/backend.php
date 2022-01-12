<?php
session_start();
require("../../database/connection.php");
$api = isset($_GET["api"]) ? $_GET["api"] : '';
if ($api == "search") {
} else if ($api == "insert_vaccine") {

    $sCode =  $_SESSION["code"];
    $sVaccine = $_POST["Vaccine"];
    if ($sVaccine == "option1") {
        $sVaccine_never = 1;
        $sVaccine_ever = 0;
    } else {
        $sVaccine_never = 0;
        $sVaccine_ever = 1;
    }

    $sVaccine_Record_Book = $_POST["Vaccine_Record_Book"];
    if ($sVaccine_Record_Book == "option1") {
        $sVaccine_Record = 1;
        $sVaccine_Record_Not = 0;
    } else {
        $sVaccine_Record = 0;
        $sVaccine_Record_Not = 1;
    }

    $sVaccine_1_date = $_POST["Vaccine_1_date"];
    $sVaccine_name1 = $_POST["Vaccine_name1"];
    $sStation_1 = $_POST["Station_1"];
    $sVaccine_2_date = $_POST["Vaccine_2_date"];
    $sVaccine_name2 = $_POST["Vaccine_name2"];
    $sStation_2 = $_POST["Station_2"];

    $History_Vacin_Covid19 = "INSERT INTO History_Vacin_Covid19
    (
    Code,
    Vaccine_never,
    Vaccine_ever,
    Vaccine_Record,
    Vaccine_Record_Not,
    Vaccine_1_date,
    Vaccine_name1,
    Station_1,
    Vaccine_2_date,
    Vaccine_name2,
    Station_2
    )
VALUES ('" . $sCode . "'
,'" . $sVaccine_never . "'
,'" . $sVaccine_ever . "'
,'" . $sVaccine_Record . "'
,'" . $sVaccine_Record_Not . "'
,'" . $sVaccine_1_date . "'
,'" . $sVaccine_name1 . "'
,'" . $sStation_1 . "'
,'" . $sVaccine_2_date . "'
,'" . $sVaccine_name2 . "'
,'" . $sStation_2 . "'
)";


    if ($conn->query($History_Vacin_Covid19) === TRUE) {
        $_SESSION["alert_status"] = 1;
        $_SESSION["subject_message"] = "ประวัติการได้รับฉีดวัคซีน";                  
        if($_SESSION['Type'] ==1){
            header('location: ../../?page=vaccine');
        }
        if($_SESSION['Type'] ==2){
            header('location: ../../index_data.php?page=vaccine');
        }
        if($_SESSION['Type'] =="A"){
            header('location: ../../index_data.php?page=vaccine');
        }
    } else {
        // error
        echo "Error: " . $History_Vacin_Covid19 . "<br>" . $conn->error;
    }
} else if ($api == "edit_vaccine") {
    $sCode =  $_SESSION["code"];
    $sVaccine = $_POST["Vaccine"];
    if ($sVaccine == "option1") {
        $sVaccine_never = 1;
        $sVaccine_ever = 0;
    } else {
        $sVaccine_never = 0;
        $sVaccine_ever = 1;
    }

    $sVaccine_Record_Book = $_POST["Vaccine_Record_Book"];
    if ($sVaccine_Record_Book == "option1") {
        $sVaccine_Record = 1;
        $sVaccine_Record_Not = 0;
    } else {
        $sVaccine_Record = 0;
        $sVaccine_Record_Not = 1;
    }

    $sVaccine_1_date = $_POST["Vaccine_1_date"];
    $sVaccine_name1 = $_POST["Vaccine_name1"];
    $sStation_1 = $_POST["Station_1"];
    $sVaccine_2_date = $_POST["Vaccine_2_date"];
    $sVaccine_name2 = $_POST["Vaccine_name2"];
    $sStation_2 = $_POST["Station_2"];

    $History_Vacin_Covid19 = 'UPDATE History_Vacin_Covid19 SET 
    Vaccine_never = "' . $sVaccine_never . '"
    ,Vaccine_ever = "' . $sVaccine_ever  . '"
    ,Vaccine_Record = "' . $sVaccine_Record  . '"
    ,Vaccine_Record_Not = "' . $sVaccine_Record_Not  . '"
    ,Vaccine_1_date = "' . $sVaccine_1_date . '"
    ,Vaccine_name1 = "' . $sVaccine_name1 . '"
    ,Station_1 = "' . $sStation_1 . '"
    ,Vaccine_2_date = "' . $sVaccine_2_date . '"
    ,Vaccine_name2 = "' . $sVaccine_name2 . '"
    ,Station_2 = "' . $sStation_2 . '"
    WHERE Code = "' .  $sCode . '"';

    if ($conn->query($History_Vacin_Covid19) === TRUE) {
        $_SESSION["alert_status"] = 1;
        $_SESSION["subject_message"] = "ประวัติการได้รับฉีดวัคซีน";               
        if($_SESSION['Type'] ==1){
            header('location: ../../?page=vaccine');
        }
        if($_SESSION['Type'] ==2){
            header('location: ../../index_data.php?page=vaccine');
        }
        if($_SESSION['Type'] =="A"){
            header('location: ../../index_data.php?page=vaccine');
        }
    }
}
