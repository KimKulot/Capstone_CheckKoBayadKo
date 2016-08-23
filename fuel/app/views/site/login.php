

<section class="section-account">
    <div class="page-icon animated bounceInDown" style="margin-top:-400px; margin-left:-170px;"><?php echo Asset::img('checks.jpg'); ?></div>
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="text-align: center;">
                    <br/>
                    <span class="text-lg text-bold text-primary">CheckKoBayadKo</span>
                    <br/><br/>
	<!-- <div class="col-md-23"> -->
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
								<?php echo Form::submit(array('value'=>'Login', 'name'=>'submit', 'class' => 'btn btn-lg btn-primary btn-block')); ?>
							</div>

						<?php echo Form::close(); ?>
							</div>
						</div>
					</div><!--end .col -->
                <div class="col-sm-3"></div>
            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>


