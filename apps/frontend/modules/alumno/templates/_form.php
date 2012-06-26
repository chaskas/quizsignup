<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div style="margin:15px;">
<form action="<?php echo url_for('alumno/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <?php echo $form->renderGlobalErrors() ?>
  <div style="float: left;width:20%;">
        <?php echo $form['matricula']->renderLabel() ?>
        <?php echo $form['matricula']->renderError() ?>
        <br/>
        <?php echo $form['matricula']->render(array('style'=>'width:100%')); ?>
  </div>
  <div class="clear"></div>
  <div style="float: left;width:30%;">
        <?php echo $form['sfGuardUser']['first_name']->renderLabel() ?>
        <?php echo $form['sfGuardUser']['first_name']->renderError() ?>
        <br/>
        <?php echo $form['sfGuardUser']['first_name']->render(array('style'=>'width:100%')); ?>
  </div>
  <div style="float: left;margin-left:20px;width:30%;">
        <?php echo $form['sfGuardUser']['last_name']->renderLabel() ?>
        <?php echo $form['sfGuardUser']['last_name']->renderError() ?>
        <br/>
        <?php echo $form['sfGuardUser']['last_name']->render(array('style'=>'width:100%')); ?>
  </div>
  <div class="clear"></div>
  <div style="float: left;width:62%;">
        <?php echo $form['carrera']->renderLabel() ?>
        <?php echo $form['carrera']->renderError() ?>
        <br/>
        <?php echo $form['carrera']->render(array('style'=>'width:100%')); ?>
  </div>
  <div class="clear"></div>
  <div style="float: left;width:30%;">
        <?php echo $form['sfGuardUser']['email_address']->renderLabel() ?>
        <?php echo $form['sfGuardUser']['email_address']->renderError() ?>
        <br/>
        <?php echo $form['sfGuardUser']['email_address']->render(array('style'=>'width:100%')); ?>
  </div>
  <div class="clear"></div>
  <div style="float: left;width:30%;">
        <?php echo $form['sfGuardUser']['username']->renderLabel() ?>
        <?php echo $form['sfGuardUser']['username']->renderError() ?>
        <br/>
        <?php echo $form['sfGuardUser']['username']->render(array('style'=>'width:100%')); ?>
  </div>
  <div class="clear"></div>
  <div style="float: left;width:30%;">
        <?php echo $form['sfGuardUser']['password']->renderLabel() ?>
        <?php echo $form['sfGuardUser']['password']->renderError() ?>
        <br/>
        <?php echo $form['sfGuardUser']['password']->render(array('style'=>'width:100%')); ?>
  </div>
  <div style="float: left;margin-left:20px;width:30%;">
        <?php echo $form['sfGuardUser']['password_confirmation']->renderLabel() ?>
        <?php echo $form['sfGuardUser']['password_confirmation']->renderError() ?>
        <br/>
        <?php echo $form['sfGuardUser']['password_confirmation']->render(array('style'=>'width:100%')); ?>
  </div>

  <div class="clear"></div><br/>
  <?php echo $form->renderHiddenFields(false) ?>
  &nbsp;<a href="<?php echo url_for('alumno/home') ?>">Volver</a>
  <input type="submit" value="Registrar" style="float: right;"/>
  
</form>
</div>