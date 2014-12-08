<?php $uripart = ''; ?>
<div class="centercontent tables">
<div class="pageheader notab">
    <h1 class="pagetitle">Departments List</h1>
    <span class="pagedesc">
    </span>
</div><!--pageheader-->
<?php
if ($this->session->flashdata('error')) {
    echo '<div class="notibar msgalert"><a class="close"></a>' . $this->session->flashdata('error') . '</div>';
}

if ($this->session->flashdata('success'))
    echo '<div class="notibar msgsuccess">
                        <a class="close"></a><p>' . $this->session->flashdata('success') . '</p></div>';
?>

<div id="contentwrapper" class="contentwrapper">
    <!--
        <div class="contenttitle2">
            <h3>clinic: List (All)</h3>
        </div>contenttitle-->
<a href="<?php echo base_url("department/add"); ?>" title="Add" class="icon-5 info-tooltip">Add</a>

    <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">

        <colgroup>
            <col class="con0" style="width: 4%" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
        </colgroup>

        <thead>
            <tr>
                <th class="head0 nosort">
                    <input type="checkbox" /><a id="toggle-all" ></a>
                </th>
                <th class="head1">Department Name</th>
                <th class="head1">Department Code</th>
                
                <th class="head1">Actions</th>

            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="head0">
                    <span class="center">
                        <input type="checkbox" /><a id="toggle-all" ></a>
                    </span>
                </th>

                <th class="head1">Department Name</th>
                <th class="head1">Department Code</th>
                <th class="head1">Actions</th>
                
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($record as $val) { ?>
                <tr class="gradeA">
                    <td align="center"><span class="center">
                            <input type="checkbox" id="id[]" name="id[]" value="<?php echo $val->department_id; ?>" />
                        </span></td>

                    <td><?php echo $val->department_name; ?></a></td>
                    
                    <td><?php echo $val->department_code; ?></a></td>
                    
                    
                    <td class="options-width">
                        <a href="<?php echo base_url("department/edit/{$val->department_id}"); ?>" title="Edit" class="icon-1 info-tooltip">Edit</a>
                        <a href="<?php echo base_url("department/delete/{$val->department_id}"); ?><?php echo $uripart ?>" onclick="if (!confirm('Are you sure you want to delete this record??'))
                                    return false;" title="Delete" class="icon-2 info-tooltip">Delete</a>
                        <a href="<?php echo base_url("department/detail/{$val->department_id}"); ?>" title="Detail" class="icon-5 info-tooltip">Detail</a>
                    </td>
                </tr>
            <?php } ?> 

        </tbody>

    </table>

    <div id="actions-box">
        <a href="" class="action-slider"></a>
        <div id="actions-box-slider">
            <a href="#bulkdelete" class="action-delete" onclick="bulkaction('frmcheckbulk', 'slider/bulk_delete<?php echo $uripart ?>');">Delete</a>
            <a href="#bulkactivate" class="action-activate" onclick="bulkaction('frmcheckbulk', 'slider/bulkstatus/activate<?php echo $uripart ?>');">Activate</a>
            <a href="#bulkdeactivate" class="action-deactivate" onclick="bulkaction('frmcheckbulk', '/bulkstatus/deactivate<?php echo $uripart ?>');">Deactivate</a>
        </div>
        <div class="clear"></div>
    </div>
</div><!--contentwrapper-->

</div><!-- centercontent -->