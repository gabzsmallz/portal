<?php

/**
 * EIASiteVisitReport form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIASiteVisitReportForm extends BaseEIASiteVisitReportForm
{
  public function configure()
  {
	unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'] , $this['token'], $this['eiasitevisit_id']);
  }
}