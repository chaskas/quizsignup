<div class="grid_16 widget first">
        <div class="widget_title clearfix">
            <h2>Grupos</h2>
            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
              <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="<?php echo url_for('grupo/new'); ?>">Nuevo</a></li>
            </ul>
        </div>
        <div class="widget_body">
            <div class="widget_content">
              <div id="table3">
                    <table class="simple">
                      <thead>
                        <tr>
                          <td class="center">Nombre</td>
                          <td class="center">Modulo</td>
                          <td class="center">Tutor</td>
                          <td class="center">Opciones</td>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($grupos as $grupo) : ?>
                          <tr>
                            <td class="center">
                              <?php echo $grupo->getNombre(); ?>
                            </td>
                            <td class="center">
                              <?php echo $grupo->getModulo(); ?>
                            </td>
                            <td class="center">
                              <?php echo $grupo->getTutor(); ?>
                            </td>
                            <td class="center">
                              <?php echo link_to(image_tag('/images/fugue/edit.png'),'grupo/edit?id='.$grupo->getId()); ?>
                              <?php echo link_to(image_tag('/images/fugue/cross.png'),'grupo/delete?id='.$grupo->getId(),array('method'=>'delete','confirm'=>'Est&aacute;s seguro?')); ?>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                      </tbody>
                    </table>
              </div>
              <div class="clear"></div>
            </div>
        </div>
</div>

