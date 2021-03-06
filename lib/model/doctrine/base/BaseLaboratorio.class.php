<?php

/**
 * BaseLaboratorio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $nombre
 * @property integer $capacidad
 * @property Doctrine_Collection $Quizs
 * @property Doctrine_Collection $LaboratorioQuiz
 * 
 * @method text                getNombre()          Returns the current record's "nombre" value
 * @method integer             getCapacidad()       Returns the current record's "capacidad" value
 * @method Doctrine_Collection getQuizs()           Returns the current record's "Quizs" collection
 * @method Doctrine_Collection getLaboratorioQuiz() Returns the current record's "LaboratorioQuiz" collection
 * @method Laboratorio         setNombre()          Sets the current record's "nombre" value
 * @method Laboratorio         setCapacidad()       Sets the current record's "capacidad" value
 * @method Laboratorio         setQuizs()           Sets the current record's "Quizs" collection
 * @method Laboratorio         setLaboratorioQuiz() Sets the current record's "LaboratorioQuiz" collection
 * 
 * @package    quizsignup
 * @subpackage model
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLaboratorio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('laboratorio');
        $this->hasColumn('nombre', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('capacidad', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Quiz as Quizs', array(
             'refClass' => 'LaboratorioQuiz',
             'local' => 'laboratorio_id',
             'foreign' => 'quiz_id'));

        $this->hasMany('LaboratorioQuiz', array(
             'local' => 'id',
             'foreign' => 'laboratorio_id'));
    }
}