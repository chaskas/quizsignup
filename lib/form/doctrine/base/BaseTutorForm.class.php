<?php

/**
 * Tutor form base class.
 *
 * @method Tutor getObject() Returns the current form's model object
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTutorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'nombre'   => new sfWidgetFormInputText(),
      'apellido' => new sfWidgetFormInputText(),
      'email'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'   => new sfValidatorPass(),
      'apellido' => new sfValidatorPass(),
      'email'    => new sfValidatorPass(),
    ));

    $this->widgetSchema->setNameFormat('tutor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tutor';
  }

}
