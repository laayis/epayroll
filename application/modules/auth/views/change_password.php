<h1><?php echo lang('change_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/change_password");?>

      <p>
            <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
            <?php echo form_input($old_password);?>
      </p>

      <p>
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
            <?php echo form_input($new_password);?>
      </p>

      <p>
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
            <?php echo form_input($new_password_confirm);?>
      </p>

      <?php echo form_input($user_id);?>
      <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>

<?php echo form_close();?>
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
                <div class="loginbox-title">Forget Password</div>
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
                <?php echo form_open("auth/change_password"); ?>
                <div class="loginbox-textbox">
                    <div id="infoMessage" style="color:red"><?php echo $message; ?></div>
                </div>

                <div class="loginbox-textbox">
                    <input type="password" class="form-control" name="old_password" placeholder="old_password" for="old_password"></input> <br />
                </div>
                <div class="loginbox-textbox">
                    <input type="password" class="form-control" name="new_password_confirm" placeholder="new_password_confirm" for="new_password_confirm"></input> <br />
                </div>

                <div class="loginbox-submit">
                    <button class="btn btn-block btn-primary">Submit<span class="icon-arrow-right"></span></button>
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

