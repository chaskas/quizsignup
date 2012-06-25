<?php

/**
 * alumno actions.
 *
 * @package    quizsignup
 * @subpackage alumno
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class alumnoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->alumnos = Doctrine_Core::getTable('Alumno')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AlumnoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AlumnoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($alumno = Doctrine_Core::getTable('Alumno')->find(array($request->getParameter('id'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('id')));
    $this->form = new AlumnoForm($alumno);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($alumno = Doctrine_Core::getTable('Alumno')->find(array($request->getParameter('id'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('id')));
    $this->form = new AlumnoForm($alumno);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($alumno = Doctrine_Core::getTable('Alumno')->find(array($request->getParameter('id'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('id')));
    $alumno->delete();

    $this->redirect('alumno/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $alumno = $form->save();

      $this->redirect('alumno/edit?id='.$alumno->getId());
    }
  }
}
