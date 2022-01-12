<?php
session_start();
include("../database/connection.php");
$sNo = isset($_GET["no"]) ? $_GET["no"] : '';
$sql = "SELECT * FROM `Career` WHERE No = '" . $sNo . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


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
             
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">

<?php 

if($sNo != ""){?>
<div class = "row">
               <div class="col-xl-3">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">แก้ไข</h3>
                        </div>
                    </div>
                </div>
               
            
               <div class="card-body">
            <form action="API/backend.php?api=edit_Career&no=<?php echo $row['No']; ?>" method="POST">
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="Career">อาชีพ</label>
                                <input type="text" class="form-control" id="Career" value="<?php echo $row['Career']; ?>" name="Career" required>
                            </div>
                        </div>
                    </div>
                      <br>
                <input type="submit" class="btn btn-outline-primary" name="submit" style="margin-left:auto;margin-right:auto;display:block;" value="แก้ไข">
            </form>
        </div>
             
               </div>
            </div>
</div></div>
<?php } ?>




    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">ตารางอาชีพ</h3>
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
                                    <h4>อาชีพ</h4>
                                </th>
                                <th scope="col">
                                    <h4>เครื่องมือ</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <script>
                                function Del_Career(x) {
                                    var value = "API/backend.php?api=delete_Career&no=";
                                    var r = confirm("ยืนยันที่จะลบอาชีพนี้หรือไม่?");
                                    if (r == true) {
                                        location.href = value + x;
                                    } else {
                                        location.href = "/?page=dashboard3";
                                    }
                                }
                            </script>
                            <?php

                            $sql = "SELECT * FROM `Career`";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['No']; ?></td>
                                    <td><?php echo $row['Career']; ?></td>
                                   
                                    <td><a href="?page=dashboard3&no=<?php echo $row['No']; ?>"><img src="https://img.icons8.com/dusk/35/000000/edit-property.png" /></a>
                                        <a href="#" onclick="Del_Career('<?php echo $row['No']; ?>');"><img src="https://img.icons8.com/dusk/35/000000/delete-forever.png" /></a>
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

        <div class="col-xl-3">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">จัดการ</h3>
                        </div>
                    </div>
                </div>
                <div align = "center">
                <a href = "?page=Career" data-toggle="collapse" data-target="#insert_Career">
                <img src="https://img.icons8.com/cute-clipart/50/000000/add.png"/>
               เพิ่มอาชีพ
                </a>
               </div>
               <div id="insert_Career" class="collapse">
               <div class="card-body">
            <form action="API/backend.php?api=insert_Career" method="POST">
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="Career">อาชีพ</label>
                                <input type="text" class="form-control" id="Career" value="<?php echo $row['Career']; ?>" name="Career" required>
                            </div>
                        </div>
                    </div>
                      <br>
                <input type="submit" class="btn btn-outline-primary" name="submit" style="margin-left:auto;margin-right:auto;display:block;" value="เพิ่ม">
            </form>
        </div>
               </div>
            </div>
            </div>

    </div></div>

           






    </div>
</div>