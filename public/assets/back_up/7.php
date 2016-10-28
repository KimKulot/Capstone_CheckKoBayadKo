<?php require('../templates/header.php'); ?>

<?php require('../../../models/donate.php'); ?>
<?php require('../../../controller/donates/index.php'); ?>
<br>
<!-- top Content -->
<!-- <div class="top-header" style="background-image: url(../../../public/images/child-beggar-1.jpg); no-repeat; height: 500px; width:100%" > -->
<div class="top-header" style="background-image: url(../../../public/images/donation_wallpaper.jpg); ">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="top-message">
					
				</div>
			</div>
			<div class="col-lg-6">
				<div id="main-slider-form">
				
				<div style="margin-top: -30px">

				</div>

				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->
</div>
<!-- top Content -->
<!-- Users List -->
<div class="section">
	<div class="container sshots">
		<div class="row">
			<div class="col-lg-12 ">
				
				<br>
			</div>
			
			<!-- Start Table List -->
				
			<!-- <?php 
			$params = $_GET;
			?> -->
			

			<div class="container">
		            <div class="row">
		                <div class="col-lg-12 text-center" > 
		                    <h2>List of <?=$_GET['type']; ?></h2>
		                    <hr class="star-primary">
		                    <!-- <a href="major.php"> Attendance</a> -->
		            <div style="margin-top: -150px">    
				  <!-- START SEARCH  -->
			          <form class="download-form" action="../../../controller/orphans/add.php" method="post"  >
						<fieldset>
									<div class="col-lg-6">
										<input id="search" class="form-control" type="text" placeholder="Search" name="search">
									</div>
									<div class="col-lg-6" style="margin-top: -20px">

										<button type="submit" class="btn btn-default d-btn" name="submit">Submit</button>
										
									</div>
						</fieldset>
					</form>
			      <!-- END SEARCH -->
			      <div class="table-responsive" style="margin-top: -20px">      
			      <table class="table table-hover" border="1">
					<thead>
						<tr>

							<th>Name</th>
							<th>Address</th>
							<th>Population</th>
							<th>Contact number</th>
							<th>History</th>
							<th>Action</th>

						</tr>
					</thead>

					<tbody>
					<?php foreach ($data['donates'] as $param): ?>
						<tr> 
							<td><?= $param['name'];?></td>
							<td><?= $param['address'];?></td>
							<td><?= $param['population'];?></td>
							<td><?= $param['contactnumber'];?></td>
							<td><?= $param['history'];?></td>
							<td><center><a href="<?= 'view.php?id=' . $param['user_id']; ?> ">Visit</a></center></td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
				</div>
				</div>   
				<br>
				<!-- <button><a href="<?= '../users/add.php' ?>">Add new user</a></button> -->
			</div>
			</div>
			<!-- END TABLE LIST -->
			
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</div>
<!--  Users List -->



<?php require('../templates/footer.php'); ?>
























