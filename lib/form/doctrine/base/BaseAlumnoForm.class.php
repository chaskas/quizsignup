<?php

/**
 * Alumno form base class.
 *
 * @method Alumno getObject() Returns the current form's model object
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAlumnoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'nombre'    => new sfWidgetFormInputText(),
      'apellido'  => new sfWidgetFormInputText(),
      'matricula' => new sfWidgetFormInputText(),
      'carrera'   => new sfWidgetFormInputText(),
      'grupo_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'    => new sfValidatorPass(),
      'apellido'  => new sfValidatorPass(),
      'matricula' => new sfValidatorPass(),
      'carrera'   => new sfValidatorPass(),
      'grupo_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'))),
    ));

    $this->widgetSchema->setNameFormat('alumno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumno';
  }

}
