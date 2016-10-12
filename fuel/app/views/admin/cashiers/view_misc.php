<div id="content">

    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Listing of Miscellanous</li>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">

<?php if ($miscellanous): ?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Type</th>
			<th>Amount</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($miscellanous as $item): ?>
			
			<tr>
				<td><?php echo $item->type; ?></td>
				<td><span>&#8369</span><?php echo " " . number_format($item->amount,2); ?></td>
				<?php if ($current_user->role != 6): ?>
					<td><?php echo Html::anchor('admin/cashiers/edit_misc/'.$item->id, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?> 
					<?php echo Html::anchor('admin/cashiers/delete_misc/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')",'class' => 'btn btn-danger btn-sm' )); ?>
						
					</td>
				<?php endif ?>
			</tr>
				
		<?php endforeach; ?>	
	 </tbody>
</table>

<?php else: ?>
<p>No Miscellaneous.</p>
<?php endif; ?><!-- <p>
	<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

</p> -->
</div>
            </div>
        </div><!--end .section-body -->
    </section>