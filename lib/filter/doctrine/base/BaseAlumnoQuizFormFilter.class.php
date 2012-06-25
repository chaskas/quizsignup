<?php

/**
 * AlumnoQuiz filter form base class.
 *
 * @package    quizsignup
 * @subpackage filter
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAlumnoQuizFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'alumno_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('alumno'), 'add_empty' => true)),
      'quiz_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('quiz'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'alumno_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('alumno'), 'column' => 'id')),
      'quiz_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('quiz'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('alumno_quiz_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AlumnoQuiz';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'alumno_id' => 'ForeignKey',
      'quiz_id'   => 'ForeignKey',
    );
  }
}
