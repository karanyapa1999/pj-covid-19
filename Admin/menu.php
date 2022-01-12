<?php $page = isset($_GET["page"]) ? $_GET["page"] : ''; ?>
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white " id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
        <a href = "https://ddc.moph.go.th/">
                <img width="220px" height="90px"  src="../assets/img/brand/logo.png"   alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php if ($page == "dashboard") { ?>
                            <a class="nav-link active" href="?page=dashboard">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=dashboard">
                                <?php } ?>
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">จัดการผู้ใช้งาน</span>
                                </a>
                    </li>

                    <li class="nav-item">
                        <?php if ($page == "dashboard2") { ?>
                            <a class="nav-link active" href="?page=dashboard2">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=dashboard2">
                                <?php } ?>
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">จัดการสัญชาติ</span>
                                </a>
                    </li>

                    <li class="nav-item">
                        <?php if ($page == "dashboard3") { ?>
                            <a class="nav-link active" href="?page=dashboard3">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=dashboard3">
                                <?php } ?>
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">จัดการอาชีพ</span>
                                </a>
                    </li>
                    <li class="nav-item">
                        <?php if ($page == "dashboard4") { ?>
                            <a class="nav-link active" href="?page=dashboard4">
                            <?php } else { ?>
                                <a class="nav-link" href="../index_data.php?page=dashboard">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ข้อมูลผู้ป่วยทั้งหมด</span>
                                </a>
                    </li>
                    <li class="nav-item">
                        <?php if ($page == "manage_user") { ?>
                            <a class="nav-link active" href="?page=manage_user">
                            <?php } else { ?>
                                <a class="nav-link" href="?page=manage_user">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">ข้อมูลผู้ใช้งาน</span>
                                </a>
                    </li>
                    <li class="nav-item">
                        <?php if ($page == "register") { ?>
                            <a class="nav-link active" href="?page=register">
                            <?php } else { ?>
                                <a class="nav-link" href="../register.php">
                                <?php } ?>
                                <i class="ni ni-single-02 text-yellow"></i>
                                <span class="nav-link-text">สมัครสมาชิก</span>
                                </a>
                    </li>
                </ul>
                <hr class="my-3">
            </div>
        </div>
    </div>
</nav>