<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Profile
        </h1>
    </div>
    <!--Header Buttons-->
    <div class="header-buttons">
        <a class="sidebar-toggler" href="#">
            <i class="fa fa-arrows-h"></i>
        </a>
        <a class="refresh" id="refresh-toggler" href="">
            <i class="glyphicon glyphicon-refresh"></i>
        </a>
        <a class="fullscreen" id="fullscreen-toggler" href="#">
            <i class="glyphicon glyphicon-fullscreen"></i>
        </a>
    </div>
    <!--Header Buttons End-->
</div>
<!-- /Page Header -->
<!-- Page Body -->
<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-container">
                <div class="profile-header row">
                    <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                        <img src="<?php echo base_url() ?>assets/img/no-img.jpeg" alt="" class="header-avatar" />
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12 profile-info">
                        <div class="profile-username"><?php echo $info->fname ?>&nbsp;<?php echo $info->mname ?>&nbsp;<?php echo $info->lname ?></div>
                        <div class="header-information">
                            <div style="color: #1EA076;font-size: 22px;font-family: serif;line-height: 40px;"><i class="fa fa-sort-amount-desc"></i> Department : Human Resources</div>                                    
                            <div style="color:#FD5042;font-size: 22px;font-family: serif;line-height: 40px;"><i class="fa fa-users"></i> Designation : Developer</div>
                            <div class="phoneno-display" style="color:#448ACC;font-size: 24px;font-family: serif;line-height: 40px;"><i class="fa fa-mobile"></i> 9803765979</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 profile-stats">
                        <div class="row" style="margin: 210px 0 0 0">
                            <ul class="button-display">
                                <li><a class="btn btn-default btnradious" href="index.php"><i class="fa fa-angle-double-left"></i> Back</a></li>
                                <li><a id="pdf" class="btn btn-pdf" target="_blank" href="#ExportToPdf?id=1"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
                                <li><a class="btn btn-edit" id="updateData" href="<?php echo site_url('user/edit/' . $info->ID); ?>"><i class="fa fa-wrench"></i> Edit</a></li>
                                <li><a class="btn btn-delete btnradious-last" href="<?php echo site_url('user/delete') . $info->ID; ?>" onclick="if (!confirm('Are you sure you want to delete this record??'))return false;"><i class="fa fa-trash-o"></i> Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="profile-body">
                    <div class="col-lg-12">
                        <div class="tabbable">
                            <ul class="nav nav-tabs tabs-flat  nav-justified" id="myTab11">
                                <li class="active">
                                    <a data-toggle="tab" href="#profile">
                                        Profile
                                    </a>
                                </li>
                                <li class="tab-red">
                                    <a data-toggle="tab" href="#attendance">
                                        Attendance Sheet
                                    </a>
                                </li>
                                <li class="tab-palegreen">
                                    <a data-toggle="tab" id="contacttab" href="#salarysheet">
                                        Salary Sheet
                                    </a>
                                </li>
                                <li class="tab-yellow">
                                    <a data-toggle="tab" href="#settings">
                                        Settings
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content tabs-flat">
                                <div id="profile" class="tab-pane active">
                                    <div class="row profile-overview">
                                        <div class="col-md-12">
                                            <table class="table table-condensed" width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="table-cell-title" width="23%">Employee No</td>
                                                        <td class="table-cell-content" width="23%">9999</td>
                                                        <td class="table-cell-title" width="23%">Employee Unique Id</td>
                                                        <td class="table-cell-content" width="23%">1</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-title">Name Alias</td>
                                                        <td class="table-cell-content">Ammar  Man Shrestha</td>
                                                        <td class="table-cell-title">Private Email </td>
                                                        <td class="table-cell-content">breakdown21stams@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-title">Designation</td>
                                                        <td class="table-cell-content">Developer</td>
                                                        <td class="table-cell-title">Title</td>
                                                        <td class="table-cell-content">Mr.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-title">First Name</td>
                                                        <td class="table-cell-content">Ammar </td>
                                                        <td class="table-cell-title">Middle Name</td>
                                                        <td class="table-cell-content">Man</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-title">Last Name</td>
                                                        <td class="table-cell-content">Shrestha</td>
                                                        <td class="table-cell-title">Mother Name</td>
                                                        <td class="table-cell-content">Not Set</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-title">Gender</td>
                                                        <td class="table-cell-content">Not Set</td>
                                                        <td class="table-cell-title">Department</td>
                                                        <td class="table-cell-content">Human Resources</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-title">Joining Date</td>
                                                        <td class="table-cell-content">
                                                            18-11-2014</td>
                                                        <td class="table-cell-title">Probation Period</td>
                                                        <td class="table-cell-content">Not Set</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-title">Date of Birth</td>
                                                        <td class="table-cell-content">
                                                            Not Set					</td>
                                                        <td class="table-cell-title">Birth Place</td>
                                                        <td class="table-cell-content">Not Set</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-title">Blood Group</td>
                                                        <td class="table-cell-content">Not Set</td>
                                                        <td class="table-cell-title">Nationality</td>
                                                        <td class="table-cell-content">
                                                            Not Set</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-title">Marital Status</td>
                                                        <td class="table-cell-content">Not Set</td>
                                                        <td class="table-cell-title">Type</td>
                                                        <td class="table-cell-content">
                                                            Teaching</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-title">Bank Account No.</td>
                                                        <td class="table-cell-content">Not Set</td>
                                                        <td class="table-cell-title">Institute Mobile</td>
                                                        <td class="table-cell-content">Not Set</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-title">Private Mobile No.</td>
                                                        <td class="table-cell-content">9803765979</td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </div>
                                <div id="attendance" class="tab-pane">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="well with-header with-footer">
                                                <div class="header bordered-blue">
                                                    Manage Attendance
                                                </div>
                                                <ul style="list-style-type:none; float:left">
                                                    <li>View: <select name="pageSize" id="pageSize">
                                                            <option value="10" selected="selected">10</option>
                                                            <option value="20">20</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> Per Page
                                                    </li>
                                                </ul>
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead class="bordered-darkgray">
                                                        <tr>
                                                            <th>SI No</th>
                                                            <th>Employee No</th>
                                                            <th>Email (Login Id)</th>
                                                            <th>Name</th>
                                                            <th>Surname</th>
                                                            <th>Designation</th>
                                                            <th>Department</th>
                                                            <th>&nbsp;</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="odd">
                                                            <td>1</td>
                                                            <td>9999</td>
                                                            <td>breakdown21stams@gmail.com</td>
                                                            <td>Ammar</td>
                                                            <td>Shrestha</td>
                                                            <td>Developer</td>
                                                            <td>Human Resources</td>
                                                            <td><a href="profile.php" class="btn btn-default btn-xs blue"><i class="fa fa-edit"></i> Edit</a><a href="#" class="btn btn-default btn-xs black"><i class="fa fa-trash-o"></i> Delete</a></td>                                
                                                        </tr>
                                                        <tr class="odd">
                                                            <td>1</td>
                                                            <td>9999</td>
                                                            <td>breakdown21stams@gmail.com</td>
                                                            <td>Ammar</td>
                                                            <td>Shrestha</td>
                                                            <td>Developer</td>
                                                            <td>Human Resources</td>
                                                            <td><a href="profile.php" class="btn btn-default btn-xs blue"><i class="fa fa-edit"></i> Edit</a><a href="#" class="btn btn-default btn-xs black"><i class="fa fa-trash-o"></i> Delete</a></td>                                                               
                                                        </tr>
                                                        <tr class="odd">
                                                            <td>1</td>
                                                            <td>9999</td>
                                                            <td>breakdown21stams@gmail.com</td>
                                                            <td>Ammar</td>
                                                            <td>Shrestha</td>
                                                            <td>Developer</td>
                                                            <td>Human Resources</td>
                                                            <td><a href="profile.php" class="btn btn-default btn-xs blue"><i class="fa fa-edit"></i> Edit</a><a href="#" class="btn btn-default btn-xs black"><i class="fa fa-trash-o"></i> Delete</a></td>                                
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="salarysheet" class="tab-pane">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="well with-header with-footer">
                                                    <div class="header bordered-blue">
                                                        Salary Sheet
                                                    </div>
                                                    <div class="table-scrollable">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" style="width:450px !important">
                                                                        Column header 1
                                                                    </th>
                                                                    <th scope="col">
                                                                        Column header 2
                                                                    </th>
                                                                    <th scope="col">
                                                                        Column header 3
                                                                    </th>
                                                                    <th scope="col">
                                                                        Column header 4
                                                                    </th>
                                                                    <th scope="col">
                                                                        Column header 5
                                                                    </th>
                                                                    <th scope="col">
                                                                        Column header 6
                                                                    </th>
                                                                    <th scope="col">
                                                                        Column header 7
                                                                    </th>
                                                                    <th scope="col">
                                                                        Column header 8
                                                                    </th>
                                                                    <th scope="col">
                                                                        Column header 9
                                                                    </th>
                                                                    <th scope="col">
                                                                        Column header 10
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                    <td>
                                                                        Table data
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="settings" class="tab-pane">
                                    <form role="form">
                                        <div class="form-title">
                                            Personal Information
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" placeholder="Name">
                                                        <i class="fa fa-user blue"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" placeholder="Family">
                                                        <i class="fa fa-user orange"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" placeholder="Phone">
                                                        <i class="glyphicon glyphicon-earphone yellow"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" placeholder="Mobile">
                                                        <i class="glyphicon glyphicon-phone palegreen"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="wide">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" placeholder="Birth Date">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" placeholder="Birth Place">
                                                        <i class="fa fa-globe"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-title">
                                            Social Networks
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" placeholder="Facebook">
                                                        <i class="fa fa-facebook purple"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" placeholder="Twitter">
                                                        <i class="fa fa-twitter azure"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" placeholder="Pinterest">
                                                        <i class="fa fa-pinterest red"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" placeholder="Flickr">
                                                        <i class="fa fa-flickr blue"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-title">
                                            Contact Information
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" placeholder="Address 1">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" placeholder="Address 1">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save Profile</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Body -->