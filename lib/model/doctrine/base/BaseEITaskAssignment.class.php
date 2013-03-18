<?php

/**
 * BaseEITaskAssignment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_assigned
 * @property integer $eiaproject_id
 * @property string $instructions
 * @property timestamp $duedate
 * @property string $work_status
 * @property string $token
 * @property EIAProjectDetail $EIAProjectDetail
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer          getUserAssigned()     Returns the current record's "user_assigned" value
 * @method integer          getEiaprojectId()     Returns the current record's "eiaproject_id" value
 * @method string           getInstructions()     Returns the current record's "instructions" value
 * @method timestamp        getDuedate()          Returns the current record's "duedate" value
 * @method string           getWorkStatus()       Returns the current record's "work_status" value
 * @method string           getToken()            Returns the current record's "token" value
 * @method EIAProjectDetail getEIAProjectDetail() Returns the current record's "EIAProjectDetail" value
 * @method sfGuardUser      getSfGuardUser()      Returns the current record's "sfGuardUser" value
 * @method EITaskAssignment setUserAssigned()     Sets the current record's "user_assigned" value
 * @method EITaskAssignment setEiaprojectId()     Sets the current record's "eiaproject_id" value
 * @method EITaskAssignment setInstructions()     Sets the current record's "instructions" value
 * @method EITaskAssignment setDuedate()          Sets the current record's "duedate" value
 * @method EITaskAssignment setWorkStatus()       Sets the current record's "work_status" value
 * @method EITaskAssignment setToken()            Sets the current record's "token" value
 * @method EITaskAssignment setEIAProjectDetail() Sets the current record's "EIAProjectDetail" value
 * @method EITaskAssignment setSfGuardUser()      Sets the current record's "sfGuardUser" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEITaskAssignment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_i_task_assignment');
        $this->hasColumn('user_assigned', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('eiaproject_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('instructions', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('duedate', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('work_status', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('token', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('EIAProjectDetail', array(
             'local' => 'eiaproject_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'user_assigned',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $signable0 = new Doctrine_Template_Signable(array(
             'created:{ name' => 'created_by,type: string,onUpdate: CASCADE,onDelete: SET NULL,options: {notnull: true,default: None}}',
             'updated' => 
             array(
              'name' => 'updated_by',
              'type' => 'string',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($signable0);
    }
}