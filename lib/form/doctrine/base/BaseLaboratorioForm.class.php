<?php

/**
 * Laboratorio form base class.
 *
 * @method Laboratorio getObject() Returns the current form's model object
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLaboratorioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'nombre'     => new sfWidgetFormInputText(),
      'capacidad'  => new sfWidgetFormInputText(),
      'quizs_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Quiz')),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'     => new sfValidatorPass(),
      'capacidad'  => new sfValidatorInteger(),
      'quizs_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Quiz', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('laboratorio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Laboratorio';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['quizs_list']))
    {
      $this->setDefault('quizs_list', $this->object->Quizs->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveQuizsList($con);

    parent::doSave($con);
  }

  public function saveQuizsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['quizs_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Quizs->getPrimaryKeys();
    $values = $this->getValue('quizs_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Quizs', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Quizs', array_values($link));
    }
  }

}
