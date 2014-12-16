<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Dashboard
        </h1>
    </div>
</div>
<!-- /Page Header -->
<div class="page-body">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3 id="lastPunchTime">Not</h3>
                    <p id="punchTimeText">Punched In</p>
                </div>

                <a href="<?php echo site_url('attendance/punchin');?>" class="small-box-footer" id="atteandanceLink">
                    Record Attendance <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->						                        
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3 id="pendingLeaveCount">10</h3>
                    <p>
                        RBAC
                    </p>
                </div>
                <a href="<?php echo site_url('rbac');?>" class="small-box-footer" id="leavesLink">
                    Role Based Access Control <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3 id="timeSheetHoursWorked">50</h3>
                    <p>
                        Manage Employee
                    </p>
                </div>
                <a href="<?php echo site_url('employee');?>" class="small-box-footer" id="timesheetLink">
                    Manage Employee <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3 id="numberOfProjects">4</h3>
                    <p>
                        Report
                    </p>
                </div>
                <a href="<?php echo site_url('report');?>" class="small-box-footer" id="projectsLink">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->                        
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-8 margin-bottom-20">
            <div class="profile-container">
                <div class="profile-header row">
                    <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                        <img src="<?php echo base_url() ?>assets/img/no-img.jpeg" class="header-avatar">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 profile-info">
                        <div class="header-fullname"><a href="<?php site_url('profile') ?>">My Information</a></div>
                        <div class="header-information">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="info-label">Name - </td>
                                        <td class="info-content">Ammar  Shrestha</td>
                                        <td class="info-label">Birth Date -</td>
                                        <td class="info-content">Not Set</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Gender - </td>
                                        <td class="info-content">Male</td>
                                        <td class="info-label">Designation  -</td>
                                        <td class="info-content">Developer</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Department - </td>
                                        <td class="info-content">Human Resources</td>
                                        <td class="info-label">&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="well with-header">
                <div class="header bordered-blue">Important Links</div>
                <div class="buttons-preview">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
<!--                            <tr class="buttons-preview">
                                <td><button class="btn btn-blue" data-toggle="modal" data-target=".bs-example-modal-sm">Punch Logout Time</button></td>
                            </tr>
                            <tr>
                                <td><a href="login_user.php"><div class="mytime-table-icon" data-toggle="tooltip" data-placement="top" data-original-title="View Login Time">&nbsp;</div></a></td>
                                <td><a href="profile.php"><div class="attendance-icon" data-toggle="tooltip" data-placement="top" data-original-title="View Profile">&nbsp;</div></a></td>
                            </tr>
                            <tr>
                                <td class="info-content-center"></td>
                                <td class="info-content-center"></td>
                            </tr>                    -->

                            <tr>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        Record Attendance <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        View Salary<i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        Record Attendance <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        View Salary<i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        Record Attendance <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        View Salary<i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        Record Attendance <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        View Salary<i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        Record Attendance <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        View Salary<i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        Record Attendance <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        View Salary<i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        Record Attendance <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                                <td><a href="<?php echo site_url('attendance/employeeattendance') ?>" class="small-box-footer" id="atteandanceLink">
                                        View Salary<i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget">
                        <div class="widget-header bordered-bottom bordered-themesecondary">
                            <i class="widget-icon glyphicon glyphicon-pencil"></i>
                            <span class="widget-caption themesecondary">Notice Board</span>
                        </div><!--Widget Header-->
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <div class="tickets-container">
                                    <ul class="tickets-list">
                                        <li class="ticket-item">
                                            <div class="row">
                                                <div class="ticket-user col-lg-6 col-sm-12">
                                                    <a target="_blank" href="#">tomorrow will holiday to all...</a>
                                                </div>
                                                <div class="ticket-time  col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                                    <span class="time">1 Hours Ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="ticket-item">
                                            <div class="row">
                                                <div class="ticket-user col-lg-6 col-sm-12">
                                                    <a target="_blank" href="#">tomorrow will holiday to all...</a>
                                                </div>
                                                <div class="ticket-time  col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                                    <span class="time">1 Hours Ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget">
                        <div class="widget-header bordered-bottom bordered-themesecondary">
                            <i class="widget-icon glyphicon glyphicon-align-left"></i>
                            <span class="widget-caption themesecondary">Attendance Chart</span>
                        </div><!--Widget Header-->
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <div class="chart">
                                    <div class="column-container">
                                        <div class="column-chart">
                                            <div class="fill" style="background-color:#0DA1FF"></div>
                                            <p class="rotulo">Present</p>
                                        </div>
                                        <div class="column-chart">
                                            <div class="fill" style="background-color:#FFC000"></div>
                                            <p class="rotulo">Holiday</p>
                                        </div>
                                        <div class="column-chart">
                                            <div class="fill" style="background-color:#01CB99"></div>
                                            <p class="rotulo">Week Off</p>
                                        </div>
                                        <div class="column-chart">
                                            <div class="fill" style="background-color:#FF5C5C"></div>
                                            <p class="rotulo">Absent</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget">
                        <div class="widget-header bordered-bottom bordered-themesecondary">
                            <i class="widget-icon glyphicon glyphicon-pencil"></i>
                            <span class="widget-caption themesecondary">Office Time</span>
                        </div><!--Widget Header-->
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <div class="tickets-container">
                                    <ul class="tickets-list">
                                        <li class="ticket-item">
                                            <div class="row">
                                                <div class="ticket-user col-lg-6 col-sm-12">
                                                    <a target="_blank" href="#">In Time</a>
                                                </div>
                                                <div class="ticket-time  col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                                    <span class="time">9:00 AM</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="ticket-item">
                                            <div class="row">
                                                <div class="ticket-user col-lg-6 col-sm-12">
                                                    <a target="_blank" href="#">Out time</a>
                                                </div>
                                                <div class="ticket-time  col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                                    <span class="time">5:00 PM</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>