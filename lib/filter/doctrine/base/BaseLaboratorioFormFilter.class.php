<?php

/**
 * Laboratorio filter form base class.
 *
 * @package    quizsignup
 * @subpackage filter
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLaboratorioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'capacidad'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'quizs_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Quiz')),
    ));

    $this->setValidators(array(
      'nombre'     => new sfValidatorPass(array('required' => false)),
      'capacidad'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quizs_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Quiz', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('laboratorio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addQuizsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('LaboratorioQuiz.quiz_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Laboratorio';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'nombre'     => 'Text',
      'capacidad'  => 'Number',
      'quizs_list' => 'ManyKey',
    );
  }
}
