<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div style="margin:15px;">
<form action="<?php echo url_for('alumno/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <?php echo $form->renderGlobalErrors() ?>
  <div style="float: left;width:48%;">
        <?php echo $form['carrera_id']->renderLabel() ?>
        <?php echo $form['carrera_id']->renderError() ?>
        <br/>
        <?php echo $form['carrera_id']->render(array('style'=>'width:100%')); ?>
  </div>
  <div class="clear"></div>
  <div style="float: left;width:48%;">
        <?php echo $form['matricula']->renderLabel() ?>
        <?php echo $form['matricula']->renderError() ?>
        <br/>
        <?php echo $form['matricula']->render(array('style'=>'width:100%')); ?>
  </div>
  <div class="clear"></div> 
  <?php echo $form->renderHiddenFields(false) ?>
  &nbsp;<a href="<?php echo url_for('alumno/index') ?>">Volver</a>
  <?php if (!$form->getObject()->isNew()): ?>
    &nbsp;<?php echo link_to('Borrar', 'alumno/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Est&aacute;s seguro?')) ?>
  <?php endif; ?>
  <br/>
  <input type="submit" value="Guardar" style="float: right;"/>
</form>
</div>