<?php
class AlumnoProfileForm extends AlumnoForm
{
  public function configure()
  {
    
    $this->embedRelation('sfGuardUser','UserProfileForm');
    
    $this->widgetSchema['sfGuardUser']['first_name']->setLabel('Nombre');
    $this->widgetSchema['sfGuardUser']['last_name']->setLabel('Apellido');
    $this->widgetSchema['sfGuardUser']['email_address']->setLabel('Email');
    
    unset(
      $this['user_id'],
      $this['grupo_id']
    );
    
  }
}