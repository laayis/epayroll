<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Manage Employee Roles
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
                                <h3>Update Roles for: <span style="color: #92b22c"><?php echo $info->first_name ?>&nbsp;<?php echo $info->last_name ?></h3>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo form_open("employee/aroles"); ?>
                                    <table border="0" cellpadding="5" cellspacing="0" width="100%">
                                        <tr>
                                            <th style="text-align:left">Roles</th><th>Member of</th>
                                            <th style="width:30px">&nbsp;&nbsp;</th><th>Not Member of</th>
                                        </tr>
                                        <?php
                                        //$roleACL = new ACL($_GET['userID']);
                                        //$this->gcacl->getAllPerms('full');
                                        //$roles = $roleACL->getAllRoles('full');
                                        $roles = $this->gcacl->getAllRoles('full');
                                        foreach ($roles as $k => $v) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <label><?php echo $v['Name'] ?></label>
                                                </td>
                                                <td>
                                                    <span style="padding-left: 60px"><input type="radio" name="role_<?php echo $v['ID'] ?>" id="role_<?php echo $v['ID'] ?>_1" value="1" <?php
                                                        if ($this->gcacl->userHasRole($v['ID'])) {
                                                            echo 'checked="checked"';
                                                        }
                                                        ?> /></span>
                                                </td>
                                                <td>&nbsp;</td>
                                                <td >
                                                    <span style="padding-left: 70px"><input type="radio" name="role_<?php echo $v['ID'] ?>" id="role_<?php echo $v['ID'] ?>_0" value="0" <?php
                                                        if (!$this->gcacl->userHasRole($v['ID'])) {
                                                            echo ' checked="checked"';
                                                        }
                                                        ?> /></span>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                    <br>
                                    <input type="hidden" name="action" value="saveRoles" />
                                    <input type="hidden" name="userID" value="<?php echo $info->ID; ?>" />
                                    <span style="padding-left: 200px"><input type="submit" name="Submit" value="Save" /></span>
                                    <input type="button" name="Cancel" onclick="window.location = '<?php echo base_url(); ?>employee/detail/<?php echo $info->ID; ?>'" value="Cancel" />
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <div class="widgetbox uncollapsible">
                                        <div class="title"><h4>Update Roles & Permissions</h4></div>
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