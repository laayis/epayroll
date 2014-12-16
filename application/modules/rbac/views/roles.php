

<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">RBAC: Roles List (All)</h1>
            <span class="pagedesc">List of Roles for user group</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                        
                <div class="contenttitle2">
                	<h3>Roles</h3>
                	
                	<?php 
                if( $this->session->flashdata( 'error' ) )
                {
                ?>
                <div class="error"><?php echo $this->session->flashdata( 'error' );?></div>
                <?php
                }
                ?>
                
                <?php 
                if( $this->session->flashdata( 'success' ) )
                {
                ?>
                <div class="error"><?php echo $this->session->flashdata( 'success' );?></div>
                <?php
                }
                ?>
                	
                </div><!--contenttitle-->
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Role Name</th>
                            <th class="head1">Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">Role Name</th>
                            <th class="head1">Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $roles = $this->gcacl->getAllRoles('full');
                ?>
                <?php if( isset($roles) ) { $i = 1;?>
                <?php foreach ($roles as $k => $v) { if($i++ % 2 == 0) {$class = 'class="gradeX"';} else {$class = 'class="gradeX"';}?>    
                        <tr <?php echo $class;?>>
                            <td>
                            <span style="display: none">
                            	<input type="checkbox" id="id[]" name="id[]" value="<?php echo $v['ID'];?>" />
                            </span>
                            <a href="<?php echo base_url();?>index.php/rbac/editrole/<?php echo $v['ID'];?>"><?php echo $v['Name']?></a></td>
                            
                            <td class="center">
                            <a href="<?php echo base_url(); ?>index.php/rbac/editrole/<?php echo $v['ID']; ?>" title="Edit" class="edit">Edit</a> &nbsp; 
							<a href="<?php echo base_url(); ?>index.php/user/delete/<?php echo $v['ID']; ?><?php echo @$uripart?>" onclick="if(!confirm('Are you sure you want to delete this record??')) return false;" title="Delete" class="delete">Delete</a> &nbsp;
							
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
                
          <br /><br />
                
          
                
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->