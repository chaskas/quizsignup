<?php

/**
 * Quiz form base class.
 *
 * @method Quiz getObject() Returns the current form's model object
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuizForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'fecha_at'          => new sfWidgetFormDate(),
      'hora_ini'          => new sfWidgetFormTime(),
      'hora_fin'          => new sfWidgetFormTime(),
      'cupo'              => new sfWidgetFormInputText(),
      'lesson_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lesson'), 'add_empty' => false)),
      'laboratorios_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Laboratorio')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'fecha_at'          => new sfValidatorDate(),
      'hora_ini'          => new sfValidatorTime(),
      'hora_fin'          => new sfValidatorTime(),
      'cupo'              => new sfValidatorInteger(),
      'lesson_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Lesson'))),
      'laboratorios_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Laboratorio', 'required' => false)),
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

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['laboratorios_list']))
    {
      $this->setDefault('laboratorios_list', $this->object->Laboratorios->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveLaboratoriosList($con);

    parent::doSave($con);
  }

  public function saveLaboratoriosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['laboratorios_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Laboratorios->getPrimaryKeys();
    $values = $this->getValue('laboratorios_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Laboratorios', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Laboratorios', array_values($link));
    }
  }

}
