<?php

/**
 * InvestmentApplicationTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class InvestmentApplicationTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object InvestmentApplicationTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('InvestmentApplication');
    }
	//we set default fields for Category
	static public $category = array(
    'new' => 'New',
    'restructuring' => 'Restructuring',
    'expansion' => 'Expansion',
	'reinvestment' => 'Reinvestment',
  );
  ///
  public function getCategories()
  {
   return self::$category ;
  }
	// This method selects data from the investment table and returns it to the controller if called
	public function getTotalInvestmentApplications(Doctrine_Query $query = null)
	{
	 if($query == null)
	 {
	   //execute a select statement to return data in InvestmentApplication table
	  $q = Doctrine_Core::getTable('InvestmentApplication')
	     ->createQuery('a')
        ->execute();
		return $q;
	 }
	}
	//now we need to check if there are any application for this user and if not show a button for applying and appropriate message.
	public function getUserInvestmentApplications()
	{
	 $userid = sfContext::getInstance()->getUser()->getGuardUser()->getId(); // get the username of the user logged
	
	// let use the doctrine manager secure 
	  $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT 
	  business_plan.investment_id, business_plan.project_brief
	  FROM business_plan 
	  left join business_application_status on 
	  business_plan.investment_id = business_application_status.business_id where 
	  business_plan.created_by = '$userid' 
	  and business_application_status.application_status != 'certificateissued'
		");
		return $query; 
	}
	//call method to get this user applications
	public function getEIApplications()
	{
	 return Doctrine_Core::getTable('EIApplication')->getUserEIApplications();
	}
	//
	
	////
	/* Below Method will be called to calculate Overall EIA and Tax Exemptions */
	public function getOverallEIATotal() // EIA Total Certificates Issued
	{
	return Doctrine_Core::getTable('EIApplication')->getTotalIEApplications();
	}
	public function getOverallTaxExemptionGranted() // Total Tax exemptions granted
	{
	 // Here we need to connect to the one stop center system and query for tax exemptions done by customs.
	 //we just ignore this and put 0 inside the view
	  
	}
    /* End Overall Methods */	
 
	/*Method to get applications status for this user*/
	public function getApplicationStatus()
	{
	 $userid = sfContext::getInstance()->getUser()->getGuardUser()->getId(); // get the username of the user logged
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT business_application_status.application_status,
     business_application_status.comment,business_application_status.percentage,investment_application.name FROM business_application_status 
	 LEFT JOIN investment_application ON business_application_status.business_id = investment_application.id WHERE created_by = '$userid' 
	 and business_application_status.application_status !='certificateissued'
	 ");
	 return $query;
	}
	
	//now we use this method to retrieve applications that is not yet assigned to any RDB data admin
	public function getUnassignedApplications($status)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT investment_application.name, 
	 business_plan.created_at, business_plan.updated_by, business_application_status.business_id
	 FROM business_plan LEFT JOIN investment_application ON business_plan.investment_id  = investment_application.id
	LEFT JOIN  business_application_status ON business_plan.id = business_application_status.business_id 
	WHERE business_application_status.application_status = '$status' ");
	return $query;
	}
	//get completed jobs for issuance of Investment Registration Certificate
	public function getCompletedTasksInvestment($status2)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT investment_application.name, 
	 business_plan.created_at, business_plan.updated_by, business_application_status.business_id
	 FROM business_plan LEFT JOIN investment_application ON business_plan.investment_id  = investment_application.id
	LEFT JOIN  business_application_status ON business_plan.id = business_application_status.business_id 
	WHERE business_application_status.application_status = '$status' ");
	return $query;
	}
	///this function is used to check if a business name exist in investmentapplicationtable before allowing a user to fill in the business plan
	public function checkBusinessExistance($name)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	  SELECT investment_application.name FROM investment_application WHERE investment_application.name = '$name' 
	 ");
	 return $query;
	}
	//get the current logged in user InvestmentApplication submission
	public function getUserInvestmentApplicationSubmission($user_id)
	{
	   /* $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc(
	   "SELECT investment_application.id, investment_application.name from investment_application 
	   LEFT JOIN business_application_status ON  investment_application.id = business_application_status.business_id
	   where investment_application.created_by = '$user_id' 
	   and business_application_status.application_status != 'certificateissued'
	   ORDER BY investment_application.created_at DESC LIMIT 1
	   " */
	   //This method is supposed to counter check that a given id exist in two tables. ie InvestmentApplicationTable and BusinessPlanTable
	   $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	    SELECT investment_application.id, investment_application.name,investment_application.token,business_plan.investment_id from investment_application 
	   LEFT JOIN business_plan ON  investment_application.id = business_plan.investment_id
	   where investment_application.created_by = '$user_id' "
	   );
	   return $query;
	}
	//this method is used to confirm that a user has completed application for certificate and is issued and then allows him to apply for a new one
	//for another business
	public function getCertificationStatus($userid)
	{
	  // $userid = sfContext::getInstance()->getUser()->getGuardUser()->getUsername(); // get the username of the user logged
	  
	   $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	     SELECT COUNT(investment_application.id) FROM investment_application 
		 LEFT JOIN business_application_status ON investment_application.id = business_application_status.business_id
		 WHERE  investment_application.created_by = '$userid' AND business_application_status.application_status = 'certificateissued'
	   ");
	   return $query;
	}
	//we return id of business belonging to the current logged in user
	public function getOnlyUserBusinesses()
	{
	  $userid = sfContext::getInstance()->getUser()->getGuardUser()->getId(); // get the id of the user logged
	 
	  //we will select the investment id for current logged user
	  $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	   SELECT investment_application.id FROM investment_application WHERE created_by = '$userid' order by investment_application.id desc limit 1 
	  ");
	  $id = null ;
	  $id2 = null;
	  foreach($query as $q)
	  {
	   $id = $q['id'];
	  }
	  //print $id; exit;
	  $query2 = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	   SELECT business_plan.investment_id FROM business_plan WHERE investment_id = '$id' order by investment_id desc limit 1
	  ");
	  //
	  foreach($query2 as $q2)
	  {
	   $id2 = $q2['investment_id'] ;
	  }
	 // print $id2; exit;
	  ///now check if the two values are not equal, if not we return this value and use to save in BusinessPlanTable and BusinessApplicationStatusTable
	  if($id != $id2 )
	  {
	   return $id;
	  } 
	  return "Identity";
	 
	  
	}
	//custom method to retrieve business name given a business id
	public function getBusinessName($businessId)
	{
	  //we will select the investment id for current logged user
	  $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	   SELECT investment_application.name FROM investment_application WHERE created_by = '$businessId' 
	  ");
	  $name = null;
	  foreach($query as $q)
	  {
	   $name = $q['name'];
	  }
	  //
	  return $name;
	}
	//custom method to retrieve a user id given a business name
	public function getUserId($business_name)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	   SELECT investment_application.created_by FROM investment_application WHERE investment_application.name = '$business_name' limit 1
	  ");
	  $id = 0; 
	  foreach( $query as $q)
	  {
	   $id = $q['id'] ;
	  }
	  return $id;
	  
	}
	//a custom method to retrieve business id given a business name
	public function getBusinessId($name)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	   SELECT investment_application.id FROM investment_application WHERE investment_application.name = '$name' limit 1
	  ");
	  $id = 0;
	  foreach( $query as $q)
	  {
	   $id = $q['id'] ;
	  }
	  return $id;
	}
	//this function retrieves data of a user when he/she enter a valid TIN Number
	public function getClientDetails($tinNumber)
	{
	  $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("select * from business_registration where business_regno = '$tinNumber' ");
	  ///
	  return $query;
	}
	//This method is used to secure our application. 
	public function checkToken($token)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("select token from investment_application where investment_application.token = '$token' ");
	 ///
	 return $query;
	}
	
}