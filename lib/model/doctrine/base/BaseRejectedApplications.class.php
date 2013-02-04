<?php

/**
 * BaseRejectedApplications
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $business_id
 * @property string $comment
 * @property InvestmentApplication $InvestmentApplication
 * 
 * @method integer               getBusinessId()            Returns the current record's "business_id" value
 * @method string                getComment()               Returns the current record's "comment" value
 * @method InvestmentApplication getInvestmentApplication() Returns the current record's "InvestmentApplication" value
 * @method RejectedApplications  setBusinessId()            Sets the current record's "business_id" value
 * @method RejectedApplications  setComment()               Sets the current record's "comment" value
 * @method RejectedApplications  setInvestmentApplication() Sets the current record's "InvestmentApplication" value
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
        $this->hasColumn('business_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('comment', 'string', 255, array(
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