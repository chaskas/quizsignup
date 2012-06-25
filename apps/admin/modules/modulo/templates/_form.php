<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div style="margin:15px;">
<form action="<?php echo url_for('modulo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <?php echo $form->renderGlobalErrors() ?>
  <div style="float: left;width:48%;">
        <?php echo $form['nombre']->renderLabel() ?>
        <?php echo $form['nombre']->renderError() ?>
        <br/>
        <?php echo $form['nombre']->render(array('style'=>'width:100%')); ?>
  </div>

  <div class="clear"></div>
  <?php echo $form->renderHiddenFields(false) ?>
  &nbsp;<a href="<?php echo url_for('modulo/index') ?>">Volver</a>
  <?php if (!$form->getObject()->isNew()): ?>
    &nbsp;<?php echo link_to('Borrar', 'modulo/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Est&aacute;s seguro?')) ?>
  <?php endif; ?>
  <br/>
  <input type="submit" value="Guardar" style="float: right;"/>
  
</form>
</div>