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
        <!--Jquery Select2-->
        <script src="<?php echo base_url() ?>assets/js/select2.js"></script>
        <!--Bootstrap Tags Input-->
        <script src="<?php echo base_url() ?>assets/js/bootstrap-tagsinput.js"></script>

        <!--Bootstrap Date Picker-->
        <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>

        <!--Bootstrap Time Picker-->
        <script src="<?php echo base_url() ?>assets/js/bootstrap-timepicker.js"></script>

        <!--Bootstrap Date Range Picker-->
        <script src="<?php echo base_url() ?>assets/js/moment.js"></script>
        <script src="<?php echo base_url() ?>assets/js/daterangepicker.js"></script>

        <!--Jquery Autosize-->
        <script src="<?php echo base_url() ?>assets/js/jquery.autosize.js"></script>

        <!--Fuelux Spinner-->
        <script src="<?php echo base_url() ?>assets/js/fuelux.spinner.min.js"></script>

        <!--jQUery MiniColors-->
        <script src="<?php echo base_url() ?>assets/js/jquery.minicolors.js"></script>

        <!--jQUery Knob-->
        <script src="<?php echo base_url() ?>assets/js/jquery.knob.js"></script>

        <!--noUiSlider-->
        <script src="<?php echo base_url() ?>assets/js/jquery.nouislider.js"></script>

        <!--jQRangeSlider-->
        <script src="<?php echo base_url() ?>assets/js/jquery-ui-1.10.4.custom.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jQAllRangeSliders-withRuler-min.js"></script>


        <script>
            //--Jquery Select2--
            $("#e1").select2();
            $("#e2").select2({
                placeholder: "Select a State",
                allowClear: true
            });

            //--Bootstrap Date Picker--
            $('.date-picker').datepicker();

            //--Bootstrap Time Picker--
            $('#timepicker1').timepicker();

            //--Bootstrap Date Range Picker--
            $('#reservation').daterangepicker();

            //--JQuery Autosize--
            $('#textareaanimated').autosize({append: "\n"});

            //--Fuelux Spinner--
            $('.spinner').spinner();


            //--jQuery MiniColors--
            $('.colorpicker').each(function () {
                $(this).minicolors({
                    control: $(this).attr('data-control') || 'hue',
                    defaultValue: $(this).attr('data-defaultValue') || '',
                    inline: $(this).attr('data-inline') === 'true',
                    letterCase: $(this).attr('data-letterCase') || 'lowercase',
                    opacity: $(this).attr('data-opacity'),
                    position: $(this).attr('data-position') || 'bottom left',
                    change: function (hex, opacity) {
                        if (!hex)
                            return;
                        if (opacity)
                            hex += ', ' + opacity;
                        try {
                            console.log(hex);
                        } catch (e) {
                        }
                    },
                    theme: 'bootstrap'
                });

            });


            //---Jquery Knob--
            $(".knob").knob();


            //---noUiSlider--
            $("#sample-minimal").noUiSlider({
                range: [0, 100],
                start: [20, 80],
                connect: true,
                serialization: {
                    mark: ',',
                    resolution: 0.1,
                    to: [[$("#minimal-label1"), 'html'],
                        [$('#minimal-label2'), 'html']]
                }
            });

            $("#sample-onehandle").noUiSlider({
                range: [20, 100],
                start: 40,
                step: 20,
                handles: 1,
                connect: "lower",
                serialization: {
                    to: [$("#low"), 'html']
                }
            });
            $("#sample-onehandle-upper").noUiSlider({
                range: [20, 100],
                start: 70,
                step: 20,
                handles: 1,
                connect: "upper",
                serialization: {
                    to: [$("#low"), 'html']
                }
            });
            $('.slider').noUiSlider({
                range: [0, 255],
                start: 127,
                handles: 1,
                connect: "lower",
                orientation: "vertical",
                serialization: {
                    resolution: 1
                }
                , slide: function () {

                    var color = 'rgb(' + $("#red").val()
                            + ',' + $("#green").val()
                            + ',' + $("#blue").val()
                            + ')';

                    $(".result").css({
                        background: color
                        , color: color
                    });
                }
            });

            $(".sized-slider").noUiSlider({
                range: [0, 100],
                start: 50,
                handles: 1,
                connect: "lower",
                serialization: {
                    to: [$("#low"), 'html']
                }
            });

            $(".colored-slider").noUiSlider({
                range: [0, 100],
                start: 30,
                handles: 1,
                connect: "lower",
                serialization: {
                    to: [$("#low"), 'html']
                }
            });

            //--jQRangeSlider--
            $(".sized-rangeslider").rangeSlider();
            $(".colored-rangeslider").rangeSlider();
            $("#rangeslider").rangeSlider();
            $("#editrangeslider").editRangeSlider();
            $("#daterangeslider").dateRangeSlider();
            $("#noarrowsrangeslider").rangeSlider({arrows: false});
            $("#boundsrangeslider").rangeSlider({bounds: {min: 10, max: 90}});
            $("#dvrangeslider").rangeSlider({defaultValues: {min: 13, max: 66}});
            $("#delayrangeslider").rangeSlider({valueLabels: "change", delayOut: 4000});
            $("#durationrangeslider").rangeSlider({valueLabels: "change", durationIn: 1000, durationOut: 1000});
            $("#disabledrangeslider").rangeSlider({enabled: false});
            $("#steprangeslider").rangeSlider({step: 10});
            $("#labelsrangeslider").rangeSlider({valueLabels: "hide"});
            $("#simlescalesrangeslider").rangeSlider({
                scales: [
                    // Primary scale
                    {
                        first: function (val) {
                            return val;
                        },
                        next: function (val) {
                            return val + 10;
                        },
                        stop: function (val) {
                            return false;
                        },
                        label: function (val) {
                            return val;
                        },
                        format: function (tickContainer, tickStart, tickEnd) {
                            tickContainer.addClass("myCustomClass");
                        }
                    },
                    // Secondary scale
                    {
                        first: function (val) {
                            return val;
                        },
                        next: function (val) {
                            if (val % 10 === 9) {
                                return val + 2;
                            }
                            return val + 1;
                        },
                        stop: function (val) {
                            return false;
                        },
                        label: function () {
                            return null;
                        }
                    }]
            });
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
            $("#dateRulersExample").dateRangeSlider({
                bounds: {min: new Date(2012, 0, 1), max: new Date(2012, 11, 31, 12, 59, 59)},
                defaultValues: {min: new Date(2012, 1, 10), max: new Date(2012, 4, 22)},
                scales: [{
                        first: function (value) {
                            return value;
                        },
                        end: function (value) {
                            return value;
                        },
                        next: function (value) {
                            var next = new Date(value);
                            return new Date(next.setMonth(value.getMonth() + 1));
                        },
                        label: function (value) {
                            return months[value.getMonth()];
                        },
                        format: function (tickContainer, tickStart, tickEnd) {
                            tickContainer.addClass("myCustomClass");
                        }
                    }]
            });
        </script>


    </body>

</html>
