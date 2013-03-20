<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('messages/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
  <div class="control-group">
					<div class="controls">
						<div class="input-prepend">
						<span> <label class="control-label"><?php echo $form['recepient']->renderLabel() ?>
							 <?php echo $form['recepient']->renderError() ?> 
							 </label></span>
							<?php echo $form['recepient']->render() ?>
						</div>
					</div>
 </div> 
     <div class="control-group">
					<div class="controls">
						<div class="input-prepend">
							 <span> <label class="control-label"><?php echo $form['message']->renderLabel() ?>
							 <?php echo $form['message']->renderError() ?> 
							 </label></span>
							 
							<?php echo $form['message']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
						</div>
					</div>
		</div>
    <tfoot>
      <tr>
        <td colspan="2">
        
          <input type="submit" class="btn btn-success"  value="Send" />
        </td>
      </tr>
    </tfoot>
    
  </table>
</form>
