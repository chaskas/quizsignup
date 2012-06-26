<?php if (!$sf_user->isAuthenticated()): ?>
<p style="text-align: center;margin-top: 50px;margin-bottom: 50px;">
Bienvenido,
<br/>
Si deseas inscribirte en el Programa English Online haz click <a href="<?php echo url_for("alumno/new"); ?>">aqu&iacute;</a>
<br/><br/>
o si ya te registraste por favor <a href="<?php echo url_for("@sf_guard_signin"); ?>">inicia sesi&oacute;n</a>
</p>
<?php endif; ?>
<?php if ($sf_user->isAuthenticated()): ?>
  <p style="text-align: center;margin-top: 50px;margin-bottom: 50px;">
  Bienvenido <?php  echo $sf_user->getGuardUser()->getName(); ?>
  <br/>
  Selecciona una opci&oacute;n del men&uacute; de arriba.
  </p>
<?php endif; ?>