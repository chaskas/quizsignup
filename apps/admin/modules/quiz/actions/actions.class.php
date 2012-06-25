<?php

/**
 * quiz actions.
 *
 * @package    quizsignup
 * @subpackage quiz
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class quizActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->quizs = Doctrine_Core::getTable('Quiz')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new QuizForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new QuizForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($quiz = Doctrine_Core::getTable('Quiz')->find(array($request->getParameter('id'))), sprintf('Object quiz does not exist (%s).', $request->getParameter('id')));
    $this->form = new QuizForm($quiz);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($quiz = Doctrine_Core::getTable('Quiz')->find(array($request->getParameter('id'))), sprintf('Object quiz does not exist (%s).', $request->getParameter('id')));
    $this->form = new QuizForm($quiz);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($quiz = Doctrine_Core::getTable('Quiz')->find(array($request->getParameter('id'))), sprintf('Object quiz does not exist (%s).', $request->getParameter('id')));
    $quiz->delete();

    $this->redirect('quiz/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $quiz = $form->save();

      $this->redirect('quiz/index');
    }
  }
}
