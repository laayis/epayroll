<?php
$uripart = '';
if ($search) {
    $uripart .= '/search';
    if ($searchkey)
        $uripart .= '/' . $searchkey;
    if ($offset)
        $uripart .= '/' . $offset;
}
else {
    if ($offset)
        $uripart .= '/' . $offset;
}
?>
<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Manage Employee
        </h1>
    </div>
    <!--Header Buttons-->
    <div class="header-buttons">
        <a class="sidebar-toggler" href="#">
            <i class="fa fa-arrows-h"></i>
        </a>
        <a class="refresh" id="refresh-toggler" href="">
            <i class="glyphicon glyphicon-refresh"></i>
        </a>
        <a class="fullscreen" id="fullscreen-toggler" href="#">
            <i class="glyphicon glyphicon-fullscreen"></i>
        </a>
    </div>
    <!--Header Buttons End-->
</div>
<!-- /Page Header -->
<div class="page-body">
    <div class="col-xs-12 col-md-12">
        <div class="well with-header with-footer">
            <div class="header bordered-blue">
                All Employee Lists
            </div>
            <?php
            if ($this->session->flashdata('error')) {
                ?>
                <div class="error"><?php echo $this->session->flashdata('error'); ?></div>
                <?php
            }
            ?>

            <?php
            if ($this->session->flashdata('success')) {
                ?>
                <div class="error"><?php echo $this->session->flashdata('success'); ?></div>
                <?php
            }
            ?>
            <ul style="list-style-type:none; float:left">
                <li>View: <select name="pageSize" id="pageSize">
                        <option value="10" selected="selected">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> Per Page
                </li>
            </ul>
            <table class="table table-striped table-bordered table-hover">
                <thead class="bordered-darkgray">
                    <tr>
                    <tr>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Added Date</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>

                    </tr>
                </thead>
                <?php if (isset($record)) {
                    $i = 1;
                    ?>
                    <?php
                    foreach ($record as $val) {
                        if ($i++ % 2 == 0) {
                            $class = 'class="odd"';
                        } else {
                            $class = 'class="even"';
                        }
                        ?>
                        <tr <?php echo $class; ?>>
                            <td>
                                <span style="display: none">
                                    <input type="checkbox" id="check_all[]" name="check_all[]" value="<?php echo $val->ID; ?>" />
                                </span>
                                <a href="<?php echo base_url(); ?>index.php/user/detail/<?php echo $val->ID; ?>"><?php echo $val->fname ?>&nbsp;<?php echo $val->mname ?>&nbsp;<?php echo $val->lname ?></a></td>
                            <td><a href="<?php echo base_url(); ?>index.php/user/detail/<?php echo $val->ID; ?>"><?php echo $val->username ?></a></td>
                            <td><a href=""><?php echo $val->email ?></a></td>
                            <td class="center"><?php echo $val->cdate ?></td>
                            <td class="center"><a href="<?php echo base_url(); ?>index.php/user/status/<?php echo ($val->status == 1) ? 'deactivate' : 'activate'; ?>/<?php echo $val->ID ?><?php echo $uripart ?>" onclick="if (!confirm('Are you sure you want to <?php echo ($val->status == 1) ? 'deactivate' : 'activate'; ?> this record??'))
                                                return false;"><?php echo ($val->status == 1) ? '<font color="green">Active</font>' : '<font color="red">Inactive</font>'; ?></a></td>
                            <td class="center">
                                <a href="<?php echo base_url(); ?>index.php/user/edit/<?php echo $val->ID; ?>" title="Edit" class="btn btn-default btn-xs blue"><i class="fa fa-edit"></i>Edit</a> &nbsp; 
                                <a href="<?php echo base_url(); ?>index.php/user/delete/<?php echo $val->ID; ?><?php echo $uripart ?>" onclick="if (!confirm('Are you sure you want to delete this record??'))
                                                    return false;" title="Delete" class="btn btn-default btn-xs black"><i class="fa fa-trash-o"></i>Delete</a> &nbsp;
                                <a href="<?php echo base_url(); ?>index.php/user/detail/<?php echo $val->ID; ?>" title="Detail" class="btn btn-default btn-xs blue"><i class="fa fa-"></i>Detail</a> 
                            </td>
                        </tr>
    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" style="text-align:center; color:#F00"> <strong>Sorry No Record(s) Found </strong></td>
                    </tr>
<?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
