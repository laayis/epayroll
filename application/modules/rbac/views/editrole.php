

<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">RBAC: Manage Roles - Edit "<?php echo $info->roleName;?>" Role</h1>
            <span class="pagedesc">Edit information/name and permissions of a role</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper withrightpanel">
                        
                <div class="contenttitle2">
                	<h3>Please enter role details</h3>
                	
                	
            
			
			
                </div><!--contenttitle-->
                
            <?php
			if( validation_errors() ) { 
			?>
			<div class="notibar announcement">
                        <a class="close"></a>
                        <h3>Validation Errors Occurs</h3>
                        <p><?php echo validation_errors()?></p>
                    </div>
			
			<?php 
			} 
			?>

			<?php 
			if( $this->session->flashdata( 'success' ) ) {
			?>
			<div class="notibar msgsuccess">
                        <a class="close"></a>
                        <p><?php echo $this->session->flashdata( 'success' )?></p>
                    </div>
          	<?php 
          	}
          	?>
			

          	<?php 
			if( $this->session->flashdata( 'error' ) ) { 
			?>
			<div class="notibar msgerror">
                        <a class="close"></a>
                        <p><?php echo $this->session->flashdata( 'error' )?></p>
                    </div>
            <?php 
			} 
			?>
			
                <?php  echo form_open('rbac/editrole') ?>
                <p>
                <label for="roleName" style="font-weight: bold">Role Name: </label> <input type="text" name="roleName" id="roleName" value="<?php echo $info->roleName; ?>" class="smallinput" required />
                </p>
                
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Permissions for this role</th>
                            <th class="head1">Allow</th>
                            <th class="head0">Deny</th>
                            <th class="head1">Ignore</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">Permissions for this role</th>
                            <th class="head1">Allow</th>
                            <th class="head0">Deny</th>
                            <th class="head1">Ignore</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $roles = $this->gcacl->getAllRoles('full');
                ?>
                <?php
		        $rPerms = $this->gcacl->getRolePerms($roleID);
		        $aPerms = $this->gcacl->getAllPerms('full');
		        if($aPerms) { 
		        foreach ($aPerms as $k => $v)
		        {
		        	?>  
                        <tr <?php //echo $class;?>>
                            <td>
                            	<?php echo $v['Name']?>
                            </td>
                            
                            <td class="center">
                            <?php 
                            echo "<input type=\"radio\" name=\"perm_" . $v['ID'] . "\" id=\"perm_" . $v['ID'] . "_1\" value=\"1\"";
            				if (@$rPerms[$v['Key']]['value'] === true && $roleID != '') { echo " checked=\"checked\""; }
            				echo " />";
            				?>
							
                            </td>
                            <td class="center">
                            <?php echo "<input type=\"radio\" name=\"perm_" . $v['ID'] . "\" id=\"perm_" . $v['ID'] . "_0\" value=\"0\"";
            				if (@$rPerms[$v['Key']]['value'] != true && $roleID != '') { echo " checked=\"checked\""; }
            				echo " />";
            				?>
                            </td>
                            <td class="center">
                            <?php echo "<input type=\"radio\" name=\"perm_" . $v['ID'] . "\" id=\"perm_" . $v['ID'] . "_X\" value=\"X\"";
            if ($roleID == '' || !@array_key_exists($v['Key'],$rPerms)) { echo " checked=\"checked\""; }
            echo " />";
                            ?>
                        </tr>
                        <?php } ?>
		                <?php } else { ?>
		                <tr>
							<td colspan="6" style="text-align:center; color:#F00"> <strong>Sorry No Record(s) Found </strong></td>
						  </tr>
		                <?php } ?>
                        
                    </tbody>
                </table>
                
                <input type="hidden" name="action" value="saveRole" />
    <input type="hidden" name="roleID" value="<?php echo $roleID; ?>" />
    <input type="submit" name="Submit" value=" Edit " />
</form>
<form action="" method="post">
    <input type="hidden" name="action" value="delRole" />
    <input type="hidden" name="roleID" value="<?php echo $roleID; ?>" />
    <input type="submit" name="Delete" value=" Delete " />
</form>
<form action="" method="post">
    <input type="submit" name="Cancel" value=" Cancel " />
</form>
                
          <br /><br />
                
          
                
        
        </div><!--contentwrapper-->
        
        
        <div class="rightpanel">
        	<div class="rightpanelinner">
                <div class="widgetbox uncollapsible">
                	<div class="title"><h4>Edit Roles:</h4></div>
                    <div class="widgetcontent nopadding">
                    	<div class="chatsearch">
                        	<strong>Please use the list below to edit information and permission of a role.</strong>
                        </div>
                    	<ul class="contactlist">
                    	<?php if($roleslist) { ?>
                                                <?php foreach($roleslist as $rl) {?>
                                            <li><?php echo anchor('rbac/editrole/' . $rl->ID , $rl->roleName , array('title' => 'Edit Role'))?></li> 
                                                <?php } ?>
                                                <?php } ?>
                        </ul>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
            </div><!--rightpanelinner-->
        </div><!--rightpanel-->
        
        
	</div><!-- centercontent -->