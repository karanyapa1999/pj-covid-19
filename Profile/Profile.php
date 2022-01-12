<?php session_start();
require('database/connection.php');
$sql = "SELECT Code FROM `General_Data` WHERE Code = '" . $code . "'";
$result = $conn->query($sql);
$sql_provinces = "SELECT * FROM provinces";
$query = mysqli_query($conn, $sql_provinces);
?>
<div class="row">
    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">ลงทะเบียนผู้ป่วยใหม่</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <?php if ($result->num_rows > 0) {
                    $sql_show = "SELECT * FROM `General_Data` WHERE Code = '" . $code . "'";
                    $result_show = $conn->query($sql_show);
                    $row_show = $result_show->fetch_assoc();

                    $sql_show1 = "SELECT * FROM `Patient_status` WHERE Code = '" . $code . "'";
                    $result_show1 = $conn->query($sql_show1);
                    $row_show1 = $result_show1->fetch_assoc();

                ?>
                    <form action="Profile/API/backend.php?api=edit_general" method="POST">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Refer">ลำดับ Refer</label>
                                        <input type="text" id="Refer" name="Refer" value="<?php echo $row_show["Refer"]; ?>" class=" form-control" placeholder="ลำดับ Refer" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Date_report">วันที่รายงาน</label>
                                        <input class="form-control" type="date" id="Date_report" value="<?php echo $row_show["Date_report"]; ?>" name="Date_report" max="2022-12-31" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="per_report">ผู้รายงาน</label>
                                        <input type="text" id="per_report" name="per_report" class=" form-control" value="<?php echo $row_show["per_report"]; ?>" placeholder="ผู้รายงาน">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="per_con">ผู้ติดต่อ</label>
                                        <input type="text" id="per_con" name="per_con" class=" form-control" value="<?php echo $row_show["per_con"]; ?>" placeholder="ผู้ติดต่อ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Code">SAT CODE</label>
                                        <input type="text" id="Code" name="Code" value="<?php echo $row_show["Code"]; ?>" class="form-control" placeholder="รหัสผู้ป่วย">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="ID_card">เลขบัตรประชาชน/หนังสือเดินทาง</label>
                                        <input type="text" id="ID_card" name="ID_card" value="<?php echo $row_show["ID_card"]; ?>" class=" form-control" placeholder="เลขบัตรประชาชน" maxlength="13">
                                    </div>
                                </div>
                                <div class="col-lg-6"></div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Name">ชื่อ</label>
                                        <input type="text" id="Name" name="Name" value="<?php echo $row_show["Name"]; ?>" class="form-control" placeholder="ชื่อ">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="LName">นามสกุล</label>
                                        <input type="text" id="LName" name="LName" value="<?php echo $row_show["LName"]; ?>" class="form-control" placeholder="นามสกุล">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="sex">เพศ</label>
                                        <select class="form-control" name="sex" id="sex">
                                            <?php if ($row_show["Male"] == "" && $row_show["Female"] == "") { ?>
                                                <option selected hidden>กรุณาเลือก</option>
                                                <option value="Male">ชาย</option>
                                                <option value="Female">หญิง</option>
                                            <?php } else if ($row_show["Male"] == "1") { ?>
                                                <option value="Male">ชาย</option>
                                                <option value="Female">หญิง</option>
                                            <?php } else { ?>
                                                <option value="Female">หญิง</option>
                                                <option value="Male">ชาย</option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Age_year">อายุปี</label>
                                        <input type="number" id="Age_year" name="Age_year" value="<?php echo $row_show["Age_year"]; ?>" class="form-control" min="1" max="99" maxlength="2" placeholder="อายุปี">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Age_month">อายุเดือน</label>
                                        <input type="number" id="Age_month" name="Age_month" value="<?php echo $row_show["Age_month"]; ?>" class="form-control" min="1" max="99" maxlength="2" placeholder="อายุเดือน">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Nationality">สัญชาติ</label>
                                        <select class="form-control" name="Nationality" id="Nationality">
                                            <option selected value="<?php echo $row_show["Nationality"]; ?>"><?php echo $row_show["Nationality"]; ?></option>
                                            <?php
                                            $sql_Nationality = "SELECT * FROM `Nationality`";
                                            $result_Nationality = $conn->query($sql_Nationality);
                                            while ($row_Nationality = $result_Nationality->fetch_assoc()) { ?>
                                                <option value="<?php echo $row_Nationality["Nationality"]; ?>"><?php echo $row_Nationality["Nationality"]; ?></option>
                                            <?php }
                                            $row_Nationality = $result_Nationality->fetch_assoc();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Career">อาชีพ</label>
                                        <select class="form-control" name="Career" id="Career">
                                            <option selected value="<?php echo $row_show["Career"]; ?>"><?php echo $row_show["Career"]; ?></option>
                                            <?php
                                            $sql_Career = "SELECT * FROM `Career`";
                                            $result_Career = $conn->query($sql_Career);

                                            while ($row_Career = $result_Career->fetch_assoc()) { ?>
                                                <option value="<?php echo $row_Career["Career"]; ?>"><?php echo $row_Career["Career"]; ?></option>
                                            <?php }
                                            $row_Career = $result_Career->fetch_assoc();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="PhoneNo">เบอร์โทรศัพท์</label>
                                        <input type="text" id="PhoneNo" name="PhoneNo" class="form-control" value="<?php echo $row_show['PhoneNo']; ?>" placeholder="กรุณากรอกเบอร์โทรศัพท์" maxlength="10">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">ที่อยู่ขณะป่วย</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="H_number">บ้านเลขที่</label>
                                        <input class="form-control" id="H_number" name="H_number" value="<?php echo $row_show['H_number']; ?>" placeholder="ที่อยู่" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Moo">หมู่ที่</label>
                                        <input type="text" id="Moo" name="Moo" class="form-control" value="<?php echo $row_show['Moo']; ?>" placeholder="หมู่ที่">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Village">หมู่บ้าน</label>
                                        <input type="text" id="Village" name="Village" class="form-control" value="<?php echo $row_show['Village']; ?>" placeholder="หมู่บ้าน">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Road">ถนน</label>
                                        <input type="text" id="Road" name="Road" class="form-control" value="<?php echo $row_show['Road']; ?>" placeholder="ถนน">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Side_road">ซอย</label>
                                        <input type="text" id="Side_road" name="Side_road" class="form-control" value="<?php echo $row_show['Side_road']; ?>" placeholder="ซอย">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label class="form-control-label" for="Province">จังหวัด</label>
                                    <input class="form-control text-dark" list="Provinces" value = "<?php echo $row_show["Province"]; ?>" name="Province" id="Province">
                                    <datalist id="Provinces">
                                            <?php foreach ($query as $value) { ?>
                                                <option value="<?= $value['name_th'] ?>"></option>
                                            <?php } ?>
                                    </datalist>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label class="form-control-label" for="Amphur">อำเภอ</label>
                                    <input class="form-control text-dark" value = "<?php echo $row_show["Amphur"]; ?>" list="Amphurs" name="Amphur" id="Amphur">
                                    <datalist id="Amphurs">
                                        <?php
                                        $sql_Amphur = "SELECT * FROM amphures";
                                        $query_Amphur = $conn->query($sql_Amphur);
                                        foreach ($query_Amphur as $value_Amphur) {
                                            if ($value_Amphur["id"] == $row_show["Amphur"]) {
                                                echo '<option value="' . $value_Amphur["name_th"] . '"></option>';
                                            } else {
                                                echo '<option value="' . $value_Amphur["name_th"] . '"></option>';
                                            }
                                        }
                                        ?>
                                    </datalist>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label class="form-control-label" for="District">ตำบล</label>
                                    <input class="form-control text-dark" value = "<?php echo $row_show["District"]; ?>" list="Districts" name="District" id="District">
                                    <datalist id="Districts">
                                        <?php
                                        $sql_District = "SELECT * FROM districts";
                                        $query_District = $conn->query($sql_District);
                                        foreach ($query_District as $value_District) {
                                            echo '<option value="' . $value_District["name_th"] . '"></option>';
                                        }
                                        ?>
                                    </datalist>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label class="form-control-label" for="postalcode">รหัสไปรษณี</label>
                                    <input type="text" class="form-control text-dark" id="postalcode" name="Postalcode" value="<?php echo $row_show['Postalcode']; ?>" placeholder="รหัสไปรษณี">
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <h6 class="heading-small text-muted mb-4">สถานะผู้ป่วย</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group col-md-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" name="live_status" id="Wait_for_bed" value="Wait_for_bed" onclick="close_show()">
                                            <label class="form-check-label" for="Wait_for_bed">รอเตียง</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" name="live_status" id="Healed" value="Healed" onclick="close_show()">
                                            <label class="form-check-label" for="Healed">ครบ14วัน(หายแล้ว)</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" name="live_status" id="Refuse" value="Refuse" onclick="close_show()">
                                            <label class="form-check-label" for="Refuse">ปฏิเสธการรักษา</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" name="live_status" id="Die" value="Die" onclick="close_show()">
                                            <label class="form-check-label" for="Die">เสียชีวิต</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" id="Hotel" name="live_status" value="Hotel" onclick="show_hotel()">
                                            <label class="form-check-label" for="Hotel">
                                                กักตัวโรงแรม
                                            </label>
                                        </div>
                                        <div class="form-group col-lg-6" id="Hotel_text" style="display : none">
                                            <label class="form-control-label">ชื่อโรงแรม</label>
                                            <input type="text" id="Hotel_text" class="form-control" name="Hotel_text" value="<?php echo $row_show1['Hotel']; ?>">
                                        </div>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" id="Hospital" name="live_status" value="Hospital" onclick="show_hospital()">
                                            <label class="form-check-label" for="Hospital">
                                                กักตัวโรงพยาบาล
                                            </label>
                                        </div>
                                        <div class="form-group col-lg-6" id="Hospital_text" style="display : none">
                                            <label class="form-control-label">ชื่อโรงพยาบาล</label>
                                            <input type="text" id="Hospital_text" class="form-control" name="Hospital_text" value="<?php echo $row_show1['Hospital']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.getElementById("Wait_for_bed").checked = <?php echo $row_show1["Wait_for_bed"]; ?>;
                            document.getElementById("Healed").checked = <?php echo $row_show1["Healed"]; ?>;
                            document.getElementById("Refuse").checked = <?php echo $row_show1["Refuse"]; ?>;
                            document.getElementById("Die").checked = <?php echo $row_show1["Die"]; ?>;
                            <?php if ($row_show1['Hotel'] != "") { ?>
                                document.getElementById("Hotel").checked = 1;
                            <?php } else { ?>
                                document.getElementById("Hotel").checked = 0;
                            <?php } ?>
                            if (document.getElementById("Hotel").checked) {
                                document.getElementById("Hotel_text").style.display = "block";
                            } else {
                                document.getElementById("Hotel_text").style.display = "none";
                            }


                            <?php if ($row_show1['Hospital'] != "") { ?>
                                document.getElementById("Hospital").checked = 1;
                            <?php } else { ?>
                                document.getElementById("Hospital").checked = 0;
                            <?php } ?>
                            if (document.getElementById("Hospital").checked) {
                                document.getElementById("Hospital_text").style.display = "block";
                            } else {
                                document.getElementById("Hospital_text").style.display = "none";
                            }
                        </script>


                        <hr class="my-4" />

                        <h6 class="heading-small text-muted mb-4">ข้อมูลการรับการรักษา</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Cure">สถานะการรักษา</label>
                                        <input type="text" id="Cure" name="Cure" class="form-control" value="<?php echo $row_show['Cure']; ?>" placeholder=" กรุณากรอกข้อมูล">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Location_admit">สถานที่ Admit</label>
                                        <input type="text" id="Location_admit" name="Location_admit" class="form-control" value="<?php echo $row_show['Location_admit']; ?>" placeholder=" กรุณากรอกข้อมูล">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Date_admit">วันที่เข้า Admit</label>
                                        <input class="form-control" type="date" id="Date_admit" name="Date_admit" value="<?php echo $row_show['Date_admit']; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-outline-primary" name="submit_insert_general" style="margin-left:auto;margin-right:auto;display:block;" value="บันทึกข้อมูล">
                    </form>










                <?php } else {



                ?>




                    <form action="Profile/API/backend.php?api=insert_general" method="POST">
                        <div class="pl-lg-4">
                            <div class="row">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Refer">ลำดับ Refer</label>
                                        <input type="text" id="Refer" name="Refer" class=" form-control" placeholder="ลำดับ Refer (AUTO หลัง เพิ่มข้อมูล)" readonly>
                                    </div>
                                </div>
                                <?php $date = date("Y-m-d"); ?>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Date_report">วันที่รายงาน</label>
                                        <input class="form-control" type="date" id="Date_report" name="Date_report" value="<?php echo $date; ?>" max="2022-12-31" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="per_report">ผู้รายงาน</label>
                                        <input type="text" id="per_report" name="per_report" class=" form-control" placeholder="ผู้รายงาน">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="per_con">ผู้ติดต่อ</label>
                                        <input type="text" id="per_con" name="per_con" class=" form-control" placeholder="ผู้ติดต่อ">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Code">SAT CODE</label>
                                        <input type="text" id="Code" name="Code" class="form-control" placeholder="รหัสผู้ป่วย" requried>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="ID_card">เลขบัตรประชาชน/หนังสือเดินทาง</label>
                                        <input type="text" id="ID_card" name="ID_card" class=" form-control" placeholder="เลขบัตรประชาชน" maxlength="13" required>
                                    </div>
                                </div>
                                <div class="col-lg-6"></div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Name">ชื่อ</label>
                                        <input type="text" id="Name" name="Name" class="form-control" placeholder="ชื่อ">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="LName">นามสกุล</label>
                                        <input type="text" id="LName" name="LName" class="form-control" placeholder="นามสกุล">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="sex">เพศ</label>
                                        <select class="form-control" name="sex" id="sex">
                                            <?php if ($row_show["Male"] == "" && $row_show["Female"] == "") { ?>
                                                <option selected hidden>กรุณาเลือก</option>
                                                <option value="Male">ชาย</option>
                                                <option value="Female">หญิง</option>
                                            <?php } else if ($row_show["Male"] == "1") { ?>
                                                <option value="Male">ชาย</option>
                                                <option value="Female">หญิง</option>
                                            <?php } else { ?>
                                                <option value="Female">หญิง</option>
                                                <option value="Male">ชาย</option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Age_year">อายุปี</label>
                                        <input type="number" id="Age_year" name="Age_year" class="form-control" min="1" max="99" maxlength="2" placeholder="อายุปี">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Age_month">อายุเดือน</label>
                                        <input type="number" id="Age_month" name="Age_month" class="form-control" min="1" max="99" maxlength="2" placeholder="อายุเดือน">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Nationality">สัญชาติ</label>
                                        <select class="form-control" name="Nationality" id="Nationality">
                                            <option selected hidden>กรุณาเลือก</option>
                                            <?php
                                            $sql_Nationality = "SELECT * FROM `Nationality`";
                                            $result_Nationality = $conn->query($sql_Nationality);

                                            while ($row_Nationality = $result_Nationality->fetch_assoc()) { ?>
                                                <option value="<?php echo $row_Nationality["Nationality"]; ?>"><?php echo $row_Nationality["Nationality"]; ?></option>


                                            <?php }
                                            $row_Nationality = $result_Nationality->fetch_assoc();
                                            ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Career">อาชีพ</label>
                                        <select class="form-control" name="Career" id="Career">



                                            <option selected hidden>กรุณาเลือก</option>
                                            <?php
                                            $sql_Career = "SELECT * FROM `Career`";
                                            $result_Career = $conn->query($sql_Career);

                                            while ($row_Career = $result_Career->fetch_assoc()) { ?>
                                                <option value="<?php echo $row_Career["Career"]; ?>"><?php echo $row_Career["Career"]; ?></option>


                                            <?php }
                                            $row_Career = $result_Career->fetch_assoc();
                                            ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="PhoneNo">เบอร์โทรศัพท์</label>
                                        <input type="text" id="PhoneNo" name="PhoneNo" class="form-control" placeholder="กรุณากรอกเบอร์โทรศัพท์" maxlength="10">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">ที่อยู่ขณะป่วย</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="H_number">บ้านเลขที่</label>
                                        <input class="form-control" id="H_number" name="H_number" placeholder="ที่อยู่" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Moo">หมู่ที่</label>
                                        <input type="text" id="Moo" name="Moo" class="form-control" placeholder="หมู่ที่">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Village">หมู่บ้าน</label>
                                        <input type="text" id="Village" name="Village" class="form-control" placeholder="หมู่บ้าน">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Road">ถนน</label>
                                        <input type="text" id="Road" name="Road" class="form-control" placeholder="ถนน">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Side_road">ซอย</label>
                                        <input type="text" id="Side_road" name="Side_road" class="form-control" placeholder="ซอย">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label class="form-control-label" for="Province">จังหวัด</label>
                                    <input class="form-control text-dark" list="Provinces" name="Province" id="Province">
                                    <datalist id="Provinces">
                                        <?php if ($row_show["Province"] == "") { ?>
                                            <?php foreach ($query as $value) { ?>
                                                <option value="<?= $value['name_th'] ?>"></option>
                                            <?php } ?>
                                        <?php } else {
                                            foreach ($query as $value) {
                                                if ($value["id"] == $row_show["Province"]) {
                                                    echo '<option value="' . $value["name_th"] . '"></option>';
                                                } else {
                                                    echo '<option value="' . $value["name_th"] . '"></option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </datalist>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label class="form-control-label" for="Amphur">อำเภอ</label>
                                    <input class="form-control text-dark" list="Amphurs" name="Amphur" id="Amphur">
                                    <datalist id="Amphurs">
                                        <?php
                                        $sql_Amphur = "SELECT * FROM amphures";
                                        $query_Amphur = $conn->query($sql_Amphur);
                                        foreach ($query_Amphur as $value_Amphur) {
                                            if ($value_Amphur["id"] == $row_show["Amphur"]) {
                                                echo '<option value="' . $value_Amphur["name_th"] . '"></option>';
                                            } else {
                                                echo '<option value="' . $value_Amphur["name_th"] . '"></option>';
                                            }
                                        }
                                        ?>
                                    </datalist>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label class="form-control-label" for="District">ตำบล</label>
                                    <input class="form-control text-dark" list="Districts" name="District" id="District">
                                    <datalist id="Districts">
                                        <?php
                                        $sql_District = "SELECT * FROM districts";
                                        $query_District = $conn->query($sql_District);
                                        foreach ($query_District as $value_District) {
                                            echo '<option value="' . $value_District["name_th"] . '"></option>';
                                        }
                                        ?>
                                    </datalist>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label class="form-control-label" for="postalcode">รหัสไปรษณี</label>
                                    <input type="text" class="form-control text-dark" id="postalcode" name="Postalcode" placeholder="รหัสไปรษณี">
                                </div>
                            </div>
                        </div>

                        <hr class="my-4" />
                        <h6 class="heading-small text-muted mb-4">สถานะผู้ป่วย</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group col-md-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" name="live_status" id="Wait_for_bed" value="Wait_for_bed" onclick="close_show()">
                                            <label class="form-check-label" for="Wait_for_bed">รอเตียง</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" name="live_status" id="Healed" value="Healed" onclick="close_show()">
                                            <label class="form-check-label" for="Healed">ครบ14วัน(หายแล้ว)</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" name="live_status" id="Refuse" value="Refuse" onclick="close_show()">
                                            <label class="form-check-label" for="Refuse">ปฏิเสธการรักษา</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" name="live_status" id="Die" value="Die" onclick="close_show()">
                                            <label class="form-check-label" for="Die">เสียชีวิต</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" id="Hotel" name="live_status" value="Hotel" onclick="show_hotel()">
                                            <label class="form-check-label" for="Hotel">
                                                กักตัวโรงแรม
                                            </label>
                                        </div>
                                        <div class="form-group col-lg-6" id="Hotel_text" style="display : none">
                                            <label class="form-control-label">ชื่อโรงแรม</label>
                                            <input type="text" id="Hotel_text" class="form-control" name="Hotel_text">
                                        </div>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input statuscheckbox" type="radio" id="Hospital" name="live_status" value="Hospital" onclick="show_hospital()">
                                            <label class="form-check-label" for="Hospital">
                                                กักตัวโรงพยาบาล
                                            </label>
                                        </div>
                                        <div class="form-group col-lg-6" id="Hospital_text" style="display : none">
                                            <label class="form-control-label">ชื่อโรงพยาบาล</label>
                                            <input type="text" id="Hospital_text" class="form-control" name="Hospital_text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />

                        <h6 class="heading-small text-muted mb-4">ข้อมูลการรับการรักษา</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Cure">สถานะการรักษา</label>
                                        <input type="text" id="Cure" name="Cure" class="form-control" placeholder=" กรุณากรอกข้อมูล">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Location_admit">สถานที่ Admit</label>
                                        <input type="text" id="Location_admit" name="Location_admit" class="form-control" placeholder=" กรุณากรอกข้อมูล">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Date_admit">วันที่เข้า Admit</label>
                                        <input class="form-control" type="date" id="Date_admit" name="Date_admit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-outline-primary" name="submit_insert_general" style="margin-left:auto;margin-right:auto;display:block;" value="บันทึกข้อมูล">
                    </form>




                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {

        $(".statuscheckbox").click(function() { // เมื่อคลิก checkbox  ใดๆ  
            if ($(this).prop("checked") == true) { // ตรวจสอบ property  การ ของ   
                var indexObj = $(this).index(".statuscheckbox"); //   
                $(".statuscheckbox").not(":eq(" + indexObj + ")").prop("checked", false); // ยกเลิกการคลิก รายการอื่น  
            }
        });


    });
</script>