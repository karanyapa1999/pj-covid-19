<?php session_start();
require('database/connection.php');
$code = $_SESSION["code"];
$sql = "SELECT Code FROM `History_of_Risk` WHERE Code = '" . $code . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


if ($result->num_rows > 0) {
    $sql_show = "SELECT * FROM `History_of_Risk` WHERE Code = '" . $code . "'";
    $result_show = $conn->query($sql_show);
    $row_show = $result_show->fetch_assoc();
?>

    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">ประวัติเสี่ยง</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#!" class="btn btn-sm btn-primary">ตั่งค่า</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="History/API/backend.php?api=edit_history" method="POST">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Living_Risk_Area" value="1" id="myCheck1" onclick="myFunction1()">
                                        <label class="form-control-label" for="myCheck1">ช่วง 14 วันก่อนป่วยอาศัยอยู่หรือเดินทางมาจากพื้นที่ที่มีการระบาด</label>
                                    </div>
                                    <div class="form-check form-check-inline" id="Yes1" style="display : none">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="City_Risk_Area">ระบุเมือง</label>
                                                <input type="text" class="form-control" id="City_Risk_Area" value="<?php echo $row_show["City_Risk_Area"]; ?>" name="City_Risk_Area" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Country_Risk_Area">ประเทศ</label>
                                                <input type="text" class="form-control" id="Country_Risk_Area" value="<?php echo $row_show["Country_Risk_Area"]; ?>" name="Country_Risk_Area" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Date_in_Thailand">เดินทางเข้าประเทศไทยวันที่</label>
                                                <input type="text" class="form-control" id="Date_in_Thailand" name="Date_in_Thailand" value="<?php echo $row_show["Date_in_Thailand"]; ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Airliner">โดยสายการบิน</label>
                                                <input type="text" class="form-control" id="Airliner" name="Airliner" value="<?php echo $row_show["Airliner"]; ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Flights">เที่ยวบินที่</label>
                                                <input type="text" class="form-control" id="Flights" name="Flights" value="<?php echo $row_show["Flights"]; ?>" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    document.getElementById("myCheck1").checked = <?php echo $row_show["Living_Risk_Area"]; ?>;

                                    if (document.getElementById("myCheck1").checked) {
                                        document.getElementById("Yes1").style.display = "block";
                                    } else {
                                        document.getElementById("Yes1").style.display = "none";
                                    }
                                </script>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="Treat_or_Visit" id="yes4">
                                        <label class="form-control-label" for="yes4">ช่วง 14 วันก่อนป่วยได้เข้ารับการรักษาหรือเยี่ยมผู้ป่วยในโรงพยาบาลของพื้นที่ที่มีการระบาด</label>
                                    </div>
                                </div>
                                <script>
                                    document.getElementById("yes4").checked = <?php echo $row_show["Treat_or_Visit"]; ?>;
                                </script>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Contact_Patient" value="1" id="myCheck2" onclick="myFunction2()">
                                        <label class="form-control-label" for="myCheck2">ช่วง 14 วันก่อนป่วยมีประวัติสัมผัสกับผู้ป่วยยืนยันโรคติดเชื้อไวรัสโคโรนา 2019 </label>
                                    </div>

                                    <div class="form-check form-check-inline" id="Yes2" style="display : none">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Patient_Name">ชื่อผู้ป่วย</label>
                                                <textarea name="Patient_Name" id="Patient_Name" placeholder="Description" class="form-control"><?php echo $row_show["Patient_Name"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    document.getElementById("myCheck2").checked = <?php echo $row_show["Contact_Patient"]; ?>;
                                    if (document.getElementById("myCheck2").checked) {
                                        document.getElementById("Yes2").style.display = "block";
                                    } else {
                                        document.getElementById("Yes2").style.display = "none";
                                    }
                                </script>


                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Career_Contact" value="1" id="yes6">
                                        <label class="form-control-label" for="yes6">ช่วง 14 วันก่อนป่วยประกอบอาชีพที่สัมผัสใกล้ชิดกับนักท่องเที่ยวต่างชาติหรือแรงงานต่างชาติ</label>
                                    </div>
                                </div>

                                <script>
                                    document.getElementById("yes6").checked = <?php echo $row_show["Career_Contact"]; ?>;
                                </script>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Risk_area" value="1" id="myCheck" onclick="myFunction()">
                                        <label class="form-control-label" for="myCheck">ช่วง 14 วันก่อนป่วยมีประวัติเดินทางไปในสถานที่ที่มีคนหนาแน่น เช่น ผับ สนามมวย</label>
                                    </div>
                                    <div class="form-check form-check-inline" id="Yes" style="display : none">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Area_Name">ชื่อสถานที่</label>
                                                <textarea name="Area_Name" id="Area_Name" placeholder="Description" class="form-control"><?php echo $row_show["Area_Name"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    document.getElementById("myCheck").checked = <?php echo $row_show["Risk_area"]; ?>;
                                    if (document.getElementById("myCheck").checked) {
                                        document.getElementById("Yes").style.display = "block";
                                    } else {
                                        document.getElementById("Yes").style.display = "none";
                                    }
                                </script>

                                <div class="form-group">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Pneumonia" value="1" id="yes7">
                                        <label class="form-control-label" for="yes7">เป็นผู้ป่วยอาการทางเดินหายใจหรือปอดอักเสบเป็นกลุ่มก้อน</label>
                                    </div>
                                </div>
                                <script>
                                    document.getElementById("yes7").checked = <?php echo $row_show["Pneumonia"]; ?>;
                                </script>

                                <div class="form-group">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Pneumonia_Severity" value="1" id="yes8">
                                        <label class="form-control-label" for="yes8">เป็นผู้ป่วยปอดอักเสบรุนแรงหรือเสียชีวิตที่หาสาเหตุไม่ได้</label>
                                    </div>
                                </div>
                                <script>
                                    document.getElementById("yes8").checked = <?php echo $row_show["Pneumonia_Severity"]; ?>;
                                </script>

                                <div class="form-group">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Medical_personel" value="1" id="yes9">
                                        <label class="form-control-label" for="yes9">เป็นบุคลากรทางการแพทย์และสาธารณสุขหรือเจ้าหน้าที่ห้องปฎิบัติการ</label>
                                    </div>
                                </div>
                                <script>
                                    document.getElementById("yes9").checked = <?php echo $row_show["Medical_personel"]; ?>;
                                </script>

                                <div class="form-group">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name= "tikOther" value = "1" id="myCheck3" onclick="myFunction3()">
                                        <label class="form-control-label" for="myCheck3">อื่น ๆ</label>
                                    </div>
                                    <div class="form-check form-check-inline" id="Yes3" style="display : none">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Other_Risk">ระบุ</label>
                                                <textarea name="Other_Risk" id="Other_Risk" placeholder="Description" class="form-control"><?php echo $row_show["Other_Risk"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        <?php if ($row_show["Other_Risk"] != "") { ?>
                                            document.getElementById("myCheck3").checked = "1";
                                        <?php  } ?>


                                        if (document.getElementById("myCheck3").checked) {
                                            document.getElementById("Yes3").style.display = "block";
                                        } else {
                                            document.getElementById("Yes3").style.display = "none";
                                        }
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-outline-primary" name="submit_insert_general" style="margin-left:auto;margin-right:auto;display:block;" value="บันทึกข้อมูล">
                </form>
            </div>
        </div>
    </div>




<?php } else { ?>




    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">ประวัติเสี่ยง</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#!" class="btn btn-sm btn-primary">ตั่งค่า</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="History/API/backend.php?api=insert_history" method="POST">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Living_Risk_Area" value="1" id="myCheck1" onclick="myFunction1()">
                                        <label class="form-control-label" for="myCheck1">ช่วง 14 วันก่อนป่วยอาศัยอยู่หรือเดินทางมาจากพื้นที่ที่มีการระบาด</label>
                                    </div>
                                    <div class="form-check form-check-inline" id="Yes1" style="display : none">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="City_Risk_Area">ระบุเมือง</label>
                                                <input type="text" class="form-control" id="City_Risk_Area" name="City_Risk_Area" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Country_Risk_Area">ประเทศ</label>
                                                <input type="text" class="form-control" id="Country_Risk_Area" name="Country_Risk_Area" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Date_in_Thailand">เดินทางเข้าประเทศไทยวันที่</label>
                                                <input type="text" class="form-control" id="Date_in_Thailand" name="Date_in_Thailand" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Airliner">โดยสายการบิน</label>
                                                <input type="text" class="form-control" id="Airliner" name="Airliner" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Flights">เที่ยวบินที่</label>
                                                <input type="text" class="form-control" id="Flights" name="Flights" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="Treat_or_Visit" id="yes4">
                                        <label class="form-control-label" for="yes4">ช่วง 14 วันก่อนป่วยได้เข้ารับการรักษาหรือเยี่ยมผู้ป่วยในโรงพยาบาลของพื้นที่ที่มีการระบาด</label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Contact_Patient" value="1" id="myCheck2" onclick="myFunction2()">
                                        <label class="form-control-label" for="myCheck2">ช่วง 14 วันก่อนป่วยมีประวัติสัมผัสกับผู้ป่วยยืนยันโรคติดเชื้อไวรัสโคโรนา 2019 </label>
                                    </div>

                                    <div class="form-check form-check-inline" id="Yes2" style="display : none">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Patient_Name">ชื่อผู้ป่วย</label>
                                                <textarea name="Patient_Name" id="Patient_Name" placeholder="Description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Career_Contact" value="1" id="yes6">
                                        <label class="form-control-label" for="yes6">ช่วง 14 วันก่อนป่วยประกอบอาชีพที่สัมผัสใกล้ชิดกับนักท่องเที่ยวต่างชาติหรือแรงงานต่างชาติ</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Risk_area" value="1" id="myCheck" onclick="myFunction()">
                                        <label class="form-control-label" for="myCheck">ช่วง 14 วันก่อนป่วยมีประวัติเดินทางไปในสถานที่ที่มีคนหนาแน่น เช่น ผับ สนามมวย</label>
                                    </div>
                                    <div class="form-check form-check-inline" id="Yes" style="display : none">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Area_Name">ชื่อสถานที่</label>
                                                <textarea name="Area_Name" id="Area_Name" placeholder="Description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Pneumonia" value="1" id="yes7">
                                        <label class="form-control-label" for="yes7">เป็นผู้ป่วยอาการทางเดินหายใจหรือปอดอักเสบเป็นกลุ่มก้อน</label>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Pneumonia_Severity" value="1" id="yes8">
                                        <label class="form-control-label" for="yes8">เป็นผู้ป่วยปอดอักเสบรุนแรงหรือเสียชีวิตที่หาสาเหตุไม่ได้</label>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Medical_personel" value="1" id="yes9">
                                        <label class="form-control-label" for="yes9">เป็นบุคลากรทางการแพทย์และสาธารณสุขหรือเจ้าหน้าที่ห้องปฎิบัติการ</label>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="myCheck3" onclick="myFunction3()">
                                        <label class="form-control-label" for="myCheck3">อื่น ๆ</label>
                                    </div>
                                    <div class="form-check form-check-inline" id="Yes3" style="display : none">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="Other_Risk">ระบุ</label>
                                                <textarea name="Other_Risk" id="Other_Risk" placeholder="Description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-outline-primary" name="submit_insert_general" style="margin-left:auto;margin-right:auto;display:block;" value="บันทึกข้อมูล">
                </form>
            </div>
        </div>
    </div>


<?php } ?>