<?php
session_start();
require('database/connection.php');
$sql = "SELECT * FROM `Clinic Data` WHERE Code = '" . $_SESSION["code"] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<?php
if ($result->num_rows > 0) {
    $sql_clinic = "SELECT * FROM `Clinic Data` WHERE Code = '" . $_SESSION["code"] . "'";
    $result_clinic = $conn->query($sql_clinic);
    $row_clinic = $result_clinic->fetch_assoc();

    $sql_rash = "SELECT * FROM `Rash` WHERE Code = '" . $_SESSION["code"] . "'";
    $result_rash = $conn->query($sql_rash);
    $row_rash = $result_rash->fetch_assoc();

    $sql_xray = "SELECT * FROM `X-ray` WHERE Code = '" . $_SESSION["code"] . "'";
    $result_xray = $conn->query($sql_xray);
    $row_xray = $result_xray->fetch_assoc();

    $sql_cbc = "SELECT * FROM `CBC` WHERE Code = '" . $_SESSION["code"] . "'";
    $result_cbc = $conn->query($sql_cbc);
    $row_cbc = $result_cbc->fetch_assoc();

    $sql_Influenza_test = "SELECT * FROM `Influenza_test` WHERE Code = '" . $_SESSION["code"] . "'";
    $result_Influenza_test = $conn->query($sql_Influenza_test);
    $row_Influenza_test = $result_Influenza_test->fetch_assoc();

    $sql_Patient_type = "SELECT * FROM `Patient_type` WHERE Code = '" . $_SESSION["code"] . "'";
    $result_Patient_type = $conn->query($sql_Patient_type);
    $row_Patient_type = $result_Patient_type->fetch_assoc();

    $sql_Patient_status = "SELECT * FROM `Patient_status` WHERE Code = '" . $_SESSION["code"] . "'";
    $result_Patient_status = $conn->query($sql_Patient_status);
    $row_Patient_status = $result_Patient_status->fetch_assoc();
?>

    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">ข้อมูลคลินิค</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="Clinic/API/backend.php?api=edit_clinic" method="POST">
                    <h6 class="heading-small text-muted mb-4">ประวัติส่วนตัว</h5>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">รหัสผู้ใช้บริการ</label>
                                    <input type="text" id="Code" name="Code" value="<?php echo $row_clinic['Code']; ?>" class="form-control" placeholder="รหัสผู้ใช้บริการ" readonly>
                                </div>
                                <div class="col-lg-6">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="Start_Date_Sick">วันที่เริ่มป่วย(วัน/เดือน/ปี)</label>
                                    <input type="date" class="form-control" value="<?php echo $row_clinic["Start_Date_Sick"]; ?>" id="Start_Date_Sick" name="Start_Date_Sick">
                                    <small id="emailHelp" class="form-text text-muted">วันที่เริ่มป่วย เริ่มมีอาการครั้งแรก</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="Strat_Date_Treatment">วันที่เข้ารับการรักษาครั้งแรก(วัน/เดือน/ปี)</label>
                                    <input type="date" class="form-control" value="<?php echo $row_clinic["Strat_Date_Treatment"]; ?>" id="Strat_Date_Treatment" name="Strat_Date_Treatment">
                                    <small id="emailHelp" class="form-text text-muted">วันที่เริ่มป่วย เริ่มมมมีอาการครั้งแรก</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ชื่อสถานพยาบาลเข้ารับการรักษาครั้งแรก</label>
                                    <input type="text" id="First_Hospital" value="<?php echo $row_clinic["First_Hospital"]; ?>" name="First_Hospital" class="form-control" placeholder="ชื่อ สถานพยาบาล">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">จังหวัด</label>
                                    <select class="form-control" id="FH_Province" name="FH_Province" aria-label="Default select example" >
                                        <option value ="<?php echo $row_clinic['FH_Province']; ?>"><?php echo $row_clinic['FH_Province']; ?></option>
                                        <?php $sql_province = "SELECT * FROM provinces";
                                        $result_province = $conn->query($sql_province);
                                        while($row_province = $result_province->fetch_assoc()){?>
                                            <option value="<?php echo $row_province['name_th']; ?>"><?php echo $row_province['name_th']; ?></option>
                                        <?php }
                                            $row_province = $result_province->fetch_assoc();
                                      
                                         ?>           
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ชื่อสถานพยาบาลเข้ารับการรักษาในปัจจุบัน</label>
                                    <input type="text" id="Present_Hospital" value="<?php echo $row_clinic["Present_Hospital"]; ?>" name="Present_Hospital" class="form-control" placeholder="ชื่อสถานพยาบาลในปัจจุบัน">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">จังหวัด</label>
                                    <select class="form-control" id="PH_Province" name="PH_Province" aria-label="Default select example" value ="<?php echo $row_clinic['PH_Province']; ?>">
                                    <option value ="<?php echo $row_clinic['PH_Province']; ?>"><?php echo $row_clinic['PH_Province']; ?></option>
                                        <?php $sql_province = "SELECT * FROM provinces";
                                        $result_province = $conn->query($sql_province);
                                        while($row_province = $result_province->fetch_assoc()){?>
                                            <option value="<?php echo $row_province['name_th']; ?>"><?php echo $row_province['name_th']; ?></option>
                                        <?php }
                                            $row_province = $result_province->fetch_assoc();
                                      
                                         ?>           
                                    </select>
                                </div>
                                <div class="form-check col-lg-6 ml-3">
                                    <input class="form-check-input" type="checkbox" id="Fever" name="Fever" value="1">
                                    <label class="form-check-label" for="Fever">
                                        ไข้
                                    </label>
                                </div>
                                <script>
                                    document.getElementById("Fever").checked = <?php echo $row_clinic["Fever"]; ?>;
                                </script>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">อุณหภูมิแรกรับ</label>
                                        <input type="text" id="Temperature" value="<?php echo $row_clinic["Temperature"]; ?>" name="Temperature" class="form-control" placeholder="°C">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">O<sub>2</sub> Sat</label>
                                        <input type="text" id="O2Sat" value="<?php echo $row_clinic["O2Sat"]; ?>" name="O2Sat" class="form-control" placeholder="%">
                                    </div>
                                </div>
                                <div class="row col-lg-12 form-group ml-2">
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Ventilator" name="Ventilator" value="1">
                                        <label class="form-check-label" for="Ventilator">
                                            ใส่เครื่องช่วยหายใจ
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Ventilator").checked = <?php echo $row_clinic["Ventilator"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Muscle_pain" name="Muscle_pain" value="1">
                                        <label class="form-check-label" for="Muscle_pain">
                                            ปวดกล้ามเนื้อ
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Muscle_pain").checked = <?php echo $row_clinic["Muscle_pain"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Sore_throat" name="Sore_throat" value="1">
                                        <label class="form-check-label" for="Sore_throat">
                                            เจ็บคอ
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Sore_throat").checked = <?php echo $row_clinic["Sore_throat"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Cough" name="Cough" value="1">
                                        <label class="form-check-label" for="Cough">
                                            ไอ
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Cough").checked = <?php echo $row_clinic["Cough"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Snot" name="Snot" value="1">
                                        <label class="form-check-label" for="Snot">
                                            มีน้ำมูก
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Snot").checked = <?php echo $row_clinic["Snot"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Phlegm" name="Phlegm" value="1">
                                        <label class="form-check-label" for="Phlegm">
                                            มีเสมหะ
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Phlegm").checked = <?php echo $row_clinic["Phlegm"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Difficult_breathing" name="Difficult_breathing" value="1">
                                        <label class="form-check-label" for="Difficult_breathing">
                                            หายใจลำบาก
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Difficult_breathing").checked = <?php echo $row_clinic["Difficult_breathing"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Headache" name="Headache" value="1">
                                        <label class="form-check-label" for="Headache">
                                            ปวดศรีษะ
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Headache").checked = <?php echo $row_clinic["Headache"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Liquid" name="Liquid" value="1">
                                        <label class="form-check-label" for="Liquid">
                                            ถ่ายเหลว
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Liquid").checked = <?php echo $row_clinic["Liquid"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Not_smell" name="Not_smell" value="1">
                                        <label class="form-check-label" for="Not_smell">
                                            จมูกไม่ได้กลิ่น
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Not_smell").checked = <?php echo $row_clinic["Not_smell"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Unflavored" name="Unflavored" value="1">
                                        <label class="form-check-label" for="Unflavored">
                                            ลิ้นไม่รับรส
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Unflavored").checked = <?php echo $row_clinic["Unflavored"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Conjunctivitis" name="Conjunctivitis" value="1">
                                        <label class="form-check-label" for="Conjunctivitis">
                                            ตาแดง
                                        </label>
                                    </div>
                                    <script>
                                        document.getElementById("Conjunctivitis").checked = <?php echo $row_clinic["Conjunctivitis"]; ?>;
                                    </script>
                                    <div class="form-check col-lg-12">
                                        <input class="form-check-input" type="checkbox" id="rash" name="rash" value="1" onclick="myRash()">
                                        <label class="form-check-label" for="rash" onclick="myRash()">
                                            ผื่น ตำแหน่ง
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text1" style="display : none">
                                        <input type="text" class="form-control" value="<?php echo $row_rash['Position_Rash1']; ?>" id="Position_Rash1" name="Position_Rash1" placeholder="ตำแหน่ง 1">
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text2" style="display : none">
                                        <input type="text" class="form-control" value="<?php echo $row_rash['Position_Rash2']; ?>" id="Position_Rash2" name="Position_Rash2" placeholder="ตำแหน่ง 2">
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text3" style="display : none">
                                        <input type="text" class="form-control" value="<?php echo $row_rash['Position_Rash3']; ?>" id="Position_Rash3" name="Position_Rash3" placeholder="ตำแหน่ง 3">
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text4" style="display : none">
                                        <input type="text" class="form-control" value="<?php echo $row_rash['Position_Rash4']; ?>" id="Position_Rash4" name="Position_Rash4" placeholder="ตำแหน่ง 4">
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text5" style="display : none">
                                        <input type="text" class="form-control" value="<?php echo $row_rash['Position_Rash5']; ?>" id="Position_Rash5" name="Position_Rash5" placeholder="ตำแหน่ง 5">
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text6" style="display : none">
                                        <input type="text" class="form-control" value="<?php echo $row_rash['Position_Rash6']; ?>" id="Position_Rash6" name="Position_Rash6" placeholder="ตำแหน่ง 6">
                                    </div>
                                    <script>
                                        document.getElementById("rash").checked = <?php echo $row_clinic["Rash"]; ?>;
                                        if (document.getElementById("rash").checked) {
                                            document.getElementById("text1").style.display = "block";
                                            document.getElementById("text2").style.display = "block";
                                            document.getElementById("text3").style.display = "block";
                                            document.getElementById("text4").style.display = "block";
                                            document.getElementById("text5").style.display = "block";
                                            document.getElementById("text6").style.display = "block";
                                        } else {
                                            document.getElementById("text1").style.display = "none";
                                            document.getElementById("text2").style.display = "none";
                                            document.getElementById("text3").style.display = "none";
                                            document.getElementById("text4").style.display = "none";
                                            document.getElementById("text5").style.display = "none";
                                            document.getElementById("text6").style.display = "none";
                                        }
                                    </script>
                                    <div class="form-check form-check-inline col-lg-12">
                                        <input class="form-check-input" type="checkbox" id="Orther" value="1">
                                        <label class="form-check-label" for="Orther">อื่นๆ ระบุ</label>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="text" class="form-control" value="<?php echo $row_clinic["Orther"]; ?>" name="Orther" placeholder="ระบุ">
                                    </div>
                                    <script>
                                        <?php if ($row_clinic['Orther'] != "") { ?>
                                            document.getElementById("Orther").checked = 1;
                                        <?php } else { ?>
                                            document.getElementById("Orther").checked = 0;
                                        <?php } ?>
                                    </script>
                                </div>

                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label class="form-control-label">เอกซเรย์ปอด(ครั้งแรก)</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Xrey_decision" id="Xrey_No" value="0" onclick="close_data()">
                                        <label class="form-check-label" for="Xrey_No" onclick="close_data()">ไม่ได้ทำ</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Xrey_decision" id="Xrey_Yes" value="1" onclick="show_data()">
                                        <label class="form-check-label" for="Xrey_Yes" onclick="show_data()">ทำ</label>
                                    </div>
                                </div>
                               
                                <div class="form-group col-lg-6" id="hide" style="display : none">
                                    <div class="form-group">
                                        <label class="form-control-label">เมื่อวันที่</label>
                                        <input type="date" value="<?php echo $row_xray['Xrey_Date']; ?>" id="Xrey_Date" class="form-control" name="Xrey_Date">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">ระบุผลการ X-Rey</label>
                                        <input type="text" value="<?php echo $row_xray['Xrey_Result']; ?>" class="form-control" id="Xrey_Result" name="Xrey_Result" placeholder="ระบุผล">
                                    </div>
                                </div>
                                <script>
                                    document.getElementById("Xrey_No").checked = <?php echo $row_xray["Xrey_No"]; ?>;
                                    document.getElementById("Xrey_Yes").checked = <?php echo $row_xray["Xrey_Yes"]; ?>;
                                    if (document.getElementById("Xrey_Yes").checked) {
                                        document.getElementById("hide").style.display = "block";
                                    } else {
                                        document.getElementById("hide").style.display = "none";
                                    }
                                </script>


                                <div class="form-group col-lg-9"></div>

                                <div class="form-check col-lg-6 ml-3">
                                    <input class="form-check-input" type="checkbox" id="Order_of_CBC" name="Order_of_CBC" value="1" onclick="myCBC()">
                                    <label class="form-check-label" for="Order_of_CBC" onclick="myCBC()">
                                        CBC ครั้งแรก
                                    </label>
                                </div>
                                <div class="form-group col-lg-6" id="cbc" style="display : none">
                                    <label for="CBC_Date">วันที่(วัน/เดือน/ปี)</label>
                                    <input type="date" value="<?php echo $row_cbc['CBC_Date']; ?>" class="form-control" id="CBC_Date" name="CBC_Date">
                                    <small id="emailHelp" class="form-text text-muted">วันที่ CBC</small>
                                </div>
                                <script>
                                    document.getElementById("Order_of_CBC").checked = <?php echo $row_cbc["Order_of_CBC"]; ?>;
                                    if (document.getElementById("Order_of_CBC").checked) {
                                        document.getElementById("cbc").style.display = "block";
                                    } else {
                                        document.getElementById("cbc").style.display = "none";
                                    }
                                </script>

                                <div class="form-group col-lg-12"></div>

                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า Hb</label>
                                    <input type="text" value="<?php echo $row_cbc['CBC_Hb']; ?>" id="CBC_Hb" name="CBC_Hb" class="form-control" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า Hct</label>
                                    <input type="text" value="<?php echo $row_cbc['CBC_Hct']; ?>" id="CBC_Hct" name="CBC_Hct" class="form-control" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า Platelet count</label>
                                    <input type="text" value="<?php echo $row_cbc['CBC_Platelet_Count']; ?>" id="CBC_Platelet_Count" name="CBC_Platelet_Count" class="form-control" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า WBC</label>
                                    <input type="text" value="<?php echo $row_cbc['WBC']; ?>" id="WBC" name="WBC" class="form-control" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า N%</label>
                                    <input type="text" value="<?php echo $row_cbc['WBC_N']; ?>" id="WBC_N" name="WBC_N" class="form-control" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า L%</label>
                                    <input type="text" value="<?php echo $row_cbc['WBC_L']; ?>" id="WBC_L" name="WBC_L" class="form-control" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า Atyp Lymph %</label>
                                    <input type="text" value="<?php echo $row_cbc['WBC_Atyp_Lymph']; ?>" id="WBC_Atyp_Lymph" name="WBC_Atyp_Lymph" class="form-control" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า Mono %</label>
                                    <input type="text" value="<?php echo $row_cbc['WBC_Mono']; ?>" id="WBC_Mono" name="WBC_Mono" class="form-control" >
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่าอื่น ๆ</label>
                                    <input type="text" value="<?php echo $row_cbc['WBC_Orther']; ?>" id="WBC_Orther" name="WBC_Orther" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="form-group col-lg-12">
                            <label class="form-control-label">ผลการตรวจ Influenzatest วิธีการตรวจ</label>
                            <input type="text" value="<?php echo $row_Influenza_test['Method_test']; ?>" id="Method_test" name="Method_test" class="form-control" >
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Negative_test" name="Negative_test" value="1">
                                <label class="form-check-label" for="Negative_test">Negative</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Possitive_test" name="Possitive_test" value="1">
                                <label class="form-check-label" for="Possitive_test">Positive</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Flu_A" name="Flu_A" value="1">
                                <label class="form-check-label" for="Flu_A">Flu A</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Flu_B" name="Flu_B" value="1">
                                <label class="form-check-label" for="Flu_B">Flu B</label>
                            </div>
                        </div>
                        <script>
                           document.getElementById("Negative_test").checked = <?php echo $row_Influenza_test['Negative_test']; ?>;
        document.getElementById("Possitive_test").checked = <?php echo $row_Influenza_test['Possitive_test']; ?>;
        document.getElementById("Flu_A").checked = <?php echo $row_Influenza_test['Flu_A']; ?>;
        document.getElementById("Flu_B").checked = <?php echo $row_Influenza_test['Flu_B']; ?>;
                        </script>
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-4">ประเภทผู้ป่วย</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-control-label mr-3" for="input-address ">ประเภทผู้ป่วย</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="patient_type" id="Outpatient" value="out">
                                        <label class="form-check-label" for="Outpatient">ผู้ป่วยนอก</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="patient_type" id="Inpatient" value="in">
                                        <label class="form-check-label" for="Inpatient">ผู้ป่วยใน</label>
                                    </div>
                                    <script>
                                    document.getElementById("Outpatient").checked = <?php echo $row_Patient_type['Outpatient']; ?>;
                                    document.getElementById("Inpatient").checked = <?php echo $row_Patient_type['Inpatient']; ?>;
                                    </script>
                                    <br>
                                    <label class="form-check-label" for="Admit_Date">admit วันที่</label>
                                    <input type="date" value="<?php echo $row_Patient_type['Admit_Date']; ?>" id="Admit_Date" name="Admit_Date" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="form-control-label" for="input-city">การวินิจฉัยเบื้องต้น</label>
                                    <input type="text" class="form-control" value="<?php echo $row_Patient_type['Diagnosis']; ?>" name="Diagnosis" placeholder="การวินิจฉัยเบื้องต้น">
                                </div>
                           
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-outline-primary" name="submit_edit_clinic" value="อัพเดตข้อมูล">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    




<?php
} else {
?>
    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">ข้อมูลคลินิค</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="Clinic/API/backend.php?api=insert_clinic" method="POST">
                    <h6 class="heading-small text-muted mb-4">ประวัติส่วนตัว</h5>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">รหัสผู้ใช้บริการ</label>
                                    <input type="text" id="Code" name="Code" value="<?php echo $_SESSION['code']; ?>" class="form-control" placeholder="รหัสผู้ใช้บริการ" readonly>
                                </div>
                                <div class="col-lg-6">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="Start_Date_Sick">วันที่เริ่มป่วย(วัน/เดือน/ปี)</label>
                                    <input type="date" class="form-control" id="Start_Date_Sick" name="Start_Date_Sick">
                                    <small id="emailHelp" class="form-text text-muted">วันที่เริ่มป่วย เริ่มมีอาการครั้งแรก</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="Strat_Date_Treatment">วันที่เข้ารับการรักษาครั้งแรก(วัน/เดือน/ปี)</label>
                                    <input type="date" class="form-control" id="Strat_Date_Treatment" name="Strat_Date_Treatment">
                                    <small id="emailHelp" class="form-text text-muted">วันที่เริ่มป่วย เริ่มมมมีอาการครั้งแรก</small>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ชื่อสถานพยาบาลเข้ารับการรักษาครั้งแรก</label>
                                    <input type="text" id="First_Hospital" name="First_Hospital" class="form-control" placeholder="ชื่อ สถานพยาบาล">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">จังหวัด</label>
                                    <select class="form-control" id="FH_Province" name="FH_Province" aria-label="Default select example">
 
                                        <option selected hidden>เลือกจังหวัด</option>
                                        <?php $sql_province = "SELECT * FROM provinces";
                                        $result_province = $conn->query($sql_province);
                                        while($row_province = $result_province->fetch_assoc()){?>
                                            <option value="<?php echo $row_province['name_th']; ?>"><?php echo $row_province['name_th']; ?></option>
                                        <?php }
                                            $row_province = $result_province->fetch_assoc();
                                      
                                         ?>       
                                        
                                        
                                    </select>
                                    
                                
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ชื่อสถานพยาบาลเข้ารับการรักษาในปัจจุบัน</label>
                                    <input type="text" id="Present_Hospital" name="Present_Hospital" class="form-control" placeholder="ชื่อสถานพยาบาลในปัจจุบัน">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">จังหวัด</label>
                                    <select class="form-control" id="PH_Province" name="PH_Province" aria-label="Default select example">
                                        <option selected hidden>เลือกจังหวัด</option>
                                        <?php $sql_province = "SELECT * FROM provinces";
                                        $result_province = $conn->query($sql_province);
                                        while($row_province = $result_province->fetch_assoc()){?>
                                            <option value="<?php echo $row_province['name_th']; ?>"><?php echo $row_province['name_th']; ?></option>
                                        <?php }
                                            $row_province = $result_province->fetch_assoc();
                                      
                                         ?>           
                                    </select>
                                </div>
                                <div class="form-check col-lg-6 ml-3">
                                    <input class="form-check-input" type="checkbox" id="Fever" name="Fever" value="1">
                                    <label class="form-check-label" for="Fever">
                                        ไข้
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">อุณหภูมิแรกรับ</label>
                                        <input type="text" id="Temperature" name="Temperature" class="form-control" placeholder="°C">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">O<sub>2</sub> Sat</label>
                                        <input type="text" id="O2Sat" name="O2Sat" class="form-control" placeholder="%">
                                    </div>
                                </div>
                                <div class="row col-lg-12 form-group ml-2">
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Ventilator" name="Ventilator" value="1">
                                        <label class="form-check-label" for="Ventilator">
                                            ใส่เครื่องช่วยหายใจ
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Muscle_pain" name="Muscle_pain" value="1">
                                        <label class="form-check-label" for="Muscle_pain">
                                            ปวดกล้ามเนื้อ
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Sore_throat" name="Sore_throat" value="1">
                                        <label class="form-check-label" for="Sore_throat">
                                            เจ็บคอ
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Cough" name="Cough" value="1">
                                        <label class="form-check-label" for="Cough">
                                            ไอ
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Snot" name="Snot" value="1">
                                        <label class="form-check-label" for="Snot">
                                            มีน้ำมูก
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Phlegm" name="Phlegm" value="1">
                                        <label class="form-check-label" for="Phlegm">
                                            มีเสมหะ
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Difficult_breathing" name="Difficult_breathing" value="1">
                                        <label class="form-check-label" for="Difficult_breathing">
                                            หายใจลำบาก
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Headache" name="Headache" value="1">
                                        <label class="form-check-label" for="Headache">
                                            ปวดศรีษะ
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Liquid" name="Liquid" value="1">
                                        <label class="form-check-label" for="Liquid">
                                            ถ่ายเหลว
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Not_smell" name="Not_smell" value="1">
                                        <label class="form-check-label" for="Not_smell">
                                            จมูกไม่ได้กลิ่น
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Unflavored" name="Unflavored" value="1">
                                        <label class="form-check-label" for="Unflavored">
                                            ลิ้นไม่รับรส
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-2">
                                        <input class="form-check-input" type="checkbox" id="Conjunctivitis" name="Conjunctivitis" value="1">
                                        <label class="form-check-label" for="Conjunctivitis">
                                            ตาแดง
                                        </label>
                                    </div>
                                    <div class="form-check col-lg-12">
                                        <input class="form-check-input" type="checkbox" id="rash" name="rash" value="1" onclick="myRash()">
                                        <label class="form-check-label" for="rash">
                                            ผื่น ตำแหน่ง
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text1" style="display : none">
                                        <input type="text" class="form-control" id="Position_Rash1" name="Position_Rash1" placeholder="ตำแหน่ง 1">
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text2" style="display : none">
                                        <input type="text" class="form-control" id="Position_Rash2" name="Position_Rash2" placeholder="ตำแหน่ง 2">
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text3" style="display : none">
                                        <input type="text" class="form-control" id="Position_Rash3" name="Position_Rash3" placeholder="ตำแหน่ง 3">
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text4" style="display : none">
                                        <input type="text" class="form-control" id="Position_Rash4" name="Position_Rash4" placeholder="ตำแหน่ง 4">
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text5" style="display : none">
                                        <input type="text" class="form-control" id="Position_Rash5" name="Position_Rash5" placeholder="ตำแหน่ง 5">
                                    </div>
                                    <div class="form-group col-lg-2 my-3" id="text6" style="display : none">
                                        <input type="text" class="form-control" id="Position_Rash6" name="Position_Rash6" placeholder="ตำแหน่ง 6">
                                    </div>

                                    <div class="form-check form-check-inline col-lg-12">
                                        <input class="form-check-input" type="checkbox" id="Orther" value="1" onclick="myFunction2()">
                                        <label class="form-check-label" for="Orther" onclick="myFunction2()">อื่นๆ ระบุ</label>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="text" class="form-control" name="Orther" placeholder="ระบุ">
                                    </div>

                                </div>

                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label class="form-control-label">เอกซเรย์ปอด(ครั้งแรก)</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Xrey_decision" id="Xrey_No" value="0" onclick="close_data1()">
                                        <label class="form-check-label" for="Xrey_No" onclick="close_data()">ไม่ได้ทำ</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Xrey_decision" id="Xrey_Yes" value="1" onclick="show_data1()">
                                        <label class="form-check-label" for="Xrey_Yes" onclick="show_data()">ทำ</label>
                                    </div>
                                </div>
                                <div class="form-group col-lg-9" id="hide" style="display : none">
                                    <div class="form-group">
                                        <label class="form-control-label">เมื่อวันที่</label>
                                        <input type="date" id="Xrey_Date" class="form-control" name="Xrey_Date">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">ระบุผลการ X-Rey</label>
                                        <input type="text" class="form-control" id="Xrey_Result" name="Xrey_Result" placeholder="ระบุผล">
                                    </div>
                                </div>


                                <div class="form-group col-lg-9"></div>

                                <div class="form-check col-lg-6 ml-3">
                                    <input class="form-check-input" type="checkbox" id="Order_of_CBC" name="Order_of_CBC" value="1" onclick="myCBC()">
                                    <label class="form-check-label" for="Order_of_CBC">
                                        CBC ครั้งแรก
                                    </label>
                                </div>
                                <div class="form-group col-lg-6" id="cbc" style="display : none">
                                    <label for="CBC_Date">วันที่(วัน/เดือน/ปี)</label>
                                    <input type="date" class="form-control" id="CBC_Date" name="CBC_Date">
                                    <small id="emailHelp" class="form-text text-muted">วันที่ CBC</small>
                                </div>
                                <div class="form-group col-lg-12"></div>

                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า Hb</label>
                                    <input type="text" id="CBC_Hb" name="CBC_Hb" class="form-control" placeholder="g/dL">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า Hct</label>
                                    <input type="text" id="CBC_Hct" name="CBC_Hct" class="form-control" placeholder="%">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า Platelet count</label>
                                    <input type="text" id="CBC_Platelet_Count" name="CBC_Platelet_Count" class="form-control" placeholder="x10*3">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า WBC</label>
                                    <input type="text" id="WBC" name="WBC" class="form-control" placeholder="%">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า N%</label>
                                    <input type="text" id="WBC_N" name="WBC_N" class="form-control" placeholder="%">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า L%</label>
                                    <input type="text" id="WBC_L" name="WBC_L" class="form-control" placeholder="%">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า Atyp Lymph %</label>
                                    <input type="text" id="WBC_Atyp_Lymph" name="WBC_Atyp_Lymph" class="form-control" placeholder="%">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่า Mono %</label>
                                    <input type="text" id="WBC_Mono" name="WBC_Mono" class="form-control" placeholder="%">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">ค่าอื่น ๆ</label>
                                    <input type="text" id="WBC_Orther" name="WBC_Orther" class="form-control" placeholder="%">
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="form-group col-lg-12">
                            <label class="form-control-label">ผลการตรวจ Influenzatest วิธีการตรวจ</label>
                            <input type="text" id="Method_test" name="Method_test" class="form-control" placeholder="%">
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Negative_test" name="Negative_test" value="1">
                                <label class="form-check-label" for="Negative_test">Negative</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Possitive_test" name="Possitive_test" value="1">
                                <label class="form-check-label" for="Possitive_test">Positive</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Flu_A" name="Flu_A" value="1">
                                <label class="form-check-label" for="Flu_A">Flu A</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Flu_B" name="Flu_B" value="1">
                                <label class="form-check-label" for="Flu_B">Flu B</label>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-4">ประเภทผู้ป่วย</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-control-label mr-3" for="input-address ">ประเภทผู้ป่วย</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="patient_type" id="Outpatient" value="out">
                                        <label class="form-check-label" for="Outpatient">ผู้ป่วยนอก</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="patient_type" id="Inpatient" value="in">
                                        <label class="form-check-label" for="Inpatient">ผู้ป่วยใน</label>
                                    </div>
                                    <br>
                                    <label class="form-check-label" for="Admit_Date">admit วันที่</label>
                                    <input type="date" id="Admit_Date" name="Admit_Date" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="form-control-label" for="input-city">การวินิจฉัยเบื้องต้น</label>
                                    <input type="text" class="form-control" name="Diagnosis" placeholder="การวินิจฉัยเบื้องต้น">
                                </div>
                                
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-outline-primary" name="submit_insert_clinic" value="เพิ่มข้อมูล">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>


<?php } ?>