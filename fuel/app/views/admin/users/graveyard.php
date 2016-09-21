
<?php 
	if ($current_user->role != 3 && $current_user->role != 10 && $current_user->role != 6) {
		Response::redirect('/');
	}
?>

<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Listing of Users</li>
                <?php if ($current_user->role != 6): ?>

                <?php endif ?>
            </ol>
        </div><!--end .section-header -->
          <div class="section-body">
            <div class="card">
                <div class="card-body">
				<?php if ($users): ?>
				<?php echo Form::open(array("class"=>"form-horizontal", "action" => 'admin/users')); ?>
						<fieldset>
							<div class="form-group ">
								<?php $search = ""; ?>
									
									<?php echo Form::input('search',  Input::post('search', isset($user) ? $search : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Search' ));  
									?>
							</div>
							<div class="form-group">
									<?php echo Html::anchor('admin/users/'. $search, '<span class="glyphicon glyphicon-search"></span> Search', array('class' => 'btn btn-primary btn-sm')); ?> 
							</div>	
						</fieldset>
				<?php echo Form::open(array("class"=>"form-horizontal")); ?>
					
				<!-- <input type="submit" name="submit" value="submit" /> -->
				<div class="table-responsive">				
				<table class="table no-margin">
					<thead>
						<tr>
							<th>Username</th>
							<th>Full Name</th>
							<th>Mobile number</th>
							<th>Email</th>
							<th>Role</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
				<?php foreach ($users as $item): ?>		<tr>
							<td><?php echo $item->username; ?></td>
							<td><?php echo $item->lastname . ', ' . $item->firstname . ' ' . $item->middlename ?></td>
							<td><?php echo $item->mobile_number; ?></td>
							<td><?php echo $item->email; ?></td> 
							<?php foreach ($roles as $role): ?>
								<?php 
									if ($item->role == $role->id) 
									{
										echo "<td>$role->role_description</td>"; 
									} 
								?>
							<?php endforeach ?>
							<?php if ($current_user->role != 6): ?>
								<td>
									<!-- <?php //echo Html::anchor('admin/users/view/'.$item->id, 'View', array('class' => 'btn btn-primary btn-sm')); ?> | -->
									<?php echo Html::anchor('admin/users/activate/'.$item->id, 'Activate', array('onclick' => "return confirm('Are you sure?')",'class' => 'btn btn-primary btn-sm' )); ?>


								</td>
							<?php endif ?>
						</tr>
				<?php endforeach; ?>	</tbody>
				</table>
</div>
				<?php else: ?>
				<p>No Users.</p>

				<?php endif; ?> 
				 </div>
            </div>
        </div><!--end .section-body -->
    </section>
