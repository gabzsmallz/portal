<?php

/**
 * dashboard actions.
 *
 * @package    rdbeportal
 * @subpackage dashboard
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
	//we call method to select records from InvestmentApplications submitted who's status is submitted i.e. not assigned to a staff.
	 $status = 'submitted';
	$this->new_applications = Doctrine_Core::getTable('InvestmentApplication')->getUnassignedApplications($status); // pass status for the where clause
	///we need to call a function to return user available tasks
	//action to retrieve assigned tasks for currently logged in admin
	//let us retrieve the id of logged in user
   $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
   //echo $userId; exit;
   $this->mytasks = Doctrine_Core::getTable('TaskAssignment')->getUserTasks($userId);
   $this->mytasksnotcomplete = Doctrine_Core::getTable('TaskAssignment')->getUserTasksNotComplete($userId);
   ////////////EIA////////////
   $this->unassigned= Doctrine_Core::getTable('EIApplication')->getApplications('Submitted');
   $this->jobs= Doctrine_Core::getTable('EITaskAssignment')->getJobs('notstarted');
   //////////////////////////
   //we need to call a function that we get the status of task assigned to the user logged in.
   //if the user has started and generate a report, the user cannot make a new report again. wen he/she logins in 
   //next time, they will be redirected to the page of accepting application of the investor. we will hide the process button and replace it with
   //show report button
   //so lets create a function that retrieves the status of application after a user has clicked make report. 
   	
  } 
    //function download letter of application
  public function executeDownload1(sfwebRequest $request)
  {
   //echo "value is" .$request->getParameter('investmentapp_id'); exit;
    $blog_user = Doctrine_Core::getTable('InvestmentApplication')->find($request->getParameter('id'));
    $this->forward404Unless($blog_user);

    header('content-type:');
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($blog_user->getApplicationLetter()));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($blog_user->getApplicationLetter()));
    ob_clean();
    flush();

    readfile($blog_user->getApplicationLetter());

    return sfView::NONE;
  }
  //function for start work
  public function executeStart(sfWebRequest $request)
  {
    
	$this->value = $request->getParameter('id'); // here we get the parameter 
	
	/*Since we have the id of the business, we now retrieve all details for this application for investment certificate from
	the three tables. InvestmentApplication, BusinessPlan and TaskAssignment*/
	$this->details = Doctrine_Core::getTable('TaskAssignment')->getApplicationDetails($this->value);
	$this->forward404Unless($this->details);
	
  }
  
 
  public function executePayment(sfWebRequest $request)
  {
    /*
	We assume we have access to the Financial Payment system and we retrieve payment done by a particular individual using the business id
	and the receipt id. 
	*/
	$this->forward404Unless($request->isMethod('post')); // we will use a new way of validation here 
	$params = $request->getParameter('number');
	//print $params; exit;
	//we get the parameter and confirm if the number exists
	$this->confirmation = Doctrine_Core::getTable('Payment')->getConfirmPayment($params);
	$serial = null; 
	foreach($this->confirmation as $con)
	{
	 $serial = $con['slip_number'];
	}
	   //if the returned serial is not equal to passed form variable
		if($serial != $params )
		{
		 //not paid
		 $this->redirect('dashboard/notpaid?serial='.$params);
		}
		//else if equal
		if($serial == $params)
		{
		$this->business = $request->getParameter('business');
		//since payment was successful, let informed the user that payment was successful.
		//we only have business name, since it is unique, we can use it to get the Taskid by joining TaskAssignment with InvestmentApplication
		$this->result = Doctrine_Core::getTable('TaskAssignment')->updatingPaymentStatus($this->business);
		$taskId = null;
		foreach($this->result as $r)
		{
		 $taskId = $r['investmentapp_id'] ;
		}
		$this->update = Doctrine_Core::getTable('TaskAssignment')->updateUserTaskStatus3($taskId);
		}
	
  }
  //not paid method
  public function executeNotpaid(sfWebRequest $request)
  {
    
  }
  //Very Important Method. This method is called by the data admin after successful confirmation of payment of 
  //required fee for investment certificate registration.
  public function executeInvestcert(sfWebRequest $request)
  {
    // here we will need to do various tasks
	/*
	 1. Confirm that this business has not been issued with the certificate
	 2. Make Sure that this business actualy exists in our database if not 404 error
	 3. Generate a unique serial number for the certificate that Increments when a new Certificate is Created
	 
	*/
	 $param = $request->getParameter('business'); // now now now, let validate this business. we will reuse this function and retrieve the id
	 $this->result = Doctrine_Core::getTable('TaskAssignment')->updatingPaymentStatus($param);
	 
		$taskId = null;
		foreach($this->result as $r)
		{
		 $taskId = $r['investmentapp_id'] ;
		}
		
		//we will make sure that this business is legit and have paid
	$this->status = Doctrine_Core::getTable('TaskAssignment')->getStatus($taskId);
	 $st = null;
	 
	  foreach($this->status as $v)
	  {
	    $st = $v['work_status'] ;
	  }
	  $x = "paymentconfirmed";
	  $y = "complete" ;
	 ////
	 switch($st)
	 {
	   case $x :
	    $this->scorpionPayment($taskId);
		break;
	   case  $y:
		$this->scorpionComplete($taskId);
		break;
	   default:
         $this->forward404();	   
         	   
	 }
	 exit;
	 
	  
  }
  ///this function will be called inside the switch statement
  public function scorpionPayment($taskId)
  {
      ///if payment is successful, continue
	  //confirm that this business has not been issued with a Certificate
	  //
	 
	  /*Certificate Values
	  */
	  //Incremental Number
	  $start = 1093 ;
	  $newNumber = $start + 1;
	  //We also make sure that the business is not already issued with a certificate if so we just print the existing certificate instead of
	  //saving a new record
	  $q = Doctrine_Core::getTable('InvestmentCertificate')->searchBusiness($taskId);
	  if(count($q) > 0)
	  {
	  //since this business has been issued with certificate, we just print it.
	  //do nothing
	  }
	  if(count($q) <= 0)
	  {
						//this is the first time therefore we save and print the certificate
						//but we want to increment it whenever a new record is inserted. hence we fast make sure that the $start number variable
					  //is not set in the database;
					  $no = null;
					  $query = Doctrine_Core::getTable('InvestmentCertificate')->getLastRow();
					   foreach($query as $q)
					   {
						$no = $q['serial_number'];
					   }
					  if($no != null)
					  {
					   
					   //we first check and make sure that there exist a number, then we increment it by 1
					   //and save it.
						  $cert = new InvestmentCertificate();
						  $cert->business_id = $taskId ;
						  $cert->serial_number = $no + 1 ;
						  $cert->save();
						  //we then update the Status of application i.e. BusinessApplicationStatus
						  //now this is the final step of application for investment certificate. 
						  //we set values
						  $value1 = "certificateissued"; //status
						  $value2 = "You have been issued with Investment Registration Certificate.
       						 Please check your email and download the attached certificate. Thankyou. "; //comment
						  $value3 = 100; //percentage
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateBusinessApplicationStatus($taskId,$value1,$value2,$value3);
						  //we also update the status of work for this data admin.
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateUserTaskStatus4($taskId);
					  }
					  if($no == null)
					  {
					   $no = $start ;
					   //if this is the first record, then we set default value
					   //and save
						  $cert = new InvestmentCertificate();
						  $cert->business_id = $taskId ;
						  $cert->serial_number = $no + 1 ;
						  $cert->save();
						  //we then update the Status of application i.e. BusinessApplicationStatus
						  //now this is the final step of application for investment certificate. 
						  $value1 = "certificateissued"; //status
						  $value2 = "You have been issued with Investment Registration Certificate.
       						 Please check your email and download the attached certificate. Thankyou. "; //comment
						  $value3 = 100; //percentage
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateBusinessApplicationStatus($taskId,$value1,$value2,$value3);
						  //we also update the status of work for this data admin.
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateUserTaskStatus4($taskId);
					  }
	 
		
	  }
	  
	  
	  ////Then we get the Applicant details for printing the certificate. we will use the business_id saved in the InvestmentCertificate Table
	  $query = Doctrine_Core::getTable('InvestmentCertificate')->getApplicantDetails($taskId);
	  //loop over the result and set necessary variables
	  $date = null ;
	  $year = null ;
	  $company = null ;
	  $serial = null;
	  $rep = null;
	  $issuerF = null;
	  $issuerL = null;
	  $sector = null;
	  $nofojobs = null;
	  $expjobs = 0;
	  $invstment = 0;
	  foreach($query as $q)
	  {
	    $date = $q['created_at'] ;
		$year = $q['created_at'] ;
		$company = $q['name'] ;
		$serial = $q['serial_number'] ;
		$rep = $q['company_representative'] ;
		$issuerF = $q['first_name'] ;
		$issuerL = $q['last_name'] ;
		$sector = $q['business_sector'] ;
		$noofjobs = $q['job_created'] ;
		$invstment = $q['planned_investment'];
		
	  }
	   $d = new DateTime($date);
	   $day = $d->format('d-m-Y');
	   ///
	   $y = new DateTime($year);
	   $year =  $y->format('Y');
	  
	 // $serial = "C/$number/$year";
	  
	  ////////////////////////////////////////////////////////////////////////////
	
	  ////////////////////////////////////////////////////////////////////////////
	  //execute action for printing pdf document of this report
	  /* I have used another class specifically for investment Certificates only */
	      $config = sfTCPDFPluginConfigHandlerInvstCert::loadConfig('invst_configs');
          sfTCPDFPluginConfigHandlerInvstCert::includeLangFile($this->getUser()->getCulture());
	///////////////////////////Certificate Configuration //////////////////////////////////////////////////////////////////////	  
//create new PDF document (document units are set by default to millimeters)
          $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);
         // set document information
