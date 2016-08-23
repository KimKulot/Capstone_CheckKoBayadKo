<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Editing User</li>
            </ol>
        </div>
        <div class="section-body">
            <div class="card">
            	<div class="card-body">
                    <?php echo render('admin/users/_form_student'); ?>
                    <p>

                    	<?php echo Html::anchor('admin/users/view/'.$user->id, 'View'); ?> |
                    	<?php echo Html::anchor('admin/users', 'Back'); ?></p>
				</div>
            </div>
        </div><!--end .section-body -->
    </section>