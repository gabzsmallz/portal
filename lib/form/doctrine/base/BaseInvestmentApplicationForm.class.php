<?php

/**
 * InvestmentApplication form base class.
 *
 * @method InvestmentApplication getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInvestmentApplicationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'name'                => new sfWidgetFormInputText(),
      'registration_number' => new sfWidgetFormInputText(),
      'title_in_company'    => new sfWidgetFormInputText(),
      'business_sector'     => new sfWidgetFormInputText(),
      'business_category'   => new sfWidgetFormInputText(),
      'office_telephone'    => new sfWidgetFormInputText(),
      'fax'                 => new sfWidgetFormInputText(),
      'post_box'            => new sfWidgetFormInputText(),
      'location'            => new sfWidgetFormInputText(),
      'sector'              => new sfWidgetFormInputText(),
      'district'            => new sfWidgetFormInputText(),
      'city_province'       => new sfWidgetFormInputText(),
      'token'               => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
      'created_by'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                => new sfValidatorString(array('max_length' => 255)),
      'registration_number' => new sfValidatorString(array('max_length' => 255)),
      'title_in_company'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'business_sector'     => new sfValidatorString(array('max_length' => 255)),
      'business_category'   => new sfValidatorString(array('max_length' => 255)),
      'office_telephone'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fax'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'post_box'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'location'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sector'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'district'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city_province'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'token'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
      'created_by'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'          => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'InvestmentApplication', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'InvestmentApplication', 'column' => array('registration_number'))),
      ))
    );

    $this->widgetSchema->setNameFormat('investment_application[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InvestmentApplication';
  }

}