/*$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 062');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide'); */

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 062', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(false);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
//$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('courier', 'I', 18);

// add a page
$pdf->AddPage();

// start a new XObject Template
$template_id = $pdf->startTemplate(95, 165);

// create Template content
// ...................................................................

$border = array('LRTB' => array('width' => 0.1, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
 $img_file = K_PATH_IMAGES.'bg.jpg';
 
$pdf->Image($img_file, 0, 0, 50, 50, 'JPG', '', '', false, 1000, '', false, false, $border, false, false, false);
 //$img_file2 = 'C:\xampp\htdocs\portal\plugins\sfTCPDFPlugin\lib\tcpdf\images\logo.jpg';
 //$logo =  sfConfig::get('sf_plugins_dir').DIRECTORY_SEPARATOR.'sfTCPDFPlugin'.DIRECTORY_SEPARATOR.'lib\tcpdf\images\logo.jpg';
//echo  $logo; exit;
//Image Calling inside the html has a problem hence we hand code it but we will change it later - Boniface Irunguh
// ...................................................................

// end the current Template
$pdf->endTemplate();

// print the selected Template various times
$pdf->printTemplate($template_id, 0, 0, 550, 710, '', '', false);

// ---------------------------------------------------------
 // Set some content to print
$html = '                               <div style="text-align:center"> 
                                         <img src="C:\xampp\htdocs\portal\plugins\sfTCPDFPlugin\lib\tcpdf\images\logo.jpg" alt="RDB" width="600" height="200" border="0" />
										 <h1 style="font-size: medium; color: #3C7E98">Investment Registration Certificate</h1>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No: <b>C/'.$serial.'/'.$year.'</b>
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   Date: <b>'.$day.'</b>
										 </p>
										 <p style= "font-size: xx-small;text-align:left ">
										&nbsp;&nbsp;&nbsp;Issued To <b>'.$company.'</b> Represented by <b>'.$rep.'</b>
										 </p>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Business Sector <b>'.$sector.' </b>
										 </p>
										  
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Planned investment amount <b>'.$invstment.'</b>
										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Total Number of jobs planned <b>'.$noofjobs.'</b>
										  </p>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Local jobs  <b>'.$noofjobs.'</b> Jobs For expatriates <b>'.$expjobs.'</b>
										 </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;This Certificate has been issued to <b>'.$company.'</b> under the seal of <br/>
										  &nbsp;&nbsp;&nbsp;RDB in accordance with law no 26/2005 EAC customs management act atests that <br/> &nbsp;&nbsp;&nbsp;the company is duly 
										  registered and entitled to the rights and obligations <br/> &nbsp;&nbsp;&nbsp;contained in the law.
										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;&nbsp;THE CHIEF EXECUTIVE OFFICER, 
										  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMPANY REPRESENTATIVE,
										  <br/>
										   &nbsp;&nbsp;&nbsp;&nbsp;RDB,
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   '.$rep.'
										   <br/>
										   &nbsp;&nbsp;&nbsp;&nbsp;'.$issuerF.' '.$issuerL.'
										    <br/>
										   
										 </p>
										 </div> 
										
                                      
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
         
//Close and output PDF document
$pdf->Output('certificate.pdf', 'I');

	
	///////////////////////////////End Certificate Configuration ///////////////////////////////////////////
          // Stop symfony process */
          throw new sfStopException();
  }
  ///
  public function scorpionComplete($taskId)
  {
     //We also make sure that the business is not already issued with a certificate if so we just print the existing certificate instead of
	  //saving a new record
 
	  ////Then we get the Applicant details for printing the certificate. we will use the business_id saved in the InvestmentCertificate Table
	  $query = Doctrine_Core::getTable('InvestmentCertificate')->getApplicantDetails($taskId);
	  //loop over the result and set necessary variables
	  $date = null ;
	  $year = null ;
	  $company = null ;
	  $serial = null;
	  $rep = null;
	  $issuerF = null;
	  $issuerL = null;
	  $sector = null;
	  $nofojobs = null;
	  $expjobs = 0;
	  $invstment = 0;
	  foreach($query as $q)
	  {
	    $date = $q['created_at'] ;
		$year = $q['created_at'] ;
		$company = $q['name'] ;
		$serial = $q['serial_number'] ;
		$rep = $q['company_representative'] ;
		$issuerF = $q['first_name'] ;
		$issuerL = $q['last_name'] ;
		$sector = $q['business_sector'] ;
		$noofjobs = $q['job_created'] ;
		$invstment = $q['planned_investment'];
		
	  }
	   $d = new DateTime($date);
	   $day = $d->format('d-m-Y');
	   ///
	   $y = new DateTime($year);
	   $year =  $y->format('Y');
	  
	 // $serial = "C/$number/$year";
	  
	  ////////////////////////////////////////////////////////////////////////////
	
	  ////////////////////////////////////////////////////////////////////////////
	  //execute action for printing pdf document of this report
	  /* I have used another class specifically for investment Certificates only */
	      $config = sfTCPDFPluginConfigHandlerInvstCert::loadConfig('invst_configs');
          sfTCPDFPluginConfigHandlerInvstCert::includeLangFile($this->getUser()->getCulture());
	///////////////////////////Certificate Configuration //////////////////////////////////////////////////////////////////////	  
//create new PDF document (document units are set by default to millimeters)
          $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);
         // set document information
/*$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 062');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide'); */

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 062', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(false);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
//$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('courier', 'I', 18);

// add a page
$pdf->AddPage();

// start a new XObject Template
$template_id = $pdf->startTemplate(95, 165);

// create Template content
// ...................................................................

$border = array('LRTB' => array('width' => 0.1, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
 $img_file = K_PATH_IMAGES.'bg.jpg';
 
$pdf->Image($img_file, 0, 0, 50, 50, 'JPG', '', '', false, 1000, '', false, false, $border, false, false, false);
 //$img_file2 = 'C:\xampp\htdocs\portal\plugins\sfTCPDFPlugin\lib\tcpdf\images\logo.jpg';
 //$logo =  sfConfig::get('sf_plugins_dir').DIRECTORY_SEPARATOR.'sfTCPDFPlugin'.DIRECTORY_SEPARATOR.'lib\tcpdf\images\logo.jpg';
//echo  $logo; exit;
//Image Calling inside the html has a problem hence we hand code it but we will change it later - Boniface Irunguh
// ...................................................................

// end the current Template
$pdf->endTemplate();

// print the selected Template various times
$pdf->printTemplate($template_id, 0, 0, 550, 710, '', '', false);

// ---------------------------------------------------------
 // Set some content to print
$html = '                               <div style="text-align:center"> 
                                         <img src="C:\xampp\htdocs\portal\plugins\sfTCPDFPlugin\lib\tcpdf\images\logo.jpg" alt="RDB" width="600" height="200" border="0" />
										 <h1 style="font-size: medium; color: #3C7E98">Investment Registration Certificate</h1>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No: <b>C/'.$serial.'/'.$year.'</b>
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   Date: <b>'.$day.'</b>
										 </p>
										 <p style= "font-size: xx-small;text-align:left ">
										&nbsp;&nbsp;&nbsp;Issued To <b>'.$company.'</b> Represented by <b>'.$rep.'</b>
										 </p>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Business Sector <b>'.$sector.' </b>
										 </p>
										  
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Planned investment amount <b>'.$invstment.'</b>
										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Total Number of jobs planned <b>'.$noofjobs.'</b>
										  </p>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Local jobs  <b>'.$noofjobs.'</b> Jobs For expatriates <b>'.$expjobs.'</b>
										 </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;This Certificate has been issued to <b>'.$company.'</b> under the seal of <br/>
										  &nbsp;&nbsp;&nbsp;RDB in accordance with law no 26/2005 EAC customs management act atests that <br/> &nbsp;&nbsp;&nbsp;the company is duly 
										  registered and entitled to the rights and obligations <br/> &nbsp;&nbsp;&nbsp;contained in the law.
										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;&nbsp;THE CHIEF EXECUTIVE OFFICER, 
										  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMPANY REPRESENTATIVE,
										  <br/>
										   &nbsp;&nbsp;&nbsp;&nbsp;RDB,
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   '.$rep.'
										   <br/>
										   &nbsp;&nbsp;&nbsp;&nbsp;'.$issuerF.' '.$issuerL.'
										    <br/>
										   
										 </p>
										 </div> 
										
                                      
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
         
//Close and output PDF document
$pdf->Output('certificate.pdf', 'I');

	
	///////////////////////////////End Certificate Configuration ///////////////////////////////////////////
          // Stop symfony process */
          throw new sfStopException();
  }
}
