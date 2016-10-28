<!-- <?php //echo Asset::css('theme-default/materialadmin.css'); ?> -->
<title>Welcome dear students!</title>         	

<!-- START STUDENT NAME -->
<h3></h3>
<!-- END STUDENT NAME -->
    <!-- start: page -->
	<div id="content">
	<div class="card contain-sm style-transparent">
        <div class="row">
            <div class="col-sm-3"></div>
            	<div class="col-sm-14" style="text-align: left;">
				    <section>
				        <div class="section-body">
				            <div class="card card-bordered style-primary">
				                <div class="card-head">
				                    <header><i class="fa fa-fw fa-tag"></i>New Student</header>
				                </div>
				                <div class="card-body style-default-bright">
						<?php echo Form::open(array("class"=>"form-horizontal", "action" => 'admin/upload_image', 'enctype' => 'multipart/form-data')); ?>
		
							<fieldset>
								
								
								<div class="col-sm-9">
								<br>
									<div class="form-group ">
										<?php $search = ""; ?>
											
											<?php echo Form::input(array('class' => 'col-md-4 form-control', 'type'=>'password', 'placeholder'=>'Password' , 'name' => 'password', 'id' => 'password', 'required' ));  
											?>

									</div>
								</div>

								<div class="col-sm-9">
								<br>
									<div class="form-group ">
										<?php $search = ""; ?>
											
											<?php echo Form::input(array('class' => 'col-md-4 form-control', 'type'=>'password', 'placeholder'=>'Confirm Password' , 'name' => 'confirmpassword', 'id' => 'confirm_password', 'required'));  
											?>

									</div>
								</div>

								<div class="col-sm-9">
								<br>
									<div class="form-group ">
										<?php $search = ""; ?>
											
											<?php echo Form::input(array('class' => 'col-md-4 form-control', 'type'=>'number', 'placeholder'=>'Mobile number', 'name' => 'mobile_number', 'value' => $user["mobile_number"], 'required'));  
											?>

									</div>
								</div>
								<br>
								<div class="col-sm-9">
								<br>
									<div class="form-group ">
											
											<?php echo Form::input(array('class' => 'col-md-4 form-control', 'type'=>'file', 'name' => 'image' ));  
											?>

									</div>
								</div>

								<div class="col-sm-9">
								<br>
									<div class="form-group ">
										<?php  echo Form::submit(array('class' => 'btn btn-primary btn-sm', 'value'=>'submit', 'type' => 'submit', 'name' => 'submit')); ?>
									</div>
								</div>
								<!-- <div class="form-group">
										<?php echo Html::anchor('admin/users/'. $search, '<span class="glyphicon glyphicon-search"></span> Search', array('class' => 'btn btn-primary btn-sm')); ?> 
								</div> -->	
							</fieldset>

							<!-- <form action="admin/users/index_search" method="post">
								search <input type="text" name="search" required>
								<input type="submit">
							</form> -->
						<?php echo Form::open(array("class"=>"form-horizontal")); ?>

							<!-- <?php

							 
							  // echo Form::open(array('enctype' => 'multipart/form-data'));
							  // echo Form::file&#40;'filename'&#41;;
							  // echo Form::submit('submit');
							  // echo Form::close();

							?> -->

						</div>
						 </div>
					 </div>
				 </section>
			 </div>
		 </div>
	 </div>
 </div>





 <!-- footer script  -->
<script>
var password = document.getElementById("password")
, confirm_password = document.getElementById("confirm_password");

function validatePassword(){
	if(password.value != confirm_password.value) {
		confirm_password.setCustomValidity("Passwords Don't Match");
	} else {
		confirm_password.setCustomValidity('');
	}
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>