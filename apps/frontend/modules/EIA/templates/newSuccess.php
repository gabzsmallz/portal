<?php slot ('title', 'EIA Application Form') ?>	

<div class="row-fluid">
		<div class="span9">
			<div class="widget">
				<div class="widget-title">
					<h4><i class="icon-reorder"></i> Fill the following form</h4>
				</div>
				<div class="widget-body form">
					<div class="alert alert-block alert-info fade in">
						<h4 class="alert-heading">Step 1</h4>
							<p>
								Please Provide Below Fields to Start your application for Environmental Impact Assessment certificate 
							</p>
					</div>
					<?php include_partial('form',array('form' => $form)) ?>
				</div>
			</div>
		</div>
        <div class="span3">
						
							
							<div class="widget">
											<div class="widget-title">
												<h4><i class="icon-bell"></i>Important</h4>						
											</div>
											<div class="widget-body">
											<div class="alert alert-success">
										    <strong> To successfuly submit this information, make sure that you have a valid business 
											registration number. You company must be registered via the Business Registration System</strong>
											</div>
											</div>
							</div>
			</div>
</div>