<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_javascript('jquery.ui.datepicker-es.js'); ?>

<div style="margin:15px;">
<form action="<?php echo url_for('lesson/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <?php echo $form->renderGlobalErrors() ?>
  <div style="float: left;width:85%">
        <?php echo $form['nombre']->renderLabel() ?>
        <?php echo $form['nombre']->renderError() ?>
        <br/>
        <?php echo $form['nombre']->render(); ?>
  </div>
  <div class="clear"></div>
  <div style="float: left;width:48%;">
        <?php echo $form['modulo_id']->renderLabel() ?>
        <?php echo $form['modulo_id']->renderError() ?>
        <br/>
        <?php echo $form['modulo_id']->render(); ?>
  </div>
  <div class="clear"></div>
  <br/>
  <?php echo $form->renderHiddenFields(false) ?>
  &nbsp;<a href="<?php echo url_for('lesson/index') ?>">Volver</a>
  <?php if (!$form->getObject()->isNew()): ?>
    &nbsp;<?php echo link_to('Borrar', 'lesson/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Est&aacute;s seguro?')) ?>
  <?php endif; ?>
  <br/>
  <input type="submit" value="Guardar" style="float: right;"/>
</form>
</div>