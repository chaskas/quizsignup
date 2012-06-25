<?php

/**
 * lesson actions.
 *
 * @package    quizsignup
 * @subpackage lesson
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class lessonActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->lessons = Doctrine_Core::getTable('Lesson')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LessonForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LessonForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($lesson = Doctrine_Core::getTable('Lesson')->find(array($request->getParameter('id'))), sprintf('Object lesson does not exist (%s).', $request->getParameter('id')));
    $this->form = new LessonForm($lesson);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($lesson = Doctrine_Core::getTable('Lesson')->find(array($request->getParameter('id'))), sprintf('Object lesson does not exist (%s).', $request->getParameter('id')));
    $this->form = new LessonForm($lesson);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($lesson = Doctrine_Core::getTable('Lesson')->find(array($request->getParameter('id'))), sprintf('Object lesson does not exist (%s).', $request->getParameter('id')));
    $lesson->delete();

    $this->redirect('lesson/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $lesson = $form->save();

      $this->redirect('lesson/index');
    }
  }
}
