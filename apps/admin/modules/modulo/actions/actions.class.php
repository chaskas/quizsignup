<?php

/**
 * modulo actions.
 *
 * @package    quizsignup
 * @subpackage modulo
 * @author     Rodrigo Campos H. <contacto@webdevel.cl>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class moduloActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->modulos = Doctrine_Core::getTable('Modulo')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ModuloForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ModuloForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($modulo = Doctrine_Core::getTable('Modulo')->find(array($request->getParameter('id'))), sprintf('Object modulo does not exist (%s).', $request->getParameter('id')));
    $this->form = new ModuloForm($modulo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($modulo = Doctrine_Core::getTable('Modulo')->find(array($request->getParameter('id'))), sprintf('Object modulo does not exist (%s).', $request->getParameter('id')));
    $this->form = new ModuloForm($modulo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($modulo = Doctrine_Core::getTable('Modulo')->find(array($request->getParameter('id'))), sprintf('Object modulo does not exist (%s).', $request->getParameter('id')));
    $modulo->delete();

    $this->redirect('modulo/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $modulo = $form->save();

      $this->redirect('modulo/index');
    }
  }
}
