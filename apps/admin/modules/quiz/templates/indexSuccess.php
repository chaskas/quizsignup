<div class="grid_16 widget first">
        <div class="widget_title clearfix">
            <h2>Laboratorios</h2>
            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
              <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="<?php echo url_for('lab/new'); ?>">Nuevo</a></li>
            </ul>
        </div>
        <div class="widget_body">
            <div class="widget_content">
              <div id="table3">
                    <table class="simple">
                      <thead>
                        <tr>
                          <td class="center">Fecha</td>
                          <td class="center">Hora Inicio</td>
                          <td class="center">Hora Fin</td>
                          <td class="center">Cupo</td>
                          <!--
                          <td class="center">Lesson</td>
                        -->
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($laboratorios as $laboratorio) : ?>
                          <tr>
                            <td class="center">
                              <?php echo $laboratorio->getNombre(); ?>
                            </td>
                            <td class="center">
                              <?php echo $laboratorio->getCapacidad(); ?>
                            </td>
                            <td class="center">
                              <?php echo link_to(image_tag('/images/fugue/edit.png'),'lab/edit?id='.$laboratorio->getId()); ?>
                              <?php echo link_to(image_tag('/images/fugue/cross.png'),'lab/delete?id='.$laboratorio->getId(),array('method'=>'delete','confirm'=>'Est&aacute;s seguro?')); ?>
                          </tr>
                          <?php endforeach; ?>
                      </tbody>
                    </table>
              </div>
              <div class="clear"></div>
            </div>
        </div>
</div>
