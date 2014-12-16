<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Punch In
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
                        <span class="widget-caption">Punch in attendance</span>
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
                            <div class="table-toolbar">
                                <a class="btn btn-small btnradious btn-primary" onclick="history.back()"><i class="fa fa-angle-double-left"></i> Back</a>
                                <button class="btn btn-small btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Punch Login Time <i class="fa fa-plus"></i></button>
                            </div>
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr role="row">
                                        <th>
                                            Username
                                        </th>
                                        <th>
                                            Punch In Time
                                        </th>
                                        <th>
                                            Punch Out Time
                                        </th>
                                        <th>
                                            Notes
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>benjix21</td>
                                        <td>11/12/2014 at 9:15 AM</td>
                                        <td>11/12/2014 at 6:00 PM</td>
                                        <td class="center ">Bus Jam</td>
                                    </tr>
                                    <tr>
                                        <td>benjix21</td>
                                        <td>11/12/2014 at 9:15 AM</td>
                                        <td>11/12/2014 at 6:00 PM</td>
                                        <td class="center ">Bus Jam</td>
                                    </tr>
                                    <tr>
                                        <td>benjix21</td>
                                        <td>11/12/2014 at 9:15 AM</td>
                                        <td>11/12/2014 at 6:00 PM</td>
                                        <td class="center ">Bus Jam</td>
                                    </tr>
                                    <tr>
                                        <td>benjix21</td>
                                        <td>11/12/2014 at 9:15 AM</td>
                                        <td>11/12/2014 at 6:00 PM</td>
                                        <td class="center ">Bus Jam</td>
                                    </tr>
                                    <tr>
                                        <td>benjix21</td>
                                        <td>11/12/2014 at 9:15 AM</td>
                                        <td>11/12/2014 at 6:00 PM</td>
                                        <td class="center ">Bus Jam</td>
                                    </tr>
                                    <tr>
                                        <td>benjix21</td>
                                        <td>11/12/2014 at 9:15 AM</td>
                                        <td>11/12/2014 at 6:00 PM</td>
                                        <td class="center ">Bus Jam</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--LArge Modal Templates-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Save Login Time</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart(uri_string(), array('role' => 'form', 'class' => 'stdform stdform2 form-inline', 'id' => 'html5Form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackions-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                <label class="" for="Employee Year">Login Time:</label>
<!--                <select name="year">
                    <option value="5">2014-2015</option>
                </select>
                <div class="form-group">
                    <label class="" for="Time">Time</label>
                    <input class="form-control" id="timepicker1" name="login_time" type="text">
                </div>
                <div class="form-group">
                    <label class="" for="Date">Date</label>
                    <input class="form-control date-picker" id="id-date-picker-1" name="date" data-date-format="dd-mm-yyyy" type="text">
                </div>-->
                <div class="form-group blue"><?php echo date('H:i A'); ?></div>
                <div class="form-group blue"><?php echo date('l, F dS'); ?></div>
                <button type="submit" class="btn btn-default pull-right">Submit</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--End Large Modal Templates-->

