
<?php 
		if ($current_user->role != 3 && $current_user->role != 10 && $current_user->role != 6) 
		{
			Response::redirect('/');
		}
 ?>
 <div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb"> 
                <li class="active">Account List</li>
                <?php echo Html::anchor('admin/accountants/index_student', 'Basic Education', array('class' => 'btn btn-sm btn-primary pull-right ink-reaction')); ?>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <div class="card">
                <div class="card-body">
				<?php if ($students): ?>
				<div class="table-responsive">	
				<table class="table no-margin">
					<thead>
						<tr>
							<th>Program</th>
							<th>Fully Paid</th>
							<th>Not Paid</th>
							<th>With Partial Payment</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>

							<?php foreach ($programs as $program): ?>
								<?php 
									$paid = 0;
									$unpaid = 0;
									$partial = 0;
								 ?>
							<td><?php echo $program->program_description; ?></td>
							<?php foreach ($students as $student): ?>
							<?php if($program->program_description == $student->program){ ?>
								<?php 
								if($student->down_payment == ($student->tuition_fee + $student->misc)){
									$paid++; 
								}elseif ($student->down_payment == 0) {
									$unpaid++;
								}else{
									$partial++;
								}
								?>
							<?php } 
								?>
							
							<?php endforeach ?>
							<?php $total = $paid + $unpaid + $partial; ?>
								<?php if($total != 0){ ?>
									<td><?php echo $pa = 100 * $paid / $total . "%"; ?></td>
									<td><?php echo 100 * $unpaid / $total . "%" ?></td>
									<td><?php echo 100 * $partial / $total . "%"; ?></td>
									<td> <?php echo Html::anchor('admin/accountants/view/'.$program->program_description, 'Students Financial Assessment', array('class' => 'btn ink-reaction btn-primary btn-raised btn-sm')); ?> </td>
									 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
									    <script type="text/javascript">

									      // Load Charts and the corechart package.
									      google.charts.load('current', {'packages':['corechart']});

									      google.charts.setOnLoadCallback(paidStatisticalChart);

									      google.charts.setOnLoadCallback(partialPaidStatisticalChart);

									      google.charts.setOnLoadCallback(notPaidStatisticalChart);

									      // BEGIN PAID STATISTICAL CHART
									      function paidStatisticalChart() {

									       var data = google.visualization.arrayToDataTable([
									          ['Task', 'Hours per Day'],
									          ['BSIT',   100],
									          ['BSBA',      1000],
									          ['BSCS',  300],
									          ['BSED', 800],
									          ['BSCE',    200]
									        ]);

									        var options = {
									          title: 'Statistical Report (paid)',
									          pieHole: 0.4,
									        };

									        var chart = new google.visualization.PieChart(document.getElementById('donutchart_paid'));
									        chart.draw(data, options);
									      }
									      // END PAID STATISTICAL CHART

									      // BEGIN PARTIAL PAID STATISTICAL CHART
									      function partialPaidStatisticalChart() {

									        var data = google.visualization.arrayToDataTable([
									          ['Task', 'Hours per Day'],
									          ['BSIT',     100],
									          ['BSBA',      200],
									          ['BSCS',  400],
									          ['BSED', 800],
									          ['BSCE',    8]
									        ]);

									        var options = {
									          title: 'Statistical Report (Partially Paid)',
									          pieHole: 0.4,
									        };

									        var chart = new google.visualization.PieChart(document.getElementById('donutchart_partialpaid'));
									        chart.draw(data, options);
									      }
									       // END PARTIAL PAID STATISTICAL CHART

									      // BEGIN NOT PAID STATISTICAL CHART
									      function notPaidStatisticalChart() {

									        var data = google.visualization.arrayToDataTable([
									          ['Task', 'Hours per Day'],
									          ['BSIT',     100],
									          ['BSBA',      200],
									          ['BSCS',  400],
									          ['BSED', 800],
									          ['BSCE',    8]
									        ]);

									        var options = {
									          title: 'Statistical Report (Not Paid)',
									          pieHole: 0.4,
									        };

									        var chart = new google.visualization.PieChart(document.getElementById('donutchart_notpaid'));
									        chart.draw(data, options);
									      }
									      // END NOT PAID STATISTICAL CHART

									    </script>
																
										
								<?php } ?>
						</tr>
						<?php endforeach; ?>
					 </tbody>
				</table>
				</div>
					

				<?php else: ?>
				<p>No Students.</p>

				<?php endif; ?><!-- <p>
					<?php echo Html::anchor('admin/students/create', 'Add new Student', array('class' => 'btn btn-success')); ?>

				</p> -->
				</div>
            </div>
        </div><!--end .section-body -->
    </section>


		   
		    <!--Table and divs that hold the pie charts-->
		 	<div class="card card-body">
		       <div id="donutchart_paid" style="width: 900px; height: 500px;"></div>
		       <div id="donutchart_partialpaid" style="width: 900px; height: 500px;"></div>
		       <div id="donutchart_notpaid" style="width: 900px; height: 500px;"></div>
		  	</div>


