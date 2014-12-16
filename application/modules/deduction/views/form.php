<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Department
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
                        <span class="widget-caption">Add Department</span>
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
                            <?php echo form_open_multipart(uri_string(), array('role' => 'form1', 'class' => 'stdform stdform2', 'id' => 'html5Form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackions-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="first_name" class="required">Department Name <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="department_name" class="form-control" value="<?php echo (@$_POST['department_name']) ? $_POST['department_name'] : $editData->department_name; ?>" data-bv-message="The Department Name is not valid"
                                                   required
                                                   data-bv-notempty-message="The Department Name is required and cannot be empty"
                                                   pattern="[a-zA-Z0-9]+"
                                                   data-bv-regexp-message="The Department Name can only consist of alphabetical, number" />
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="department_code_name">Department Code<span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="department_code" class="form-control" value="<?php echo (@$_POST['department_code']) ? $_POST['department_code'] : $editData->department_code; ?>" data-bv-message="The Department Code is not valid"
                                                   required
                                                   data-bv-notempty-message="The Department Code is required and cannot be empty"
                                                   pattern="[a-zA-Z0-9]+"
                                                   data-bv-regexp-message="The Department Code can only consist of alphabetical, number" />
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
