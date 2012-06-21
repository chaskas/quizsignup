<?php

/**
 * TutorQuiz filter form base class.
 *
 * @package    quizsignup
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTutorQuizFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tutor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('tutor'), 'add_empty' => true)),
      'quiz_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('quiz'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'tutor_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('tutor'), 'column' => 'id')),
      'quiz_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('quiz'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tutor_quiz_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TutorQuiz';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'tutor_id' => 'ForeignKey',
      'quiz_id'  => 'ForeignKey',
    );
  }
}
