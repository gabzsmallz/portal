<?php

/**
 * BaseEIAProjectImpactMeasures
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $eiaproject_id
 * @property boolean $dust_generation
 * @property boolean $dust_generation_watering
 * @property boolean $dust_generation_remove_soil
 * @property boolean $dust_generation_hauling_trucks
 * @property boolean $dust_generation_temporary_fence
 * @property string $dust_generation_remarks
 * @property boolean $soil_removal
 * @property boolean $soil_removal_mitigate_stockpile
 * @property boolean $soil_removal_mitigate_revegetate
 * @property string $soil_removal_remarks
 * @property boolean $erosion_from_cuts
 * @property boolean $erosion_mitigate_construct_dryseason
 * @property boolean $erosion_mitigate_avoid_exposure
 * @property boolean $erosion_mitigate_barrier_nets
 * @property string $erosion_remarks
 * @property boolean $sedimentation
 * @property boolean $sedimentation_mitigate_silt_trap
 * @property boolean $sedimentation_mitigate_proper_stockpilling
 * @property boolean $sedimentation_mitigate_filling_materials
 * @property string $sedimentation_remarks
 * @property boolean $pollution
 * @property boolean $pollution_mitigate_temporary_disposal
 * @property boolean $pollution_mitigate_toilet_facilities
 * @property boolean $pollution_mitigate_contract_observe
 * @property string $pollution_remarks
 * @property boolean $vegetation_loss
 * @property boolean $vegetation_limit_clearing
 * @property boolean $vegetation_provide_clearing
 * @property boolean $vegetation_use_markers
 * @property boolean $vegetation_replant
 * @property string $vegetation_remarks
 * @property boolean $disturbance
 * @property boolean $disturbance_reestablish
 * @property boolean $disturbance_schedule
 * @property boolean $disturbance_maintenance
 * @property string $disturbance_remarks
 * @property boolean $noise_generation
 * @property boolean $nosie_generation_schedule
 * @property boolean $noise_generation_undertake
 * @property string $noise_generation_remark
 * @property boolean $generation_employment
 * @property boolean $generation_employment_hiring
 * @property string $generation_employment_remarks
 * @property boolean $conflicts
 * @property boolean $conflict_conslutation
 * @property string $conflict_remarks
 * @property boolean $traffic_congestion
 * @property boolean $traffic_rules_adherance
 * @property boolean $traffice_aid_provision
 * @property string $traffic_congestion_remarks
 * @property boolean $crimes_accidents
 * @property boolean $crimes_accidents_safety_rules
 * @property boolean $crime_accidents_remarks
 * @property string $token
 * @property string $resubmit
 * @property EIAProjectDetail $EIAProjectDetail
 * 
 * @method integer                  getEiaprojectId()                               Returns the current record's "eiaproject_id" value
 * @method boolean                  getDustGeneration()                             Returns the current record's "dust_generation" value
 * @method boolean                  getDustGenerationWatering()                     Returns the current record's "dust_generation_watering" value
 * @method boolean                  getDustGenerationRemoveSoil()                   Returns the current record's "dust_generation_remove_soil" value
 * @method boolean                  getDustGenerationHaulingTrucks()                Returns the current record's "dust_generation_hauling_trucks" value
 * @method boolean                  getDustGenerationTemporaryFence()               Returns the current record's "dust_generation_temporary_fence" value
 * @method string                   getDustGenerationRemarks()                      Returns the current record's "dust_generation_remarks" value
 * @method boolean                  getSoilRemoval()                                Returns the current record's "soil_removal" value
 * @method boolean                  getSoilRemovalMitigateStockpile()               Returns the current record's "soil_removal_mitigate_stockpile" value
 * @method boolean                  getSoilRemovalMitigateRevegetate()              Returns the current record's "soil_removal_mitigate_revegetate" value
 * @method string                   getSoilRemovalRemarks()                         Returns the current record's "soil_removal_remarks" value
 * @method boolean                  getErosionFromCuts()                            Returns the current record's "erosion_from_cuts" value
 * @method boolean                  getErosionMitigateConstructDryseason()          Returns the current record's "erosion_mitigate_construct_dryseason" value
 * @method boolean                  getErosionMitigateAvoidExposure()               Returns the current record's "erosion_mitigate_avoid_exposure" value
 * @method boolean                  getErosionMitigateBarrierNets()                 Returns the current record's "erosion_mitigate_barrier_nets" value
 * @method string                   getErosionRemarks()                             Returns the current record's "erosion_remarks" value
 * @method boolean                  getSedimentation()                              Returns the current record's "sedimentation" value
 * @method boolean                  getSedimentationMitigateSiltTrap()              Returns the current record's "sedimentation_mitigate_silt_trap" value
 * @method boolean                  getSedimentationMitigateProperStockpilling()    Returns the current record's "sedimentation_mitigate_proper_stockpilling" value
 * @method boolean                  getSedimentationMitigateFillingMaterials()      Returns the current record's "sedimentation_mitigate_filling_materials" value
 * @method string                   getSedimentationRemarks()                       Returns the current record's "sedimentation_remarks" value
 * @method boolean                  getPollution()                                  Returns the current record's "pollution" value
 * @method boolean                  getPollutionMitigateTemporaryDisposal()         Returns the current record's "pollution_mitigate_temporary_disposal" value
 * @method boolean                  getPollutionMitigateToiletFacilities()          Returns the current record's "pollution_mitigate_toilet_facilities" value
 * @method boolean                  getPollutionMitigateContractObserve()           Returns the current record's "pollution_mitigate_contract_observe" value
 * @method string                   getPollutionRemarks()                           Returns the current record's "pollution_remarks" value
 * @method boolean                  getVegetationLoss()                             Returns the current record's "vegetation_loss" value
 * @method boolean                  getVegetationLimitClearing()                    Returns the current record's "vegetation_limit_clearing" value
 * @method boolean                  getVegetationProvideClearing()                  Returns the current record's "vegetation_provide_clearing" value
 * @method boolean                  getVegetationUseMarkers()                       Returns the current record's "vegetation_use_markers" value
 * @method boolean                  getVegetationReplant()                          Returns the current record's "vegetation_replant" value
 * @method string                   getVegetationRemarks()                          Returns the current record's "vegetation_remarks" value
 * @method boolean                  getDisturbance()                                Returns the current record's "disturbance" value
 * @method boolean                  getDisturbanceReestablish()                     Returns the current record's "disturbance_reestablish" value
 * @method boolean                  getDisturbanceSchedule()                        Returns the current record's "disturbance_schedule" value
 * @method boolean                  getDisturbanceMaintenance()                     Returns the current record's "disturbance_maintenance" value
 * @method string                   getDisturbanceRemarks()                         Returns the current record's "disturbance_remarks" value
 * @method boolean                  getNoiseGeneration()                            Returns the current record's "noise_generation" value
 * @method boolean                  getNosieGenerationSchedule()                    Returns the current record's "nosie_generation_schedule" value
 * @method boolean                  getNoiseGenerationUndertake()                   Returns the current record's "noise_generation_undertake" value
 * @method string                   getNoiseGenerationRemark()                      Returns the current record's "noise_generation_remark" value
 * @method boolean                  getGenerationEmployment()                       Returns the current record's "generation_employment" value
 * @method boolean                  getGenerationEmploymentHiring()                 Returns the current record's "generation_employment_hiring" value
 * @method string                   getGenerationEmploymentRemarks()                Returns the current record's "generation_employment_remarks" value
 * @method boolean                  getConflicts()                                  Returns the current record's "conflicts" value
 * @method boolean                  getConflictConslutation()                       Returns the current record's "conflict_conslutation" value
 * @method string                   getConflictRemarks()                            Returns the current record's "conflict_remarks" value
 * @method boolean                  getTrafficCongestion()                          Returns the current record's "traffic_congestion" value
 * @method boolean                  getTrafficRulesAdherance()                      Returns the current record's "traffic_rules_adherance" value
 * @method boolean                  getTrafficeAidProvision()                       Returns the current record's "traffice_aid_provision" value
 * @method string                   getTrafficCongestionRemarks()                   Returns the current record's "traffic_congestion_remarks" value
 * @method boolean                  getCrimesAccidents()                            Returns the current record's "crimes_accidents" value
 * @method boolean                  getCrimesAccidentsSafetyRules()                 Returns the current record's "crimes_accidents_safety_rules" value
 * @method boolean                  getCrimeAccidentsRemarks()                      Returns the current record's "crime_accidents_remarks" value
 * @method string                   getToken()                                      Returns the current record's "token" value
 * @method string                   getResubmit()                                   Returns the current record's "resubmit" value
 * @method EIAProjectDetail         getEIAProjectDetail()                           Returns the current record's "EIAProjectDetail" value
 * @method EIAProjectImpactMeasures setEiaprojectId()                               Sets the current record's "eiaproject_id" value
 * @method EIAProjectImpactMeasures setDustGeneration()                             Sets the current record's "dust_generation" value
 * @method EIAProjectImpactMeasures setDustGenerationWatering()                     Sets the current record's "dust_generation_watering" value
 * @method EIAProjectImpactMeasures setDustGenerationRemoveSoil()                   Sets the current record's "dust_generation_remove_soil" value
 * @method EIAProjectImpactMeasures setDustGenerationHaulingTrucks()                Sets the current record's "dust_generation_hauling_trucks" value
 * @method EIAProjectImpactMeasures setDustGenerationTemporaryFence()               Sets the current record's "dust_generation_temporary_fence" value
 * @method EIAProjectImpactMeasures setDustGenerationRemarks()                      Sets the current record's "dust_generation_remarks" value
 * @method EIAProjectImpactMeasures setSoilRemoval()                                Sets the current record's "soil_removal" value
 * @method EIAProjectImpactMeasures setSoilRemovalMitigateStockpile()               Sets the current record's "soil_removal_mitigate_stockpile" value
 * @method EIAProjectImpactMeasures setSoilRemovalMitigateRevegetate()              Sets the current record's "soil_removal_mitigate_revegetate" value
 * @method EIAProjectImpactMeasures setSoilRemovalRemarks()                         Sets the current record's "soil_removal_remarks" value
 * @method EIAProjectImpactMeasures setErosionFromCuts()                            Sets the current record's "erosion_from_cuts" value
 * @method EIAProjectImpactMeasures setErosionMitigateConstructDryseason()          Sets the current record's "erosion_mitigate_construct_dryseason" value
 * @method EIAProjectImpactMeasures setErosionMitigateAvoidExposure()               Sets the current record's "erosion_mitigate_avoid_exposure" value
 * @method EIAProjectImpactMeasures setErosionMitigateBarrierNets()                 Sets the current record's "erosion_mitigate_barrier_nets" value
 * @method EIAProjectImpactMeasures setErosionRemarks()                             Sets the current record's "erosion_remarks" value
 * @method EIAProjectImpactMeasures setSedimentation()                              Sets the current record's "sedimentation" value
 * @method EIAProjectImpactMeasures setSedimentationMitigateSiltTrap()              Sets the current record's "sedimentation_mitigate_silt_trap" value
 * @method EIAProjectImpactMeasures setSedimentationMitigateProperStockpilling()    Sets the current record's "sedimentation_mitigate_proper_stockpilling" value
 * @method EIAProjectImpactMeasures setSedimentationMitigateFillingMaterials()      Sets the current record's "sedimentation_mitigate_filling_materials" value
 * @method EIAProjectImpactMeasures setSedimentationRemarks()                       Sets the current record's "sedimentation_remarks" value
 * @method EIAProjectImpactMeasures setPollution()                                  Sets the current record's "pollution" value
 * @method EIAProjectImpactMeasures setPollutionMitigateTemporaryDisposal()         Sets the current record's "pollution_mitigate_temporary_disposal" value
 * @method EIAProjectImpactMeasures setPollutionMitigateToiletFacilities()          Sets the current record's "pollution_mitigate_toilet_facilities" value
 * @method EIAProjectImpactMeasures setPollutionMitigateContractObserve()           Sets the current record's "pollution_mitigate_contract_observe" value
 * @method EIAProjectImpactMeasures setPollutionRemarks()                           Sets the current record's "pollution_remarks" value
 * @method EIAProjectImpactMeasures setVegetationLoss()                             Sets the current record's "vegetation_loss" value
 * @method EIAProjectImpactMeasures setVegetationLimitClearing()                    Sets the current record's "vegetation_limit_clearing" value
 * @method EIAProjectImpactMeasures setVegetationProvideClearing()                  Sets the current record's "vegetation_provide_clearing" value
 * @method EIAProjectImpactMeasures setVegetationUseMarkers()                       Sets the current record's "vegetation_use_markers" value
 * @method EIAProjectImpactMeasures setVegetationReplant()                          Sets the current record's "vegetation_replant" value
 * @method EIAProjectImpactMeasures setVegetationRemarks()                          Sets the current record's "vegetation_remarks" value
 * @method EIAProjectImpactMeasures setDisturbance()                                Sets the current record's "disturbance" value
 * @method EIAProjectImpactMeasures setDisturbanceReestablish()                     Sets the current record's "disturbance_reestablish" value
 * @method EIAProjectImpactMeasures setDisturbanceSchedule()                        Sets the current record's "disturbance_schedule" value
 * @method EIAProjectImpactMeasures setDisturbanceMaintenance()                     Sets the current record's "disturbance_maintenance" value
 * @method EIAProjectImpactMeasures setDisturbanceRemarks()                         Sets the current record's "disturbance_remarks" value
 * @method EIAProjectImpactMeasures setNoiseGeneration()                            Sets the current record's "noise_generation" value
 * @method EIAProjectImpactMeasures setNosieGenerationSchedule()                    Sets the current record's "nosie_generation_schedule" value
 * @method EIAProjectImpactMeasures setNoiseGenerationUndertake()                   Sets the current record's "noise_generation_undertake" value
 * @method EIAProjectImpactMeasures setNoiseGenerationRemark()                      Sets the current record's "noise_generation_remark" value
 * @method EIAProjectImpactMeasures setGenerationEmployment()                       Sets the current record's "generation_employment" value
 * @method EIAProjectImpactMeasures setGenerationEmploymentHiring()                 Sets the current record's "generation_employment_hiring" value
 * @method EIAProjectImpactMeasures setGenerationEmploymentRemarks()                Sets the current record's "generation_employment_remarks" value
 * @method EIAProjectImpactMeasures setConflicts()                                  Sets the current record's "conflicts" value
 * @method EIAProjectImpactMeasures setConflictConslutation()                       Sets the current record's "conflict_conslutation" value
 * @method EIAProjectImpactMeasures setConflictRemarks()                            Sets the current record's "conflict_remarks" value
 * @method EIAProjectImpactMeasures setTrafficCongestion()                          Sets the current record's "traffic_congestion" value
 * @method EIAProjectImpactMeasures setTrafficRulesAdherance()                      Sets the current record's "traffic_rules_adherance" value
 * @method EIAProjectImpactMeasures setTrafficeAidProvision()                       Sets the current record's "traffice_aid_provision" value
 * @method EIAProjectImpactMeasures setTrafficCongestionRemarks()                   Sets the current record's "traffic_congestion_remarks" value
 * @method EIAProjectImpactMeasures setCrimesAccidents()                            Sets the current record's "crimes_accidents" value
 * @method EIAProjectImpactMeasures setCrimesAccidentsSafetyRules()                 Sets the current record's "crimes_accidents_safety_rules" value
 * @method EIAProjectImpactMeasures setCrimeAccidentsRemarks()                      Sets the current record's "crime_accidents_remarks" value
 * @method EIAProjectImpactMeasures setToken()                                      Sets the current record's "token" value
 * @method EIAProjectImpactMeasures setResubmit()                                   Sets the current record's "resubmit" value
 * @method EIAProjectImpactMeasures setEIAProjectDetail()                           Sets the current record's "EIAProjectDetail" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEIAProjectImpactMeasures extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_i_a_project_impact_measures');
        $this->hasColumn('eiaproject_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('dust_generation', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('dust_generation_watering', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('dust_generation_remove_soil', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('dust_generation_hauling_trucks', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('dust_generation_temporary_fence', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('dust_generation_remarks', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('soil_removal', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('soil_removal_mitigate_stockpile', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('soil_removal_mitigate_revegetate', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('soil_removal_remarks', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('erosion_from_cuts', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('erosion_mitigate_construct_dryseason', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('erosion_mitigate_avoid_exposure', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('erosion_mitigate_barrier_nets', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('erosion_remarks', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('sedimentation', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('sedimentation_mitigate_silt_trap', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('sedimentation_mitigate_proper_stockpilling', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('sedimentation_mitigate_filling_materials', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('sedimentation_remarks', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('pollution', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('pollution_mitigate_temporary_disposal', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('pollution_mitigate_toilet_facilities', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('pollution_mitigate_contract_observe', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('pollution_remarks', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('vegetation_loss', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('vegetation_limit_clearing', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('vegetation_provide_clearing', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('vegetation_use_markers', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('vegetation_replant', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('vegetation_remarks', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('disturbance', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('disturbance_reestablish', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('disturbance_schedule', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('disturbance_maintenance', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('disturbance_remarks', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('noise_generation', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('nosie_generation_schedule', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('noise_generation_undertake', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('noise_generation_remark', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('generation_employment', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('generation_employment_hiring', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('generation_employment_remarks', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('conflicts', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('conflict_conslutation', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('conflict_remarks', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('traffic_congestion', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('traffic_rules_adherance', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('traffice_aid_provision', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('traffic_congestion_remarks', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
             ));
        $this->hasColumn('crimes_accidents', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('crimes_accidents_safety_rules', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('crime_accidents_remarks', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('token', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('resubmit', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('EIAProjectDetail', array(
             'local' => 'eiaproject_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $signable0 = new Doctrine_Template_Signable(array(
             'created:{ name' => 'created_by,type: string,onUpdate: CASCADE,onDelete: SET NULL,options: {notnull: true,default: None}}',
             'updated' => 
             array(
              'name' => 'updated_by',
              'type' => 'string',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($signable0);
    }
}