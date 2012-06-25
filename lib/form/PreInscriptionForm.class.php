<?php

class PreInscriptionForm extends sfForm 
{
  public function configure()
  {
    $this->setWidgets(array(
      'matricula' => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'matricula' => new sfValidatorString(array('required' => true)),
    ));

    $this->widgetSchema->setNameFormat('alumno[%s]');
  }

}