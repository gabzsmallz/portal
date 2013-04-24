<?php

/**
 * projectSocialEconomic actions.
 *
 * @package    rdbeportal
 * @subpackage projectSocialEconomic
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectSocialEconomicActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_social_economics = Doctrine_Core::getTable('EIAProjectSocialEconomic')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_project_social_economic = Doctrine_Core::getTable('EIAProjectSocialEconomic')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_project_social_economic);
  }

  public function executeNew(sfWebRequest $request)
  {
	if(!is_null($species=Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->find(array($request->getParameter('id')))) && $species->getToken()==$request->getParameter('token'))
	{
		$this->form = new EIAProjectSocialEconomicForm();
		
	}else{
		$this->getUser()->setFlash('notice','Please Fill in this form first before proceeding');
		$this->redirect('@project_detail'); 
	}
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectSocialEconomicForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_project_social_economic = Doctrine_Core::getTable('EIAProjectSocialEconomic')->find(array($request->getParameter('id'))), sprintf('Object eia_project_social_economic does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectSocialEconomicForm($eia_project_social_economic);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_social_economic = Doctrine_Core::getTable('EIAProjectSocialEconomic')->find(array($request->getParameter('id'))), sprintf('Object eia_project_social_economic does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectSocialEconomicForm($eia_project_social_economic);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_social_economic = Doctrine_Core::getTable('EIAProjectSocialEconomic')->find(array($request->getParameter('id'))), sprintf('Object eia_project_social_economic does not exist (%s).', $request->getParameter('id')));
    $eia_project_social_economic->delete();

    $this->redirect('projectSocialEconomic/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_social_economic = $form->save();
	////////
	//get the setAttribute
	if($this->getUser()->getAttribute('eiaprojectid'))
	{
	  $project_id = $this->getUser()->getAttribute('eiaprojectid');
	}else{
	$project_id = $eia_project_social_economic->getEiaprojectId();
	}
	 $query2 = Doctrine_Core::getTable('EIAProjectImpactMeasures')->queryForId($project_id);
	 $queried_id = null ;
	 $queried_token = null;
	 foreach($query2 as $q)
	 {
	  $queried_id = $q['id'];
	  $queried_token = $q['token'];
	 }
	// print $queried_id; exit;
	 //
	 if($queried_id != null) //edit, we redirect to editing method
	 {
		if($eia_project_social_economic->getResubmit() == 'all')
		{
		//$projectImpactMeasures=Doctrine_Core::getTable('EIAProjectImpactMeasures')->findByEiaprojectId($eia_project_social_economic->getEiaproject_id());
		$this->redirect('projectImpactMeasures/edit?id='.$queried_id);
		}elseif($eia_project_social_economic->getResubmit() == 'only')
		{
			$resubmit=$this->getUser()->getAttribute('resubmit');
			if($resubmit['EIAProjectImpactMeasures'])
			{
			Doctrine_Core::getTable('EIAProjectSocialEconomic')->find($eia_project_social_economic->getId())->setResubmit('done')->save();
				$this->redirect('projectImpactMeasures/edit?id='.$resubmit['EIAProjectImpactMeasures']);
			}elseif($resubmit['EIAProjectOperationPhase'])
			{
			Doctrine_Core::getTable('EIAProjectSocialEconomic')->find($eia_project_social_economic->getId())->setResubmit('done')->save();
				$this->redirect('projectOperationPhase/edit?id='.$resubmit['EIAProjectOperationPhase']);
			}elseif($resubmit['EIAProjectAttachment'])
			{
			Doctrine_Core::getTable('EIAProjectSocialEconomic')->find($eia_project_social_economic->getId())->setResubmit('done')->save();
				$this->redirect('projectAttachment/edit?id='.$resubmit['EIAProjectAttachment']);
			}else{
			Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($eia_project_social_economic->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIApplicationStatus')->updateComment($eia_project_social_economic->getEiaprojectId(),'Resubmission assessment');
			Doctrine_Core::getTable('EITaskAssignment')->updateWorkStatus($eia_project_social_economic->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIAProjectSocialEconomic')->find($eia_project_social_economic->getId())->setResubmit('done')->save();
			$this->getUser()->resetResubmissionForm();
			$this->redirect('@homepage');
			}
		}else
		{
			$this->redirect('projectImpactMeasures/edit?id='.$queried_id.'&token='.$queried_token);
		}
	 }
	 else if($queried_id  == null ) //new, we redirect to new method
	 {
		$this->redirect('projectImpactMeasures/new?id='.$eia_project_social_economic->getId().'&token='.$eia_project_social_economic->getToken());
	 }
		////////
     
    }
  }
}
