<?php

/**
 * BaseEIAProjectAttachment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $eiaproject_id
 * @property string $panoramic_view
 * @property string $perspective_site_impact
 * @property string $preliminary_approval
 * @property string $land_ownership_doc
 * @property string $ministrial_document
 * @property string $perimeter_area_map
 * @property string $location_area_map
 * @property string $other_supporting_document
 * @property string $project_reference_number
 * @property string $token
 * @property string $resubmit
 * @property EIAProjectDetail $EIAProjectDetail
 * 
 * @method integer              getEiaprojectId()              Returns the current record's "eiaproject_id" value
 * @method string               getPanoramicView()             Returns the current record's "panoramic_view" value
 * @method string               getPerspectiveSiteImpact()     Returns the current record's "perspective_site_impact" value
 * @method string               getPreliminaryApproval()       Returns the current record's "preliminary_approval" value
 * @method string               getLandOwnershipDoc()          Returns the current record's "land_ownership_doc" value
 * @method string               getMinistrialDocument()        Returns the current record's "ministrial_document" value
 * @method string               getPerimeterAreaMap()          Returns the current record's "perimeter_area_map" value
 * @method string               getLocationAreaMap()           Returns the current record's "location_area_map" value
 * @method string               getOtherSupportingDocument()   Returns the current record's "other_supporting_document" value
 * @method string               getProjectReferenceNumber()    Returns the current record's "project_reference_number" value
 * @method string               getToken()                     Returns the current record's "token" value
 * @method string               getResubmit()                  Returns the current record's "resubmit" value
 * @method EIAProjectDetail     getEIAProjectDetail()          Returns the current record's "EIAProjectDetail" value
 * @method EIAProjectAttachment setEiaprojectId()              Sets the current record's "eiaproject_id" value
 * @method EIAProjectAttachment setPanoramicView()             Sets the current record's "panoramic_view" value
 * @method EIAProjectAttachment setPerspectiveSiteImpact()     Sets the current record's "perspective_site_impact" value
 * @method EIAProjectAttachment setPreliminaryApproval()       Sets the current record's "preliminary_approval" value
 * @method EIAProjectAttachment setLandOwnershipDoc()          Sets the current record's "land_ownership_doc" value
 * @method EIAProjectAttachment setMinistrialDocument()        Sets the current record's "ministrial_document" value
 * @method EIAProjectAttachment setPerimeterAreaMap()          Sets the current record's "perimeter_area_map" value
 * @method EIAProjectAttachment setLocationAreaMap()           Sets the current record's "location_area_map" value
 * @method EIAProjectAttachment setOtherSupportingDocument()   Sets the current record's "other_supporting_document" value
 * @method EIAProjectAttachment setProjectReferenceNumber()    Sets the current record's "project_reference_number" value
 * @method EIAProjectAttachment setToken()                     Sets the current record's "token" value
 * @method EIAProjectAttachment setResubmit()                  Sets the current record's "resubmit" value
 * @method EIAProjectAttachment setEIAProjectDetail()          Sets the current record's "EIAProjectDetail" value
 * 
 * @package    rdbeportal
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEIAProjectAttachment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('e_i_a_project_attachment');
        $this->hasColumn('eiaproject_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('panoramic_view', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('perspective_site_impact', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('preliminary_approval', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('land_ownership_doc', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('ministrial_document', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('perimeter_area_map', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('location_area_map', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('other_supporting_document', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('project_reference_number', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('token', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('resubmit', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('EIAProjectDetail', array(
             'local' => 'eiaproject_id',
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