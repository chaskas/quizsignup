<?php

/**
 * Alumno form base class.
 *
 * @method Alumno getObject() Returns the current form's model object
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAlumnoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'carrera_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Carrera'), 'add_empty' => false)),
      'matricula'  => new sfWidgetFormInputText(),
      'grupo_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'carrera_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Carrera'))),
      'matricula'  => new sfValidatorPass(),
      'grupo_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Alumno', 'column' => array('user_id')))
    );

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
