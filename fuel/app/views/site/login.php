<?php echo Asset::css('assets2/css/style.css'); ?> 

                <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>CHECKKOBAYADKO</strong></h1>
                        </div>
		                    </div>
		                    <div class="row">
		                        <div class="col-sm-6 col-sm-offset-3 form-box">
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>User login</h3>
		                            		<p>Enter your username and password to log in:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-lock"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
								<div class="form floating-label">
								<?php echo Form::open(array()); ?>

									<?php if (isset($_GET['destination'])): ?>
										<?php echo Form::hidden('destination', $_GET['destination']); ?>
									<?php endif; ?>

									<?php if (isset($login_error)): ?>
										<div class="error"><?php echo $login_error; ?></div>
									<?php endif; ?>

									<div class="form-group <?php echo ! $val->error('email') ?: 'has-error' ?>">
										
										<?php echo Form::input('email', Input::post('email'), array('class' => 'form-control', 'placeholder' => 'Email or Username', 'autofocus')); ?>
								
										<?php if ($val->error('email')): ?>
											<span class="control-label"><?php echo $val->error('email')->get_message('You must provide a username or email'); ?></span>
										<?php endif; ?>
									</div>

									<div class="form-group <?php echo ! $val->error('password') ?: 'has-error' ?>">
										
										<?php echo Form::password('password', null, array('class' => 'form-control', 'placeholder' => 'Password')); ?>

										<?php if ($val->error('password')): ?>
											<span class="control-label"><?php echo $val->error('password')->get_message(':label cannot be blank'); ?></span>
										<?php endif; ?>
									</div>

									<div class="actions">
										<?php echo Form::submit(array('value'=>'Login', 'name'=>'submit', 'class' => 'btn btn-lg btn-danger btn-block')); ?>
									</div>

								<?php echo Form::close(); ?>
									</div>
								</div>
							</div><!--end .col -->
		                <div class="col-sm-3"></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

              
	