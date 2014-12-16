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

<?php
if ($this->session->flashdata('error')) {
    echo '<div class="notibar msgalert"><a class="close"></a>' . $this->session->flashdata('error') . '</div>';
}

if ($this->session->flashdata('success'))
    echo '<div class="notibar msgsuccess">
<a class="close"></a><p>' . $this->session->flashdata('success') . '</p></div>';
?>

<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Manage Employee
        </h1>
    </div>
</div>
<!-- /Page Header -->
<!-- /Page Header -->
<div class="page-body">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="widget">
                <div class="widget-header ">
                    <span class="widget-caption">Employee List</span>
                </div>
                <div class="col-xs-12">
                    <a class="btn btn-small btnradious btn-primary" onclick="history.back()" href="index.php"><i class="fa fa-angle-double-left"></i> Back</a>
                    <a href="<?php echo base_url("employee/add"); ?>" title="Add" class="btn btn-small btn-primary">Add New <i class="fa fa-plus"></i></a>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr role="row">
                                <th>
                                    Employee Full Name
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Department
                                </th>
                                <th>
                                    Added Date
                                </th>
                                <th>
                                    Options
                                </th>
                            </tr>
                        </thead>

                        <?php
                        if (isset($record)) {
                            $i = 1;
                            ?>
                            <?php
                            foreach ($record as $val) {
                                if ($i++ % 2 == 0) {
                                    $class = 'class="gradeX"';
                                } else {
                                    $class = 'class="gradeX"';
                                }
                                ?>
                                <tr <?php echo $class; ?>>
                                    <td>
                                        <span style="display: none">
                                            <input type="checkbox" id="check_all[]" name="check_all[]" value="<?php echo $val->ID; ?>" />
                                        </span>
                                        <a href="<?php echo base_url(); ?>employee/detail/<?php echo $val->ID; ?>"><?php echo $val->first_name ?>&nbsp;<?php echo $val->last_name ?></a></td>
                                    <td><a href="<?php echo base_url(); ?>employee/detail/<?php echo $val->ID; ?>"><?php echo $val->username ?></a></td>
                                    <td><a href=""><?php echo $val->email ?></a></td>
                                    <td><a href=""><?php echo $val->department_name ?></a></td>
                                    <td class="center"><?php echo $val->joining_date ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url(); ?>employee/edit/<?php echo $val->ID; ?>" title="Edit" class="edit"><img src="<?php echo base_url()?>assets/img/edit.png" /></a> &nbsp; 
                                        <a href="<?php echo base_url(); ?>employee/delete/<?php echo $val->ID; ?><?php echo $uripart ?>" onclick="if (!confirm('Are you sure you want to delete this record??'))
                                                    return false;" title="Delete" class="delete"><img src="<?php echo base_url()?>assets/img/trash.png" /></a> &nbsp;
                                        <a href="<?php echo base_url(); ?>employee/detail/<?php echo $val->ID; ?>" title="Detail" class="edit"><img src="<?php echo base_url()?>assets/img/attachment.png" /></a> &nbsp;

                                        <a href="<?php echo base_url(); ?>employee/aroles/<?php echo $val->ID; ?>" title="Manage/Assign Roles" class="edit"><img src="<?php echo base_url()?>assets/img/addfolder.png" /></a> &nbsp;

                                        <a href="<?php echo base_url(); ?>employee/aperms/<?php echo $val->ID; ?>" title="Manage/Assign Permissions" class="edit"><img src="<?php echo base_url()?>assets/img/permission.png" /></a> &nbsp;

                                        <a href="<?php echo base_url(); ?>employee/vperms/<?php echo $val->ID; ?>" class="edit" title="View Permissions"><img src="<?php echo base_url()?>assets/img/vpermission.png" /></a>
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
    </div>
</div>
<!-- /Page Content -->