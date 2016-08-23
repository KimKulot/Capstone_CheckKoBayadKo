
<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">New Program</li>
            </ol>
        </div>
        <div class="section-body">
            <div class="card">	
            	<div class="card-body">

<?php echo render('admin/users/_form_program'); ?>


<p><?php echo Html::anchor('admin/users', 'Back'); ?></p>
<h3>Programs Available</h3>
	<?php foreach ($programs as $key): ?>
		<h5><?php echo $key->program_description ?></h5>
	<?php endforeach ?>
</div>
            </div>
        </div><!--end .section-body -->
    </section>