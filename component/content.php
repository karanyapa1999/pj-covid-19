<?php
session_start();

if($_SESSION['Type'] != "A"){
    include("./database/connection.php");
}else{
    include("../database/connection.php");
}



$sql_W = mysqli_query($conn, "SELECT COUNT(*) FROM Patient_status WHERE Wait_for_bed = '1'");
$res_W = mysqli_fetch_array($sql_W);
$records_W = $res_W[0];

$sql_H = mysqli_query($conn, "SELECT COUNT(*) FROM Patient_status WHERE Healed = '1'");
$res_H = mysqli_fetch_array($sql_H);
$records_H = $res_H[0];

$sql_R = mysqli_query($conn, "SELECT COUNT(*) FROM Patient_status WHERE Refuse = '1'");
$res_R = mysqli_fetch_array($sql_R);
$records_R = $res_R[0];

$sql_Ht = mysqli_query($conn, "SELECT COUNT(*) FROM Patient_status WHERE Hotel != ''");
$res_Ht = mysqli_fetch_array($sql_Ht);
$records_Ht = $res_Ht[0];

$sql_Hp = mysqli_query($conn, "SELECT COUNT(*) FROM Patient_status WHERE Healed != ''");
$res_Hp = mysqli_fetch_array($sql_Hp);
$records_Hp = $res_Hp[0];

$sql_D = mysqli_query($conn, "SELECT COUNT(*) FROM Patient_status WHERE Die = '1'");
$res_D = mysqli_fetch_array($sql_D);
$records_D = $res_D[0];




?>
<div class="main-content col-12" id="panel">

    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 100px; background-image: url(assets/img/theme/medic.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <!-- Header container -->
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                           
                        </nav>
                    </div>
                   
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">รอเตียง</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $records_W; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-yellow text-white rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">หายแล้ว</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $records_H; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">ปฏิเสธการรักษา</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $records_R; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">กักตัวโรงแรม</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $records_Ht; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">กักตัวโรงพยาบาล</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $records_Hp; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">เสียชีวิต</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $records_D; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                   

                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">เวชระเบียนผู้ป่วยโควิท-19</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table id="dashboard" class="table table-hover align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">
                                        <h4>SAT CODE</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>วันที่รายงาน</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>ชื่อ-นามสกุล</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>เพศ</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>สถานะ</h4>
                                    </th>
                                    <th scope="col">
                                        <h4>เครื่องมือ</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php

                                $sql = "SELECT * FROM `General_Data`";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr style="cursor: pointer;">
                                        <td><?php echo $row['Code']; ?></td>
                                        <td><?php echo $row["Date_report"];?></td>
                                        <td>
                                            
                                                <?php echo $row['Name']; ?> &nbsp;&nbsp;<?php echo $row['LName']; ?>

                                        </td>
                                       
                                        <?php
                                        if ($row['Male'] == 1) {
                                            echo '<td>ชาย</td>';
                                        } else {
                                            echo '<td>หญิง</td>';
                                        }
                                        $sql_ps = "SELECT * FROM `Patient_status` WHERE Code = '".$row['Code']."' ";
                                        $result_ps = $conn->query($sql_ps);
                                        if ($result_ps->num_rows > 0) {
                                        $row_ps = $result_ps->fetch_assoc();
                                        
                                        if($row_ps['Wait_for_bed'] == "1"){
                                            $sStatus = "รอเตียง";
                                            $sColor= "GoldenRod";
                                        }else if($row_ps['Healed'] == "1"){
                                            $sStatus = "ครบ 14 วัน / หายแล้ว";
                                            $sColor= "green";
                                        }else if($row_ps['Refuse']  == "1"){
                                            $sStatus = "ปฏิเสธการรักษา";
                                            $sColor= "orange";
                                        }else if($row_ps['Hotel']  != ""){
                                            $sStatus = "กักตัว(โรงแรม)";
                                            $sColor= "blue";
                                        }else if($row_ps['Hospital']  != ""){
                                            $sStatus = "กักตัว(โรงพยาบาล)";
                                            $sColor= "blue";
                                        }else if($row_ps['Die'] =="1"){
                                            $sStatus = "เสียชีวิต";
                                            $sColor= "red";
                                        }else{
                                            $sStatus = "ยังไม่มีข้อมูล";
                                            $sColor= "#000";
                                        }
                                    }else{
                                        $sStatus = "ยังไม่มีข้อมูล";
                                        $sColor= "#000";
                                    }
                                        ?>
                                        <td><font color = "<?php echo $sColor; ?>"><?php echo $sStatus; ?></font></td>
                                        <td><a type = "button" class="btn btn-outline-primary"  href="./session/index.php?page=profile&code=<?php echo $row['Code']; ?>&refer=<?php echo $row['Refer']; ?>">อัพเดต</a></td>
                                    </tr>
                                <?php
                                }
                             $result->fetch_assoc();
                               
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>