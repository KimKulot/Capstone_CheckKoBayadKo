
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
									<td><?php echo 100 * $paid / $total . "%"; ?></td>
									<td><?php echo 100 * $unpaid / $total . "%" ?></td>
									<td><?php echo 100 * $partial / $total . "%"; ?></td>
									<td> <?php echo Html::anchor('admin/accountants/view/'.$program->program_description, 'Students Financial Assessment', array('class' => 'btn ink-reaction btn-primary btn-raised btn-sm')); ?> </td>
									
									
										
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

						<!-- BEGIN RICKSHAW -->
		
						
							
										<div id="rickshawGraph" class="hidden"></div>
										<div id="rickshawDemo2" class="hidden"></div>
										<div id="slider" class="hidden"></div>
										
						




    <div class="col-lg-offset-1 col-md-8">
		<div class="card">
			<div class="card-body">
				<div id="morris-donut-graph" class="height-6" data-colors="#9C27B0,#2196F3,#0aa89e,#FF9800"></div>
			</div><!--end .card-body -->
		</div><!--end .card -->
		<em class="text-caption">Graphical Report</em>
	</div><!--end .col -->



<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

<script>
$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Browser market shares January, 2015 to May, 2015'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Microsoft Internet Explorer',
                    y: 56.33
                }, {
                    name: 'Chrome',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Firefox',
                    y: 10.38
                }, {
                    name: 'Safari',
                    y: 4.77
                }, {
                    name: 'Opera',
                    y: 0.91
                }, {
                    name: 'Proprietary or Undetectable',
                    y: 0.2
                }]
            }]
        });
    });
});
</script>



