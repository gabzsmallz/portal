<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('EiaTorSubmit/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('EiaTorSubmit/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'EiaTorSubmit/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['eiaproject_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['eiaproject_id']->renderError() ?>
          <?php echo $form['eiaproject_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['attachement']->renderLabel() ?></th>
        <td>
          <?php echo $form['attachement']->renderError() ?>
          <?php echo $form['attachement'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['remarks']->renderLabel() ?></th>
        <td>
          <?php echo $form['remarks']->renderError() ?>
          <?php echo $form['remarks'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['token']->renderLabel() ?></th>
        <td>
          <?php echo $form['token']->renderError() ?>
          <?php echo $form['token'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_by']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_by']->renderError() ?>
          <?php echo $form['created_by'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_by']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_by']->renderError() ?>
          <?php echo $form['updated_by'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
