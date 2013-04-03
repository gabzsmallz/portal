<?php

/**
 * EIAProjectImpactMeasures filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectImpactMeasuresFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eiaproject_id'                              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => true)),
      'dust_generation'                            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'dust_generation_watering'                   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'dust_generation_remove_soil'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'dust_generation_hauling_trucks'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'dust_generation_temporary_fence'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'dust_generation_remarks'                    => new sfWidgetFormFilterInput(),
      'soil_removal'                               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'soil_removal_mitigate_stockpile'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'soil_removal_mitigate_revegetate'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'soil_removal_remarks'                       => new sfWidgetFormFilterInput(),
      'erosion_from_cuts'                          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'erosion_mitigate_construct_dryseason'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'erosion_mitigate_avoid_exposure'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'erosion_mitigate_barrier_nets'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'erosion_remarks'                            => new sfWidgetFormFilterInput(),
      'sedimentation'                              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sedimentation_mitigate_silt_trap'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sedimentation_mitigate_proper_stockpilling' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sedimentation_mitigate_filling_materials'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sedimentation_remarks'                      => new sfWidgetFormFilterInput(),
      'pollution'                                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pollution_mitigate_temporary_disposal'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pollution_mitigate_toilet_facilities'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pollution_mitigate_contract_observe'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pollution_remarks'                          => new sfWidgetFormFilterInput(),
      'vegetation_loss'                            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'vegetation_limit_clearing'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'vegetation_provide_clearing'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'vegetation_use_markers'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'vegetation_replant'                         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'vegetation_remarks'                         => new sfWidgetFormFilterInput(),
      'disturbance'                                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'disturbance_reestablish'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'disturbance_schedule'                       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'disturbance_maintenance'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'disturbance_remarks'                        => new sfWidgetFormFilterInput(),
      'noise_generation'                           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'nosie_generation_schedule'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'noise_generation_undertake'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'noise_generation_remark'                    => new sfWidgetFormFilterInput(),
      'generation_employment'                      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'generation_employment_hiring'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'generation_employment_remarks'              => new sfWidgetFormFilterInput(),
      'conflicts'                                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'conflict_conslutation'                      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'conflict_remarks'                           => new sfWidgetFormFilterInput(),
      'traffic_congestion'                         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'traffic_rules_adherance'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'traffice_aid_provision'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'traffic_congestion_remarks'                 => new sfWidgetFormFilterInput(),
      'crimes_accidents'                           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'crimes_accidents_safety_rules'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'crime_accidents_remarks'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'token'                                      => new sfWidgetFormFilterInput(),
      'created_at'                                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eiaproject_id'                              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EIAProjectDetail'), 'column' => 'id')),
      'dust_generation'                            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'dust_generation_watering'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'dust_generation_remove_soil'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'dust_generation_hauling_trucks'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'dust_generation_temporary_fence'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'dust_generation_remarks'                    => new sfValidatorPass(array('required' => false)),
      'soil_removal'                               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'soil_removal_mitigate_stockpile'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'soil_removal_mitigate_revegetate'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'soil_removal_remarks'                       => new sfValidatorPass(array('required' => false)),
      'erosion_from_cuts'                          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'erosion_mitigate_construct_dryseason'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'erosion_mitigate_avoid_exposure'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'erosion_mitigate_barrier_nets'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'erosion_remarks'                            => new sfValidatorPass(array('required' => false)),
      'sedimentation'                              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sedimentation_mitigate_silt_trap'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sedimentation_mitigate_proper_stockpilling' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sedimentation_mitigate_filling_materials'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sedimentation_remarks'                      => new sfValidatorPass(array('required' => false)),
      'pollution'                                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pollution_mitigate_temporary_disposal'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pollution_mitigate_toilet_facilities'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pollution_mitigate_contract_observe'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pollution_remarks'                          => new sfValidatorPass(array('required' => false)),
      'vegetation_loss'                            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'vegetation_limit_clearing'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'vegetation_provide_clearing'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'vegetation_use_markers'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'vegetation_replant'                         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'vegetation_remarks'                         => new sfValidatorPass(array('required' => false)),
      'disturbance'                                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'disturbance_reestablish'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'disturbance_schedule'                       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'disturbance_maintenance'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'disturbance_remarks'                        => new sfValidatorPass(array('required' => false)),
      'noise_generation'                           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'nosie_generation_schedule'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'noise_generation_undertake'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'noise_generation_remark'                    => new sfValidatorPass(array('required' => false)),
      'generation_employment'                      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'generation_employment_hiring'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'generation_employment_remarks'              => new sfValidatorPass(array('required' => false)),
      'conflicts'                                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'conflict_conslutation'                      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'conflict_remarks'                           => new sfValidatorPass(array('required' => false)),
      'traffic_congestion'                         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'traffic_rules_adherance'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'traffice_aid_provision'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'traffic_congestion_remarks'                 => new sfValidatorPass(array('required' => false)),
      'crimes_accidents'                           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'crimes_accidents_safety_rules'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'crime_accidents_remarks'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'token'                                      => new sfValidatorPass(array('required' => false)),
      'created_at'                                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'                                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'                                 => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_project_impact_measures_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectImpactMeasures';
  }

  public function getFields()
  {
    return array(
      'id'                                         => 'Number',
      'eiaproject_id'                              => 'ForeignKey',
      'dust_generation'                            => 'Boolean',
      'dust_generation_watering'                   => 'Boolean',
      'dust_generation_remove_soil'                => 'Boolean',
      'dust_generation_hauling_trucks'             => 'Boolean',
      'dust_generation_temporary_fence'            => 'Boolean',
      'dust_generation_remarks'                    => 'Text',
      'soil_removal'                               => 'Boolean',
      'soil_removal_mitigate_stockpile'            => 'Boolean',
      'soil_removal_mitigate_revegetate'           => 'Boolean',
      'soil_removal_remarks'                       => 'Text',
      'erosion_from_cuts'                          => 'Boolean',
      'erosion_mitigate_construct_dryseason'       => 'Boolean',
      'erosion_mitigate_avoid_exposure'            => 'Boolean',
      'erosion_mitigate_barrier_nets'              => 'Boolean',
      'erosion_remarks'                            => 'Text',
      'sedimentation'                              => 'Boolean',
      'sedimentation_mitigate_silt_trap'           => 'Boolean',
      'sedimentation_mitigate_proper_stockpilling' => 'Boolean',
      'sedimentation_mitigate_filling_materials'   => 'Boolean',
      'sedimentation_remarks'                      => 'Text',
      'pollution'                                  => 'Boolean',
      'pollution_mitigate_temporary_disposal'      => 'Boolean',
      'pollution_mitigate_toilet_facilities'       => 'Boolean',
      'pollution_mitigate_contract_observe'        => 'Boolean',
      'pollution_remarks'                          => 'Text',
      'vegetation_loss'                            => 'Boolean',
      'vegetation_limit_clearing'                  => 'Boolean',
      'vegetation_provide_clearing'                => 'Boolean',
      'vegetation_use_markers'                     => 'Boolean',
      'vegetation_replant'                         => 'Boolean',
      'vegetation_remarks'                         => 'Text',
      'disturbance'                                => 'Boolean',
      'disturbance_reestablish'                    => 'Boolean',
      'disturbance_schedule'                       => 'Boolean',
      'disturbance_maintenance'                    => 'Boolean',
      'disturbance_remarks'                        => 'Text',
      'noise_generation'                           => 'Boolean',
      'nosie_generation_schedule'                  => 'Boolean',
      'noise_generation_undertake'                 => 'Boolean',
      'noise_generation_remark'                    => 'Text',
      'generation_employment'                      => 'Boolean',
      'generation_employment_hiring'               => 'Boolean',
      'generation_employment_remarks'              => 'Text',
      'conflicts'                                  => 'Boolean',
      'conflict_conslutation'                      => 'Boolean',
      'conflict_remarks'                           => 'Text',
      'traffic_congestion'                         => 'Boolean',
      'traffic_rules_adherance'                    => 'Boolean',
      'traffice_aid_provision'                     => 'Boolean',
      'traffic_congestion_remarks'                 => 'Text',
      'crimes_accidents'                           => 'Boolean',
      'crimes_accidents_safety_rules'              => 'Boolean',
      'crime_accidents_remarks'                    => 'Boolean',
      'token'                                      => 'Text',
      'created_at'                                 => 'Date',
      'updated_at'                                 => 'Date',
      'created_by'                                 => 'ForeignKey',
      'updated_by'                                 => 'Text',
    );
  }
}
