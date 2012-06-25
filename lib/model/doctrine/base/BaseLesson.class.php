<?php

/**
 * BaseLesson
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $nombre
 * @property text $descripcion
 * @property integer $modulo_id
 * @property Modulo $Modulo
 * @property Doctrine_Collection $Quiz
 * 
 * @method text                getNombre()      Returns the current record's "nombre" value
 * @method text                getDescripcion() Returns the current record's "descripcion" value
 * @method integer             getModuloId()    Returns the current record's "modulo_id" value
 * @method Modulo              getModulo()      Returns the current record's "Modulo" value
 * @method Doctrine_Collection getQuiz()        Returns the current record's "Quiz" collection
 * @method Lesson              setNombre()      Sets the current record's "nombre" value
 * @method Lesson              setDescripcion() Sets the current record's "descripcion" value
 * @method Lesson              setModuloId()    Sets the current record's "modulo_id" value
 * @method Lesson              setModulo()      Sets the current record's "Modulo" value
 * @method Lesson              setQuiz()        Sets the current record's "Quiz" collection
 * 
 * @package    quizsignup
 * @subpackage model
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLesson extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('lesson');
        $this->hasColumn('nombre', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('descripcion', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('modulo_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Modulo', array(
             'local' => 'modulo_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Quiz', array(
             'local' => 'id',
             'foreign' => 'lesson_id'));
    }
}