<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Manage Employee Permissions
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
                        <span class="widget-caption">This page is used to reassign/manage roles for a employee.</span>
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
                            <div class="contenttitle2">
                                <h3>Update Permissions for: <span style="color: #92b22c"><?php echo $info->first_name ?>&nbsp;<?php echo $info->last_name ?></h3>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo form_open("employee/aperms/"); ?>
                                    <table border="0" cellpadding="5" cellspacing="0">
                                        <tr><th style="text-align: left">Permissions</th><th style="width: 40px"></th><th>Activity</th></tr>
                                        <tr><td colspan="3" >&nbsp;</td></tr>
                                        <?php
                                        //$userACL = new ACL($_GET['userID']);
                                        $rPerms = $this->gcacl->perms;
                                        $aPerms = $this->gcacl->getAllPerms('full');
                                        foreach ($aPerms as $k => $v) {
                                            echo "<tr><td>" . $v['Name'] . "</td>";
                                            echo "<td>&nbsp;&nbsp;</td>";
                                            echo "<td><select name=\"perm_" . $v['ID'] . "\">";
                                            echo "<option value=\"1\"";
                                            if (@$rPerms[$v['Key']]['value'] === true && @$rPerms[$v['Key']]['inheritted'] != true) {
                                                echo " selected=\"selected\"";
                                            }
                                            echo ">Allow</option>";
                                            echo "<option value=\"0\"";
                                            if (@$rPerms[$v['Key']]['value'] === false && @$rPerms[$v['Key']]['inheritted'] != true) {
                                                echo " selected=\"selected\"";
                                            }
                                            echo ">Deny</option>";
                                            echo "<option value=\"x\"";
                                            if (@$rPerms[$v['Key']]['inheritted'] == true || !array_key_exists(@$v['Key'], $rPerms)) {
                                                echo " selected=\"selected\"";
                                                if (@$rPerms[$v['Key']]['value'] === true) {
                                                    $iVal = '(Allow)';
                                                } else {
                                                    $iVal = '(Deny)';
                                                }
                                            }
                                            echo ">Inherit $iVal</option>";
                                            echo "</select></td></tr>";
                                            echo "<tr><td colspan='3'>&nbsp;</td></tr>";
                                        }
                                        ?>
                                    </table>
                                    <br>
                                    <input type="hidden" name="action" value="savePerms" />
                                    <input type="hidden" name="userID" value="<?php echo $info->ID ?>" />
                                    <input type="submit" name="Submit" value="Submit" />
                                    <input type="button" name="Cancel" onclick="window.location = '<?php echo base_url(); ?>employee/detail/<?php echo $info->ID; ?>'" value="Cancel" />
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <div class="widgetbox uncollapsible">
                                        <div class="title"><h4>Update Roles & Permissions</h4></div>
                                        <div class="widgetcontent nopadding">
                                            <div class="chatsearch">
                                                <strong>Manage Permissions For</strong>
                                            </div>
                                            <ul class="contactlist">
                                                <?php if ($userlist) { ?>
                                                    <?php foreach ($userlist as $u) { ?>
                                                        <li><?php echo anchor('employee/aperms/' . $u->ID, $u->first_name . '&nbsp;' . $u->last_name, array('title' => 'View Permission')) ?></li> 
                                                    <?php } ?>
                                                <?php } ?>
                                            </ul>
                                        </div><!--widgetcontent-->

                                        <div class="widgetcontent nopadding">
                                            <div class="chatsearch">
                                                <strong>Manage Roles For</strong>
                                            </div>
                                            <ul class="contactlist">
                                                <?php if ($userlist) { ?>
                                                    <?php foreach ($userlist as $u) { ?>
                                                        <li><?php echo anchor('employee/aroles/' . $u->ID, $u->first_name . '&nbsp;' . $u->last_name, array('title' => 'View Permission')) ?></li> 
                                                    <?php } ?>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>