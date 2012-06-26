<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
<!--    <link rel="shortcut icon" href="/favicon.ico" />-->
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>

    <div id="wrap">
      <div id="main">
        <header>
          <div class="container_16 clearfix">
            <nav>
              <div id="navcontainer" class="clearfix">
                <div id="user" class="clearfix">
                  <?php echo image_tag('logo.jpg'); ?>
                  <strong class="username">QuizSignUp</strong>
                  <ul class="piped">
                    <li><a href="http://www.udec.cl" target="_blank">UdeC</a></li>
                  </ul>
                </div>

                <div id="navclose"></div>

                <ul class="sf-menu">
		            <?php if (!$sf_user->isAuthenticated()): ?>
                  <li <?php if($sf_context->getModuleName()=='alumno' && $sf_context->getActionName()=='new') echo "class='active'"; ?>>
                    <a href="<?php echo url_for("alumno/new"); ?>">
                      <span class="icon"><?php echo image_tag('menu/register.png','size=18x18'); ?></span>
                      <span class="title">Registrar</span>
                    </a>
                  </li>
                  <li <?php if($sf_context->getModuleName()=='sfGuardAuth') echo "class='active'"; ?>>
                    <a href="<?php echo url_for("@sf_guard_signin"); ?>">
                      <span class="icon"><?php echo image_tag('menu/login.png','size=18x18'); ?></span>
                      <span class="title">Login</span>
                    </a>
                  </li>
		            <?php endif; ?>
		            <?php if ($sf_user->isAuthenticated()): ?>
                  <li <?php if($sf_context->getModuleName()=='quiz' && $sf_context->getActionName()=='alumno') echo "class='active'"; ?>>
                    <a href="#">
                      <span class="icon"><?php echo image_tag('menu/quiz.png','size=18x18'); ?></span>
                      <span class="title">Quiz</span>
                    </a>
                  </li>
                  <li <?php if($sf_context->getModuleName()=='alumno' && $sf_context->getActionName()=='alumno') echo "class='active'"; ?>>
                    <a href="<?php echo url_for("alumno/profile"); ?>">
                      <span class="icon"><?php echo image_tag('menu/misdatos.png','size=18x18'); ?></span>
                      <span class="title">Mis Datos</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo url_for("@sf_guard_signout"); ?>">
                      <span class="icon"><?php echo image_tag('menu/logout.png','size=18x18'); ?></span>
                      <span class="title">Logout</span>
                    </a>
                  </li>
		            <?php endif; ?>
                </ul>
              </div>
            </nav>
          </div>
        </header>
        <div class="container_16 clearfix" id="actualbody">

<!--          <ul class="breadcrumbs first">
            <li><a href="#">Home</a></li>
            <li class="active"><a href="#">Autores</a></li>
	    </ul>-->

	<?php if ($sf_user->hasFlash('confirmation')): ?>
	  <div class="msg success">
	    <span><?php echo $sf_user->getFlash('confirmation') ?></span>
	    <a href="#" class="close">x</a>
	  </div>
	  <?php endif ?>
          <div class="clear"></div>

          <?php echo $sf_content ?>

          <div class="clear"></div>

        </div> 
      </div> 
    </div>
    <footer>
      <div class="container_12">
        <div class="grid_12 clearfix">
<!--          <p class="left">
            Powered by Rodrigo Campos / Juan Escalona / Rodrigo Lerzundi
          </p>-->
          <p class="right">
            &copy; <a href="mailto:rodrigocampos@udec.cl">QuizSignUp</a> 2012
          </p>
        </div>
      </div>
    </footer>
  </body>
</html>
