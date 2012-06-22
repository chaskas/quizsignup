<?php

/**
 * Quiz form base class.
 *
 * @method Quiz getObject() Returns the current form's model object
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuizForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'fecha_at'  => new sfWidgetFormDate(),
      'hora_ini'  => new sfWidgetFormTime(),
      'hora_fin'  => new sfWidgetFormTime(),
      'cupo'      => new sfWidgetFormInputText(),
      'lesson_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lesson'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'fecha_at'  => new sfValidatorDate(),
      'hora_ini'  => new sfValidatorTime(),
      'hora_fin'  => new sfValidatorTime(),
      'cupo'      => new sfValidatorInteger(),
      'lesson_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Lesson'))),
    ));

    $this->widgetSchema->setNameFormat('quiz[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Quiz';
  }

}
