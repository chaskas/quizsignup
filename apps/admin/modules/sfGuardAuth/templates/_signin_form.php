<div class="grid_16 widget first">
  <div class="widget_title clearfix">
    <h2>Sistema de Autentificaci&oacute;n</h2>
  </div>
  <div class="widget_body">
    <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" accept-charset="utf-8">
      <div style="width:100%;text-align:center;margin-top:15px;">
      <p>
        <label>Usuario: </label>
        <?php echo $form['username']->render(); ?>
        &nbsp;
        <label>Password: </label>
        <?php echo $form['password']->render(); ?>
        &nbsp;
        <input type="submit" value="<?php echo __('Entrar', null, 'sf_guard') ?>" style="position:relative;top:-3px;"/>
      </p>
      </div>
      <?php echo $form->renderHiddenFields(); ?>
    </form>
  </div>
</div>