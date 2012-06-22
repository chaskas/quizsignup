<?php

/**
 * BaseModulo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $nombre
 * @property Doctrine_Collection $Grupo
 * @property Doctrine_Collection $Lesson
 * 
 * @method text                getNombre() Returns the current record's "nombre" value
 * @method Doctrine_Collection getGrupo()  Returns the current record's "Grupo" collection
 * @method Doctrine_Collection getLesson() Returns the current record's "Lesson" collection
 * @method Modulo              setNombre() Sets the current record's "nombre" value
 * @method Modulo              setGrupo()  Sets the current record's "Grupo" collection
 * @method Modulo              setLesson() Sets the current record's "Lesson" collection
 * 
 * @package    quizsignup
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseModulo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('modulo');
        $this->hasColumn('nombre', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Grupo', array(
             'local' => 'id',
             'foreign' => 'modulo_id'));

        $this->hasMany('Lesson', array(
             'local' => 'id',
             'foreign' => 'modulo_id'));
    }
}