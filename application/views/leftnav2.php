<!-- Page Sidebar -->
<div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input type="text" class="searchinput" />
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Employee, Attendence</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->
        <li class="active">
            <a href="<?php echo base_url();?>" class="menu-dropdown">
                <i class="fa fa-tachometer floatRight" title="Dashboard"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>
        <!--Tables-->
        <li>
            <a href="#" class="menu-dropdown">
                <i class="fa fa-user floatRight" title="Employee"></i>
                <span class="menu-text"> Employee </span>
                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">
                <li>
                    <a href="<?php echo site_url('attendance/employeeattendance') ?>">
                        <span class="menu-text">Record Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('user/resetpassword') ?>">
                        <span class="menu-text">Reset Password</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--Pages-->
        <li>
            <a href="#" class="menu-dropdown">
                <i class="fa fa-bar-chart-o floatRight" title="Reports"></i>
                <span class="menu-text"> Reports </span>

                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo site_url('attendance/weekly') ?>">
                        <span class="menu-text">Weekly Attendance Report</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('attendace/monthly') ?>">
                        <span class="menu-text">Monthly Attendance Sheet</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('salary/monthly') ?>">
                        <span class="menu-text">Monthly Salary Report</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo site_url('login/history') ?>">
                <i class="fa fa-header floatRight" title="Login History"></i>
                <span class="menu-text"> Log In History </span>
            </a>
        </li>
    </ul>
    <!-- /Sidebar Menu -->
</div>
<!-- /Page Sidebar -->