<?php

/**
 * LaboratorioQuiz form base class.
 *
 * @method LaboratorioQuiz getObject() Returns the current form's model object
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLaboratorioQuizForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'laboratorio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('laboratorio'), 'add_empty' => false)),
      'quiz_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('quiz'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'laboratorio_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('laboratorio'))),
      'quiz_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('quiz'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'LaboratorioQuiz', 'column' => array('laboratorio_id', 'quiz_id')))
    );

    $this->widgetSchema->setNameFormat('laboratorio_quiz[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LaboratorioQuiz';
  }

}
