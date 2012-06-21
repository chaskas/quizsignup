<?php

/**
 * LaboratorioQuiz filter form base class.
 *
 * @package    quizsignup
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLaboratorioQuizFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'laboratorio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('laboratorio'), 'add_empty' => true)),
      'quiz_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('quiz'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'laboratorio_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('laboratorio'), 'column' => 'id')),
      'quiz_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('quiz'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('laboratorio_quiz_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LaboratorioQuiz';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'laboratorio_id' => 'ForeignKey',
      'quiz_id'        => 'ForeignKey',
    );
  }
}
