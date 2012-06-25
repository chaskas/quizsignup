<?php

/**
 * TutorQuiz form base class.
 *
 * @method TutorQuiz getObject() Returns the current form's model object
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTutorQuizForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'tutor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('tutor'), 'add_empty' => false)),
      'quiz_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('quiz'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tutor_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('tutor'))),
      'quiz_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('quiz'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TutorQuiz', 'column' => array('tutor_id', 'quiz_id')))
    );

    $this->widgetSchema->setNameFormat('tutor_quiz[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TutorQuiz';
  }

}
