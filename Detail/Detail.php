<?php
session_start();
require('database/connection.php');
?>

<div class="col-xl-12 order-xl-1">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">รายละเอียดเหตุการณ์ ประวัติเสี่ยงต่อการติดเชื้อ ก่อนเริ่มป่วยและหลังป่วย</h3>
        </div>
        <div class="col-4 text-right">
          <a href="#!" class="btn btn-sm btn-primary">ตั่งค่า</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <?php
      $sql_check = "SELECT * FROM Activity_Before_14 WHERE Code = '" . $code . "'";
      $result_check = $conn->query($sql_check);
      if ($result_check->num_rows > 0) {
        $sState = "edit_details";
      }else{
        $sState = "insert_details";
      }
      
      ?>
      <form action="Detail/API/backend.php?api=<?php echo $sState; ?>" method="POST">
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group" id="details">
                <div class="form-check form-check-inline">
                  <h1 class="text-muted mb-4">ตารางกิจกรรมและการเดินทาง 14 วันก่อนป่วย</h1>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">
                        <h3>วัน</h3>
                      </th>
                      <th scope="col">
                        <h3>วันที่</h3>
                      </th>
                      <th scope="col">
                        <h3>กิจกรรม/สถานที่</h3>
                      </th>
                      <th scope="col">
                        <h3>จำนวนผู้ร่วมกิจกรรม (ระบุบุคคล หากทำได้)</h3>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sqlAB = "SELECT * FROM Activity_Before_14 WHERE Code = '" . $code . "'";
                    $resultAB = $conn->query($sqlAB);
                    
                    $x = 1;
                    if ($resultAB->num_rows > 0) {

                        while ($rowAB = $resultAB->fetch_assoc()) { ?>
                            <tr>
                              <th scope="row"><?php echo $x; ?></th>
                              <td>
                                <input type="date" class="form-control" name="AB14_Date<?php echo $x; ?>" value="<?php echo $rowAB['AB14_Date'] ?>" placeholder="" >
                              </td>
                              <td>
                                <textarea name="AB14_Activity<?php echo $x; ?>" placeholder="กิจกรรม/สถานที่" class="form-control"><?php echo $rowAB['AB14_Activity'] ?></textarea>
                              </td>
                              <td>
                                <textarea name="AB14_Number<?php echo $x; ?>" placeholder="จำนวนผู้ร่วมกิจกรรม" class="form-control"><?php echo $rowAB['AB14_Number'] ?></textarea>
                              </td>
                              <input type="text" class="form-control" name="No<?php echo $x; ?>" value="<?php echo $rowAB['No'] ?>"  style = "display:none;" placeholder="" >
                            </tr>
                        <?php
                            $x++;
                          }
                          $rowAB = $resultAB->fetch_assoc();
                    } else {

                        for ($x = 1; $x <= 14; $x++) { ?>
                            <tr>
                              <th scope="row"><?php echo $x; ?></th>
                              <td>
                                <input type="date" class="form-control" name="AB14_Date<?php echo $x; ?>" placeholder="" max="2021-12-31">
                              </td>
                              <td>
                                <textarea name="AB14_Activity<?php echo $x; ?>" placeholder="กิจกรรม/สถานที่" class="form-control"></textarea>
                              </td>
                              <td>
                                <textarea name="AB14_Number<?php echo $x; ?>" placeholder="จำนวนผู้ร่วมกิจกรรม" class="form-control"></textarea>
                              </td>
                            </tr>
                          <?php }
                     
                    }
                    ?>



                  </tbody>
                </table>
                <div class="form-check form-check-inline">
                  <h1 class="text-muted mb-4">ตารางกิจกรรมและการเดินทาง 14 วันหลังป่วย</h1>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">
                        <h3>วัน</h3>
                      </th>
                      <th scope="col">
                        <h3>วันที่</h3>
                      </th>
                      <th scope="col">
                        <h3>กิจกรรม/สถานที่</h3>
                      </th>
                      <th scope="col">
                        <h3>จำนวนผู้ร่วมกิจกรรม (ระบุบุคคล หากทำได้)</h3>
                      </th>
                    </tr>
                  </thead>
                  <tbody>


                    <?php
                    $sqlAA = "SELECT * FROM Activity_After_14 WHERE Code = '" . $code . "'";
                    $resultAA = $conn->query($sqlAA);
                    $rowAA = $resultAA->fetch_assoc();
                    $x = 1;
                    if ($rowAA["AA14_Date"] == "" && $row["AA14_Activity"] == "" && $row["AA14_Number"] == "") {
                      for ($x = 1; $x <= 14; $x++) { ?>
                        <tr>
                          <th scope="row"><?php echo $x; ?></th>
                          <td>
                            <input type="date" class="form-control" name="AA14_Date<?php echo $x; ?>" placeholder="" >
                          </td>
                          <td>
                            <textarea name="AA14_Activity<?php echo $x; ?>" placeholder="กิจกรรม/สถานที่" class="form-control"></textarea>
                          </td>
                          <td>
                            <textarea name="AA14_Number<?php echo $x; ?>" placeholder="จำนวนผู้ร่วมกิจกรรม" class="form-control"></textarea>
                          </td>
                        </tr>
                      <?php }
                    } else {


                      while ($rowAA = $resultAA->fetch_assoc()) { ?>
                        <tr>
                          <th scope="row"><?php echo $x; ?></th>
                          <td>
                            <input type="date" class="form-control" name="AA14_Date<?php echo $x; ?>" value="<?php echo $rowAA['AA14_Date'] ?>" placeholder="" max="2021-12-31">
                          </td>
                          <td>
                            <textarea name="AA14_Activity<?php echo $x; ?>" placeholder="กิจกรรม/สถานที่" class="form-control"><?php echo $rowAA['AA14_Activity'] ?></textarea>
                          </td>
                          <td>
                            <textarea name="AA14_Number<?php echo $x; ?>" placeholder="จำนวนผู้ร่วมกิจกรรม" class="form-control"><?php echo $rowAA['AA14_Number'] ?></textarea>
                          </td>
                        </tr>
                    <?php
                        $x++;
                      }
                      $rowAA = $resultAA->fetch_assoc();
                    }
                    ?>

                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
        <input type="submit" class="btn btn-outline-primary" name="submit_insert_detail" style="margin-left:auto;margin-right:auto;display:block;" value="บันทึกข้อมูล">
      </form>
    </div>
  </div>
</div>

</div>