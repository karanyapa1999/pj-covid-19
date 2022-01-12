<?php
include("../database/connection.php");







$sql_1 = mysqli_query($conn, "SELECT COUNT(*) FROM Login WHERE Type = '1'");
$res_1 = mysqli_fetch_array($sql_1);
$records_1 = $res_1[0];

$sql_2 = mysqli_query($conn, "SELECT COUNT(*) FROM Login WHERE Type = '2'");
$res_2 = mysqli_fetch_array($sql_2);
$records_2 = $res_2[0];

$sql_A = mysqli_query($conn, "SELECT COUNT(*) FROM Login WHERE Type = 'A'");
$res_A = mysqli_fetch_array($sql_A);
$records_A = $res_A[0];

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
                    </div>
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <h5 class="card-title text-uppercase text-muted mb-0">SAT</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $records_1; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <img src="https://img.icons8.com/plasticine/60/000000/medical-doctor.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">สอบสวนโรค</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $records_2; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <img src="https://img.icons8.com/plasticine/60/000000/medical-doctor-female.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Admin</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $records_A; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <img src="https://img.icons8.com/wired/60/000000/admin-settings-male.png" />
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
                            <h3 class="mb-0">ตารางแสดงบัญชีผู้ใช้งาน</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example1" class="table align-items-center table-flush table-hover">
                        <thead class="thead-light ">
                            <tr>
                                <th scope="col">
                                    <h4>ลำดับ</h4>
                                </th>
                                <th scope="col">
                                    <h4>บัญชีผู้ใช้งาน</h4>
                                </th>
                                <th scope="col">
                                    <h4>ชื่อ</h4>
                                </th>
                                <th scope="col">
                                    <h4>นามสกุล</h4>
                                </th>
                                <th scope="col">
                                    <h4>เบอร์โทรศัพท์</h4>
                                </th>
                                <th scope="col">
                                    <h4>ประเภท</h4>
                                </th>
                                <th scope="col">
                                    <h4>เครื่องมือ</h4>
                                </th>
                                <th scope="col">
                                    <h4>RESET</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <script>
                                function Del_user(x) {
                                    var value = "API/backend.php?api=delete_user&no=";
                                    var r = confirm("ยืนยันที่จะลบบัญชีผู้ใช้งานนี้หรือไม่?");
                                    if (r == true) {
                                        location.href = value + x;
                                    } else {
                                        location.href = "admin_page.php";
                                    }
                                }
                            </script>
                            <?php

                            $sql = "SELECT * FROM `Login`";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {





                            ?>
                                <tr>
                                    <td><?php echo $row['No']; ?></td>
                                    <td><?php echo $row['Username']; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Lastname']; ?></td>
                                    <td><?php echo $row['Phone']; ?></td>
                                    <?php if ($row['Type'] == 1) {
                                        $sType = "SAT";
                                    } else if ($row['Type'] == 2) {
                                        $sType = "Operation";
                                    } else {
                                        $sType = "Admin";
                                    } ?>
                                    <td><?php echo $sType; ?></td>
                                    <td><a href="?page=manage_user&no=<?php echo $row['No']; ?>"><img src="https://img.icons8.com/dusk/35/000000/edit-property.png" /></a>
                                        <a href="#" onclick="Del_user('<?php echo $row['No']; ?>');"><img src="https://img.icons8.com/dusk/35/000000/delete-forever.png" /></a>
                                    </td>
                                    <td>
                                        <a href="API/backend.php?api=reset_user&type=<?php echo $row['Type']; ?>&no=<?php echo $row['No']; ?>" class="btn btn-outline-primary">RESET</a>
                                    </td>


                                </tr>
                            <?php
                            }
                            $row = $result->fetch_assoc();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>