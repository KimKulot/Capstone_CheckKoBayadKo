<div id="content">

    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Scholarship</li>
                <?php echo Html::anchor('admin/accountants/create_scholarship', 'Add Scholarship', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>

            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                
				
				<?php if ($scholarships): ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Scholarship Provider</th>
							<th>Category</th>
							<th>Description</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($scholarships as $scholar): ?>
							<tr>
								<td><?php echo $scholar->scholarship_provider; ?></td>
								<td><?php echo $scholar->category; ?></td>
								<td><?php echo $scholar->description; ?></td>
								<td> <?php echo Html::anchor('admin/accountants/edit_scholar/'.$scholar->id, 'Edit', array('class' => 'btn ink-reaction btn-primary btn-raised btn-sm')); ?> </td>
							</tr>
						<?php endforeach ?>
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
