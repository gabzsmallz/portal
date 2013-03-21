<?php

/**
 * InvestmentCertificate form base class.
 *
 * @method InvestmentCertificate getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInvestmentCertificateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'serial_number' => new sfWidgetFormInputText(),
      'business_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => false)),
      'token'         => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'created_by'    => new sfWidgetFormTextarea(),
      'updated_by'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'serial_number' => new sfValidatorInteger(),
      'business_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'))),
      'token'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'created_by'    => new sfValidatorString(array('required' => false)),
      'updated_by'    => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'InvestmentCertificate', 'column' => array('serial_number'))),
        new sfValidatorDoctrineUnique(array('model' => 'InvestmentCertificate', 'column' => array('business_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('investment_certificate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InvestmentCertificate';
  }

}
