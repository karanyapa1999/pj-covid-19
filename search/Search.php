<?php
session_start();
require('database/connection.php');
$edit = isset($_GET["edit"]) ? $_GET["edit"] : '';
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="col-xl-12 order-xl-1">
    <div class="card">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">ข้อมูลผู้สัมผัส</h3>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table id="example1" class="table table-hover align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>
                            <h4>ลำดับ</h4>
                        </th>
                        <th>
                            <h4>วันที่</h4>
                        </th>
                        <th>
                            <h4>ชื่อ-นามสกุล</h4>
                        </th>
                        <th>
                            <h4>ลักษณะการสัมผัส</h4>
                        </th>
                        <th>
                            <h4>ป่วยหรือไม่ป่วย</h4>
                        </th>
                        <th>
                            <h4>วันที่รับวัคซีน</h4>
                        </th>
                        <th>
                            <h4>จัดการ</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_Close_Person = "SELECT * FROM Close_Person WHERE Code = '" . $_SESSION["code"] . "'";
                    $result_Close_Person = $conn->query($sql_Close_Person);
                    if ($result_Close_Person->num_rows > 0) {
                        while ($row_Close_Person = $result_Close_Person->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row_Close_Person["CS_Order"]; ?></td>
                                <td><?php echo $row_Close_Person["CS_Date"]; ?></td>
                                <td><?php echo $row_Close_Person["CS_Name"]; ?></td>
                                <td><?php echo $row_Close_Person["CS_Stance"]; ?></td>
                                <td><?php echo $row_Close_Person["CS_YN_Patient"]; ?></td>
                                <td><?php echo $row_Close_Person["CS_Vaccine_Date"]; ?></td>
                                <td>
                                    <a href="?page=search&edit=<?php echo $row_Close_Person["CS_Name"]; ?>">
                                        <img src="https://img.icons8.com/dusk/30/000000/edit--v1.png" />
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo 'กรุณาเพิ่มข้อมูลแบบฟอร์มด้านล่าง';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">การค้นหาผู้สัมผัส (รายชื่อผู้สัมผัสใกล้ชิดในระยะป่วย ระบุลักษณะการสัมผัส ถ้ามีอาการป่วยกรุณาระบุอาการด้วย)</h3>
                </div>
            </div>
        </div>
        <div class="card-body" id="more2">
            <form action="search/API/backend.php?api=insert" method="POST">
                <h6 class="heading-small text-muted mb-4">ประวัติส่วนตัว</h6>
                <div class="pl-lg-4 tab_logic" id="tab_logic">
                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label class="form-control-label" for="name_lastname1">ชื่อ-สกุล</label>
                            <input type="text" id="name_lastname1" name="name_lastname1" class="form-control" placeholder="ชื่อ-สกุล" required>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="form-control-label" for="old1">อายุ</label>
                            <input type="number" id="old1" name="old1" class="form-control" min="1" max="99" maxlength="2" placeholder="อายุ" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <h5>เพศ</h5>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex1" id="ชาย1" value="ชาย">
                                <label class="form-check-label" for="ชาย1">ชาย</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex1" id="หญิง1" value="หญิง">
                                <label class="form-check-label" for="หญิง1">หญิง</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="form-control-label" for="addrass1">ที่อยู่/เบอร์โทรศัพท์</label>
                            <input type="text" id="addrass1" name="addrass1" class="form-control" placeholder="ที่อยู่/เบอร์โทรศัพท์" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="date_tush1">วันที่สัมผัส : </label><br>
                            <input type="date" id="date_tush1" name="date_tush1" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="form-control-label" for="type_tush1">ลักษณะการสัมผัส</label>
                            <input type="text" id="type_tush1" name="type_tush1" class="form-control" placeholder="ลักษณะการสัมผัส" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="form-control-label" for="sick1">ป่วย/ไม่ป่วย (กรณีป่วยระบุวันเริ่มป่วยและอาการ)</label>
                            <input type="text" id="sick1" name="sick1" class="form-control" placeholder="ป่วย/ไม่ป่วย" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="form-control-label" for="def1">การใส่อุปกรณ์ป้องกัน</label>
                            <input type="text" id="def1" name="def1" class="form-control" placeholder="การใส่อุปกรณ์ป้องกัน" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="date_vacsin1">วันที่ได้รับวัคซีนป้องกันโรค COVID-19 ครบตามเกณฑ์ : </label>
                            <input type="date" id="date_vacsin1" name="date_vacsin1" required>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <input type="text" style="display: none;" value="1" name="hide_order1">
                </div>
                <input type="submit" class="btn btn-outline-primary" value="บันทึกข้อมูล">
                <input type="button" class="btn btn-outline-primary" id="more_fields" onclick="add_fields();" value="เพิ่มข้อมูล" />
            </form>
        </div>
    </div>
</div>

<script>
    function add_fields() {
        var objTo = document.getElementsByClassName('tab_logic')[0]
        console.log(objTo);
        var more = document.createElement("div");
        info++;
        more.innerHTML =
            '<h6 class="heading-small text-muted mb-4">ข้อมูลเพิ่มเติม ชุดที่ ' + info + '</h6>' +
            '<div class="row">' +
            '<div class="col-lg-5">' +
            '<div class="form-group">' +
            '<label class="form-control-label" for="name_lastname' + info + '">' +
            'ชื่อ-สกุล' +
            '</label>' +
            '<input type="text" id="name_lastname' + info + '" name = "name_lastname' + info + '" class="form-control" placeholder="ชื่อ-สกุล" required>' +
            '</div>' +
            '</div>' +
            '<div class="col-lg-3">' +
            '<div class="form-group">' +
            '<label class="form-control-label" for="old' + info + '">' +
            'อายุ' +
            '</label>' +
            '<input type="number" id="old' + info + '" name = "old' + info + '" class="form-control" min="1" max="99"  maxlength="2" placeholder="อายุ" required>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-lg-12">' +
            '<div class="form-group">' +
            '<h5>เพศ</h5>' +
            '<div class="form-check form-check-inline">' +
            '<input class="form-check-input" type="radio" name="sex' + info + '" id="ชาย' + info + '" value="ชาย" >' +
            '<label class="form-check-label" for="ชาย' + info + '">ชาย</label>' +
            '</div>' +
            '<div class="form-check form-check-inline">' +
            '<input class="form-check-input" type="radio" name="sex' + info + '" name="sex1" id="หญิง' + info + '" value="หญิง" >' +
            '<label class="form-check-label" for="หญิง' + info + '">หญิง</label>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-lg-12">' +
            '<div class="form-group">' +
            '<label class="form-control-label" for="addrass' + info + '">ที่อยู่/เบอร์โทรศัพท์</label>' +
            '<input type="text" id="addrass' + info + '" name="addrass' + info + '" class="form-control" placeholder="ที่อยู่/เบอร์โทรศัพท์" required>' +
            '</div></div><div class="col-lg-6">' +
            '<div class="form-group"><label for="date_tush' + info + '">วันที่สัมผัส : </label>' +
            '<br><input type="date" id="date_tush' + info + '" name="date_tush' + info + '"  required>' +
            '</div></div><div class="col-lg-12">' +
            '<div class="form-group"><label class="form-control-label" for="type_tush' + info + '">' +
            'ลักษณะการสัมผัส</label><input type="text" id="type_tush' + info + '" name= "type_tush' + info + '" class="form-control" placeholder="ลักษณะการสัมผัส" required>' +
            '</div></div><div class="col-lg-12"><div class="form-group">' +
            '<label class="form-control-label" for="sick' + info + '">ป่วย/ไม่ป่วย (กรณีป่วยระบุวันเริ่มป่วยและอาการ)</label>' +
            '<input type="text" id="sick' + info + '" name="sick' + info + '" class="form-control" placeholder="ที่อยู่/เบอร์โทรศัพท์" required>' +
            '</div></div><div class="col-lg-12"><div class="form-group">' +
            '<label class="form-control-label" for="def' + info + '">การใส่อุปกรณ์ป้องกัน</label>' +
            '<input type="text" id="def' + info + '" name = "def' + info + '" class="form-control" placeholder="การใส่อุปกรณ์ป้องกัน" required>' +
            '</div></div><div class="col-lg-6"><div class="form-group">' +
            '<label for="date_vacsin' + info + '">วันที่ได้รับวัคซีนป้องกันโรค COVID-19 ครบตามเกณฑ์ : </label>' +
            '<input type="date" id="date_vacsin' + info + '" name="date_vacsin' + info + '" required>' +
            '</div></div></div><hr class="my-4" /><input type = "text" name = "hide_order" value="' + info + '" style = "display: none;">';
        objTo.appendChild(more)
        console.log(info);
    }
    if ('<?php echo $edit; ?>' != "") {
        console.log("wert");
        $('document').ready(function() {
            $('#edit_modal').modal('show');
        })
    } else {
        console.log("else");
    }
</script>

<?php
$sql_edit = "SELECT * FROM Close_Person WHERE CS_Name = '" . $edit . "'";
$result_edit = $conn->query($sql_edit);
$row_edit = $result_edit->fetch_assoc();
if ($row_edit["CS_Sex"] == "ชาย") {
    $sex_man = 1;
    $sex_girl = 0;
} else {
    $sex_man = 0;
    $sex_girl = 1;
}
?>
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขของคุณ : <?php echo $edit; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="search/API/backend.php?api=edit&order=<?php echo $row_edit["CS_Order"]; ?>" method="POST">
                <div class="modal-body">
                    <div class="pl-lg-4 tab_logic" id="tab_logic">
                        <div class="row">
                            <div class="form-group col-lg-5">
                                <label class="form-control-label" for="name_lastname1">ชื่อ-สกุล</label>
                                <input type="text" value="<?php echo $row_edit["CS_Name"]; ?>" id="name_lastname1" name="name_lastname1" class="form-control" placeholder="ชื่อ-สกุล" required>
                            </div>
                            <div class="form-group col-lg-3">
                                <label class="form-control-label" for="old1">อายุ</label>
                                <input type="number" id="old1" value="<?php echo $row_edit["CS_Age"]; ?>" name="old1" class="form-control" min="1" max="99" maxlength="2" placeholder="อายุ" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <h5>เพศ</h5>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex1" id="ชาย_edit" value="ชาย">
                                    <label class="form-check-label" for="ชาย_edit">ชาย</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex1" id="หญิง_edit" value="หญิง">
                                    <label class="form-check-label" for="หญิง_edit">หญิง</label>
                                </div>
                            </div>
                            <script>
                                document.getElementById("ชาย_edit").checked = <?php echo $sex_man; ?>;
                                document.getElementById("หญิง_edit").checked = <?php echo $sex_girl; ?>;
                            </script>
                            <div class="form-group col-lg-12">
                                <label class="form-control-label" for="addrass1">ที่อยู่/เบอร์โทรศัพท์</label>
                                <input type="text" id="addrass1" value="<?php echo $row_edit["CS_Address"]; ?>" name="addrass1" class="form-control" placeholder="ที่อยู่/เบอร์โทรศัพท์" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="date_tush1">วันที่สัมผัส : </label><br>
                                <input type="date" id="date_tush1" value="<?php echo $row_edit["CS_Date"]; ?>" name="date_tush1" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-control-label" for="type_tush1">ลักษณะการสัมผัส</label>
                                <input type="text" id="type_tush1" value="<?php echo $row_edit["CS_Stance"]; ?>" name="type_tush1" class="form-control" placeholder="ลักษณะการสัมผัส" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-control-label" for="sick1">ป่วย/ไม่ป่วย (กรณีป่วยระบุวันเริ่มป่วยและอาการ)</label>
                                <input type="text" id="sick1" value="<?php echo $row_edit["CS_YN_Patient"]; ?>" name="sick1" class="form-control" placeholder="ที่อยู่/เบอร์โทรศัพท์" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-control-label" for="def1">การใส่อุปกรณ์ป้องกัน</label>
                                <input type="text" id="def1" value="<?php echo $row_edit["CS_Protected"]; ?>" name="def1" class="form-control" placeholder="การใส่อุปกรณ์ป้องกัน" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="date_vacsin1">วันที่ได้รับวัคซีนป้องกันโรค COVID-19 ครบตามเกณฑ์ : </label>
                                <input type="date" id="date_vacsin1" value="<?php echo $row_edit["CS_Vaccine_Date"]; ?>" name="date_vacsin1" required>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <input type="text" style="display: none;" value="<?php echo $row_edit["CS_Order"]; ?>" name="hide_order1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>