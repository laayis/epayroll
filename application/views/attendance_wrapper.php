<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <!-- Head -->
    <head>
        <meta charset="utf-8" />
        <title><?php $this->load->view('title'); ?></title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.png" type="image/x-icon">
            <!--Basic Styles-->
            <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/weather-icons.min.css" rel="stylesheet" />

            <!--styles-->
            <link href="<?php echo base_url() ?>assets/css/master.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url() ?>assets/css/demo.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/typicons.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet" />

            <!--Page Related styles-->
            <link href="<?php echo base_url() ?>assets/css/dataTables.bootstrap.css" rel="stylesheet" />

            <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
            <script src="<?php echo base_url() ?>assets/js/skins.min.js"></script>
    </head>

    <body>
        <!-- header menu /starts/ -->
        <?php $this->load->view('headermenu'); ?>
        <!-- header menu /ends/ -->

        <!-- left menu /starts/ -->
        <?php $this->load->view('leftnav2'); ?>
        <!-- left menu /ends/ -->
        <!-- Page Content -->
        <div class="page-content">
            <?php $this->load->view('breadcrumb') ?>

            <?php $this->load->view($main_content); ?>

        </div>
        </div>
        <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->
        <!--Small Modal Templates-->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="mySmallModalLabel">Save Logout Time</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <label class="" for="Time">Time</label>
                                <input class="form-control" id="timepicker1" type="text">
                            </div>
                            <button type="submit" class="btn btn-default pull-right">Submit</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!--End Small Modal Templates-->

       <!--Basic Scripts-->
    <script src="<?php echo base_url() ?>assets/js/jquery-2.0.3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <!--Beyond Scripts-->
    <script src="<?php echo base_url() ?>assets/js/beyond.min.js"></script>
<!--Page Related Scripts-->
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/ZeroClipboard.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.tableTools.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/datatables-init.js"></script>
    <script>
        InitiateSimpleDataTable.init();
        InitiateEditableDataTable.init();
        InitiateExpandableDataTable.init();
        InitiateSearchableDataTable.init();
    </script>


    </body>

</html>
