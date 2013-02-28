<?php

/**
 * EIApplicationTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EIApplicationTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EIApplicationTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('EIApplication');
    }
	public function getUserEIApplications(Doctrine_Query $query = null)
	{
	$userid = sfContext::getInstance()->getUser()->getGuardUser()->getUsername(); // get the username of the user logged
	// let use the doctrine manager secure 
	  $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT * FROM e_i_application 
		where updated_by= '$userid'
		");
		return $query; 
	}
	// This method selects data from the investment table and returns it to the controller if called
	public function getTotalIEApplications(Doctrine_Query $query = null)
	{
	 if($query == null)
	 {
	   //execute a select statement to return data in InvestmentApplication table
	  $q = Doctrine_Core::getTable('EIApplication')
	     ->createQuery('a')
        ->execute();
		return $q;
	 }
	}
	
	//Method to get generated id from developer name
	public function getId($name)
	{
		$id = null;
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT e_i_application.id FROM e_i_application WHERE 
			e_i_application.developer_name = '$name' ");
	
		foreach($query as $q)
		{
			$id = $q['id'];
		}
		
		return $id;
	}
	//Returns array from tables e_i_application_status && e_i_application 
	public function getStatus()
	{
		$userid = sfContext::getInstance()->getUser()->getGuardUser()->getId(); // get the username of the user logged
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT e_i_application_status.application_status,
		e_i_application_status.comments,e_i_application_status.percentage,e_i_application.developer_name FROM e_i_application_status 
		LEFT JOIN e_i_application ON e_i_application_status.company_id = e_i_application.id WHERE created_by = '$userid' 
		");
		return $query;
		

	}
	
	//public function getStatus()
	//{
		//$userid = sfContext::getInstance()->getUser()->getGuardUser()->getId(); // get the username of the user logged
		//$q = $this->createQuery('e')
		  //->leftJoin('e.EIApplicationStatus s')
		  //->where('e.created_by = ?', $userid);

		//return $q->execute();
	//}
	
	//Methods returns array for eia app with the past var status
	public function getApplications($status)
	{
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT e_i_application.developer_name, e_i_application.created_at,sf_guard_user.first_name FROM e_i_application LEFT JOIN e_i_application_status ON e_i_application_status.company_id = e_i_application.id LEFT JOIN sf_guard_user ON sf_guard_user.id = e_i_application.created_by  WHERE e_i_application_status.application_status = '$status' 
		");
		
		return $query;
	}
}