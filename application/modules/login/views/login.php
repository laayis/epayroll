<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <!--Head-->
    <head>
        <meta charset="utf-8" />
        <title>Login Page</title>

        <meta name="description" content="login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.png" type="image/x-icon">

            <!--Basic Styles-->
            <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />

            <!--Beyond styles-->
            <link  href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/demo.min.css" rel="stylesheet" />
            <link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet" />
            <link id="skin-link" href="" rel="stylesheet" type="text/css" />

            <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
            <script src="<?php echo base_url() ?>assets/js/skins.min.js"></script>
    </head>
    <!--Head Ends-->
    <!--Body-->
    <body style="background-color: #135987">
        <div class="login-container animated fadeInDown">
            <div class="loginbox bg-white">
                <div class="loginbox-title">SIGN IN</div>
                <?php
                if ($this->session->flashdata('errorlogin')) {
                    echo "<div class='loginbox-textbox alert alert-error' style='color: #e46f61; margin: 5px 0px; border: 1px solid #fff'>";
                    echo $this->session->flashdata('errorlogin');
                    echo "</div>";
                }
                if ($this->session->flashdata('success')) {
                    echo "<div class='has-success'>";
                    echo $this->session->flashdata('success');
                    echo "</div>";
                }
                ?>
                <?php
                ## from attributes
                $attributes = array('name' => 'frmlogin', 'id' => 'frmlogin');
                ?>
                <?php echo form_open("login/verify", $attributes); ?>
                <div class="loginbox-textbox">
                    <input type="text" class="form-control" placeholder="username" name="username"  id="username" required />
                </div>
                <div class="loginbox-textbox">
                    <input type="password" class="form-control" placeholder="Password"  name="password" id="password" required />
                </div>
                <div class="loginbox-forgot">
                    <a href="<?php site_url('#')?>">Forgot Password?</a>
                </div>
                <div class="loginbox-submit">
                    <button class="btn btn-block btn-primary">Login<span class="icon-arrow-right"></span></button>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <div id="footer">
            <div class="footer-date-display"><?php echo date('H:i A'); ?></div>
            <div class="footer-day-display"><?php echo date('l, F dS'); ?></div>
            <div class="footer-bottom">
                <div class="powered-by"><span class="powered-text" style="margin-right: 15px;">&copy; Copyright 2014 Third Pole Connects. All Rights Reserved.
                    </span></div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->

        <!--Basic Scripts-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.0.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

        <!--Beyond Scripts-->
        <script src="<?php echo base_url(); ?>assets/js/beyond.js"></script>
    </body>
    <!--Body Ends-->
</html>
