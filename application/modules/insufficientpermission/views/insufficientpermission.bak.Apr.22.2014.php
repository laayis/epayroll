<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Access Denied: Insufficient Permission</h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			<h2>Attempted Access Detail</h2>
<!--			<h3>Attempted Access Detail: </h3>-->
			
			Module Name : <strong><?php echo ucfirst($this->uri->segment(1));?> <?php //echo $this->session->userdata(APP_PFIX . 'denied_module');?></strong> <br>
           	Permission Name : <strong><?php $permission = ($this->uri->segment(2)) ? $this->uri->segment(2) : 'Index'; echo ucfirst($permission);?><?php //echo $this->session->userdata(APP_PFIX . 'denided_permission');?></strong><br>
            <center style="padding-top:50px; font-size:20px; color:#f00; font-weight:bolder">Sorry, you are not authorized to access this module. <br><br><span style="color:#666; font-size: 14px">Please contact your System Administrator</span></center>
			
			
			</div>
			<!--  end table-content  -->
	
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>