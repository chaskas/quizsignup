<?php

/**
 * Alumno filter form base class.
 *
 * @package    quizsignup
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAlumnoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'matricula' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'carrera'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'grupo_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'    => new sfValidatorPass(array('required' => false)),
      'apellido'  => new sfValidatorPass(array('required' => false)),
      'matricula' => new sfValidatorPass(array('required' => false)),
      'carrera'   => new sfValidatorPass(array('required' => false)),
      'grupo_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Grupo'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('alumno_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumno';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'nombre'    => 'Text',
      'apellido'  => 'Text',
      'matricula' => 'Text',
      'carrera'   => 'Text',
      'grupo_id'  => 'ForeignKey',
    );
  }
}
