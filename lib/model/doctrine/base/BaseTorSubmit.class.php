<?php

/**
 * BaseTorSubmit
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $eiaproject_id
 * @property string $attachement
 * @property string $remarks
 * @property string $token
 * @property EIAProjectDetail $EIAProjectDetail
 * 
 * @method integer          getEiaprojectId()     Returns the current record's "eiaproject_id" value
 * @method string           getAttachement()      Returns the current record's "attachement" value
 * @method string           getRemarks()          Returns the current record's "remarks" value
 * @method string           getToken()            Returns the current record's "token" value
 * @method EIAProjectDetail getEIAProjectDetail() Returns the current record's "EIAProjectDetail" value
 * @method TorSubmit        setEiaprojectId()     Sets the current record's "eiaproject_id" value
 * @method TorSubmit        setAttachement()      Sets the current record's "attachement" value
 * @method TorSubmit        setRemarks()          Sets the current record's "remarks" value
 * @method TorSubmit        setToken()            Sets the current record's "token" value
 * @method TorSubmit        setEIAProjectDetail() Sets the current record's "EIAProjectDetail" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTorSubmit extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tor_submit');
        $this->hasColumn('eiaproject_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('attachement', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('remarks', 'string', 400, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 400,
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