<?php

/**
 * Carrera
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    quizsignup
 * @subpackage model
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Carrera extends BaseCarrera
{
  public function __toString()
  {
    return $this->getNombre();
  }
}