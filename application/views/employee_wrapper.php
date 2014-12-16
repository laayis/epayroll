<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <!-- Head -->
    <head>
        <meta charset="utf-8" />
        <title><?php $this->load->view('title'); ?></title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.png" type="image/x-icon">
            <!--Basic Styles-->
            <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/font-awesome.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/weather-icons.min.css" rel="stylesheet" />

            <!--styles-->
            <link href="<?php echo base_url() ?>assets/css/master.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url() ?>assets/css/typicons.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet" />
            <!--Page Related styles-->
            <link href="<?php echo base_url() ?>assets/css/dataTables.bootstrap.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/bootstrap.datetimepicker.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/datepicker.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/jquery.timepicker.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/select2.css" rel="stylesheet" />

            <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
            <script src="<?php echo base_url() ?>assets/js/skins.min.js"></script>
    </head>

    <body>
        <!-- header menu /starts/ -->
        <?php $this->load->view('headermenu'); ?>
        <!-- header menu /ends/ -->
        <?php $this->load->view('leftnav');?>

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

        <!--Basic Scripts-->
        <script src="<?php echo base_url() ?>assets/js/jquery-2.0.3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery-ui-1.10.4.custom.js"></script>

        <!--Beyond Scripts-->
        <script src="<?php echo base_url() ?>assets/js/beyond.min.js"></script>

        <!--Page Related Scripts for data tables-->
        <script src="<?php echo base_url() ?>assets/js/bootstrapValidator.js"></script>
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
        <script src="<?php echo base_url() ?>assets/js/bootbox.js"></script>

        <!--Page Related Scripts for attendance-->
        <!--Jquery Select2-->
        <script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/TimeUtils.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker2.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap-timepicker.js"></script>
        <script src="<?php echo base_url() ?>assets/js/date.js"></script>
        <script src="<?php echo base_url() ?>assets/js/moment.js"></script>
        <script src="<?php echo base_url() ?>assets/js/daterangepicker.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.placeholder.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.timepicker.js"></script>
        <script src="<?php echo base_url() ?>assets/js/json2.js"></script>
        <script src="<?php echo base_url() ?>assets/js/attendacelib.js"></script>
        <script>
            //--Jquery Select2--
            $("#department_name").select2({
                placeholder: "Select Department"
            });
            $("#designation_name").select2({
                placeholder: "Select a Designation",
                allowClear: true
            });
            $("#grade").select2({
                placeholder: "Select a Grade",
                allowClear: true
            });
            $("#basic_salary").select2({
                placeholder: "Select a Basic Salary",
                allowClear: true
            });

            //--Bootstrap Date Picker--
            $('.date-picker').datepicker();

            //--Bootstrap Time Picker--
            $('#timepicker1').timepicker();

            //--Bootstrap Date Range Picker--
            $('#reservation').daterangepicker();

            //--Bootstrap Validaor--
            $('#html5Form').bootstrapValidator();


        </script>

    </body>

</html>
