<?php session_start();
require('database/connection.php');
$sql = "SELECT Code FROM History_Vacin_Covid19 WHERE Code = '" . $code . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
    $sql_show = "SELECT * FROM `History_Vacin_Covid19` WHERE Code = '" . $code . "'";
    $result_show = $conn->query($sql_show);
    $row_show = $result_show->fetch_assoc();
?>
    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">ประวัติการได้รับวัคซีนป้องกันโรคติดเชื้อไวรัสโคโรนา 2019</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#!" class="btn btn-sm btn-primary">ตั่งค่า</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="Vaccine/API/backend.php?api=edit_vaccine" method="POST">

                    <div class="pl-lg-4">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Vaccine" id="Vaccine_never" value="option1" onclick="close_data()">
                                        <label class="form-check-label" for="Vaccine_never" onclick="close_data()">ไม่เคยได้รับ</label>
                                    </div>
                                    <script>
                                        document.getElementById("Vaccine_never").checked = <?php echo $row_show["Vaccine_never"]; ?>;
                                    </script>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Vaccine" id="Vaccine_ever" value="option2" onclick="show_data()">
                                        <label class="form-check-label" for="Vaccine_ever" onclick="show_data()">เคยได้รับ </label>
                                    </div>
                                    <script>
                                        document.getElementById("Vaccine_ever").checked = <?php echo $row_show["Vaccine_ever"]; ?>;
                                    </script>

                                    <div class="form-check form-check-inline" id="hide" style="display : none">
                                        <br>
                                        <div class="col-lg-6">
                                            <br>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">สมุดบันทึกหรือหลักฐานได้รับวัคซีนหรือไม่</label>
                                            </div>

                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio" name="Vaccine_Record_Book" id="Vaccine_Record" value="option1">
                                                <label class="form-check-label" for="Vaccine_Record"">มี</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Vaccine_Record_Book" id="Vaccine_Record_Not" value="option2">
                                                <label class="form-check-label" for="Vaccine_Record_Not">ไม่มี</label>
                                            </div>
                                        </div>
                                        <script>
                                            document.getElementById("Vaccine_Record").checked = <?php echo $row_show["Vaccine_Record"]; ?>;
                                            document.getElementById("Vaccine_Record_Not").checked = <?php echo $row_show["Vaccine_Record_Not"]; ?>;
                                        </script>
                                        <div class="col-lg-6">
                                            <br>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">ครั้งที่ 1 วันที่ได้รับ</label>
                                                <input type="date" class="form-control" id="Vaccine_1_date" name="Vaccine_1_date" value="<?php echo $row_show["Vaccine_1_date"]; ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">ชื่อวัคซีน</label>
                                                <input type="text" class="form-control" id="Vaccine_name1" name="Vaccine_name1" value="<?php echo $row_show["Vaccine_name1"]; ?>" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">สถานที่ได้รับ</label>
                                                <input type="text" class="form-control" id="Station_1" name="Station_1" value="<?php echo $row_show["Station_1"]; ?>" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">ครั้งที่ 2 วันที่ได้รับ</label>
                                                <input type="date" class="form-control" id="Vaccine_2_date" name="Vaccine_2_date" value="<?php echo $row_show["Vaccine_2_date"]; ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">ชื่อวัคซีน</label>
                                                <input type="text" class="form-control" id="Vaccine_name2" name="Vaccine_name2" value="<?php echo $row_show["Vaccine_name2"]; ?>" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">สถานที่ได้รับ</label>
                                                <input type="text" class="form-control" id="Station_2" name="Station_2" value="<?php echo $row_show["Station_2"]; ?>" placeholder="">
                                            </div>
                                        </div>


                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <input type="submit" class="btn btn-outline-primary" name="submit_insert_general" value="อัพเดตข้อมูล">
                </form>
            </div>
        </div>
    </div>

<?php  } else { ?>

    <div class="col-xl-8 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">ประวัติการได้รับวัคซีนป้องกันโรคติดเชื้อไวรัสโคโรนา 2019</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#!" class="btn btn-sm btn-primary">ตั่งค่า</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="Vaccine/API/backend.php?api=insert_vaccine" method="POST">

                    <div class="pl-lg-4">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Vaccine" id="Vaccine_never" value="option1" onclick="close_data()">
                                        <label class="form-check-label" for="Vaccine_never" onclick="close_data()">ไม่เคยได้รับ</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Vaccine" id="Vaccine_ever" value="option2" onclick="show_data()">
                                        <label class="form-check-label" for="Vaccine_ever" onclick="show_data()">เคยได้รับ </label>
                                    </div>
                                    <div class="form-check form-check-inline" id="hide" style="display : none">
                                        <br>
                                        <div class="col-lg-6">
                                            <br>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">สมุดบันทึกหรือหลักฐานได้รับวัคซีนหรือไม่</label>
                                            </div>

                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio" name="Vaccine_Record_Book" id="Vaccine_Record" value="option1">
                                                <label class="form-check-label" for="Vaccine_Record">มี</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Vaccine_Record_Book" id="Vaccine_Record_Not" value="option2">
                                                <label class="form-check-label" for="Vaccine_Record_Not">ไม่มี</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <br>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">ครั้งที่ 1 วันที่ได้รับ</label>
                                                <input type="date" class="form-control" id="Vaccine_1_date" name="Vaccine_1_date" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">ชื่อวัคซีน</label>
                                                <input type="text" class="form-control" id="Vaccine_name1" name="Vaccine_name1" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">สถานที่ได้รับ</label>
                                                <input type="text" class="form-control" id="Station_1" name="Station_1" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">ครั้งที่ 2 วันที่ได้รับ</label>
                                                <input type="date" class="form-control" id="Vaccine_2_date" name="Vaccine_2_date" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">ชื่อวัคซีน</label>
                                                <input type="text" class="form-control" id="Vaccine_name2" name="Vaccine_name2" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">สถานที่ได้รับ</label>
                                                <input type="text" class="form-control" id="Station_2" name="Station_2" placeholder="">
                                            </div>
                                        </div>


                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <input type="submit" class="btn btn-outline-primary" name="submit_insert_general" value="เพิ่มข้อมูล">
                </form>
            </div>
        </div>
    </div>
<?php } ?>