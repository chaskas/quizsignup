<div class="grid_16 widget first">
        <div class="widget_title clearfix">
            <h2>M&oacute;dulo de inscripciones</h2>
        </div>
        <div class="widget_body">
            <div class="widget_content">
              <p>Ingrese su N&uacute;mero de Matr&iacute;cula (sin gui&oacute;n ni dígito verificador) para autocompletar sus datos personales e inscribirse en un m&oacute;dulo del Programa UdeC English Online.</p>
              <br/>
              <form action="<?php echo url_for('alumno/preCreate'); ?>" method="post">
              
              <label>Matr&iacute;cula</label><?php echo $form['matricula']->renderError(); ?>
              <?php echo $form['matricula']->render(); ?>
              <?php echo $form->renderHiddenFields(); ?>
              <input type="submit" value="Siguiente" />
              </form>
              <div class="clear"></div>
            </div>
        </div>
</div>

