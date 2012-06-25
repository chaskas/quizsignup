<?php

/**
 * AlumnoQuiz form base class.
 *
 * @method AlumnoQuiz getObject() Returns the current form's model object
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAlumnoQuizForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'alumno_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('alumno'), 'add_empty' => false)),
      'quiz_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('quiz'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'alumno_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('alumno'))),
      'quiz_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('quiz'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'AlumnoQuiz', 'column' => array('alumno_id', 'quiz_id')))
    );

    $this->widgetSchema->setNameFormat('alumno_quiz[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AlumnoQuiz';
  }

}
