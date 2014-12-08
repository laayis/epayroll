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
                            <?php echo form_open_multipart("employee/add", array('role' => 'form')); ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="first_name" class="required">First Name <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="first_name" class="form-control" value="<?php echo @$_POST['first_name'] ?>">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="last_name">Last Name <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="last_name" class="form-control" value="<?php echo @$_POST['last_name'] ?>">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="address">Address <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input class="form-control" name="address" type="text" value="<?php @$_POST['address'] ?> ">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="phone">Phone Number <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="phone" class="form-control" value="<?php echo @$_POST['mobile_no'] ?>">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="department">Department <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select name="department_name" class="form-control" id="department_name">
                                                <option value="">Select Department</option>
                                                <option value="2">Account</option>
                                                <option value="4">Executive</option>
                                                <option value="1">Human Resources</option>
                                                <option value="3">IT</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="designation_name">Designation <span class="required"> * </span></label>
                                        <span class="input-icon icon-right">
                                            <select name="designation_name" class="form-control" id="designation_name">
                                                <option value="">Select Title</option>
                                                <option value="3">Programmer</option>
                                                <option value="2">Designer</option>
                                                <option value="1">Officer</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="grade">Grade <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select name="grade" class="form-control" id="grade">
                                                <option value="">Select Grade</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="3">4</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="basic_salary">Basic Salary<span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="basic_salary" class="form-control" <?php @$_POST['email'] ?>>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="marital_status">Marital Status <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select name="marital_status" class="form-control" id="marital_status">
                                                <option value="">Select Type</option>
                                                <option value="1">Married</option>
                                                <option value="0">Unmarried</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="probation_status">Probation Status <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select name="probation_status" class="form-control" id="probation_status">
                                                <option value="">Select Type</option>
                                                <option value="1">Probation</option>
                                                <option value="0">Permanent</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="joining_date">Joining Date <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input class="form-control date-picker" name="joining_date" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" value="<?php echo @$_POST['joining_date'] ?>">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="email">Email<span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="email" name="email" class="form-control" <?php @$_POST['email'] ?>>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="password">Password <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input class="form-control" type="password" <?php @$_POST['password'] ?>>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password<span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="password" name="confirm_password" class="form-control" <?php @$_POST['confirm_password'] ?>>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn btn-blue">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
