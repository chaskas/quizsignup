<?php

/**
 * Lesson form base class.
 *
 * @method Lesson getObject() Returns the current form's model object
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLessonForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'nombre'    => new sfWidgetFormInputText(),
      'modulo_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Modulo'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'    => new sfValidatorPass(),
      'modulo_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Modulo'))),
    ));

    $this->widgetSchema->setNameFormat('lesson[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lesson';
  }

}
