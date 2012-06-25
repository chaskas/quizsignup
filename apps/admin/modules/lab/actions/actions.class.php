<?php

/**
 * lab actions.
 *
 * @package    quizsignup
 * @subpackage lab
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class labActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->laboratorios = Doctrine_Core::getTable('Laboratorio')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LaboratorioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LaboratorioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($laboratorio = Doctrine_Core::getTable('Laboratorio')->find(array($request->getParameter('id'))), sprintf('Object laboratorio does not exist (%s).', $request->getParameter('id')));
    $this->form = new LaboratorioForm($laboratorio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($laboratorio = Doctrine_Core::getTable('Laboratorio')->find(array($request->getParameter('id'))), sprintf('Object laboratorio does not exist (%s).', $request->getParameter('id')));
    $this->form = new LaboratorioForm($laboratorio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($laboratorio = Doctrine_Core::getTable('Laboratorio')->find(array($request->getParameter('id'))), sprintf('Object laboratorio does not exist (%s).', $request->getParameter('id')));
    $laboratorio->delete();

    $this->redirect('lab/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $laboratorio = $form->save();

      $this->redirect('lab/index');
    }
  }
}
