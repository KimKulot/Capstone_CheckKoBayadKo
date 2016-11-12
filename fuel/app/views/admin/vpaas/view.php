<div id="content">

    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Listing of Students</li>
                <!-- <?php echo Html::anchor('admin/vpaas/index', 'course', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?> -->
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">

<?php if ($programs): ?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Full Name</th>
			<th>Program</th>
			<th>Tuition Fee</th>
			<th>Misc</th>
			<th>Total Payment</th>
			<th>Amount per exam</th>
			<th>Balance</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

<?php foreach ($students as $item): ?>
	<?php foreach ($programs as $program): ?>
		<?php if ($program->program_description == $item->program): ?>
			<tr>
				<?php foreach ($users as $key): ?>
					<?php if($item->student_id == $key->id){ ?>
						<td><?php echo $key->lastname . ', ' . $key->firstname . ' ' . $key->middlename ?></td>
					<?php } ?>
				<?php endforeach ?>
				<td><?php echo $item->program; ?></td>
				<td><span>&#8369</span><?php echo " " . number_format($item->tuition_fee,2); ?></td>
				<td><span>&#8369</span><?php echo " " . number_format($item->misc,2); ?></td>
				<td><span>&#8369</span><?php echo " " . number_format($item->down_payment,2); ?></td>
				<td><span>&#8369</span><?php echo " " . number_format($item->breakdown,2); ?></td>
				<td><span>&#8369</span><?php echo " " . number_format($item->balance,2); ?></td>
			</tr>
		<?php endif ?>
	<?php endforeach ?>
<?php endforeach; ?>	
	 </tbody>
</table>

<?php else: ?>
<p>No Students.</p>
<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

</p> -->
</div>
            </div>
        </div><!--end .section-body -->
    </section>