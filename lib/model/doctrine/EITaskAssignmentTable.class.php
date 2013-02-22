<?php

/**
 * EITaskAssignmentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EITaskAssignmentTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EITaskAssignmentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('EITaskAssignment');
    }
	
	public function getJobs($status)
	{
		$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT e_i_task_assignment.instructions, e_i_task_assignment.duedate, e_i_task_assignment.updated_by, e_i_application.developer_name FROM e_i_task_assignment LEFT JOIN e_i_application ON e_i_task_assignment.company_id = e_i_application.id WHERE user_assigned = '$userId'
		AND work_status = '$status' ");
		
		return $query;
	}
	
	public function getJob()
	{
		$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT e_i_application.id, e_i_application.company_regno, e_i_application.developer_name, e_i_application.developer_title, e_i_application.developer_address, e_i_application.project_name, e_i_application.project_purpose, e_i_application.project_nature, e_i_application.project_site, e_i_application.project_sitelaws, e_i_application.environment_impacts, e_i_application.other_alternatives, e_i_application.other_information, e_i_application.created_by, e_i_task_assignment.user_assigned,e_i_task_assignment.duedate FROM e_i_application LEFT JOIN e_i_task_assignment ON e_i_task_assignment.company_id = e_i_application.id WHERE e_i_task_assignment.user_assigned = '$userId'
		");
		
		return $query;
	}
}