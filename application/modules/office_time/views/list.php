<?php $uripart = ''; ?>
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
            Manage Department
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
                    <span class="widget-caption">Department List</span>
                </div>
                <div class="col-xs-12">
                    <a class="btn btn-small btnradious btn-primary" onclick="history.back()" href="index.php"><i class="fa fa-angle-double-left"></i> Back</a>
                    <a href="<?php echo base_url("department/add"); ?>" title="Add" class="btn btn-small btn-primary">Add New <i class="fa fa-plus"></i></a>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr role="row">
                                <th>
                                    Department Name
                                </th>
                                <th>
                                    Department Code
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($record as $val) { ?>
                                <tr>
                                    <td><?php echo $val->department_name; ?></a></td>

                                    <td><?php echo $val->department_code; ?></a></td>

                                    <td>
                                        <a href="<?php echo base_url("department/edit/{$val->department_id}"); ?>" title="Edit" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i>Edit</a>
                                        <a href="<?php echo base_url("department/delete/{$val->department_id}"); ?><?php echo $uripart ?>" onclick="if (!confirm('Are you sure you want to delete this record??'))
                                                    return false;" title="Delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i>Delete</a>
                                        <a href="<?php echo base_url("department/detail/{$val->department_id}"); ?>" title="Detail" class="btn btn-info btn-xs details"><i class="fa"></i>Detail</a>
                                    </td>
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


