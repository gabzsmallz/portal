<?php

/**
 * EIApplicationStatusTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EIApplicationStatusTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EIApplicationStatusTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('EIApplicationStatus');
    }
	
	
	public function updateApplicationStatus($appStatus,$id)
	{
		$q = Doctrine_Query::create()
			->UPDATE('EIApplicationStatus')
			->SET('application_status', '?', $appStatus)
			->WHERE('company_id = ?', $id);	
		return $q->execute();
	}
	
	public function updateComment($comment,$id)
	{
		$q = Doctrine_Query::create()
			->UPDATE('EIApplicationStatus')
			->SET('comments', '?',$comment)
			->WHERE('company_id = ?', $id);
			
		return $q->execute();
	}
	
	public function updatePercentage($percent,$id)
	{
		$q = Doctrine_Query::create()
			->UPDATE('EIApplicationStatus')
			->SET('percentage', '?',$percent)
			->WHERE('company_id = ?', $id);
			
		return $q->execute();
	}
}
		