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
				'construction_and_repair_of_roads' => '1.	Construction and repair of international roads, national roads, district roads and repair of large bridges',
				'construction_of_industries_and_factories' => 'Construction of industries, factories and activities carried out in those industries',
				'construction_of_hydro_dams_electric_lines' => 'Construction of hydro-dams and electrical lines',
				'construction_of_public_dams' => 'Construction of Public dams for water Conservation, rain water harvesting for agricultural activities and artificial lakes',
				'construction_of_oil_pipeline_and_products' => 'Construction of oil pipelines and its products,gases and storage tanks',
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
	///
	///method to search for a certain id
	public function queryForId($project_id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT id, token from  e_i_a_project_description WHERE eiaproject_id = '$project_id' limit 1 ");
	 ///
	 return $query;
	}
	//method to get token  and id from this table given an id of the record
	public function getProjectDetailTokenAndId($eiaproject_id)
	{
	 //print "eiaproject_id is ".$eiaproject_id ;exit;
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT token, id FROM e_i_a_project_description WHERE eiaproject_id 	 = '$eiaproject_id' limit 1");
	 //
	 
	 return $query;
	}
}