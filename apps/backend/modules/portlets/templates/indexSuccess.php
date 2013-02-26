
<div id="page" class="dashboard">
<div class="row-fluid">
					<div class="span12">    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							Information Portlets Dashboard
							<small>Edit, Create Information Portlets record.</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo url_for('dashboard/index')?>">Home</a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="<?php echo url_for('dashboard/index')?>">Dashboard</a></li> <span class="divider">/</span>
							<li>
							<i class="icon-desktop"></i>
							<a href="<?php echo url_for('portlets/index')?>">Portlets</a></li> <span class="divider">/</span>
							<li>
							<i class="icon-user"></i>
							<a href="#">
							   <b>
								  <font color="blue">
									<?php $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
                                      print 'Welcome, You are logged in as '.$username;
									?>
									</font>
								</b>
							</a></li>
							<li class="pull-right dashboard-report-li">
							<i class="icon-time"></i>
				              Logged in on <font color="blue">
									<?php
                                       $date = date("F j, Y");
									   print $date;
									?>
									</font>
							</li>
							
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				<div class="span11">
				   
				   <div class="widget">
								<div class="widget-title">
									<h4>Information Portlets</h4>
															
								</div>
								<div class="widget-body">
									<table class="table table-striped table-bordered" id="sample_1">
									  <thead>
										<tr>
										  
										  <th>Investment certificate</th>
										  <th>Eia certificate</th>
										  <th>Tax exemptions</th>
										  <th>Date</th>
										  <th>Actions</th>
										  
										</tr>
									  </thead>
									  <tbody>
										<?php foreach ($portletss as $portlets): ?>
										<tr>
										  
										  <td><?php echo $portlets->getInvestmentCertificate() ?></td>
										  <td><?php echo $portlets->getEiaCertificate() ?></td>
										  <td><?php echo $portlets->getTaxExemptions() ?></td>
										  <td><?php echo $portlets->getCreatedAt() ?></td>
										  <td><a href="<?php echo url_for('portlets/show?id='.$portlets->getId()) ?>"><button class="btn"><i class="icon-eye-open"></i> View</button></a></td>
										</tr>
										<?php endforeach; ?>
									  </tbody>
									</table>
								</div>
							</div>
				   
				   
				   
					

				<a href="<?php echo url_for('portlets/new') ?>"><button class="btn btn-warning"><i class="icon-plus icon-white"></i> Create</button></a>

				
				
				</div>

  				
	</div>
</div>


