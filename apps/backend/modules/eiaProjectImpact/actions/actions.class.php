<?php

/**
 * eiaProjectImpact actions.
 *
 * @package    rdbeportal
 * @subpackage eiaProjectImpact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaProjectImpactActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->project_impacts = Doctrine_Core::getTable('ProjectImpact')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProjectImpactForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProjectImpactForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($project_impact = Doctrine_Core::getTable('ProjectImpact')->find(array($request->getParameter('id'))), sprintf('Object project_impact does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjectImpactForm($project_impact);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($project_impact = Doctrine_Core::getTable('ProjectImpact')->find(array($request->getParameter('id'))), sprintf('Object project_impact does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjectImpactForm($project_impact);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($project_impact = Doctrine_Core::getTable('ProjectImpact')->find(array($request->getParameter('id'))), sprintf('Object project_impact does not exist (%s).', $request->getParameter('id')));
    $project_impact->delete();

    $this->redirect('eiaProjectImpact/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $project_impact = $form->save();
      
	  $this->redirect('@homepage');
    }
  }
}