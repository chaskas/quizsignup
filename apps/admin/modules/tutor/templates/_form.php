<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div style="margin:15px;">
<form action="<?php echo url_for('tutor/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
    <div style="float: left;margin-left: 20px;width:48%;">
        <?php echo $form['apellido']->renderLabel() ?>
        <?php echo $form['apellido']->renderError() ?>
        <br/>
        <?php echo $form['apellido']->render(array('style'=>'width:100%')); ?>
  </div>
  <div style="float: left;width:48%;">
        <?php echo $form['email']->renderLabel() ?>
        <?php echo $form['email']->renderError() ?>
        <br/>
        <?php echo $form['email']->render(array('style'=>'width:100%')); ?>
  </div>
  <div class="clear"></div>
  <?php echo $form->renderHiddenFields(false) ?>
  &nbsp;<a href="<?php echo url_for('tutor/index') ?>">Volver</a>
  <?php if (!$form->getObject()->isNew()): ?>
    &nbsp;<?php echo link_to('Borrar', 'tutor/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Est&aacute;s seguro?')) ?>
  <?php endif; ?>
  <br/>
  <input type="submit" value="Guardar" style="float: right;"/>
</form>
</div>