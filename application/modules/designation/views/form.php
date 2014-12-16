<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Designation
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
                        <span class="widget-caption">Add Designation</span>
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
                            <?php echo form_open_multipart(uri_string(), array('role' => 'form1', 'id' => 'html5Form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackions-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="designation_name" class="required">Designation Name <span class="required">*</span></label>
                                        <span class="input-icon icon-right">
                                            <input type="text" name="designation_name" class="form-control" value="<?php echo (@$_POST['designation_name']) ? $_POST['designation_name'] : $editData->designation_name; ?>" data-bv-message="The Designation Name is not valid"
                                                   required
                                                   data-bv-notempty-message="The Designation Name is required and cannot be empty"
                                                   pattern="[a-zA-Z0-9]+"
                                                   data-bv-regexp-message="The Designation Name can only consist of alphabetical, number">
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
