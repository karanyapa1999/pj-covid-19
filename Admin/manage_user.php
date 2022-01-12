<?php session_start();
require('../database/connection.php');
$sNo = isset($_GET["no"]) ? $_GET["no"] : '';
$sql = "SELECT * FROM `Login` WHERE No = '" . $sNo . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="col-xl-8 order-xl-1">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">ประวัติเสี่ยง</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="./" class="btn btn-sm btn-primary">กลับ</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="API/backend.php?api=manage_user" method="POST">
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="No">ลำดับ</label>
                                <input type="text" class="form-control" id="No" value="<?php echo $sNo; ?>" name="No" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="Username">Username</label>
                                <input type="text" class="form-control" id="Username" value="<?php echo $row["Username"]; ?>" name="Username" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="Name">ชื่อ</label>
                                <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $row["Name"]; ?>" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="Lastname">นามสกุล</label>
                                <input type="text" class="form-control" id="Lastname" name="Lastname" value="<?php echo $row["Lastname"]; ?>" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="Phone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" id="Phone" name="Phone" value="<?php echo $row["Phone"]; ?>" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php if ($row['Type'] == 1) {
                                    $sType = "SAT";
                                } else if ($row['Type'] == 2) {
                                    $sType = "Operation";
                                } else {
                                    $sType = "Admin";
                                } ?>

                                            <div class="form-group">
                                    <label class="form-control-label">แผนก</label>
                                    
                                    <select class="form-control" id="Type" name="Type" aria-label="Default select example">
 
                                        <option value = "<?php echo $row['Type']; ?>"> <?php echo $sType; ?></option>
  
                                            <option value="1">SAT</option>
                                            <option value="2">Operation</option>
                                      
                                        
                                    </select>
                                    
                                </div>
                              
                               

                  
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-outline-primary" name="submit" style="margin-left:auto;margin-right:auto;display:block;" value="แก้ไขข้อมูล">
            </form>
        </div>
    </div>
</div>