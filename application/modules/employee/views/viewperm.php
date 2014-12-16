<div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">User: View User Permissions</h1>
            <span class="pagedesc">This page is used to view permissions of an user.</span>
            
        </div><!--pageheader-->
        <div id="contentwrapper" class="contentwrapper lineheight21 withrightpanel">
        
        <?php
    if( validation_errors() )
        echo "<div class='error'>".validation_errors()."</div>"; 
    
    if( $this->session->flashdata( 'success' ) )
        echo "<div class='success'>".$this->session->flashdata( 'success' )."</div>";
	
    if( $this->session->flashdata( 'error' ) )
        echo "<div class='error'>".$this->session->flashdata( 'error' )."</div>";
?>
        
        <div class="subcontent chatcontent">
        <div id="chatmessage" class="chatmessage radius2" style="padding: 10px; height: auto">
            <div class="contenttitle2">
            	<h3>Permission For: <span style="color: #92b22c"><?php echo $info->fname?>&nbsp;<?php echo $info->mname?>&nbsp;<?php echo $info->lname?></span></h3>
            </div>
            <div class="contenttitle2">
            	<h3 style="text-transform: none">( Username: <span style="color: #92b22c"><?php echo $info->username?> </span> )</h3>
            </div>
            <br />
        
        	
            <p>
            <?php 
                    # initialize acl
                    //$this->gcacl->init($uid);
                    $aPerms = $this->gcacl->getAllPerms('full');

                    if(isset($aPerms)) { 
                        
                ?>
                <?php 
                    foreach ($aPerms as $k => $v)
                    {
                            echo "<strong>" . $v['Name'] . ": </strong>";
                            echo "<img src=\"" . base_url() . "images/";
                            if ($this->gcacl->hasPermission($v['Key']) === true)
                            {
                                    echo "allow.png";
                                    $pVal = "Allow";
                            } else {
                                    echo "deny.png";
                                    $pVal = "Deny";
                            }
                            echo "\" width=\"16\" height=\"16\" alt=\"$pVal\" title='".$pVal."' /><br />";
                    }
                ?>
                <?php } ?>
            </p>
            
            
            
            
            </div>
            </div>
            
            
            
        </div><!--contentwrapper-->
        
        <div class="rightpanel">
        	<div class="rightpanelinner">
                <div class="widgetbox uncollapsible">
                	<div class="title"><h4>View Permissions For:</h4></div>
                	<div class="widgetcontent nopadding">
                    	<div class="chatsearch">
                        	<strong>Please click on the list below to see the permission of that user.</strong>
                        </div>
                    	<ul class="contactlist">
                    	<?php if($userlist) { ?>
                                                <?php foreach($userlist as $u) {?>
                                            <li><?php echo anchor('user/vperms/' . $u->ID , $u->fname . '&nbsp;' . $u->mname . '&nbsp;' . $u->lname , array('title' => 'View Permission'))?></li> 
                                                <?php } ?>
                                                <?php } ?>
                        </ul>
                    </div><!--widgetcontent-->
                    
                    
                    
                    
                    
                </div><!--widgetbox-->
            </div><!--rightpanelinner-->
        </div><!--rightpanel-->
        
        
        
	</div><!-- centercontent -->