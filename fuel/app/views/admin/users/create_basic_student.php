
<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">New Student</li>
            </ol>
        </div>
        <div class="section-body">
            <div class="card">	
            	<div class="card-body">
					<?php echo render('admin/users/_form_basic_student'); ?>

					<p><?php echo Html::anchor('admin/users', 'Back'); ?></p>
				</div>
            </div>
        </div><!--end .section-body -->
    </section>