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
	
	public function getAwaitingApproval()
	{
		$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$q=$this->createQuery('t')
			->leftJoin('t.EIAProjectDetail d')
			->leftJoin('t.sfGuardUser u')
			->where('t.work_status = ?','assess')
			->andWhere('t.created_by = ?',$userId);
		return $q->fetchArray();
	}

	public function getJobs($status=NULL)
	{
		$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT e_i_task_assignment.company_id,e_i_task_assignment.instructions, e_i_task_assignment.duedate, e_i_task_assignment.updated_by, e_i_application.name FROM e_i_task_assignment LEFT JOIN e_i_application ON e_i_task_assignment.company_id = e_i_application.id WHERE e_i_task_assignment.user_assigned = '$userId' AND e_i_task_assignment.work_status = '$status' ");
		
		return $query;
	}
	
	public function getJob()
	{
		$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT e_i_application.id, e_i_application.company_regno, e_i_application.name, e_i_application.developer_title, e_i_application.developer_address, e_i_application.project_name, e_i_application.project_purpose, e_i_application.project_nature, e_i_application.project_site, e_i_application.project_sitelaws, e_i_application.environment_impacts, e_i_application.other_alternatives, e_i_application.other_information, e_i_application.created_by, e_i_task_assignment.user_assigned,e_i_task_assignment.duedate FROM e_i_application LEFT JOIN e_i_task_assignment ON e_i_task_assignment.company_id = e_i_application.id WHERE e_i_task_assignment.user_assigned = '$userId'
		");
		
		return $query;
	}
	
	public function updateWorkStatus($eiaproject_id,$status)
	{
		$q = Doctrine_Query::create()
			->update('EITaskAssignment t')
			->set('t.work_status', '?', $status)
			->where('t.eiaproject_id = ?', $eiaproject_id);	
		return $q->execute();
	}
	
	public function getTasks()
	{
		$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$q = Doctrine_Query::create()
			->from('EITaskAssignment t')
			->where('t.user_assigned = ?', $userId);
		
		return $q->execute();
	}
	//method to get all assigned tasks
	public function getCurrentLoggedUserAssignTasks()
	{
	$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("select e_i_task_assignment.id,e_i_a_project_detail.name,e_i_task_assignment.duedate,e_i_a_project_detail.project_reference_number ,sf_guard_user.username ,e_i_task_assignment.instructions, e_i_task_assignment.duedate ,e_i_task_assignment.work_status from e_i_task_assignment 
		left join sf_guard_user on e_i_task_assignment.user_assigned = sf_guard_user .id
		left join e_i_a_project_detail on e_i_task_assignment.eiaproject_id = e_i_a_project_detail.id
		where e_i_task_assignment.created_by = '$userId' ");
	 return $query;
	}
	//check existance of eiaproject_id 
	public function checkEiaExistance($eiaproject_id)
	{
	 $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("select id from  e_i_task_assignment where eiaproject_id = '$eiaproject_id' ");
	 return $query;
	}
	public function getAssignedTasks($status)
	{
		$q= $this->createQuery('t')
		->select('t.id,t.eiaproject_id,t.stage,t.created_by,d.project_reference_number,d.project_title,d.updated_by')
		->leftJoin('t.EIAProjectDetail d')
		->where('t.user_assigned = ?',sfContext::getInstance()->getUser()->getGuardUser()->getId())
		->andWhere('t.work_status = ?',$status);
		
		return $q->fetchArray();
	}
}