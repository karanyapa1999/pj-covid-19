<?php 
session_start();
$_SESSION["code"] = isset($_GET["code"]) ? $_GET["code"] : '';
$_SESSION["refer"] = isset($_GET["refer"]) ? $_GET["refer"] : '';
$page = isset($_GET["page"]) ? $_GET["page"] : '';
switch($page){
case "profile":
    if($_SESSION["Type"] == "1"){
    echo '<script>window.location.href = "../index.php?page=profile";</script>';
    }else if($_SESSION["Type"] == "2"){
        echo '<script>window.location.href = "../index_data.php?page=profile";</script>';
    }else if($_SESSION["Type"] == "A"){
        echo '<script>window.location.href = "../index_data.php?page=profile";</script>';
    }
    break;
}
