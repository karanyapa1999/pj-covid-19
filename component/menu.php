<?php $page = isset($_GET["page"]) ? $_GET["page"] : ''; ?>
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white " id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center" >
            <a href = "https://ddc.moph.go.th/">
                <img width="220px" height="90px"  src="assets/img/brand/logo.png"   alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">

                <?php if($_SESSION['Type'] == 'A'){?>
                <li class="nav-item">
                        <?php if ($page == "home_admin") { ?>
                            <a class="nav-link active" href="Admin/?page=dashboard">
                            <?php } else { ?>
                                <a class="nav-link" href="Admin/?page=dashboard">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">กลับหน้า Admin</span>
                                </a>
                    </li>
                            <?php } ?>
                    <li class="nav-item">
                        <?php if ($page == "dashboard") { 
                            unset($_SESSION["code"]);
                            ?>
                            <a class="nav-link active" href="?page=dashboard">
                            
                            <?php } else { ?>
                                <a class="nav-link" href="?page=dashboard">
                                <?php } ?>
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">หน้าหลัก</span>
                                </a>
                    </li>
                    <li class="nav-item">
                        <?php if ($page == "profile") { ?>
                            <a class="nav-link active" href="?page=profile">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=profile">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ข้อมูลทั่วไป</span>
                                </a>
                    </li>
                  
                    <li class="nav-item">
                        <?php if ($page == "report") { 
                             unset($_SESSION["code"]);
                            ?>
                        
                            <a class="nav-link active" href="?page=report">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=report">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">รายงาน</span>
                                </a>
                    </li>

                    <li class="nav-item">
                        <?php if ($page == "change_user") { ?>
                            <a class="nav-link active" href="index.php?page=change_user">
                            <?php } else { ?>
                                <a class="nav-link" href="index.php?page=change_user">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">เปลี่ยนข้อมูลการเข้าสู่ระบบ</span>
                                </a>
                    </li>
                </ul>
                <hr class="my-3">
            </div>
        </div>
    </div>
</nav>