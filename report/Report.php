<div class="card col-xl-12">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">ตารางรายงาน</h3>
                <form method="POST">
                    <div class="input-daterange datepicker row align-items-center">
                        <div class="col">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><img src="https://img.icons8.com/cotton/30/000000/date-to--v4.png" /></i></span>
                                    </div>
                                    <input type="date" class="form-control" placeholder="วันที่เริ่มค้นหา" type="text" name="date_start" required>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><img src="https://img.icons8.com/cotton/30/000000/date-to--v4.png" /></i></span>
                                    </div>
                                    <input type="date" class="form-control" placeholder="สิ้นสุดวันที่ค้นหา" type="text" name="date_end" required>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">ค้นหาตามวันที่</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive">
    <table>
    <tr>
    <td>
        <table id="example1"  class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>
                        <h4>ลำดับ</h4>
                    </th>
                    <th>
                        <h4>วันที่รายงาน</h4>
                    </th>
                    <th>
                        <h4>Refer</h4>
                    </th>
                    <th>
                        <h4>SAT CODE</h4>
                    </th>
                    <th>
                        <h4>บัตรประชาชน</h4>
                    </th>
                    <th>
                        <h4>ชื่อ</h4>
                    </th>
                    <th>
                        <h4>นามสกุล</h4>
                    </th>
                    <th>
                        <h4>สถานะ</h4>
                    </th>
                    <th>
                        <h4>สัญชาติ</h4>
                    </th>
                    <th>
                        <h4>เพศ</h4>
                    </th>
                    <th>
                        <h4>อายุปี</h4>
                    </th>
                    <th>
                        <h4>อายุเดือน</h4>
                    </th>
                    <th>
                        <h4>เบอร์โทรศัพท์</h4>
                    </th>
                    <th>
                        <h4>อาชีพ</h4>
                    </th>
                    <th>
                        <h4>บ้านเลขที่</h4>
                    </th>
                    <th>
                        <h4>หมู่ที่</h4>
                    </th>
                    <th>
                        <h4>หมู่บ้าน</h4>
                    </th>
                    <th>
                        <h4>ถนน</h4>
                    </th>
                    <th>
                        <h4>ซอย</h4>
                    </th>
                    <th>
                        <h4>จังหวัด</h4>
                    </th>
                    <th>
                        <h4>อำเภอ</h4>
                    </th>
                    <th>
                        <h4>ตำบล</h4>
                    </th>
                    <th>
                        <h4>รหัสไปรษณี</h4>
                    </th>
                    <th>
                        <h4>ผู้รายงาน</h4>
                    </th>
                    <th>
                        <h4>ผู้ติดต่อ</h4>
                    </th>
                    <th>
                        <h4>วันที่ Admit</h4>
                    </th>
                    <th>
                        <h4>สถานที่ Admit</h4>
                    </th>
                    <th>
                        <h4>สถานะการรักษา</h4>
                    </th>
                

                </tr>
            </thead>
            <tbody>
                <?php
                require('database/connection.php');
                $date_start = $_POST["date_start"] ?? '2018-01-01';
                $date_end = $_POST["date_end"] ?? '2077-01-01';
                $sql_general = "SELECT 
                   *
                    FROM General_Data
                    WHERE Date_report BETWEEN '" . $date_start . "' AND '" . $date_end . "'";
                $sql_Clinic = "SELECT 
                    *
                    FROM `Clinic Data`
                    ";
                $sql_Patient_status = "SELECT 
                   *
                    FROM Patient_status
                    ";

                $result_general = $conn->query($sql_general);
                $result_Clinic = $conn->query($sql_Clinic);
                $result_Patient_status = $conn->query($sql_Patient_status);
                $count = 1;
                while ($row_general = $result_general->fetch_assoc()) {
                    $row_Clinic = $result_Clinic->fetch_assoc();
                    $row_Patient_status = $result_Patient_status->fetch_assoc();
                    echo '
                    <tr>
                        <td>' . $count . '</td>
                        <td>' . $row_general["Date_report"] . '</td>
                        <td>' . $row_general["Refer"] . '</td>
                        <td>' . $row_general["Code"] . '</td>
                        <td>' . $row_general["ID_card"] . '</td>
                        <td>' . $row_general["Name"] . '</td>
                        <td>' . $row_general["LName"] . '</td>';

                       if($row_Patient_status["Wait_for_bed"] == 1){
                           echo '<td>รอเตียง</td>';
                       }else if($row_Patient_status["Healed"] == 1){
                        echo '<td>ครบ 14 วัน / หายแล้ว</td>';
                       }else if($row_Patient_status["Refuse"] == 1){
                        echo '<td>ปฏิเสธการรักษา</td>';
                       }else if($row_Patient_status["Hotel"] != ""){
                        echo '<td>'.$row_Patient_status["Hotel"].'</td>';
                       }else if($row_Patient_status["Hospital"] == 1){
                        echo '<td>'.$row_Patient_status["Hospital"].'</td>';
                       }else if($row_Patient_status["Die"] == 1){
                        echo '<td>เสียชีวิต</td>';
                       }else{
                        echo '<td>ไม่มีข้อมูล</td>';
                       }

                        echo '
                        <td>' . $row_general["Nationality"] . '</td>
                    ';
                    if ($row_general["Male"] == 1) {
                        $sex = "ชาย";
                    } else {
                        $sex = "หญิง";   
                    }
                    echo '
                        <td>' . $sex . '</td>
                        <td>' . $row_general["Age_year"] . '</td>
                        <td>' . $row_general["Age_month"] . '</td>
                        <td>' . $row_general["PhoneNo"] . '</td>
                        <td>' . $row_general["Career"] . '</td>
                        <td>' . $row_general["H_number"] . '</td>
                        <td>' . $row_general["Moo"] . '</td>
                        <td>' . $row_general["Village"] . '</td>
                        <td>' . $row_general["Side_road"] . '</td>
                        <td>' . $row_general["Road"] . '</td>
                        <td>' . $row_general["District"] . '</td>
                        <td>' . $row_general["Amphur"] . '</td>
                        <td>' . $row_general["Province"] . '</td>
                        <td>' . $row_general["Postalcode"] . '</td>
                        <td>' . $row_general["per_report"] . '</td>
                        <td>' . $row_general["per_con"] . '</td>
                        <td>' . $row_general["Date_admit"] . '</td>
                        <td>' . $row_general["Location_admit"] . '</td>
                        <td>' . $row_general["Cure"] . '</td>
                    </tr>
                    ';
                    $count++;
                }
                ?>
            </tbody>
        </table>
        </td>
        </tr>
    </table>
    </div>
</div>