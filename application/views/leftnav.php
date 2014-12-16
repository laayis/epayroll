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
        <li>
            <a href="<?php site_url('settings') ?>" class="menu-dropdown">
                <i class="fa  fa-cogs floatRight" title="settings"></i>
                <span class="menu-text"> Settings </span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo site_url('office-timesheet') ?>">
                        <span class="menu-text">Office Time Sheet</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('attendance') ?>">
                        <span class="menu-text">Manage Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('department') ?>">
                        <span class="menu-text">Department</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('designation') ?>">
                        <span class="menu-text">Designation</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('grade') ?>">
                        <span class="menu-text">Grade</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('basic_salary') ?>">
                        <span class="menu-text">Basic Salary</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('allowances') ?>">
                        <span class="menu-text">Allowances</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('deduction') ?>">
                        <span class="menu-text">Deduction</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('message-of-the-day') ?>">
                        <span class="menu-text">Message Of Day</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('important-notice') ?>">
                        <span class="menu-text">Important Notice</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--Tables-->
        <li>
            <a href="<?php site_url('employee') ?>" class="menu-dropdown">
                <i class="fa fa-user floatRight" title="Employee"></i>
                <span class="menu-text"> Employee </span>
                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">
                <li>
                    <a href="<?php echo site_url('employee') ?>">
                        <span class="menu-text">Manage Employee</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('employee/add') ?>">
                        <span class="menu-text">Add Employee</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('attendance/punchin') ?>">
                        <span class="menu-text">Punch In</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('attendance/punchout') ?>">
                        <span class="menu-text">Punch Out</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('employee/resetpassword') ?>">
                        <span class="menu-text">Reset Password</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--Pages-->
        <li>
            <a href="#" class="menu-dropdown">
                <i class="fa fa-bar-chart-o floatRight" title="Reports"></i>
                <span class="menu-text"> Manage Reports </span>

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
            <a href="<?php echo site_url('attendance') ?>">
                <i class="fa fa-header floatRight" title="Login History"></i>
                <span class="menu-text"> Log In History </span>
            </a>
        </li>
    </ul>
    <!-- /Sidebar Menu -->
</div>
<!-- /Page Sidebar -->