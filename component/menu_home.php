<?php session_start();
$page = isset($_GET["page"]) ? $_GET["page"] : '';

?>
<?php  if ($_SESSION['Type'] == '2') {
       
     ?>
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white " id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
        <a href = "https://ddc.moph.go.th/">
                <img width="220px" height="90px"  src="assets/img/brand/logo.png"   alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                <li class="nav-item">
                        <?php if ($page == "dashboard") { 
                              unset($_SESSION["code"]);
                            ?>
                            <a class="nav-link active" href="/COVID-19?page=dashboard">
                            
                            <?php } else { ?>
                                <a class="nav-link" href="/COVID-19?page=dashboard">
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
                        <?php if ($page == "clinic") { ?>
                            <a class="nav-link active" href="?page=clinic">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=clinic">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ข้อมูลทางคลินิค</span>
                                </a>
                    </li>
                    <li class="nav-item">
                        <?php if ($page == "clinicAntibody") { ?>
                            <a class="nav-link active" href="?page=clinicAntibody">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=clinicAntibody">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ข้อมูลทางคลินิกผลตรวจAntibody</span>
                                </a>
                    </li>
                    <li class="nav-item">
                        <?php if ($page == "vaccine") { ?>
                            <a class="nav-link active" href="?page=vaccine">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=vaccine">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ประวัติการได้รับวัคซีน</span>
                                </a>
                    </li>
                    <li class="nav-item">
                        <?php if ($page == "details") { ?>
                            <a class="nav-link active" href="?page=details">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=details">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">รายละเอียดเหตุการณ์</span>
                                </a>
                    </li>
                    <li class="nav-item">
                        <?php if ($page == "search") { ?>
                            <a class="nav-link active" href="?page=search">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=search">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">การค้นหาผู้สัมผัส</span>
                                </a>
                    </li>
                    
                    
                </ul>
                <hr class="my-3">
            </div>
        </div>
    </div>
</nav>

<?php }else if($_SESSION['Type'] == '1'){?>

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
                        <?php if ($page == "clinicPCR") { ?>
                            <a class="nav-link active" href="?page=clinicPCR">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=clinicPCR">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ข้อมูลทางคลินิกผลตรวจPCR</span>
                                </a>
                    </li>
                    <li class="nav-item">
                        <?php if ($page == "history") { ?>
                            <a class="nav-link active" href="?page=history">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=history">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ประวัติเสี่ยง</span>
                                </a>
                    </li>
                
                </ul>
                <hr class="my-3">
            </div>
        </div>
    </div>
</nav>

<?php }else{ ?>
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white " id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
        <a href = "https://ddc.moph.go.th/">
                <img width="220px" height="90px"  src="assets/img/brand/logo.png"   alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                <li class="nav-item">
                        <?php if ($page == "dashboard") { 
                              unset($_SESSION["code"]);
                            ?>
                            <a class="nav-link active" href="/COVID-19?page=dashboard">
                            
                            <?php } else { ?>
                                <a class="nav-link" href="/COVID-19?page=dashboard">
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
                        <?php if ($page == "clinic") { ?>
                            <a class="nav-link active" href="?page=clinic">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=clinic">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ข้อมูลทางคลินิค</span>
                                </a>
                    </li>

                    <li class="nav-item">
                        <?php if ($page == "clinicPCR") { ?>
                            <a class="nav-link active" href="?page=clinicPCR">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=clinicPCR">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ข้อมูลทางคลินิกผลตรวจPCR</span>
                                </a>
                    </li>

                    <li class="nav-item">
                        <?php if ($page == "clinicAntibody") { ?>
                            <a class="nav-link active" href="?page=clinicAntibody">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=clinicAntibody">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ข้อมูลทางคลินิกผลตรวจAntibody</span>
                                </a>
                    </li>
                    <li class="nav-item">
                        <?php if ($page == "vaccine") { ?>
                            <a class="nav-link active" href="?page=vaccine">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=vaccine">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ประวัติการได้รับวัคซีน</span>
                                </a>
                    </li>

                    <li class="nav-item">
                        <?php if ($page == "history") { ?>
                            <a class="nav-link active" href="?page=history">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=history">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ประวัติเสี่ยง</span>
                                </a>
                    </li>


                    <li class="nav-item">
                        <?php if ($page == "details") { ?>
                            <a class="nav-link active" href="?page=details">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=details">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">รายละเอียดเหตุการณ์</span>
                                </a>
                    </li>
                    <li class="nav-item">
                        <?php if ($page == "search") { ?>
                            <a class="nav-link active" href="?page=search">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=search">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">การค้นหาผู้สัมผัส</span>
                                </a>
                    </li>
                    
                    
                </ul>
                <hr class="my-3">
            </div>
        </div>
    </div>
</nav>





<?php } ?>