<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Add Employee
        </h1>
    </div>
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

                            <?php echo form_open_multipart("employee/add", array('role' => 'form1', 'id' => 'html5Form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackions-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="first_name" class="required">First Name <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="first_name" class="form-control" value="<?php echo @$_POST['first_name'] ?>" data-bv-message="The First Name is not valid"
                                                   required
                                                   data-bv-notempty-message="The First Name is required and cannot be empty"
                                                   pattern="[a-zA-Z0-9]+"
                                                   data-bv-regexp-message="The First Name can only consist of alphabetical, number">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="last_name">Last Name <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="last_name" class="form-control" value="<?php echo @$_POST['last_name'] ?>" data-bv-message="The Last Name is not valid"
                                                   required
                                                   data-bv-notempty-message="The Last Name is required and cannot be empty"
                                                   pattern="[a-zA-Z0-9]+"
                                                   data-bv-regexp-message="The Last Name can only consist of alphabetical, number">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="username">Username<span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="username" class="form-control" value="<?php echo @$_POST['username'];?>" data-bv-message="The Username is not valid"
                                                   required
                                                   data-bv-notempty-message="The Username is required and cannot be empty"
                                                   pattern="[a-zA-Z0-9]+"
                                                   data-bv-regexp-message="The Username can only consist of alphabetical, number">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="password">Password <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="password" name="password" class="form-control" value="<?php @$_POST['password'] ?>" data-bv-notempty="true" data-bv-notempty-message="The password is required and cannot be empty" data-bv-identical="true" data-bv-identical-field="cpassword" data-bv-identical-message="The password and its confirm are not the same" data-bv-different="true" data-bv-different-field="username" data-bv-different-message="The password cannot be the same as username" data-bv-field="password">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password<span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="password" name="cpassword" class="form-control" value="<?php @$_POST['cpassword'] ?>" data-bv-notempty="true" data-bv-notempty-message="The confirm password is required and cannot be empty" data-bv-identical="true" data-bv-identical-field="password" data-bv-identical-message="The password and its confirm are not the same" data-bv-different="true" data-bv-different-field="username" data-bv-different-message="The password cannot be the same as username" data-bv-field="cpassword">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="email">Email<span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="email" name="email" class="form-control" value="<?php @$_POST['email'] ?>" required
                                                   type="email" data-bv-emailaddress-message="The input is not a valid email address">
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="address">Address <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input class="form-control" name="address" type="text" value="<?php @$_POST['address'] ?> "
                                                   required
                                                   data-bv-notempty-message="The Address is required and cannot be empty" />
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="phone">Phone Number <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="phone" class="form-control" value="<?php echo @$_POST['phone'] ?>" required
                                                   data-bv-notempty-message="The Phone is required and cannot be empty" >
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="department">Department <span class="required">*</span></label>
                                        <select id="department_name" name="department_name" class="form-control" value="<?php echo @$_POST['department_name'] ?>" required
                                                data-bv-notempty-message="The Department Name is required and cannot be empty">
                                            <option value="" />
                                            <option value="Ac" />Account
                                            <option value="Ex" />Executive
                                            <option value="Hr" />Human Resources
                                            <option value="Re" />Research
                                            <option value="De" />Development
                                        </select>                                            
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="designation_name">Designation <span class="required"> * </span></label>
                                        <select id="designation_name" name="designation_name" class="form-control" value="<?php echo @$_POST['designation_name'] ?>" required
                                                data-bv-notempty-message="The Designation Name is required and cannot be empty">
                                            <option value="">
                                            <option value="3" />Programmer
                                            <option value="2" />Designer
                                            <option value="1" />Officer
                                        </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="grade">Grade <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select id="grade" name="grade" class="form-control" value="<?php echo @$_POST['grade'] ?>" required
                                                    data-bv-notempty-message="The Grade is required and cannot be empty">
                                                <option value="">
                                                <option value="1" />A
                                                <option value="2" />B
                                                <option value="3" />C
                                                <option value="3" />D
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="basic_salary">Basic Salary<span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select id="basic_salary" name="grade" class="form-control" value="<?php echo @$_POST['basic_salary'] ?>" required
                                                    data-bv-notempty-message="The Basic Salary is required and cannot be empty">
                                                <option value="">
                                                <option value="1" />Rs.80000
                                                <option value="2" />Rs.60000
                                                <option value="3" />Rs.20000
                                                <option value="3" />Rs.10000
                                            </select>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="marital_status">Marital Status <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select name="marital_status" class="form-control" id="marital_status" value="<?php echo @$_POST['marital_status'] ?>" required>
                                                <option value="">Select Marital Status</option>
                                                <option value="M">Married</option>
                                                <option value="S">Single</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="probation_status">Probation Status <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <select name="probation_status" class="form-control" id="probation_status" value="<?php echo @$_POST['probation_status'] ?>" required>
                                                <option value="">Select Status</option>
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
                                            <input class="form-control date-picker" name="joining_date" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" value="<?php echo @$_POST['joining_date'] ?>" 
                                                   required data-bv-notempty-message="The Date is required and cannot be empty" />
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="age">Age<span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="age" class="form-control" value="<?php @$_POST['age'] ?>" required
                                                   min="10"
                                                   data-bv-greaterthan-inclusive="false"
                                                   data-bv-greaterthan-message="The input must be greater than or equal to 10"
                                                   max="100"
                                                   data-bv-lessthan-inclusive="true"
                                                   data-bv-lessthan-message="The input must be less than 100">
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
