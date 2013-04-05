<?php

/**
 * BaseRejectedApplications
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $business_registration
 * @property string $application_type
 * @property string $reason
 * @property string $comment
 * @property string $token
 * 
 * @method integer              getBusinessRegistration()  Returns the current record's "business_registration" value
 * @method string               getApplicationType()       Returns the current record's "application_type" value
 * @method string               getReason()                Returns the current record's "reason" value
 * @method string               getComment()               Returns the current record's "comment" value
 * @method string               getToken()                 Returns the current record's "token" value
 * @method RejectedApplications setBusinessRegistration()  Sets the current record's "business_registration" value
 * @method RejectedApplications setApplicationType()       Sets the current record's "application_type" value
 * @method RejectedApplications setReason()                Sets the current record's "reason" value
 * @method RejectedApplications setComment()               Sets the current record's "comment" value
 * @method RejectedApplications setToken()                 Sets the current record's "token" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRejectedApplications extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('rejected_applications');
        $this->hasColumn('business_registration', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('application_type', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('reason', 'string', 1000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 1000,
             ));
        $this->hasColumn('comment', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
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
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}