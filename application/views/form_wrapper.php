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
            <link id="skin-link" href="" rel="stylesheet" type="text/css" />

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
        <?php $this->load->view('leftnav'); ?>
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

        <!--Basic Scripts-->
        <script src="<?php echo base_url() ?>assets/js/jquery-2.0.3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

        <!--Beyond Scripts-->
        <script src="<?php echo base_url() ?>assets/js/beyond.min.js"></script>
    </body>
    <!--  /Body -->

</html>