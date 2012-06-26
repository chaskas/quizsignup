<?php use_stylesheets_for_form($formProfile) ?>
<?php use_javascripts_for_form($formProfile) ?>
<div style="margin:15px;">
<form action="<?php echo url_for('alumno/update?id='.$formProfile->getObject()->getId()) ?>" method="post" <?php $formProfile->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$formProfile->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <?php echo $formProfile->renderGlobalErrors() ?>
  <div style="float: left;width:20%;">
        <?php echo $formProfile['matricula']->renderLabel() ?>
        <?php echo $formProfile['matricula']->renderError() ?>
        <br/>
        <?php echo $formProfile['matricula']->render(array('style'=>'width:100%')); ?>
  </div>
  <div class="clear"></div>
  <div style="float: left;width:30%;">
        <?php echo $formProfile['sfGuardUser']['first_name']->renderLabel() ?>
        <?php echo $formProfile['sfGuardUser']['first_name']->renderError() ?>
        <br/>
        <?php echo $formProfile['sfGuardUser']['first_name']->render(array('style'=>'width:100%')); ?>
  </div>
  <div style="float: left;margin-left:20px;width:30%;">
        <?php echo $formProfile['sfGuardUser']['last_name']->renderLabel() ?>
        <?php echo $formProfile['sfGuardUser']['last_name']->renderError() ?>
        <br/>
        <?php echo $formProfile['sfGuardUser']['last_name']->render(array('style'=>'width:100%')); ?>
  </div>
  <div class="clear"></div>
  <div style="float: left;width:64%;">
        <?php echo $formProfile['carrera_id']->renderLabel() ?>
        <?php echo $formProfile['carrera_id']->renderError() ?>
        <br/>
        <?php echo $formProfile['carrera_id']->render(array('style'=>'width:100%')); ?>
  </div>
  <div class="clear"></div>
  <div style="float: left;width:30%;">
        <?php echo $formProfile['sfGuardUser']['email_address']->renderLabel() ?>
        <?php echo $formProfile['sfGuardUser']['email_address']->renderError() ?>
        <br/>
        <?php echo $formProfile['sfGuardUser']['email_address']->render(array('style'=>'width:100%')); ?>
  </div>


  <div class="clear"></div><br/>
  <?php echo $formProfile->renderHiddenFields(false) ?>
  &nbsp;<a href="<?php echo url_for('alumno/home') ?>">Volver</a>
  <input type="submit" value="Guardar" style="float: right;"/>
  
</form>
</div>