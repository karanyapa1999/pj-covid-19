<?php

session_start();

require_once "database/connection.php";

if (isset($_POST['submit'])) {

  $username = $_POST['Username'];
  $password = $_POST['password'];
  $repass = $_POST['Confrim_password'];

  $firstname = $_POST['Name'];
  $lastname = $_POST['Lastname'];
  $Phone = $_POST['Phone'];
  $Type = $_POST['Type'];

  $user_check = "SELECT * FROM Login WHERE Username = '$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check);
  $user = mysqli_fetch_assoc($result);



  if ($user['Username'] == $username) {

    echo "<script>alert('ชื่อผู้งานนี้ มีผู้ใช้งานแล้ว');</script>";
  } else {
    if ($password != $repass) {

      echo "<script>alert('รหัสผ่านทั้ง 2 ช่องไม่ตรงกัน');</script>";
    } else {



      $passwordenc = md5($password);

      $query = "INSERT INTO Login (Username,password,Name,Lastname,Phone,Type)
                        VALUE ('$username','$passwordenc','$firstname','$lastname','$Phone','$Type')";
      $result = mysqli_query($conn, $query);

      if ($result) {
        $_SESSION['success'] = "Register successfully.";

        header("Location: Admin");
      } else {
        $_SESSION['error'] = "Register not successfully";
        header("Location: register.php");
      }
    }
  }
}





?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Covid-19</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- create -->
  <link rel="stylesheet" href="Themes/main.css">
  <!-- create js -->
  <script src="js/main.js"></script>
</head>

<body>
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="dashboard.html">

      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.html">
                <img src="../assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>

        <hr class="d-lg-none" />

      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" style="background-color : #c9e5f9a6">

    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
    
              <div class="card-body px-lg-5 py-lg-5">
              <a href= "Admin/">กลับ</a>
                <div class="text-centbmuted mb-4 text-center">
               
                  <big>สมัครสมาชิก </big>
                </div>
                <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="register">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Username</label>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Username" type="text" name="Username" id="Username">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Password</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <label class="form-control-label" for="input-country"></label>
                      <input class="form-control" placeholder="รหัสผ่าน" type="password" name="password" id="password">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">ยืนยันรหัสผ่าน</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="ยืนยันรหัสผ่าน" type="password" name="Confrim_password" id="Confrim_password">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">ชื่อ</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="ชื่อ" type="text" name="Name" id="Name">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">นามสกุล</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="นามสกุล" type="text" name="Lastname" id="Lastname">
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">เบอร์โทรศัพท์</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="เบอร์โทรศัพท์" type="text" name="Phone" id="Phone">
                    </div>
                  </div>

          
                  <div class="col-lg-12">
                  <div class="form-group">
                                    <label class="form-control-label">ประภทผู้ใช้งาน</label>
                                    
                                    <select class="form-control" id="Type" name="Type" aria-label="Default select example">
 
                                        <option selected hidden>เลือกประเภท</option>
  
                                            <option value="1">SAT</option>
                                            <option value="2">Operation</option>
                                      
                                        
                                    </select>
                                    
                                </div>
                                </div>
                 
                  <div class="text-center">
                    <input type="submit" class="btn btn-primary my-4" name="submit" value="ยืนยัน">
                  </div>

                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="py-5" id="footer-main">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2021 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Com-sci CRU</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">จัดทำโดย วิทยาการคอมพิวเตอร์ มหาวิทยาลัยราชภัฏจันทรเกษม</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="assets/js/argon.js?v=1.2.0"></script>
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- script php -->
    <?php include('Api_provinces/script.php'); ?>
</body>

</html>