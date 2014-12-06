<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <!--Head-->
    <head>
        <meta charset="utf-8" />
        <title>Error 404 - Page Not Found</title>
        <meta name="description" content="Error 404 - Page Not Found" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

            <!--Basic Styles-->
            <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/weather-icons.min.css" rel="stylesheet" />

            <!--styles-->
            <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/master.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/demo.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet" />

            <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
            <script src="<?php echo base_url() ?>assets/js/skins.min.js"></script>
    </head>
    <!--Head Ends-->
    <!--Body-->
    <body class="body-404">
        <div class="error-header"> </div>
        <div class="container ">
            <section class="error-container text-center">
                <h1><?php echo $heading; ?></h1>
                <div class="error-divider">
                    <h2><?php echo $message; ?></h2>
                    <p class="description"></p>
                </div>
                <a href="<?php echo base_url()?>" class="return-btn"><i class="fa fa-home"></i>Home</a>
            </section>
        </div>
        <!--Basic Scripts-->
        <script src="<?php echo base_url() ?>assets/js/jquery-2.0.3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

        <!--Beyond Scripts-->
        <script src="<?php echo base_url() ?>assets/js/beyond.min.js"></script>
    </body>
    <!--Body Ends-->
</html>
