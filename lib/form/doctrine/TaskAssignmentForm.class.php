<?php

/**
 * TaskAssignment form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
  
class TaskAssignmentForm extends BaseTaskAssignmentForm
{
  
  public function configure()
  {
    //$access = new TaskAssignmentFormVariables();
    //Labels
  
   $this->widgetSchema->setLabel('user_assigned', 'Assign To ');
   $this->widgetSchema->setLabel('investmentapp_id', 'Application Documents  For ');
   //$this->widgetSchema = new sfWidgetFormSelect(array('choices' => date('Y-m-d H:i:s')));
   //set default date and time
    $this->setDefault('created_at',date('Y-m-d H:i:s')); 
   // $this->setDefault('duedate',date('Y-m-d H:i:s', time() + 86400 * 2));
  // unset($this['username_id']);
   //unset some fields
   unset($this['updated_at'], $this['created_by'], $this['updated_by'],$this['created_at']);
   ///changing input
   $this->widgetSchema['instructions'] = new sfWidgetFormTextarea() ;
   //convert date duedate for an input text
   $this->widgetSchema['duedate'] = new sfWidgetFormInputText();
   //when a user is creating a new assignment we echo default status as not started untill the user assigned accesses the
   //document and clicks start work button.
   $status = "notstarted";
   $this->setDefault('work_status',$status );
   $this->widgetSchema['work_status'] = new sfWidgetFormInputHidden();
   /*
   ////for user assigned
     $this->widgetSchema['user_assigned'] = new sfWidgetFormChoice(array(
	#  'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('TaskAssignment')->getDataAdmins(),//investmentcertadmins
	  'expanded' => false,
    ));
	 ////for comapny
     $this->widgetSchema['investmentapp_id'] = new sfWidgetFormChoice(array(
	#  'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('TaskAssignment')->getCompanyName(), //petercompany
	  'expanded' => false,
    )); */
  }
  
}
