<?php

/**
 * Portlets filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePortletsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'investment_certificate' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'eia_certificate'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tax_exemptions'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'                  => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'investment_certificate' => new sfValidatorPass(array('required' => false)),
      'eia_certificate'        => new sfValidatorPass(array('required' => false)),
      'tax_exemptions'         => new sfValidatorPass(array('required' => false)),
      'token'                  => new sfValidatorPass(array('required' => false)),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('portlets_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Portlets';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'investment_certificate' => 'Text',
      'eia_certificate'        => 'Text',
      'tax_exemptions'         => 'Text',
      'token'                  => 'Text',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
      'created_by'             => 'ForeignKey',
      'updated_by'             => 'Text',
    );
  }
}
