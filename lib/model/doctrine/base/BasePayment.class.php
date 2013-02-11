<?php

/**
 * BasePayment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $business_id
 * @property string $payment_status
 * @property integer $slip_number
 * @property InvestmentApplication $InvestmentApplication
 * 
 * @method integer               getBusinessId()            Returns the current record's "business_id" value
 * @method string                getPaymentStatus()         Returns the current record's "payment_status" value
 * @method integer               getSlipNumber()            Returns the current record's "slip_number" value
 * @method InvestmentApplication getInvestmentApplication() Returns the current record's "InvestmentApplication" value
 * @method Payment               setBusinessId()            Sets the current record's "business_id" value
 * @method Payment               setPaymentStatus()         Sets the current record's "payment_status" value
 * @method Payment               setSlipNumber()            Sets the current record's "slip_number" value
 * @method Payment               setInvestmentApplication() Sets the current record's "InvestmentApplication" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePayment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('payment');
        $this->hasColumn('business_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('payment_status', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'default' => 'notpaid',
             'length' => 255,
             ));
        $this->hasColumn('slip_number', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('InvestmentApplication', array(
             'local' => 'business_id',
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