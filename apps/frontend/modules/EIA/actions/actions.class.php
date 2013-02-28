<?php

/**
 * eia actions.
 *
 * @package    rdbeportal
 * @subpackage eia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ei_applications = Doctrine_Core::getTable('EIApplication')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EIApplicationForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIApplicationForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ei_application = Doctrine_Core::getTable('EIApplication')->find(array($request->getParameter('id'))), sprintf('Object ei_application does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIApplicationForm($ei_application);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ei_application = Doctrine_Core::getTable('EIApplication')->find(array($request->getParameter('id'))), sprintf('Object ei_application does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIApplicationForm($ei_application);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($ei_application = Doctrine_Core::getTable('EIApplication')->find(array($request->getParameter('id'))), sprintf('Object ei_application does not exist (%s).', $request->getParameter('id')));
    $ei_application->delete();

    $this->redirect('eia/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ei_application = $form->save();

      $this->redirect('eia/edit?id='.$ei_application->getId());
    }
  }
}
