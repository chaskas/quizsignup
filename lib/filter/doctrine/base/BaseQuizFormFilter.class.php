<?php

/**
 * Quiz filter form base class.
 *
 * @package    quizsignup
 * @subpackage filter
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuizFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'fecha_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'hora_ini'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hora_fin'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cupo'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lesson_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lesson'), 'add_empty' => true)),
      'laboratorios_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Laboratorio')),
    ));

    $this->setValidators(array(
      'fecha_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'hora_ini'          => new sfValidatorPass(array('required' => false)),
      'hora_fin'          => new sfValidatorPass(array('required' => false)),
      'cupo'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lesson_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Lesson'), 'column' => 'id')),
      'laboratorios_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Laboratorio', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('quiz_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addLaboratoriosListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.LaboratorioQuiz LaboratorioQuiz')
      ->andWhereIn('LaboratorioQuiz.laboratorio_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Quiz';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'fecha_at'          => 'Date',
      'hora_ini'          => 'Text',
      'hora_fin'          => 'Text',
      'cupo'              => 'Number',
      'lesson_id'         => 'ForeignKey',
      'laboratorios_list' => 'ManyKey',
    );
  }
}
