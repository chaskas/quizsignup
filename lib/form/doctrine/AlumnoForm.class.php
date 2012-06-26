<?php

/**
 * Alumno form.
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AlumnoForm extends BaseAlumnoForm
{
  public function configure()
  {
    
    $this->embedRelation('sfGuardUser','UserRegisterForm');
    
    $this->validatorSchema['matricula']   = new sfValidatorNumber(array('required'=>true,'max'=>9999999999));
    $this->validatorSchema['carrera']     = new sfValidatorString(array('required'=>true));
    
    $this->widgetSchema['matricula']->setLabel('Matr&iacute;cula');
    $this->widgetSchema['carrera']->setLabel('Carrera');
    
    $this->widgetSchema['sfGuardUser']['first_name']->setLabel('Nombre');
    $this->widgetSchema['sfGuardUser']['last_name']->setLabel('Apellido');
    $this->widgetSchema['sfGuardUser']['email_address']->setLabel('Email');
    $this->widgetSchema['sfGuardUser']['username']->setLabel('Usuario');
    $this->widgetSchema['sfGuardUser']['password']->setLabel('Clave');
    $this->widgetSchema['sfGuardUser']['password_confirmation']->setLabel('Repite Clave');
    
    unset(
      $this['user_id'],
      $this['grupo_id']
    );
  }
}
