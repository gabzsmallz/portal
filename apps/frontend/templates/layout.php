<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php include_slot('title', 'RDB - Investor Eportal System') ?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link rel="shortcut icon" href="/favicon.png" />
	<?php include_stylesheets() ?>
    <?php include_javascripts() ?>
</head>
<!-- END HEAD -->
<body>
	<!-- BEGIN HEADER -->
	<?php if($sf_user->isAuthenticated()): ?>
	<div id="header" class="navbar navbar-inverse">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="index.html">
				<img  src="/images/logordb.png" alt ="LOGO" />
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="arrow"></span>
				</a>          
				<!-- END RESPONSIVE MENU TOGGLER -->				
				<div class="top-nav">
					<!-- BEGIN QUICK SEARCH FORM -->
					<form class="navbar-search hidden-phone">
						<div class="search-input-icon">
							<input type="text" class="search-query dropdown-toggle" id="quick_search" placeholder="Search" data-toggle="dropdown" />
							<i class="icon-search"></i>
							<!-- BEGIN QUICK SEARCH RESULT PREVIEW -->
							<ul class="dropdown-menu extended">								
								<li>
									<span class="arrow"></span>
									<p>Found 23 results</p>
								</li>
								<li>
									<a href="#">
									<span class="label label-warning"><i class="icon-comment"></i></span>
									Re: Nick Dalton, Sep 11:...<i class="icon icon-arrow-right"></i>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-important"><i class="icon-bullhorn"></i></span>
									Office Setup, Mar 12...<i class="icon icon-arrow-right"></i>
									</a>
								</li>
							</ul>
							<!-- END QUICK SEARCH RESULT PREVIEW -->
						</div>
					</form>
					<!-- END QUICK SEARCH FORM -->
					<!-- BEGIN TOP NAVIGATION MENU -->				
					<ul class="nav pull-right" id="top_menu">
						<!-- BEGIN NOTIFICATION DROPDOWN -->	
						<li class="dropdown" id="header_notification_bar">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-warning-sign"></i>
							<span class="label label-important">15</span>
							</a>
							<ul class="dropdown-menu extended notification">
								<li>
									<p>You have 14 new notifications</p>
								</li>
								<li>
									<a href="#">
									<span class="label label-success"><i class="icon-plus"></i></span>
									New user registered. 
									<span class="small italic">Just now</span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-important"><i class="icon-bolt"></i></span>
									Server #12 overloaded. 
									<span class="small italic">15 mins</span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-warning"><i class="icon-bell"></i></span>
									Server #2 not respoding.
									<span class="small italic">22 mins</span>
									</a>
								</li>
								<li>
									<a href="#">See all notifications</a>
								</li>
							</ul>
						</li>
						
						<!-- END NOTIFICATION DROPDOWN -->
						<!-- BEGIN INBOX DROPDOWN -->
						<li class="dropdown" id="header_inbox_bar">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-envelope-alt"></i>
							<span class="label label-success">5</span>
							</a>
							<ul class="dropdown-menu extended inbox">
								<li>
									<p>You have 12 new messages</p>
								</li>
								<li>
									<a href="#">
									<span class="photo"><img src="/images/avatar-mini.png" alt="avatar"/></span>
									<span class="subject">
									<span class="from">Lisa Wong</span>
									<span class="time">Just Now</span>
									</span>
									<span class="message">
									Vivamus sed auctor nibh congue nibh.
									</span>  
									</a>
								</li>
								<li>
									<a href="#">
									<span class="photo"><img src="/images/avatar-mini.png" alt="avatar"/></span>
									<span class="subject">
									<span class="from">Alina Fionovna</span>
									<span class="time">16 mins</span>
									</span>
									<span class="message">
									Vivamus sed auctor nibh congue.
									</span>  
									</a>
								</li>
								<li>
									<a href="#">
									<span class="photo"><img src="/images/avatar-mini.png" alt="avatar"/></span>
									<span class="subject">
									<span class="from">Mila Rock</span>
									<span class="time">2 hrs</span>
									</span>
									<span class="message">
									Vivamus sed auctor nibh congue.
									</span>  
									</a>
								</li>
								<li>
									<a href="#">See all messages</a>
								</li>
							</ul>
						</li>
						<!-- END INBOX DROPDOWN -->
						<li class="divider-vertical hidden-phone hidden-tablet"></li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-wrench"></i>
							<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="icon-cogs"></i> System Settings</a></li>
								<li><a href="#"><i class="icon-pushpin"></i> Shortcuts</a></li>
								<li><a href="#"><i class="icon-trash"></i> Trash</a></li>								
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
						<li class="divider-vertical hidden-phone hidden-tablet"></li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="icon-user"></i> Mark King</a></li>
								<li><a href="#"><i class="icon-envelope-alt"></i> Inbox</a></li>
								<li><a href="#"><i class="icon-tasks"></i> Tasks</a></li>
								<li><a href="#"><i class="icon-ok"></i> Calendar</a></li>
								<li class="divider"></li>
								<li><?php echo link_to('<i class="icon-key"></i> Logout','@sf_guard_signout'); ?></li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul> 
					<!-- END TOP NAVIGATION MENU -->	
				</div>
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div id="sidebar" class="nav-collapse collapse">
			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			<div class="navbar-inverse">
				<form class="navbar-search visible-phone">
					<input type="text" class="search-query" placeholder="Search" />
				</form>
			</div>
			<!-- END RESPONSIVE QUICK SEARCH FORM -->
			<!-- BEGIN SIDEBAR MENU -->
			<ul>
				<li class="active"><?php echo link_to('<i class="icon-home"></i> Dashboard', '@homepage') ?> </li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<i class="icon-table"></i> Investment Certificate
					<span class="arrow"></span>
					</a>					
					<ul class="sub">
						<li class=""><a href="<?php echo url_for('investmentapp/new') ?>"><i class="icon-tag"></i>Application Form</a></li>
						
					</ul>
				</li>
				<li><a  href="#"><i class="icon-table"></i> EIA Certificate</a></li>
				<li class="">
					<a href="" >
					<i class="icon-lightbulb"></i> Help
					</a>
				</li>				
				<li> <?php echo link_to('<i class="icon-signout"></i> Logout','@sf_guard_signout'); ?></li>
			</ul>
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div id="body">

			<!-- BEGIN PAGE CONTAINER-->			
			<div class="container-fluid">
	<?php endif ?>
				<?php if(!$sf_user->isAuthenticated()): ?>
					<div  class="header_not_signed_in">
					<img src="/images/logo_example.png" alt='logo'>
					</div>
				<?php endif ?>
				<?php if ($sf_user->hasFlash('notice')): ?>
				<div class="flash_notice">
					<?php echo $sf_user->getFlash('notice') ?>
				</div>
				<?php endif ?>	
			
				<?php if ($sf_user->hasFlash('error')): ?>
				<div class="flash_error">
					<?php echo $sf_user->getFlash('error') ?>
				</div>
				<?php endif ?>
			
					<?php echo $sf_content ?>
				<?php if(!$sf_user->isAuthenticated()): ?>
				<div id="footer" class="footer_not_signed_in">
				2013 &copy; Rwanda Development Board. All Rights Reserved.
				</div>
				<?php endif; ?>
				<?php if($sf_user->isAuthenticated()): ?>	
				</div>
				<!-- END PAGE CONTENT-->

				
				
			
			
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div id="footer">
		2013 &copy; Rwanda Development Board. All Rights Reserved.
		<div class="span pull-right">
			<span class="go-top"><i class="icon-arrow-up"></i></span>
		</div>
	</div>	
				<?php endif; ?>
	<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.init();
		});
	</script>
</body>
<!-- END BODY -->
</html>

