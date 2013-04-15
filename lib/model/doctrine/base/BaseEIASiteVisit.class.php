<?php

/**
 * BaseEIASiteVisit
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $eiaproject_id
 * @property date $site_visit
 * @property string $remarks
 * @property boolean $visited
 * @property string $token
 * @property EIAProjectDetail $EIAProjectDetail
 * @property Doctrine_Collection $EIASiteVisitReport
 * 
 * @method integer             getEiaprojectId()       Returns the current record's "eiaproject_id" value
 * @method date                getSiteVisit()          Returns the current record's "site_visit" value
 * @method string              getRemarks()            Returns the current record's "remarks" value
 * @method boolean             getVisited()            Returns the current record's "visited" value
 * @method string              getToken()              Returns the current record's "token" value
 * @method EIAProjectDetail    getEIAProjectDetail()   Returns the current record's "EIAProjectDetail" value
 * @method Doctrine_Collection getEIASiteVisitReport() Returns the current record's "EIASiteVisitReport" collection
 * @method EIASiteVisit        setEiaprojectId()       Sets the current record's "eiaproject_id" value
 * @method EIASiteVisit        setSiteVisit()          Sets the current record's "site_visit" value
 * @method EIASiteVisit        setRemarks()            Sets the current record's "remarks" value
 * @method EIASiteVisit        setVisited()            Sets the current record's "visited" value
 * @method EIASiteVisit        setToken()              Sets the current record's "token" value
 * @method EIASiteVisit        setEIAProjectDetail()   Sets the current record's "EIAProjectDetail" value
 * @method EIASiteVisit        setEIASiteVisitReport() Sets the current record's "EIASiteVisitReport" collection
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEIASiteVisit extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_i_a_site_visit');
        $this->hasColumn('eiaproject_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('site_visit', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('remarks', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('visited', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
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

        $this->hasMany('EIASiteVisitReport', array(
             'local' => 'id',
             'foreign' => 'eiasitevisit_id'));

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