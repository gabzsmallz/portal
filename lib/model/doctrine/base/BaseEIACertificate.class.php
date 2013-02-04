<?php

/**
 * BaseEIACertificate
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $serial_number
 * @property integer $company_id
 * @property EIApplication $EIApplication
 * 
 * @method integer        getSerialNumber()  Returns the current record's "serial_number" value
 * @method integer        getCompanyId()     Returns the current record's "company_id" value
 * @method EIApplication  getEIApplication() Returns the current record's "EIApplication" value
 * @method EIACertificate setSerialNumber()  Sets the current record's "serial_number" value
 * @method EIACertificate setCompanyId()     Sets the current record's "company_id" value
 * @method EIACertificate setEIApplication() Sets the current record's "EIApplication" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEIACertificate extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_i_a_certificate');
        $this->hasColumn('serial_number', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('company_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('EIApplication', array(
             'local' => 'company_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}