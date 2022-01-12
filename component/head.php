<?php 
session_start();

?>
<nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom bg-primary1">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                <div class="form-group mb-0">
                <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Refer : </span>
                        </div>
                        
                        <input class="form-control" placeholder="............" value = "<?php echo $_SESSION["refer"]; ?>" type="text" readonly>
                    </div>
                    <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text">SAT CODE : </span>
                        </div>
                        
                        <input class="form-control" placeholder="............" value = "<?php echo $_SESSION["code"]; ?>" type="text" readonly>
                    </div>
                   
                </div>
                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </form>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
            </ul>
              
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                            <div class="media-body  ml-2  d-none d-lg-block">
                            <?php if($_SESSION['Type'] == "1"){
                                $sPosition = "SAT";
                                $sColor = "green";
                            }else if($_SESSION['Type'] == "2"){
                                $sPosition = "Operation";
                                $sColor = "orange";
                            }else{
                                $sPosition = "Admin";
                                $sColor = "red";
                            }
                            ?>
                                <span class="mb-0 text-sm  font-weight-bold"><font color = "<?php echo $sColor; ?>"><?php echo $sPosition; ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                            </div>
          
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                      
                            <span class="avatar avatar-sm rounded-circle">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3PbyerNVeiPS7PLk_UYHuVISp8v8cxVRqPw&usqp=CAU">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['user']; ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        
                        <div class="dropdown-divider"></div>
                        <a href="index.php?page=change_user" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>เปลี่ยนรหัสผ่าน</span>
                        </a>
                        <a href="login" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="header pb-6 d-flex align-items-center" style="min-height: 100px; background-image: url(../assets/img/theme/medic.jpg); background-size: cover; background-position: center top;">

</div>