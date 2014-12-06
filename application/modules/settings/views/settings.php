<script>
    /*
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: success,
        dataType: dataType
    });
    */
   
    function updateSetting(fldid,msgid)
    {
        //$('#'fldid).focusout
        var fldvalue = $('#'+fldid).val();
        //alert(fldvalue);
        $.ajax({
            type: 'POST',
            url: base_url + 'index.php/settings/update',
            data: {field: fldid, value: fldvalue},
            /*
            dataType: function(updstat){
                alert(updstat);
            },
            */
           success: function(status){
               //alert(status);
               if(status == 1)
               {
                   //$('#'+msgid).html('<span class="error-inner">Successfully Updated.</span>').fadeOut(5000, function(){$this.remove()});
                   //$('#'+msgid).html('<span class="error-inner">Successfully Updated.</span>').fadeOut(5000);
                   $('<div class="success-left"></div><div class="success-inner">Successfully Updated.</div>').appendTo('#'+msgid).fadeOut(5000, function(){
                        $(this).remove();
                   });
                   
//                   $('<div>Value of #member_activation changed to: '+$(this).val()+'</div>').appendTo('#ma_msg').fadeOut(5000, function(){
//					$(this).remove();
//				});
               }
               else
               {    
                   //$('#'+msgid).html('Update Failed');
                   $('<div class="error-left"></div><div class="error-inner">Update Failed.</div>').appendTo('#'+msgid).fadeOut(5000, function(){
                        $(this).remove();
                   });

               }
            }
            
        });
    }
</script>
<div id="content-outer">
<!-- start content --> 
<div id="content">


<div id="page-heading"><h1>Location: Site Settings</h1></div>
<?php
	
    if( validation_errors() )
    echo "<div class='error'>".validation_errors()."</div>"; 
    
    if( $this->session->flashdata( 'success' ) )
    echo "<div class='success'>".$this->session->flashdata( 'success' )."</div>";
	
	if( $this->session->flashdata( 'error' ) )
    echo "<div class='error'>".$this->session->flashdata( 'error' )."</div>";
	
?>
<!--<form method="post" action="">-->
<?php //echo form_open_multipart( "location/addcity/" );?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="<?php echo base_url();?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="<?php echo base_url();?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no"><!--1--></div>
			<div class="step-dark-left"><a href="">Configuration</a></div>
			<div class="step-dark-right">&nbsp;</div>
			<!--<div class="step-no-off">2</div>
			<div class="step-light-left">Select related products</div>
			<div class="step-light-right">&nbsp;</div>
			<div class="step-no-off">3</div>
			<div class="step-light-left">Preview</div>
			<div class="step-light-round">&nbsp;</div>-->
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<!--<tr>
			<th valign="top">Parent Category:</th>
			<td>
            <select name="parent_cat_id" class="styledselect_form_1">
            <option value="0">None</option>
            </select>
            </td>
			<td></td>
		</tr>-->
		<?php
                if($settings)
                {
                    foreach($settings as $data)
                    {
                ?>
                    
                    
                    <?php
                        if($data->settings_name == 'site_email_info')
                        {
                    ?>    
                <tr>
			<th valign="top"><?php echo $data->settings;?>:</th>
			<td><input type="text" name="site_email_info" id="site_email_info" value="<?php echo $data->settings_value;?>" class="inp-form" onblur="updateSetting('site_email_info','sei_msg')" /></td>
                        <td><span id="sei_msg" style="padding-left:5px"></span></td>
		</tr>
                    <?php
                        }
                    ?>
                
                    
                    <?php
                        if($data->settings_name == 'site_email_support')
                        {
                    ?>    
                <tr>
			<th valign="top"><?php echo $data->settings;?>:</th>
			<td><input type="text" name="<?php echo $data->settings_name;?>" id="site_email_support" value="<?php echo $data->settings_value;?>" class="inp-form" onblur="updateSetting('site_email_support','ses_msg')" /></td>
			<td id="ses_msg"></td>
		</tr>
                    <?php
                        }
                    ?>
                
                
                    <?php
                        if($data->settings_name == 'member_activation')
                        {
                    ?>    
<!--                <tr>
			<th valign="top"><?php echo $data->settings;?>:</th>
			<td>
                        <select name="member_activation" id="member_activation" class="styledselect_form_1"  >
                            <option value="1" <?php if($data->settings_value == 1) {echo 'selected';}?>>On</option>
                            <option value="0" <?php if($data->settings_value == 0) {echo 'selected';}?>>Off</option>
                        </select>
			<td><span style="float:left">&nbsp;&nbsp;</span><input type ="button" value="Update" onclick="updateSetting('member_activation','ma_msg')" class="form-update"><span id="ma_msg" style="float:right"></span></td>
		</tr>-->
                
                
                
                    <?php
                        }
                    ?>
                
                    
                    <?php
                        if($data->settings_name == 'vendor_activation')
                        {
                    ?>    
<!--                <tr>
			<th valign="top"><?php echo $data->settings;?>:</th>
			<td>
                            <input type="text" name="vendor_activation" id="vendor_activation" value="<?php echo $data->settings_value;?>" class="inp-form" />
                        <select name="vendor_activation" id="vendor_activation" class="styledselect_form_1">
                            <option value="1" <?php if($data->settings_value == 1) {echo 'selected';}?>>On</option>
                            <option value="0" <?php if($data->settings_value == 0) {echo 'selected';}?>>Off</option>
                        </select>
                        </td>
			<td><span style="float:left">&nbsp;&nbsp;</span><input type ="button" value="Update" onclick="updateSetting('vendor_activation','va_msg')" class="form-update"><span id="va_msg" style="float:right"></span></td>
		</tr>-->
                    <?php
                        }
                    ?>
                
                
                <?php
                    }
                }
                ?>
        
<!--        <tr>
			<th valign="top">City Slug:</th>
			<td><input type="text" name="city_slug" id="city_slug" value="<?php echo @$_POST['city_slug']?>" class="inp-form" /></td>
			<td></td>
		</tr>
        -->
        
		
        
<!--        <tr>
			<th valign="top">Status:</th>
			<td>
            <select name="status" class="styledselect_form_1">
            	<option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
            </td>
			<td></td>
		</tr>
			-->
<!--	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" />
			<input type="reset" value="" class="form-reset"  />
		</td>
		<td></td>
	</tr>-->
	</table>
	<!-- end id-form  -->

	</td>
	<td>

	<!--  start related-activities -->
	
	<!-- end related-activities -->

</td>
</tr>
<tr>
<td><img src="<?php echo base_url();?>images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>

</form>




<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>