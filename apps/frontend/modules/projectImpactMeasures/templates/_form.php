<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('projectImpactMeasures/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="widget">
 <div class="widget-body">
  <table class="table table-striped table-bordered" id="table10">
     <thead>
			
			
				<th><?php echo("Predicted Impacts") ?></th>
				<th><?php echo("Answers") ?></th>
				<th><?php echo("Proposed Enhancement/Mitigating Measures") ?></th>
				<th><?php echo("Remarks") ?></th>
			
	</thead>
    <tbody>
       <tr>
	    <td><?php echo("Increased in dust generation due to <br/> clearing,civil works <br/> and earthmoving activities") ?></td>
		<td><?php echo $form['dust_generation']->render() ?> </td>
		<td><?php echo $form['dust_generation_watering']->render() ?> <?php echo("Regular watering of  unpaved roads or exposed soils/ground") ?> <br/>
		<?php echo $form['dust_generation_remove_soil']->render() ?> <?php echo("Remove soil/mud from tires of <br/> trucks and equipment before<br/> leaving the area") ?> <br/>
		<?php echo $form['dust_generation_hauling_trucks']->render() ?><?php echo("Hauling trucks should be covered<br/> with canvas or any equipment <br/> materials") ?><br/>
		<?php echo $form['dust_generation_temporary_fence']->render() ?><?php echo("Set up temporary fence <br/>around the construction area") ?>
		</td>
		<td><?php echo $form['dust_generation_remarks']->render() ?> </td>
	   </tr>
	   
	    <tr>
	    <td><?php echo("Top Soil removal and <br/> loss due to earthmoving activities, <br/> transport, access road and construction") ?></td>
		<td><?php echo $form['soil_removal']->render() ?> </td>
		<td><?php echo $form['soil_removal_mitigate_stockpile']->render() ?> <?php echo("Stockpile the top in a safe <br/> place and use as final grading <br/>material of final layer") ?> <br/>
		<?php echo $form['soil_removal_mitigate_revegetate']->render() ?> <?php echo("As soon as possible,rip-rap or revegetate the area") ?> 
		</td>
		<td><?php echo $form['soil_removal_remarks']->render() ?> </td>
	   </tr>
	   <tr>
	    <td><?php echo("Erosion from exposed<br/> cuts and landslides due to <br/> earthmoving and excavation activities") ?></td>
		<td><?php echo $form['erosion_from_cuts']->render() ?> </td>
		<td><?php echo $form['erosion_mitigate_construct_dryseason']->render() ?> <?php echo("Conduct construction activities during dry season") ?> <br/>
		<?php echo $form['erosion_mitigate_avoid_exposure']->render() ?> <?php echo("Avoid long exposure of opened cuts") ?> <br/>
		<?php echo $form['erosion_mitigate_barrier_nets']->render() ?> <?php echo("Installation of barrier nets") ?> 
		</td>
		<td><?php echo $form['erosion_remarks']->render() ?> </td>
	   </tr>
	    <tr>
	    <td><?php echo("Sedimentation silitation of <br/> drainage or waterway from <br/> unconfined stockpiles of soil and other materials") ?></td>
		<td><?php echo $form['sedimentation']->render() ?> </td>
		<td><?php echo $form['sedimentation_mitigate_silt_trap']->render() ?> <?php echo("Set up temporary silt trap/ponds<br/> to prevent siltation") ?> <br/>
		<?php echo $form['sedimentation_mitigate_proper_stockpilling']->render() ?> <?php echo(" Proper stockpilling of spoils<br/>(on flat areas and away from drainage routes) ") ?> <br/>
		<?php echo $form['sedimentation_mitigate_filling_materials']->render() ?> <?php echo("Spoils generated from civil <br/> works be disposed as filling materials") ?> 
		</td>
		<td><?php echo $form['sedimentation_remarks']->render() ?> </td>
	   </tr>
	   <tr>
	    <td><?php echo("Pollution of nearby <br/> water body due to <br/> improper disposal of construction wastes") ?></td>
		<td><?php echo $form['pollution']->render() ?> </td>
		<td><?php echo $form['pollution_mitigate_temporary_disposal']->render() ?> <?php echo("Set up temporary disposal  mechanism within the construction  area and properly dispose <br/> the generated solid wastes") ?> <br/>
		<?php echo $form['pollution_mitigate_toilet_facilities']->render() ?> <?php echo("Set up proper and adequate toilet facilities") ?> <br/>
		<?php echo $form['pollution_mitigate_contract_observe']->render() ?> <?php echo("Strictly require the contractor and <br/> its workers to observe proper <br/> waste disposal and proper sanitation") ?> 
		</td>
		<td><?php echo $form['pollution_remarks']->render() ?> </td>
	   </tr>
	   <tr>
	    <td><?php echo("Loss of Vegetation <br/> due to land clearing") ?></td>
		<td><?php echo $form['vegetation_loss']->render() ?> </td>
		<td><?php echo $form['vegetation_limit_clearing']->render() ?> <?php echo("Limit Clearing as much as possible") ?> <br/>
		<?php echo $form['vegetation_provide_clearing']->render() ?> <?php echo("Provide temporary fencing to  vegetation that will be retained") ?> <br/>
		<?php echo $form['vegetation_use_markers']->render() ?> <?php echo("Use of markers and fences to direct heavy equipment traffic in the construction site") ?> <br/>
       <?php echo $form['vegetation_replant']->render() ?> <?php echo("Re-plant indigeneous tree <br/> species and ornamental plants") ?>		
		</td>
		<td><?php echo $form['vegetation_remarks']->render() ?> </td>
	   </tr>
	   <tr>
	    <td><?php echo("Distrubance or loss of wildlife <br/> within the influence area due to noise <br/> and other construction activities") ?></td>
		<td><?php echo $form['disturbance']->render() ?> </td>
		<td><?php echo $form['disturbance_reestablish']->render() ?> <?php echo("Re-establish or simulate the <br/> habitat of affected wildlife in another suitable area") ?> <br/>
		<?php echo $form['disturbance_schedule']->render() ?> <?php echo("Schedule noisy construction activities during daytime") ?> <br/>
		<?php echo $form['disturbance_maintenance']->render() ?> <?php echo("Undertake proper maintenance of equipment and use mufflers") ?> <br/>
      		
		</td>
		<td><?php echo $form['disturbance_remarks']->render() ?> </td>
	   </tr>
	    <tr>
	    <td><?php echo("Noise generation that can affect the nearby residence") ?></td>
		<td><?php echo $form['noise_generation']->render() ?> </td>
		<td><?php echo $form['nosie_generation_schedule']->render() ?> <?php echo("Schedule noisy construction activities during daytime") ?> <br/>
		<?php echo $form['noise_generation_undertake']->render() ?> <?php echo("Undertake Proper maintenance of equipment and use muffles") ?> <br/>	
		</td>
		<td><?php echo $form['noise_generation_remark']->render() ?> </td>
	   </tr>
	   <tr>
	    <td><?php echo("Generation of employment") ?></td>
		<td><?php echo $form['generation_employment']->render() ?> </td>
		<td><?php echo $form['generation_employment_hiring']->render() ?> <?php echo("Hiring priority shall be given to qualified local residents") ?> <br/>
			
		</td>
		<td><?php echo $form['generation_employment_remarks']->render() ?> </td>
	   </tr>
	    <tr>
	    <td><?php echo("Conflicts in right of way") ?></td>
		<td><?php echo $form['conflicts']->render() ?> </td>
		<td><?php echo $form['conflict_conslutation']->render() ?> <?php echo("Conduct consulation and settle agreements before finalizing detailed design") ?> <br/>
			
		</td>
		<td><?php echo $form['conflict_remarks']->render() ?> </td>
	   </tr>
	    <tr>
	    <td><?php echo("Increased traffic and possible congestion") ?></td>
		<td><?php echo $form['traffic_congestion']->render() ?> </td>
		<td><?php echo $form['traffic_rules_adherance']->render() ?> <?php echo("Strict enforcement of traffic rules and regulations") ?> <br/>
			<?php echo $form['traffice_aid_provision']->render() ?> <?php echo("Proponent should provide traffic aid during peak hours") ?> <br/>
		</td>
		<td><?php echo $form['traffic_congestion_remarks']->render() ?> </td>
	   </tr>
	   <tr>
	    <td><?php echo("Increase in the incidence of crime and accidents") ?></td>
		<td><?php echo $form['crimes_accidents']->render() ?> </td>
		<td><?php echo $form['crimes_accidents_safety_rules']->render() ?> <?php echo("Strictly require the contractor and its workers to follow safety rules and regulations in the construction and in locality(in coordination with local authorities)") ?> <br/>
			
		</td>
		<td><?php echo $form['traffic_congestion_remarks']->render() ?> </td>
	   </tr>
   </tbody>

    
  </table> 
  
				
			
        </div>
		      
 </div>
  <?php echo $form->renderHiddenFields(); ?>
  <input type="submit" class="btn btn-primary" value="Next" />
</form>
