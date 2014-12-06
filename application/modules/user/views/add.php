<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Add Employee
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
<div class="page-body">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">

            <div class="row">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">Add Employee</span>
                    </div>
                    <div class="widget-body flat radius-bordered">
                        <div id="registration-form">
                            <?php
                            if (validation_errors()) {
                                ?>
                                <div class="notibar announcement">
                                    <a class="close"></a>
                                    <h3>Validation Errors</h3>
                                    <p><?php echo validation_errors() ?></p>
                                </div>

                                <?php
                            }
                            ?>

                            <?php
                            if ($this->session->flashdata('success')) {
                                ?>
                                <div class="notibar msgsuccess">
                                    <a class="close"></a>
                                    <p><?php echo $this->session->flashdata('success') ?></p>
                                </div>
                                <?php
                            }
                            ?>

                            <?php
                            if ($this->session->flashdata('error')) {
                                ?>
                                <div class="notibar msgerror">
                                    <a class="close"></a>
                                    <p><?php echo $this->session->flashdata('error') ?></p>
                                </div>
                                <?php
                            }
                            ?>
                            <?php echo form_open_multipart("user/add/", array('id' => 'form1', 'role' => 'form')); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Title <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select name="title" class="form-control" id="title">
                                                <option value="">Select Title</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="fname" class="required">First Name <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" class="form-control" value="<?php echo @$_POST['fname'] ?>">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mname">Middle Name</label>
                                        <span class="input-icon icon-right">
                                            <input class="form-control" type="text" value="<?php echo @$_POST['mname'] ?>">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" class="form-control" value="<?php echo @$_POST['lname'] ?>">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="marital_status">Marital Status <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select name="type" class="form-control" id="marital_status">
                                                <option value="">Select Type</option>
                                                <option value="1">Married</option>
                                                <option value="0">Unmarried</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="joining_date">Joining Date <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" value="<?php echo @$_POST['joining_date'] ?>">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="type">Type <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select name="type" class="form-control" id="type">
                                                <option value="">Select Type</option>
                                                <option value="1">Hired</option>
                                                <option value="0">Probation</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="designation">Designation <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select name="designation" class="form-control" id="designation">
                                                <option value="">Select Title</option>
                                                <option value="3">Programmer</option>
                                                <option value="2">Designer</option>
                                                <option value="1">Officer</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="department">Department <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select name="department" class="form-control" id="department">
                                                <option value="">Select Department</option>
                                                <option value="2">Account</option>
                                                <option value="4">Executive</option>
                                                <option value="1">Human Resources</option>
                                                <option value="3">IT</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mobile_no">Mobile Number <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" class="form-control" value="<?php echo @$_POST['mobile_no'] ?>">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="address">Address <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input class="form-control" type="text" <?php @$_POST['address'] ?>>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email<span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" class="form-control" <?php @$_POST['email'] ?>>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username">Username <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input class="form-control" type="text" <?php @$_POST['username'] ?>>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password">Password<span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" class="form-control" <?php @$_POST['password'] ?>>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn btn-blue">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>