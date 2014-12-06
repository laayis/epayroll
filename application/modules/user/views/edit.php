<div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">User: Edit</h1>
            <span class="pagedesc">Please enter the user information provided in the form below.</span>
            
<!--             <ul class="hornav"> -->
<!--                 <li class="current"><a href="#basicform">Basic</a></li> -->
<!--                 <li><a href="#validation">Validation</a></li> -->
<!--             </ul> -->
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        	
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
		    
            <div id="validation" class="subcontent" style="display: ">
            	
                    <?php echo form_open_multipart( "user/edit/" . $record->ID, array('class'=>'stdform', 'id'=>'form1') );?>
<!--                     <form id="form1" class="stdform" method="post" action="#"> -->
                    <input type="hidden" name="id" id="id" value="<?php echo $record->ID;?>">
                    	<p>
                        	<label>Username</label>
                            <span class="field"><input type="text" name="username" id="username"
												value="<?php echo @$_POST['username'] ? @$_POST['username'] : $record->username?>" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Password</label>
                            <span class="field"><input type="text" name="password" id="password"
												value="<?php echo @$_POST['password']?>" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Confirm Password</label>
                            <span class="field"><input type="text" name="cpassword" id="cpassword"
												value="<?php echo @$_POST['cpassword']?>" class="longinput" /></span>
                        </p>
                        
                    	<p>
                        	<label>First Name</label>
                            <span class="field"><input type="text" name="fname" id="fname"
												value="<?php echo @$_POST['fname'] ? @$_POST['fname'] : $record->fname;?>" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Middle Name</label>
                            <span class="field"><input type="text" name="mname" id="mname"
												value="<?php echo @$_POST['mname'] ? @$_POST['mname'] : $record->mname;?>" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Last Name</label>
                            <span class="field"><input type="text" name="lname" id="lname"
												value="<?php echo @$_POST['lname'] ? @$_POST['lname'] : $record->lname;?>" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Email</label>
                            <span class="field"><input type="text" name="email" id="email"
												value="<?php echo @$_POST['email'] ? @$_POST['email'] : $record->email;?>" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Position</label>
                            <span class="field"><input type="text" name="position" id="position"
												value="<?php echo @$_POST['position'] ? @$_POST['position'] : $record->position;?>" class="longinput" /></span>
                        </p>
                        
                        <p>
                        	<label>Image</label>
                            <span class="field"><input type="file" class="file_1" name="uimage" /></span> 
                        </p>
                        
                        <p>
                        	<label>Description</label>
                            <span class="field"><textarea cols="80" rows="5" name="desc" id="desc" class="mediuminput" required><?php echo @$_POST['desc'] ? @$_POST['desc'] : $record->desc;?></textarea></span> 
                        </p>
                        
                        <br />
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">Submit Button</button>
                        </p>
                    </form>

            </div><!--subcontent-->
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->