<?php

/**
 * EIAProjectDescriptionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EIAProjectDescriptionTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EIAProjectDescriptionTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('EIAProjectDescription');
    }
    static public $natures = array(
				'construction_repair_of_international_roads_national_distrincts_large_bridge' => 'Construction and Repair of International Roads,national roads, disctrict roads and repair of large bridges',
				'construction_of_industries_factories_and_activities' => 'Construction of Industries,factories and activities carried out in those industries',
				'construction_of_hydro_electric_lines' => 'Construction of Hydro Electric Lines',
				'construction_of_public_dams_rain_water_havesting' => 'Construction of Public dams for water Conservation, rain water harvesting for agricultural activities and artificial lakes',
				'construction_of_oil_pipeline' => 'Construction of oil pipelines and its products,gases and storage tanks',
			  );
	public function getNatures()
	{
	 return self::$natures;
	}
	///
	static public $possibilities = array('true' => 'Yes', 'false' => 'No');
	public function getQuestionValues()
	{
	 return self::$possibilities;
	}
}