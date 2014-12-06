<div class="pageheader">
    <h1 class="pagetitle">Designations</h1>
    <span class="pagedesc"></span>

    <ul class="hornav">
        <li class="current"><a href="#basicform"> <?php echo ucfirst($method); ?> Details</a></li>

    </ul>
</div>
<div id="contentwrapper" class="contentwrapper">

    <div id="basicform" class="subcontent">

        <!--        <div class="contenttitle2">
                    <h3> <?php echo ucfirst($method); ?></h3>
                </div>contenttitle-->

        <?php
        if (validation_errors())
            echo '<div class="notibar msgerror">
             <a class="close"></a>' . validation_errors() . '</div>';

        if ($this->session->flashdata('success'))
            echo '  <div class="notibar msgsuccess">
                        <a class="close"></a><p>' . $this->session->flashdata('success') . '</p></div>';

        if ($this->session->flashdata('error'))
            echo '<div class="notibar msgalert">
                        <a class="close"></a>' . $this->session->flashdata('error') . '</div>';
        ?> 
        <?php echo form_open_multipart(uri_string(), array('class' => 'stdform stdform2')); ?>


        <p>
            <label>Designation Name</label>
            <span class="field">
                <input type="text" name="designation_name" id="title" value="<?php echo (@$_POST['designation_name']) ? $_POST['designation_name'] : $editData->designation_name; ?>" class="inp-form" />
            </span>
        </p>
        
        <p class="stdformbutton">
            <button class="submit radius2">Submit Button</button>
            <input type="reset" class="reset radius2" value="Reset Button" />
        </p>
        </form>

        <br />


    </div><!--subcontent-->



</div><!--contentwrapper-->
