<?php

/**
 * InvestmentApplication
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class InvestmentApplication extends BaseInvestmentApplication
{
 //my custom toString method
  public function __toString()
  {
    return sprintf('%s',$this->getName());
  }

   // We want to Override this method and check if this business is registered. Simple Simulation
   //If not we display appropriate message informing the user of the error
  public function save(Doctrine_Connection $conn = null)
  {
   $conn = $conn ? $conn : $this->getTable()->getConnection();
   $conn->beginTransaction();
		  try
		  {
		if (!$this->getToken() && !$this->getApplicantReferenceNumber())
		  {
			$this->setToken(sha1(date().rand(11111, 99999)));
			//get the incremental number and set it
			 $number = Doctrine_Core::getTable('InvestmentApplication')->createIncrementalReferenceNumber();
		     $this->setApplicantReferenceNumber($number);
		  }
		  
		 
		  
		  
			  ///
			  $ret = parent::save($conn);
			  $conn->commit();
			  return $ret ;
			
		  }
		  catch(Exception $e)
		  {
		  $conn->rollBack();
		  throw $e;
		  }
  }
  //This function will do the job, check if submitted Business name and Registration number exists
  public function validateBusiness($name, $regno)
  {
   $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT * FROM business_registration WHERE business_name = '$name'
   AND business_regno = '$regno'");
  // print_r($query); exit;
   return $query;
  }
  
}