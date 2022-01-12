<?php session_start();
require('database/connection.php');
$code = $_SESSION["code"];
$no = $_SESSION['no'];
$sql = "SELECT * FROM `Login` WHERE No = '" . $no . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


?>

<div class="row">
    <div class="col-xl-12 order-xl-1">
        <div class="card">
           
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">แก้ไข้การเข้าสู่ระบบ</h3>
                    </div>
                </div>
                
            
                    <form action="change_user/API/backend.php?api=edit_user" method="POST">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="Refer">Username</label>
                                        <input type="text" id="Username" name="Username" value="<?php echo $row['Username']; ?>" class=" form-control" placeholder="ชื่อผู้ใช้งาน" >
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="per_report">Password ใหม่</label>
                                        <input type="text" id="password" name="password" class=" form-control"  placeholder="รหัสผ่าน">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="per_con">Re-Password</label>
                                        <input type="text" id="Re_Password" name="Re_Password" class=" form-control"  placeholder="ยืนยันรหัสผ่าน">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <input type="submit" class="btn btn-outline-primary" name="submit_edit_user" style="margin-left:auto;margin-right:auto;display:block;" value="ยืนยันการก้ไข">
                    </form>
                


          
            </div>
        </div>
    </div>
</div>


