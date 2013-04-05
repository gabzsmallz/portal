<?php

/**
 * BaseApprovedApplications
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $business_id
 * @property string $application_type
 * @property string $comment
 * @property string $token
 * @property InvestmentApplication $InvestmentApplication
 * 
 * @method integer               getBusinessId()            Returns the current record's "business_id" value
 * @method string                getApplicationType()       Returns the current record's "application_type" value
 * @method string                getComment()               Returns the current record's "comment" value
 * @method string                getToken()                 Returns the current record's "token" value
 * @method InvestmentApplication getInvestmentApplication() Returns the current record's "InvestmentApplication" value
 * @method ApprovedApplications  setBusinessId()            Sets the current record's "business_id" value
 * @method ApprovedApplications  setApplicationType()       Sets the current record's "application_type" value
 * @method ApprovedApplications  setComment()               Sets the current record's "comment" value
 * @method ApprovedApplications  setToken()                 Sets the current record's "token" value
 * @method ApprovedApplications  setInvestmentApplication() Sets the current record's "InvestmentApplication" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseApprovedApplications extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('approved_applications');
        $this->hasColumn('business_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('application_type', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('comment', 'string', 1000, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 1000,
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
        $this->hasOne('InvestmentApplication', array(
             'local' => 'business_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}