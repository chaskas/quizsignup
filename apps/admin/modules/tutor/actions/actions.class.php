<?php

/**
 * tutor actions.
 *
 * @package    quizsignup
 * @subpackage tutor
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tutorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tutors = Doctrine_Core::getTable('Tutor')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TutorForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TutorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tutor = Doctrine_Core::getTable('Tutor')->find(array($request->getParameter('id'))), sprintf('Object tutor does not exist (%s).', $request->getParameter('id')));
    $this->form = new TutorForm($tutor);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tutor = Doctrine_Core::getTable('Tutor')->find(array($request->getParameter('id'))), sprintf('Object tutor does not exist (%s).', $request->getParameter('id')));
    $this->form = new TutorForm($tutor);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tutor = Doctrine_Core::getTable('Tutor')->find(array($request->getParameter('id'))), sprintf('Object tutor does not exist (%s).', $request->getParameter('id')));
    $tutor->delete();

    $this->redirect('tutor/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tutor = $form->save();

      $this->redirect('tutor/edit?id='.$tutor->getId());
    }
  }
}
