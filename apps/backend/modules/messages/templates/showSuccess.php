<div id="page" class="dashboard">
<div class="row-fluid">
					
				</div>
					<div class="row-fluid">
						<div class="span12">
						
						<div class="widget">
								
								<div class="widget-body">
									<div class="row-fluid">
										<div class="span6">
											<p class="text-warning">From: <?php echo $messages['sender']?></p>
											 <p class="text-success">Date: <?php echo $messages['created_at'] ?></p></p>
											<p class="lead">
												<?php echo $messages['message'] ?>
											</p>
											<p>
											 
											 <?php 
											  // $model = new Messages() ;
											 ?>
											 <?php echo link_to('download attachment', '/uploads/documents/messages_docs/'.$messages['attachement'], array('target' => '_blank')); ?>
											 
											</p>
											<p>
											  <a href="<?php echo url_for('messages/index') ?>">
											  <button type="button" class="btn btn-primary">inbox</button>
											  </a>
											
											</p>
										</div>
										
									</div>
									
									
								</div>
							</div>
						
						</div>	
					</div>	
</div>


