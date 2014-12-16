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
            Manage Designation
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
                    <span class="widget-caption">Designation List</span>
                </div>
                <div class="col-xs-12">
                    <a class="btn btn-small btnradious btn-primary" onclick="history.back()" href="index.php"><i class="fa fa-angle-double-left"></i> Back</a>
                    <a href="<?php echo base_url("designation/add"); ?>" title="Add" class="btn btn-small btn-primary">Add New <i class="fa fa-plus"></i></a>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr role="row">
                                <th>
                                    Designation Name
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($record as $val) { ?>
                                <tr>
                                    <td><?php echo $val->designation_name; ?></a></td>

                                    <td>
                                        <a href="<?php echo base_url("designation/edit/{$val->designation_id}"); ?>" title="Edit" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i>Edit</a>
                                        <a href="<?php echo base_url("designation/delete/{$val->designation_id}"); ?><?php echo $uripart ?>" onclick="if (!confirm('Are you sure you want to delete this record??'))
                                                    return false;" title="Delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i>Delete</a>
                                        <a href="<?php echo base_url("designation/detail/{$val->designation_id}"); ?>" title="Detail" class="btn btn-info btn-xs details"><i class="fa"></i>Detail</a>
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


