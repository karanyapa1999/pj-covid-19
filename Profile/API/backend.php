<?php
session_start();
require("../../database/connection.php");
$api = isset($_GET["api"]) ? $_GET["api"] : '';
if ($api == "search") {
} else if ($api == "insert_general") {

    $sCode = $_POST['Code'];
    $sId_card = $_POST['ID_card'];
   


    $data_check1 = "SELECT * FROM General_Data WHERE Code = '$sCode' LIMIT 1";
    $result_check1 = mysqli_query($conn, $data_check1);
    $data1 = mysqli_fetch_assoc($result_check1);

    $data_check2 = "SELECT * FROM General_Data WHERE ID_card = '$sId_card' LIMIT 1";
    $result_check2 = mysqli_query($conn, $data_check2);
    $data2 = mysqli_fetch_assoc($result_check2);




    if ($data1['Code'] == $sCode) {

        echo "<script>alert('มี SAT CODE ในระบบแล้วกรุณากรอกใหม่');location.href = '../../?page=profile';</script>";
    } else if ($data2['ID_card'] == $sId_card) {

        echo "<script>alert('รหัสบัตรประชาชนนี้มีในระบบแล้ว กรุณากรอกใหม่');location.href = '../../?page=profile';</script>";
    } else {


        $data_refer = "SELECT Refer FROM General_Data ORDER BY Refer DESC";
        $result_refer= mysqli_query($conn, $data_refer);
        $data_refer = $result_refer->fetch_assoc();
       
        $sCode = $_POST['Code'];
        $sId_card = $_POST['ID_card'];
        $sRefer =  number_format($data_refer["Refer"]) + 1;
        $sPer_report = $_POST['per_report'];
        $sPer_con = $_POST['per_con'];
        $sName = $_POST['Name'];
        $sLname = $_POST['LName'];
        $sSex = $_POST['sex'];
        if ($sSex == "Male") {
            $sMale = 1;
            $sFemale = 0;
        } else {
            $sMale = 0;
            $sFemale = 1;
        }
        $sAge_year = $_POST['Age_year'];
        $sAge_month = $_POST['Age_month'];
        $sNationality = $_POST['Nationality'];
        $sCareer = $_POST['Career'];
        $sPhoneNo = $_POST['PhoneNo'];
        $sH_number = $_POST['H_number'];
        $sMoo = $_POST['Moo'];
        $sVillage = $_POST['Village'];
        $sRoad = $_POST['Road'];
        $sSide_road  = $_POST['Side_road'];
        $sProvince = $_POST['Province'];
        $sAmphur = $_POST['Amphur'];
        $sDistrict = $_POST['District'];
        $sPostalcode = $_POST['Postalcode'];
        $sCure = $_POST['Cure'];
        $sLocation_admit = $_POST['Location_admit'];
        $sDate_admit = $_POST['Date_admit'];
        $sDate_report = $_POST["Date_report"];
        $general_data = "INSERT INTO General_Data
                (
                Code,
                ID_card,
                per_report,
                per_con,
                Name,
                LName,
                Career,
                PhoneNo,
                Age_year,
                Age_month,
                Male,
                Female,
                H_number,
                Moo, 
                Village,
                Side_road,
                Road,
                District,
                Amphur,
                Province,
                Postalcode,
                Refer,
                Date_report,
                Date_admit,
                Nationality,
                Cure,
                Location_admit
                )
    VALUE ('" . $sCode . "'
    ,'" . $sId_card . "'
    ,'" . $sPer_report . "'
    ,'" . $sPer_con . "'
    ,'" . $sName . "'
    ,'" . $sLname . "'
    ,'" . $sCareer . "'
    ,'" . $sPhoneNo . "'
    ,'" . $sAge_year . "'
    ,'" . $sAge_month . "'
    ,'" . $sMale . "'
    ,'" . $sFemale . "'
    ,'" . $sH_number . "'
    ,'" . $sMoo . "'
    ,'" . $sVillage . "'
    ,'" . $sSide_road . "'
    ,'" . $sRoad . "'
    ,'" . $sDistrict . "'
    ,'" . $sAmphur . "'
    ,'" . $sProvince . "'
    ,'" . $sPostalcode . "'
    ,'" . $sRefer . "'
    ,'" . $sDate_report . "'
    ,'" . $sDate_admit . "'
    ,'" . $sNationality . "'
    ,'" . $sCure . "'
    ,'" . $sLocation_admit . "'
    )";

        //Patient_status
        $live_status = $_POST["live_status"];
        if ($live_status == "Wait_for_bed") {
            $Wait_for_bed = "1";
            $Healed = "0";
            $Refuse = "0";
            $Hotel = "";
            $Hospital = "";
            $Die = "0";
        } else if ($live_status == "Healed") {
            $Wait_for_bed = "0";
            $Healed = "1";
            $Refuse = "0";
            $Hotel = "";
            $Hospital = "";
            $Die = "0";
        } else if ($live_status == "Refuse") {
            $Wait_for_bed = "0";
            $Healed = "0";
            $Refuse = "1";
            $Hotel = "";
            $Hospital = "";
            $Die = "0";
        } else if ($live_status == "Hotel") {
            $Wait_for_bed = "0";
            $Healed = "0";
            $Refuse = "0";
            $Hotel = $_POST["Hotel_text"];
            $Hospital = "";
            $Die = "0";
        }  else if ($live_status == "Hospital") {
            $Wait_for_bed = "0";
            $Healed = "0";
            $Refuse = "0";
            $Hotel = "";
            $Hospital = $_POST["Hospital_text"];
            $Die = "0";
        }  else if ($live_status == "Die") {
            $Wait_for_bed = "0";
            $Healed = "0";
            $Refuse = "0";
            $Hotel = "";
            $Hospital = "";
            $Die = "1";
        } else{
            $Wait_for_bed = "0";
            $Healed = "0";
            $Refuse = "0";
            $Hotel = "";
            $Hospital = "";
            $Die = "0";
        }
       
     
        $Patient_status = "INSERT INTO Patient_status
    (
        Code ,
        Wait_for_bed ,
        Healed ,
        Refuse ,
        Hotel ,
        Hospital ,
        Die
    )VALUE
    (
        '" . $sCode . "'
        ,'" . $Wait_for_bed . "'
        ,'" . $Healed . "'
        ,'" . $Refuse . "'
        ,'" . $Hotel . "'
        ,'" . $Hospital . "'
        ,'" . $Die . "'
    )";
        //Patient_status



        if ($conn->query($general_data) === TRUE) {
            if($conn->query($Patient_status) === TRUE){
                $_SESSION["alert_status"] = 1;
                $_SESSION["subject_message"] = "ข้อมูลทั่วไป";
                          
                                if($_SESSION['Type'] ==1){
                                    header('location: ../../session/index.php?page=profile&code='.$sCode.'&refer='.$sRefer.'');
                              
                                }
                                if($_SESSION['Type'] ==2){
                                    header('location: ../../session/index.php?page=profile&code='.$sCode.'&refer='.$sRefer.'');
                            
                                }
                                if($_SESSION['Type'] =="A"){
                                    header('location: ../../session/index.php?page=profile&code='.$sCode.'&refer='.$sRefer.'');
                                  
                                }
              } else{
               // error
            echo "Error: " . $Patient_status . "<br>" . $conn->error;  
            }      
        } else {
            // error
            echo "Error: " . $general_data . "<br>" . $conn->error;
        }
    }
} else if ($api == "edit_general") {

    $sCode =  $_SESSION["code"];
    $sId_card = $_POST['ID_card'];
    $sPer_report = $_POST['per_report'];
    $sPer_con = $_POST['per_con'];
    $sRefer = $_POST['Refer'];
    $sName = $_POST['Name'];
    $sLname = $_POST['LName'];
    $sSex = $_POST['sex'];
    if ($sSex == "Male") {
        $sMale = 1;
        $sFemale = 0;
    } else {
        $sMale = 0;
        $sFemale = 1;
    }
    $sAge_year = $_POST['Age_year'];
    $sAge_month = $_POST['Age_month'];
    $sNationality = $_POST['Nationality'];
    $sCareer = $_POST['Career'];
    $sPhoneNo = $_POST['PhoneNo'];
    $sH_number = $_POST['H_number'];
    $sMoo = $_POST['Moo'];
    $sVillage = $_POST['Village'];
    $sRoad = $_POST['Road'];
    $sSide_road  = $_POST['Side_road'];
    $sProvince = $_POST['Province'];
    $sAmphur = $_POST['Amphur'];
    $sDistrict = $_POST['District'];
    $sPostalcode = $_POST['Postalcode'];
    $sCure = $_POST['Cure'];
    $sLocation_admit = $_POST['Location_admit'];
    $sDate_admit = $_POST['Date_admit'];
    $sDate_report = $_POST["Date_report"];

    $general_data = 'UPDATE General_Data SET 
     ID_card = "' . $sId_card . '"
    ,per_report = "' . $sPer_report . '"
    ,per_con = "' . $sPer_con . '"
    ,Name = "' . $sName  . '"
    ,LName = "' . $sLname . '"
    ,Career = "' . $sCareer . '"
    ,PhoneNo = "' . $sPhoneNo . '"
    ,Age_year = "' . $sAge_year . '"
    ,Age_month = "' . $sAge_month . '"
    ,Male = "' . $sMale . '"
    ,Female = "' . $sFemale . '"
    ,H_number = "' . $sH_number . '"
    ,Moo = "' . $sMoo . '"
    ,Village = "' . $sVillage . '"
    ,Side_road = "' . $sSide_road . '"
    ,Road = "' . $sRoad . '"
    ,District = "' . $sDistrict . '"
    ,Amphur = "' . $sAmphur . '"
    ,Province = "' . $sProvince . '"
    ,Postalcode = "' . $sPostalcode . '"
    ,Refer = "' . $sRefer . '"
    ,Date_report = "' . $sDate_report . '"
    ,Date_admit = "' . $sDate_admit . '"
    ,Nationality = "' . $sNationality . '"
    ,Cure = "' . $sCure . '"
    ,Location_admit = "' . $sLocation_admit . '"
   
    WHERE Code = "' .  $sCode . '"';

       //Patient_status
       $live_status = $_POST["live_status"];
       if ($live_status == "Wait_for_bed") {
           $Wait_for_bed = "1";
           $Healed = "0";
           $Refuse = "0";
           $Hotel = "";
           $Hospital = "";
           $Die = "0";
       } else if ($live_status == "Healed") {
           $Wait_for_bed = "0";
           $Healed = "1";
           $Refuse = "0";
           $Hotel = "";
           $Hospital = "";
           $Die = "0";
       } else if ($live_status == "Refuse") {
           $Wait_for_bed = "0";
           $Healed = "0";
           $Refuse = "1";
           $Hotel = "";
           $Hospital = "";
           $Die = "0";
       } else if ($live_status == "Hotel") {
           $Wait_for_bed = "0";
           $Healed = "0";
           $Refuse = "0";
           $Hotel = $_POST["Hotel_text"];
           $Hospital = "";
           $Die = "0";
       }  else if ($live_status == "Hospital") {
           $Wait_for_bed = "0";
           $Healed = "0";
           $Refuse = "0";
           $Hotel = "";
           $Hospital = $_POST["Hospital_text"];
           $Die = "0";
       }  else if ($live_status == "Die") {
           $Wait_for_bed = "0";
           $Healed = "0";
           $Refuse = "0";
           $Hotel = "";
           $Hospital = "";
           $Die = "1";
       } else{
           $Wait_for_bed = "0";
           $Healed = "0";
           $Refuse = "0";
           $Hotel = "";
           $Hospital = "";
           $Die = "0";
       }

       $Patient_status = 'UPDATE Patient_status SET 
       Wait_for_bed = "' . $Wait_for_bed . '"
      ,Healed  = "' . $Healed  . '"
      ,Refuse = "' . $Refuse . '"
      ,Hotel = "' .$Hotel . '"
      ,Hospital = "' . $Hospital . '"
      ,Die = "' . $Die . '"
      WHERE Code = "' .  $sCode . '"';
      

      if ($conn->query($general_data) === TRUE) {
        if($conn->query($Patient_status) === TRUE){
            $_SESSION["alert_status"] = 1;
            $_SESSION["subject_message"] = "ข้อมูลทั่วไป";
                          
                                if($_SESSION['Type'] ==1){
                                    header('location: ../../?page=profile');
                                }
                                if($_SESSION['Type'] ==2){
                                    header('location: ../../index_data.php?page=profile');
                                }
                                if($_SESSION['Type'] =="A"){
                                    header('location: ../../index_data.php?page=profile');
                                }
          } else{
           // error
        echo "Error: " . $Patient_status . "<br>" . $conn->error;  
        }      
    } else {
        // error
        echo "Error: " . $general_data . "<br>" . $conn->error;
    }
}

