<?php
// auto-generated by sfViewConfigHandler
// date: 2013/03/18 10:44:37
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('assets/bootstrap/css/bootstrap.min.css', '', array ());
  $response->addStylesheet('assets/bootstrap/css/bootstrap-responsive.min.css', '', array ());
  $response->addStylesheet('assets/bootstrap/css/bootstrap-fileupload.css', '', array ());
  $response->addStylesheet('assets/font-awesome/css/font-awesome.css', '', array ());
  $response->addStylesheet('assets/css/style.css', '', array ());
  $response->addStylesheet('assets/css/style_responsive.css', '', array ());
  $response->addStylesheet('assets/css/website.css', '', array ());
  $response->addStylesheet('assets/css/style_navygrey.css', '', array ());
  $response->addStylesheet('assets/fancybox/source/jquery.fancybox.css', '', array ());
  $response->addStylesheet('assets/gritter/css/jquery.gritter.css', '', array ());
  $response->addStylesheet('assets/uniform/css/uniform.default.css', '', array ());
  $response->addStylesheet('assets/bootstrap-daterangepicker/daterangepicker.css', '', array ());
  $response->addStylesheet('assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css', '', array ());
  $response->addStylesheet('assets/jqvmap/jqvmap/jqvmap.css', '', array ());
  $response->addStylesheet('assets/chosen-bootstrap/chosen/chosen.css', '', array ());
  $response->addStylesheet('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css', '', array ());
  $response->addStylesheet('assets/bootstrap-datepicker/css/datepicker.css', '', array ());
  $response->addStylesheet('assets/bootstrap-timepicker/compiled/timepicker.css', '', array ());
  $response->addStylesheet('assets/bootstrap-colorpicker/css/colorpicker.css', '', array ());
  $response->addStylesheet('assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css', '', array ());
  $response->addStylesheet('assets/data-tables/DT_bootstrap.css', '', array ());
  $response->addStylesheet('assets/css/jquery.handsontable.full.css', '', array ());
  $response->addJavascript('assets/js/jquery-1.8.2.min.js', '', array ());
  $response->addJavascript('assets/js/jquery.tinyscrollbar.min.js', '', array ());
  $response->addJavascript('assets/bootstrap/js/bootstrap.min.js', '', array ());
  $response->addJavascript('assets/bootstrap/js/bootstrap-fileupload.js', '', array ());
  $response->addJavascript('assets/js/jquery.blockui.js', '', array ());
  $response->addJavascript('assets/uniform/jquery.uniform.min.js', '', array ());
  $response->addJavascript('assets/fancybox/source/jquery.fancybox.pack.js', '', array ());
  $response->addJavascript('assets/js/app.js', '', array ());
  $response->addJavascript('http://code.highcharts.com/highcharts.js', '', array ());
  $response->addJavascript('http://code.highcharts.com/modules/exporting.js', '', array ());
  $response->addJavascript('assets/chosen-bootstrap/chosen/chosen.jquery.min.js', '', array ());
  $response->addJavascript('assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js', '', array ());
  $response->addJavascript('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js', '', array ());
  $response->addJavascript('assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js', '', array ());
  $response->addJavascript('assets/bootstrap-datepicker/js/bootstrap-datepicker.js', '', array ());
  $response->addJavascript('assets/bootstrap-daterangepicker/date.js', '', array ());
  $response->addJavascript('assets/bootstrap-daterangepicker/daterangepicker.js', '', array ());
  $response->addJavascript('assets/bootstrap-timepicker/js/bootstrap-timepicker.js', '', array ());
  $response->addJavascript('assets/js/jquery.handsontable.full.js', '', array ());


