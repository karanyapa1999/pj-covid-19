<?php
session_start();
session_destroy();
if (isset($_POST['submit'])) {
  session_start();
  if (isset($_POST['username'])) {
    include('../database/connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordenc = md5($password);
    $query = "SELECT *
 FROM Login WHERE Username = '$username' AND password = '$passwordenc'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $_SESSION['no'] = $row['No'];
      $_SESSION['user'] = $row['Name'] . " " . $row['Lastname'];
      $_SESSION['username'] = $row['Username'];
      $_SESSION['Type'] = $row['Type'];
      if ($_SESSION['Type'] == 'A') {
        header("Location: ../Admin");
      }
      if ($_SESSION['Type'] == '1') {
        header("Location: ../");
      }
      if ($_SESSION['Type'] == '2') {
        header("Location: ../");
      }
    } else {
      echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
    }
  } else {
    echo "<script>alert('มีข้อผิดพลาดบางอย่างเกิดขึ้น');</script>";
    header("Location: ../");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://img.icons8.com/office/64/000000/hospital-3.png" type="image/png">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="background.scss">
  <title>login | Covid19</title>
</head>

<body>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

  <div class="overlay">
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="con"id = "Headbottom">
        <header class="head-form">
        <img width="300px" height="120px" src="../assets/img/brand/logo.png">
          <p>กรอกชื่อและรหัสผ่านที่สมัครได้เลยค่ะ</p> 
        </header>
        
        <br>
        <div class="field-set"id="text1">
          <span class="input-item">
            <i class="fa fa-user-circle"></i>
          </span>
          <input class="form-input" id="txt-input" type="text" placeholder="UserName" name="username" required>

          <br>
          <span class="input-item">
            <i class="fa fa-key"></i>
          </span>
          <input class="form-input" type="password" placeholder="Password" id="pwd" name="password" required>
          <span>
            
          </span>
          <br>
          <button class="log-in" type="submit" name="submit">
            <h3>Log In</h3>
          </button>
        </div>
        <div class="other ">
          <button class="btn submits frgt-pass  "id="Headbottom">
            <h3>ลืมรหัสผ่าน</h3>
          </button>
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          </button>
        </div>
    </form>
  </div>
  <script>
    function show() {
      var p = document.getElementById('pwd');
      p.setAttribute('type', 'text');
    }

    function hide() {
      var p = document.getElementById('pwd');
      p.setAttribute('type', 'password');
    }

    var pwShown = 0;

    document.getElementById("eye").addEventListener("click", function() {
      if (pwShown == 0) {
        pwShown = 1;
        show();
      } else {
        pwShown = 0;
        hide();
      }
    }, false);
  </script>
  
</body>

</html>