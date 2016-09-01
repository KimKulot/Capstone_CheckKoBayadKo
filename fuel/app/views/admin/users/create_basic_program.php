<div id="content">
    <div class="card contain-sm style-transparent">
        <div class="row">
            <div class="col-sm-3"></div>
                <div class="col-sm-12" style="text-align: left;">
                    <section>
                        <div class="section-body">
                            <div class="card card-bordered style-primary">
                                <div class="card-head">
                                    <header><i class="fa fa-fw fa-tag"></i>New Basic Program</header>
                                </div>
                                <div class="card-body style-default-bright">
                                <!-- BEGIN MAIN CONTENT -->
									<?php echo render('admin/users/_form_basic_program'); ?>
								<!-- END MAIN CONTENT -->
									<p><?php echo Html::anchor('admin/users', 'Back'); ?></p>
									<h3>Programs Available</h3>
										<?php foreach ($basicprograms as $key): ?>
											<h5><?php echo $key->basic_program_description; ?></h5>
										<?php endforeach ?>
							</div>
                         </div>
                     </div>
                 </section>
             </div>
         </div>
     </div>
 </div>



