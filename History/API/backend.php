<?php
session_start();
require("../../database/connection.php");
$api = isset($_GET["api"]) ? $_GET["api"] : '';
if ($api == "search") {
} else if ($api == "insert_history") {
    $sCode =  $_SESSION["code"];
    $sLiving_Risk_Area  = $_POST['Living_Risk_Area'];

    $sCity_Risk_Area = $_POST['City_Risk_Area'];
    $sCountry_Risk_Area = $_POST['Country_Risk_Area'];
    $sDate_in_Thailand = $_POST['Date_in_Thailand'];
    $sAirliner = $_POST['Airliner'];
    $sFlights = $_POST['Flights'];

    $sTreat_or_Visit = $_POST['Treat_or_Visit'];

    $sContact_Patient = $_POST['Contact_Patient'];
    $sPatient_Name = $_POST['Patient_Name'];

    $sCareer_Contact = $_POST['Career_Contact'];

    $sRisk_area = $_POST['Risk_area'];
    $sArea_Name = $_POST['Area_Name'];

    $sPneumonia = $_POST['Pneumonia'];
    $sPneumonia_Severity = $_POST['Pneumonia_Severity'];
    $sMedical_personel = $_POST['Medical_personel'];
    $sOther_Risk = $_POST['Other_Risk'];

    $History_of_Risk = "INSERT INTO History_of_Risk
                (
                Code,
                Living_Risk_Area,
                City_Risk_Area,
                Country_Risk_Area,
                Date_in_Thailand,
                Airliner,
                Flights,
                Treat_or_Visit,
                Contact_Patient,
                Patient_Name,
                Career_Contact,
                Risk_area, 
                Area_Name,
                Pneumonia,
                Pneumonia_Severity,
                Medical_personel,
                Other_Risk
                )
    VALUE ('" . $sCode . "'
    ,'" . $sLiving_Risk_Area . "'
    ,'" . $sCity_Risk_Area . "'
    ,'" . $sCountry_Risk_Area . "'
    ,'" . $sDate_in_Thailand . "'
    ,'" . $sAirliner . "'
    ,'" . $sFlights . "'
    ,'" . $sTreat_or_Visit . "'
    ,'" . $sContact_Patient . "'
    ,'" . $sPatient_Name . "'
    ,'" . $sCareer_Contact . "'
    ,'" . $sRisk_area . "'
    ,'" . $sArea_Name . "'
    ,'" . $sPneumonia . "'
    ,'" . $sPneumonia_Severity . "'
    ,'" . $sMedical_personel . "'
    ,'" . $sOther_Risk . "'
    )";



    if ($conn->query($History_of_Risk) === TRUE) {

        $_SESSION["alert_status"] = 1;
        $_SESSION["subject_message"] = "ประวัติเสี่ยง";                   
        if($_SESSION['Type'] ==1){
            header('location: ../../?page=history');
        }
        if($_SESSION['Type'] ==2){
            header('location: ../../index_data.php?page=history');
        }
        if($_SESSION['Type'] =="A"){
          header('location: ../../index_data.php?page=history');
        }


    } else {
        // error
        echo "Error: " . $History_of_Risk . "<br>" . $conn->error;
    }
} else if ($api == "edit_history") {
    $sCode =  $_SESSION["code"];
    $sLiving_Risk_Area  = $_POST['Living_Risk_Area'];


    if ($sLiving_Risk_Area == "1") {
        $sCity_Risk_Area = $_POST['City_Risk_Area'];
        $sCountry_Risk_Area = $_POST['Country_Risk_Area'];
        $sDate_in_Thailand = $_POST['Date_in_Thailand'];
        $sAirliner = $_POST['Airliner'];
        $sFlights = $_POST['Flights'];
    } else {
        $sCity_Risk_Area = "";
        $sCountry_Risk_Area = "";
        $sDate_in_Thailand = "";
        $sAirliner = "";
        $sFlights = "";
    }

    $sTreat_or_Visit = $_POST['Treat_or_Visit'];

    $sContact_Patient = $_POST['Contact_Patient'];
    if ($sContact_Patient == 1) {
        $sPatient_Name = $_POST['Patient_Name'];
    } else {
        $sPatient_Name = "";
    }

    $sCareer_Contact = $_POST['Career_Contact'];

    $sRisk_area = $_POST['Risk_area'];
    if ($sRisk_area == "1") {
        $sArea_Name = $_POST['Area_Name'];
    } else {
        $sArea_Name = "";
    }

    $sPneumonia = $_POST['Pneumonia'];
    $sPneumonia_Severity = $_POST['Pneumonia_Severity'];
    $sMedical_personel = $_POST['Medical_personel'];
    $stik_other = $_POST['tikOther'];
    if ($stik_other == "1") {
        $sOther_Risk = $_POST['Other_Risk'];
    } else {
        $sOther_Risk = "";
    }

    $History_of_Risk = 'UPDATE History_of_Risk SET 
    Living_Risk_Area = "' . $sLiving_Risk_Area . '"
    ,City_Risk_Area = "' . $sCity_Risk_Area  . '"
    ,Country_Risk_Area = "' . $sCountry_Risk_Area . '"
    ,Date_in_Thailand = "' . $sDate_in_Thailand . '"
    ,Airliner = "' . $sAirliner . '"
    ,Flights = "' . $sFlights . '"
    ,Treat_or_Visit = "' . $sTreat_or_Visit . '"
    ,Contact_Patient = "' . $sContact_Patient . '"
    ,Patient_Name = "' . $sPatient_Name . '"
    ,Career_Contact = "' . $sCareer_Contact . '"
    ,Risk_area = "' . $sRisk_area . '"
    ,Area_Name = "' . $sArea_Name . '"
    ,Pneumonia = "' . $sPneumonia . '"
    ,Pneumonia_Severity = "' . $sPneumonia_Severity . '"
    ,Medical_personel = "' . $sMedical_personel . '"
    ,Other_Risk = "' . $sOther_Risk . '"
    WHERE Code = "' .  $sCode . '"';
    if ($conn->query($History_of_Risk) === TRUE) {
        $_SESSION["alert_status"] = 1;
        $_SESSION["subject_message"] = "ประวัติเสี่ยง";                   
        if($_SESSION['Type'] ==1){
            header('location: ../../?page=history');
        }
        if($_SESSION['Type'] ==2){
            header('location: ../../index_data.php?page=history');
        }
        if($_SESSION['Type'] =="A"){
          header('location: ../../index_data.php?page=history');
        }

    }
}
