

<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">RBAC: Manage Permission - <?php if($permID) {?>Edit "<?php echo $this->gcacl->getPermNameFromID($permID); ?>"<?php }else { ?>Add New<?php } ?></h1>
            <span class="pagedesc">Edit information of a permission ie a module's task</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper withrightpanel">
                        
                <div class="contenttitle2">
                	<h3>Please enter permission details</h3>
                	
                	
            
			
			
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
			
                <?php	echo form_open('rbac/manageperm') ?>
                <p>
                <label for="permName">Permission (Module Task) Name: </label> <input type="text" name="permName" id="permName" value="<?php echo $this->gcacl->getPermNameFromID(@$permID); ?>" class="smallinput" required />
                </p>
                
                <p>
                <label for="permKey">Permission (Module Task) Key:</label><input type="text" name="permKey" id="permKey" value="<?php echo $this->gcacl->getPermKeyFromID(@$permID); ?>" maxlength="30" class="smallinput" required />
                </p>
                
    			<input type="hidden" name="action" value="savePerm" />
    			<input type="hidden" name="permID" value="<?php echo @$permID; ?>" />
    			<input type="submit" name="Submit" value="Submit" class="form-submit" />
			</form>
			
			<form action="" method="post">
			     <input type="hidden" name="action" value="delPerm" />
			     <input type="hidden" name="permID" value="<?php echo @$permID; ?>" />
			    <input type="submit" name="Delete" value="Delete" />
			</form>
			
			<form action="" method="post">
			    <input type="submit" name="Cancel" value="Cancel" />
			</form>
                
                
                
          <br /><br />
                
          
                
        
        </div><!--contentwrapper-->
        
        
        <div class="rightpanel">
        	<div class="rightpanelinner">
                <div class="widgetbox uncollapsible">
                	<div class="title"><h4>Manage (Update) Permissions:</h4></div>
                    <div class="widgetcontent nopadding">
                    	<div class="chatsearch">
                        	<strong>Please use the list below to edit the permission information</strong>
                        </div>
                    	<ul class="contactlist">
                    	<?php if($permslist) { ?>
                                                <?php foreach($permslist as $pl) {?>
                                            <li><?php echo anchor('rbac/manageperm/' . $pl->ID , $pl->permName , array('title' => 'Edit Permission'))?></li> 
                                                <?php } ?>
                                                <?php } ?>
                        </ul>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
            </div><!--rightpanelinner-->
        </div><!--rightpanel-->
        
        
	</div><!-- centercontent -->