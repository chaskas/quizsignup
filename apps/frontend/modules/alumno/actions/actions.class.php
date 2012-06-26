<?php

/**
 * alumno actions.
 *
 * @package    quizsignup
 * @subpackage alumno
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class alumnoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }
  public function executeHome(sfWebRequest $request)
  {
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

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $alumno = $form->save();
      $this->getUser()->signIn($this->form->getObject()->getSfGuardUser());
      $this->redirect('@homepage');
    }
  }
  public function executeInscribirQuiz()
  {
    //mostrar listados de quiz activos segun lesson y user_id.
  }
  public function executeProfile(sfWebRequest $request)
  {
    $this->forward404Unless($alumno = $this->getUser()->getGuardUser()->getAlumno(), sprintf('Object alumno does not exist (%s).', $request->getParameter('id')));
    $this->formProfile = new AlumnoProfileForm($alumno);
  }
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($alumno = $this->getUser()->getGuardUser()->getAlumno(), sprintf('Object alumno does not exist (%s).', $request->getParameter('id')));
    $this->formProfile = new AlumnoProfileForm($alumno);

    $this->processFormProfile($request, $this->formProfile);

    $this->setTemplate('profile');
  }
  protected function processFormProfile(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $alumno = $form->save();
      $this->getUser()->setFlash('confirmation','Has actualizado tu perfil correctamente.');
    }
  }
}
