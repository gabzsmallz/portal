<?php

/**
 * BusinessPlanTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BusinessPlanTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object BusinessPlanTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('BusinessPlan');
    }
	
	//this method will receive a an id and then query table for the record with the idea from this table, if it returns
	//null then, that means the user completed step 1 and failed to complete step 2
	public function getBusinessPlanDetails($investment_id)
	{
	   $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	    SELECT business_plan.investment_id from business_plan where business_plan.investment_id = '$investment_id'
	   ");
	   return $query;
	}
	//we select email addresses for users who have rights to assignjobs to data admins and notify them 
	public function getUsers($role)
	{
	   $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	    SELECT sf_guard_user.email_address FROM sf_guard_user LEFT JOIN sf_guard_user_permission ON
		sf_guard_user.id = sf_guard_user_permission.user_id LEFT JOIN sf_guard_permission ON 
		sf_guard_permission.id = sf_guard_user_permission.permission_id WHERE sf_guard_user_permission.name = '$role'
	   ");
	   return $query;
	}
}