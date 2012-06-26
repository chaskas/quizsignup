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
    
    unset(
      $this['user_id'],
      $this['grupo_id']
    );
  }
}
