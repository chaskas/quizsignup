<?php

/**
 * Quiz form.
 *
 * @package    quizsignup
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuizForm extends BaseQuizForm
{
  public function configure()
  {
    $this->widgetSchema['fecha_at'] = new sfWidgetFormJQueryDate(array('config' => '{showOn: "button",buttonImage: "/images/fugue/calendar.png",buttonImageOnly: true,changeMonth: true,changeYear: true}', 'culture' => 'es'));
    $this->widgetSchema['fecha_at']->getOption('date_widget')->setOption('format', '%day%%month%%year%');
    
    $this->widgetSchema['hora_ini'] = new sfWidgetFormI18nTime(array('culture'=>'es'));
    
    //$this->setDefault('cupo', );
    
    $this->widgetSchema->setLabels(array(
      'fecha_at'=>'Fecha',
      'hora_ini'=>'Hora inicio',
      'hora_fin'=>'Hora fin',
      'laboratorios_list' => 'Lista de Laboratorios'
      ));
  }
}
