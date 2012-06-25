<?php

class PreInscriptionForm extends sfForm 
{
  public function configure()
  {
    $this->setWidgets(array(
      'matricula' => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'matricula' => new sfValidatorNumber(array('required' => true,'max'=>9999999999)),
    ));

    $this->widgetSchema->setNameFormat('alumno[%s]');
  }

}