<?php
session_start();
require("../../database/connection.php");
$api = isset($_GET["api"]) ? $_GET["api"] : '';
if ($api == "search") {
} else if ($api == "insert_clinic") {

    //clinic_data
    $sCode =  $_SESSION["code"];
    $Start_Date_Sick  = $_POST["Start_Date_Sick"];
    $Strat_Date_Treatment  = $_POST["Strat_Date_Treatment"];
    $First_Hospital = $_POST["First_Hospital"];
    $FH_Province = $_POST["FH_Province"];
    $Present_Hospital = $_POST["Present_Hospital"];
    $PH_Province = $_POST["PH_Province"];

    $Fever_if = $_POST["Fever"];
    if($Fever_if == "1"){
        $Fever = "1";
    }else{
        $Fever = "0";
    }
    $Temperature = $_POST["Temperature"];
    $O2Sat = $_POST["O2Sat"];

    $Ventilator_if = $_POST["Ventilator"];
    if($Ventilator_if =="1"){
        $Ventilator = "1";
    }else{
        $Ventilator = "0";
    }

    $Cough_if = $_POST["Cough"];
    if($Cough_if == "1"){
        $Cough ="1";
    }else{
        $Cough = "0";
    }

    $Sore_throat_if = $_POST["Sore_throat"];
    if($Sore_throat_if == "1"){
        $Sore_throat = "1";
    }else{
        $Sore_throat = "0";
    }

    $Muscle_pain_if = $_POST["Muscle_pain"];
    if($Muscle_pain_if == "1"){
        $Muscle_pain = "1";
    }else{
        $Muscle_pain = "0";
    }

    $Snot_if = $_POST["Snot"];
    if( $Snot_if == "1"){
        $Snot = "1";
    }else{
        $Snot = "0";
    }

    $Phlegm_if = $_POST["Phlegm"];
    if($Phlegm_if == "1"){
        $Phlegm = "1";
    }else{
        $Phlegm = "0";
    }

    $Difficult_breathing_if = $_POST["Difficult_breathing"];
    if($Difficult_breathing_if == "1"){
        $Difficult_breathing = "1";
    }else{
        $Difficult_breathing = "0";
    }

    $Headache_if = $_POST["Headache"];
    if($Headache_if == "1"){
        $Headache = "1";
    }else{
        $Headache = "0";
    }

    $Liquid_if = $_POST["Liquid"];
    if($Liquid_if == "1"){
        $Liquid = "1";
    }else{
        $Liquid = "0";
    }

    $Not_smell_if = $_POST["Not_smell"];
    if($Not_smell_if == "1"){
        $Not_smell = "1";
    }else{
        $Not_smell = "0";
    }

    $Unflavored_if = $_POST["Unflavored"];
    if($Unflavored_if == "1"){
        $Unflavored = "1";
    }else{
        $Unflavored = "0";
    }

    $Conjunctivitis_if = $_POST["Conjunctivitis"];
    if($Conjunctivitis_if =="1"){
        $Conjunctivitis = "1";
    }else{
        $Conjunctivitis = "0";
    }

    $rash_if = $_POST["rash"];
    if($rash_if == "1"){
        $rash = "1";
    }else{
        $rash = "0";
    }

    $Orther = $_POST["Orther"];
    echo
    $sCode, "-",
    $Start_Date_Sick, "-",
    $Strat_Date_Treatment, "-",
    $First_Hospital, "-",
    $FH_Province, "-",
    $Present_Hospital, "-",
    $PH_Province, "-",
    $Fever, "-",
    $Temperature, "-",
    $O2Sat, "-",
    $Ventilator, "-",
    $Cough, "-",
    $Sore_throat, "-",
    $Muscle_pain, "-",
    $Snot, "-",
    $Phlegm, "-",
    $Difficult_breathing, "-",
    $Headache, "-",
    $Liquid, "-",
    $Not_smell, "-",
    $Unflavored, "-",
    $Conjunctivitis, "-",
    $rash, "-",
    $Orther;
    $Clinic_data = "INSERT INTO `Clinic Data`
    (     
Code ,
Start_Date_Sick ,
Strat_Date_Treatment ,
First_Hospital ,
FH_Province ,
Present_Hospital ,
PH_Province ,
Fever ,
Temperature ,
O2Sat ,
Ventilator ,
Cough ,
Sore_throat ,
Muscle_pain ,
Snot ,
Phlegm ,
Difficult_breathing ,
Headache ,
Liquid ,
Not_smell ,
Unflavored ,
Conjunctivitis ,
rash ,
Orther 
    )
    VALUE(
        '" . $sCode . "'
    ,'" . $Start_Date_Sick . "'
    ,'" . $Strat_Date_Treatment . "'
    ,'" . $First_Hospital . "'
    ,'" . $FH_Province . "'
    ,'" . $Present_Hospital . "'
    ,'" . $PH_Province . "'
    ,'" . $Fever . "'
    ,'" . $Temperature . "'
    ,'" . $O2Sat . "'
    ,'" . $Ventilator . "'
    ,'" . $Cough . "'
    ,'" . $Sore_throat . "'
    ,'" . $Muscle_pain . "'
    ,'" . $Snot . "'
    ,'" . $Phlegm . "'
    ,'" . $Difficult_breathing . "' 
    ,'" . $Headache . "'  
    ,'" . $Liquid . "'
    ,'" . $Not_smell . "'
    ,'" . $Unflavored . "'
    ,'" . $Conjunctivitis . "'
    ,'" . $rash . "'
    ,'" . $Orther . "'
    )";
    //clinic_data

    echo "<br>*******************************************************<br>";

    //rash
    if ($rash == "1") {
        $Rash_active = "1";
        $Position_Rash1 = $_POST["Position_Rash1"];
        $Position_Rash2 = $_POST["Position_Rash2"];
        $Position_Rash3 = $_POST["Position_Rash3"];
        $Position_Rash4 = $_POST["Position_Rash4"];
        $Position_Rash5 = $_POST["Position_Rash5"];
        $Position_Rash6 = $_POST["Position_Rash6"];
    } else {
        $Rash_active = "0";
        $Position_Rash1 = "";
        $Position_Rash2 = "";
        $Position_Rash3 = "";
        $Position_Rash4 = "";
        $Position_Rash5 = "";
        $Position_Rash6 = "";
    }
    echo
    $Rash_active, "-",
    $Position_Rash1, "-",
    $Position_Rash2, "-",
    $Position_Rash3, "-",
    $Position_Rash4, "-",
    $Position_Rash5, "-",
    $Position_Rash6;
    $Rash_data = "INSERT INTO Rash
(
Code ,
Rash_active ,
Position_Rash1 ,
Position_Rash2 ,
Position_Rash3 ,
Position_Rash4 ,
Position_Rash5 ,
Position_Rash6 
    )
    VALUE (
        '" . $sCode . "'
        ,'" . $Rash_active . "'
        ,'" . $Position_Rash1 . "'
        ,'" . $Position_Rash2 . "'
        ,'" . $Position_Rash3 . "'
        ,'" . $Position_Rash4 . "'
        ,'" . $Position_Rash5 . "'
        ,'" . $Position_Rash6 . "'
    )";
    //rash

    echo "<br>*******************************************************<br>";

    //Xrey
    $Xrey_decision = $_POST["Xrey_decision"];
    if ($Xrey_decision == "1") {
        $Xrey_No = "0";
        $Xrey_Yes = "1";
        $Xrey_Date = $_POST["Xrey_Date"];
        $Xrey_Result = $_POST["Xrey_Result"];
    } else {
        $Xrey_No = "1";
        $Xrey_Yes = "0";
        $Xrey_Date = "";
        $Xrey_Result = "";
    }
    echo
    $Xrey_No, "-",
    $Xrey_Yes, "-",
    $Xrey_Date, "-",
    $Xrey_Result;
    $X_ray = "INSERT INTO `X-ray`
(
Code,
Xrey_No,
Xrey_Yes,
Xrey_Date,
Xrey_Result
)
VALUE
(
    '" . $sCode . "'
    ,'" . $Xrey_No . "'
    ,'" . $Xrey_Yes . "'
    ,'" . $Xrey_Date . "'
    ,'" . $Xrey_Result . "' 
)";
    //Xrey
    echo "<br>*******************************************************<br>";
    //CBC
    $Order_of_CBC_if = $_POST["Order_of_CBC"];
    if($Order_of_CBC_if == "1"){
        $Order_of_CBC ="1";
        $CBC_Date = $_POST["CBC_Date"];
    }else{
        $Order_of_CBC ="0";
        $CBC_Date = "";
    }
    
    $CBC_Hb = $_POST["CBC_Hb"];
    $CBC_Hct = $_POST["CBC_Hct"];
    $CBC_Platelet_Count = $_POST["CBC_Platelet_Count"];
    $WBC = $_POST["WBC"];
    $WBC_N = $_POST["WBC_N"];
    $WBC_L = $_POST["WBC_L"];
    $WBC_Atyp_Lymph = $_POST["WBC_Atyp_Lymph"];
    $WBC_Mono = $_POST["WBC_Mono"];
    $WBC_Orther = $_POST["WBC_Orther"];
    echo
    $Order_of_CBC, "-",
    $CBC_Date, "-",
    $CBC_Hb, "-",
    $CBC_Hct, "-",
    $CBC_Platelet_Count, "-",
    $WBC, "-",
    $WBC_N, "-",
    $WBC_L, "-",
    $WBC_Atyp_Lymph, "-",
    $WBC_Mono, "-",
    $WBC_Orther;
    $CBC = "INSERT INTO CBC
(
Code ,
Order_of_CBC ,
CBC_Date ,
CBC_Hb ,
CBC_Hct ,
CBC_Platelet_Count ,
WBC ,
WBC_N ,
WBC_L ,
WBC_Atyp_Lymph ,
WBC_Mono ,
WBC_Orther 
)
VALUE(
    '" . $sCode . "'
    ,'" . $Order_of_CBC . "'
    ,'" . $CBC_Date . "'
    ,'" . $CBC_Hb . "'
    ,'" . $CBC_Hct . "'
    ,'" . $CBC_Platelet_Count . "'
    ,'" . $WBC . "'
    ,'" . $WBC_N . "'
    ,'" . $WBC_L . "'
    ,'" . $WBC_Atyp_Lymph . "'
    ,'" . $WBC_Mono . "'
    ,'" . $WBC_Orther . "'
)
";
    //CBC

    echo "<br>*******************************************************<br>";

    //Influenza_test
    $Method_test = $_POST["Method_test"];
    $Negative_test = $_POST["Negative_test"];
    $Possitive_test = $_POST["Possitive_test"];
    $Flu_A = $_POST["Flu_A"];
    $Flu_B = $_POST["Flu_B"];
    echo
    $Method_test, "-",
    $Negative_test, "-",
    $Possitive_test, "-",
    $Flu_A, "-",
    $Flu_B;
    $Influenza_test = "INSERT INTO Influenza_test
(
Code ,
Method_test ,
Negative_test ,
Possitive_test ,
Flu_A ,
Flu_B 
)VALUE(
    '" . $sCode . "'
    ,'" . $Method_test . "'
    ,'" . $Negative_test . "'
    ,'" . $Possitive_test . "'
    ,'" . $Flu_A . "'
    ,'" . $Flu_B . "'
)";
    //Influenza_test

    echo "<br>*******************************************************<br>";

    //Patient_type
    $patient_type = $_POST["patient_type"];
    if ($patient_type == "out") {
        $Outpatient = "1";
        $Inpatient = "0";
    } else {
        $Outpatient = "0";
        $Inpatient = "1";
    }
    $Admit_Date = $_POST["Admit_Date"];
    $Diagnosis = $_POST["Diagnosis"];
    echo
    $Outpatient, "-",
    $Inpatient, "-",
    $Admit_Date, "-",
    $Diagnosis;
    $Patient_type = "INSERT INTO Patient_type
(  
Code ,
Outpatient ,
Inpatient ,
Admit_Date ,
Diagnosis 
)VALUE(
    '" . $sCode . "'
    ,'" . $Outpatient . "'
    ,'" . $Inpatient . "'
    ,'" . $Admit_Date . "'
    ,'" . $Diagnosis . "'
)";
    //Patient_type

    echo "<br>*******************************************************<br>";


    if ($conn->query($Clinic_data) === TRUE) {
        if ($conn->query($Rash_data) === TRUE) {
            if ($conn->query($X_ray) === TRUE) {
                if ($conn->query($CBC) === TRUE) {
                    if ($conn->query($Influenza_test) === TRUE) {
                        if ($conn->query($Patient_type) === TRUE) {
                          
                            $_SESSION["alert_status"] = 1;
                            $_SESSION["subject_message"] = "ข้อมูลทางคลินิก";   
                            if($_SESSION['Type'] ==1){
                                header('location: ../../?page=clinic');
                            }
                            if($_SESSION['Type'] ==2){
                                header('location: ../../index_data.php?page=clinic');
                            } 
                            if($_SESSION['Type'] =="A"){
                                header('location: ../../index_data.php?page=clinic');
                            }
                              
                          
                        } else {
                            // error
                            echo "Error: " . $Patient_type . "<br>" . $conn->error;
                        }
                    } else {
                        // error
                        echo "Error: " . $Influenza_test . "<br>" . $conn->error;
                    }
                } else {
                    // error
                    echo "Error: " . $CBC . "<br>" . $conn->error;
                }
            } else {
                // error
                echo "Error: " . $X_ray . "<br>" . $conn->error;
            }
        } else {
            // error
            echo "Error: " . $Rash_data . "<br>" . $conn->error;
        }
    } else {
        // error
        echo "Error: " . $Clinic_data . "<br>" . $conn->error;
    }









}else if ($api == "edit_clinic") {

        //clinic_data
        $sCode =  $_SESSION["code"];
        $Start_Date_Sick  = $_POST["Start_Date_Sick"];
        $Strat_Date_Treatment  = $_POST["Strat_Date_Treatment"];
        $First_Hospital = $_POST["First_Hospital"];
        $FH_Province = $_POST["FH_Province"];
        $Present_Hospital = $_POST["Present_Hospital"];
        $PH_Province = $_POST["PH_Province"];
        $Fever_if = $_POST["Fever"];
    if($Fever_if == "1"){
        $Fever = "1";
    }else{
        $Fever = "0";
    }
    $Temperature = $_POST["Temperature"];
    $O2Sat = $_POST["O2Sat"];

    $Ventilator_if = $_POST["Ventilator"];
    if($Ventilator_if =="1"){
        $Ventilator = "1";
    }else{
        $Ventilator = "0";
    }

    $Cough_if = $_POST["Cough"];
    if($Cough_if == "1"){
        $Cough ="1";
    }else{
        $Cough = "0";
    }

    $Sore_throat_if = $_POST["Sore_throat"];
    if($Sore_throat_if == "1"){
        $Sore_throat = "1";
    }else{
        $Sore_throat = "0";
    }

    $Muscle_pain_if = $_POST["Muscle_pain"];
    if($Muscle_pain_if == "1"){
        $Muscle_pain = "1";
    }else{
        $Muscle_pain = "0";
    }

    $Snot_if = $_POST["Snot"];
    if( $Snot_if == "1"){
        $Snot = "1";
    }else{
        $Snot = "0";
    }

    $Phlegm_if = $_POST["Phlegm"];
    if($Phlegm_if == "1"){
        $Phlegm = "1";
    }else{
        $Phlegm = "0";
    }

    $Difficult_breathing_if = $_POST["Difficult_breathing"];
    if($Difficult_breathing_if == "1"){
        $Difficult_breathing = "1";
    }else{
        $Difficult_breathing = "0";
    }

    $Headache_if = $_POST["Headache"];
    if($Headache_if == "1"){
        $Headache = "1";
    }else{
        $Headache = "0";
    }

    $Liquid_if = $_POST["Liquid"];
    if($Liquid_if == "1"){
        $Liquid = "1";
    }else{
        $Liquid = "0";
    }

    $Not_smell_if = $_POST["Not_smell"];
    if($Not_smell_if == "1"){
        $Not_smell = "1";
    }else{
        $Not_smell = "0";
    }

    $Unflavored_if = $_POST["Unflavored"];
    if($Unflavored_if == "1"){
        $Unflavored = "1";
    }else{
        $Unflavored = "0";
    }

    $Conjunctivitis_if = $_POST["Conjunctivitis"];
    if($Conjunctivitis_if =="1"){
        $Conjunctivitis = "1";
    }else{
        $Conjunctivitis = "0";
    }

    $rash_if = $_POST["rash"];
    if($rash_if == "1"){
        $rash = "1";
    }else{
        $rash = "0";
    }

        $Orther = $_POST["Orther"];
        echo
        $sCode, "-",
        $Start_Date_Sick, "-",
        $Strat_Date_Treatment, "-",
        $First_Hospital, "-",
        $FH_Province, "-",
        $Present_Hospital, "-",
        $PH_Province, "-",
        $Fever, "-",
        $Temperature, "-",
        $O2Sat, "-",
        $Ventilator, "-",
        $Cough, "-",
        $Sore_throat, "-",
        $Muscle_pain, "-",
        $Snot, "-",
        $Phlegm, "-",
        $Difficult_breathing, "-",
        $Headache, "-",
        $Liquid, "-",
        $Not_smell, "-",
        $Unflavored, "-",
        $Conjunctivitis, "-",
        $rash, "-",
        $Orther;
        $Clinic_data = 'UPDATE `Clinic Data` SET         
    Start_Date_Sick = "' . $Start_Date_Sick . '"
    ,Strat_Date_Treatment = "' . $Strat_Date_Treatment . '"
    ,First_Hospital =  "' . $First_Hospital . '"
    ,FH_Province = "'. $FH_Province . '"
    ,Present_Hospital = "' . $Present_Hospital . '"
   ,PH_Province = "' . $PH_Province . '"
    ,Fever = "' . $Fever . '"
    ,Temperature = "' . $Temperature . '"
    ,O2Sat = "'. $O2Sat . '"
    ,Ventilator = "' . $Ventilator . '"
    ,Cough = "' . $Cough . '"
    ,Sore_throat = "' . $Sore_throat . '"
    ,Muscle_pain = "' . $Muscle_pain . '"
    ,Snot = "' . $Snot . '"
    ,Phlegm = "' . $Phlegm . '"
    ,Difficult_breathing = "' . $Difficult_breathing . '" 
    ,Headache = "' . $Headache . '" 
    ,Liquid = "' . $Liquid . '"
    ,Not_smell = "' . $Not_smell . '"
    ,Unflavored = "' . $Unflavored . '"
    ,Conjunctivitis = "' . $Conjunctivitis . '"
    ,rash = "' . $rash . '"
    ,Orther = "' . $Orther . '"
    WHERE Code =  "' .  $sCode . '"
        ';
        //clinic_data
    
        echo "<br>*******************************************************<br>";
    
        //rash
        if ($rash == "1") {
            $Rash_active = "1";
            $Position_Rash1 = $_POST["Position_Rash1"];
            $Position_Rash2 = $_POST["Position_Rash2"];
            $Position_Rash3 = $_POST["Position_Rash3"];
            $Position_Rash4 = $_POST["Position_Rash4"];
            $Position_Rash5 = $_POST["Position_Rash5"];
            $Position_Rash6 = $_POST["Position_Rash6"];
        } else {
            $Rash_active = "0";
            $Position_Rash1 = "";
            $Position_Rash2 = "";
            $Position_Rash3 = "";
            $Position_Rash4 = "";
            $Position_Rash5 = "";
            $Position_Rash6 = "";
        }
        echo
        $Rash_active, "-",
        $Position_Rash1, "-",
        $Position_Rash2, "-",
        $Position_Rash3, "-",
        $Position_Rash4, "-",
        $Position_Rash5, "-",
        $Position_Rash6;
        $Rash_data = 'UPDATE `Rash` SET
    Rash_active = "' . $Rash_active . '"
    ,Position_Rash1 = "' . $Position_Rash1 .'"
    ,Position_Rash2 ="' . $Position_Rash2 .'"
    ,Position_Rash3 ="' . $Position_Rash3 .'"
    ,Position_Rash4 ="' . $Position_Rash4 .'"
    ,Position_Rash5 ="' . $Position_Rash5 .'"
    ,Position_Rash6 ="' . $Position_Rash6 .'"
    WHERE Code = "' .  $sCode . '"   
        ';
        //rash
    
        echo "<br>*******************************************************<br>";
    
        //Xrey
        $Xrey_decision = $_POST["Xrey_decision"];
        if ($Xrey_decision == "1") {
            $Xrey_No = "0";
            $Xrey_Yes = "1";
            $Xrey_Date = $_POST["Xrey_Date"];
            $Xrey_Result = $_POST["Xrey_Result"];
        } else {
            $Xrey_No = "1";
            $Xrey_Yes = "0";
            $Xrey_Date = "";
            $Xrey_Result = "";
        }
        echo
        $Xrey_No, "-",
        $Xrey_Yes, "-",
        $Xrey_Date, "-",
        $Xrey_Result;
        $X_ray = "UPDATE `X-ray` SET
    Xrey_No ='" . $Xrey_No . "'
    ,Xrey_Yes ='" . $Xrey_Yes . "'
    ,Xrey_Date = '" . $Xrey_Date . "'
    ,Xrey_Result ='" . $Xrey_Result . "' 
    WHERE Code = '" . $sCode . "'  
    ";
        //Xrey
        echo "<br>*******************************************************<br>";
        //CBC
        $Order_of_CBC_if = $_POST["Order_of_CBC"];
        if($Order_of_CBC_if == "1"){
            $Order_of_CBC ="1";
            $CBC_Date = $_POST["CBC_Date"];
        }else{
            $Order_of_CBC ="0";
            $CBC_Date = "";
        }
        $CBC_Hb = $_POST["CBC_Hb"];
        $CBC_Hct = $_POST["CBC_Hct"];
        $CBC_Platelet_Count = $_POST["CBC_Platelet_Count"];
        $WBC = $_POST["WBC"];
        $WBC_N = $_POST["WBC_N"];
        $WBC_L = $_POST["WBC_L"];
        $WBC_Atyp_Lymph = $_POST["WBC_Atyp_Lymph"];
        $WBC_Mono = $_POST["WBC_Mono"];
        $WBC_Orther = $_POST["WBC_Orther"];
        echo
        $Order_of_CBC, "-",
        $CBC_Date, "-",
        $CBC_Hb, "-",
        $CBC_Hct, "-",
        $CBC_Platelet_Count, "-",
        $WBC, "-",
        $WBC_N, "-",
        $WBC_L, "-",
        $WBC_Atyp_Lymph, "-",
        $WBC_Mono, "-",
        $WBC_Orther;
        $CBC = "UPDATE CBC SET
    Order_of_CBC ='" . $Order_of_CBC . "'
    ,CBC_Date ='" . $CBC_Date . "'
    ,CBC_Hb ='" . $CBC_Hb . "'
    ,CBC_Hct ='" . $CBC_Hct . "'
    ,CBC_Platelet_Count ='" . $CBC_Platelet_Count . "'
    ,WBC ='" . $WBC . "'
    ,WBC_N ='" . $WBC_N . "'
    ,WBC_L ='" . $WBC_L . "'
    ,WBC_Atyp_Lymph ='" . $WBC_Atyp_Lymph . "'
    ,WBC_Mono ='" . $WBC_Mono . "'
    ,WBC_Orther ='" . $WBC_Orther . "'
    WHERE Code = '" . $sCode . "'  
    ";
        //CBC
    
        echo "<br>*******************************************************<br>";
    
        //Influenza_test
        $Method_test = $_POST["Method_test"];

        $Negative_test_if = $_POST["Negative_test"];
        if($Negative_test_if == "1"){
            $Negative_test = "1";
        }else{
            $Negative_test = "0";
        }
        $Possitive_test_if = $_POST["Possitive_test"];
        if($Possitive_test_if == "1"){
            $Possitive_test = "1";
        }else{
            $Possitive_test = "0";
        }
        $Flu_A_if = $_POST["Flu_A"];
        if($Flu_A_if == "1"){
            $Flu_A = "1";
        }else{
            $Flu_A = "0";
        }
        $Flu_B_if = $_POST["Flu_B"];
        if($Flu_B_if == "1"){
            $Flu_B = "1"; 
        }else{
            $Flu_B = "0"; 
        }
        echo
        $Method_test, "-",
        $Negative_test, "-",
        $Possitive_test, "-",
        $Flu_A, "-",
        $Flu_B;
        $Influenza_test = "UPDATE Influenza_test SET
    Method_test ='" . $Method_test . "'
    ,Negative_test ='" . $Negative_test . "'
    ,Possitive_test ='" . $Possitive_test . "'
    ,Flu_A ='" . $Flu_A . "'
    ,Flu_B ='" . $Flu_B . "'
    WHERE Code = '" . $sCode . "'  
   ";
        //Influenza_test
    
        echo "<br>*******************************************************<br>";
    
        //Patient_type
        $patient_type = $_POST["patient_type"];
        if ($patient_type == "out") {
            $Outpatient = "1";
            $Inpatient = "0";
        } else {
            $Outpatient = "0";
            $Inpatient = "1";
        }
        $Admit_Date = $_POST["Admit_Date"];
        $Diagnosis = $_POST["Diagnosis"];
        echo
        $Outpatient, "-",
        $Inpatient, "-",
        $Admit_Date, "-",
        $Diagnosis;
        $Patient_type = "UPDATE Patient_type SET
    Outpatient ='" . $Outpatient . "'
    ,Inpatient ='" . $Inpatient . "'
    ,Admit_Date ='" . $Admit_Date . "'
    ,Diagnosis ='" . $Diagnosis . "'
    WHERE Code = '" . $sCode . "'
    ";
        //Patient_type
    
        echo "<br>*******************************************************<br>";
    
    
        if ($conn->query($Clinic_data) === TRUE) {
            if ($conn->query($Rash_data) === TRUE) {
                if ($conn->query($X_ray) === TRUE) {
                    if ($conn->query($CBC) === TRUE) {
                        if ($conn->query($Influenza_test) === TRUE) {
                            if ($conn->query($Patient_type) === TRUE) {
                             
                                $_SESSION["alert_status"] = 1;
                                $_SESSION["subject_message"] = "ข้อมูลทางคลินิก";   
                                if($_SESSION['Type'] ==1){
                                    header('location: ../../?page=clinic');
                                }
                                if($_SESSION['Type'] ==2){
                                    header('location: ../../index_data.php?page=clinic');
                                }
                                if($_SESSION['Type'] =="A"){
                                    header('location: ../../index_data.php?page=clinic');
                                }
                            
                            } else {
                                // error
                                echo "Error: " . $Patient_type . "<br>" . $conn->error;
                            }
                        } else {
                            // error
                            echo "Error: " . $Influenza_test . "<br>" . $conn->error;
                        }
                    } else {
                        // error
                        echo "Error: " . $CBC . "<br>" . $conn->error;
                    }
                } else {
                    // error
                    echo "Error: " . $X_ray . "<br>" . $conn->error;
                }
            } else {
                // error
                echo "Error: " . $Rash_data . "<br>" . $conn->error;
            }
        } else {
            // error
            echo "Error: " . $Clinic_data . "<br>" . $conn->error;
        }

}
