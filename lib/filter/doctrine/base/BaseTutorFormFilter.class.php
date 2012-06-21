<?php

/**
 * Tutor filter form base class.
 *
 * @package    quizsignup
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTutorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'   => new sfValidatorPass(array('required' => false)),
      'apellido' => new sfValidatorPass(array('required' => false)),
      'email'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tutor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tutor';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'nombre'   => 'Text',
      'apellido' => 'Text',
      'email'    => 'Text',
    );
  }
}
