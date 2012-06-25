<div class="grid_16 widget first">
        <div class="widget_title clearfix">
            <h2>Lessons</h2>
            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
              <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="<?php echo url_for('lesson/new'); ?>">Nuevo</a></li>
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
                          <td class="center">Opciones</td>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($lessons as $lesson) : ?>
                          <tr>
                            <td class="center">
                              <?php echo $lesson->getNombre(); ?>
                            </td>
                            <td class="center">
                              <?php echo $lesson->getModulo_id(); ?>
                            </td>
                            <td class="center">
                              <?php echo link_to(image_tag('/images/fugue/edit.png'),'quiz/edit?id='.$quiz->getId()); ?>
                              <?php echo link_to(image_tag('/images/fugue/cross.png'),'quiz/delete?id='.$quiz->getId(),array('method'=>'delete','confirm'=>'Est&aacute;s seguro?')); ?>
                          </tr>
                          <?php endforeach; ?>
                      </tbody>
                    </table>
              </div>
              <div class="clear"></div>
            </div>
        </div>
</div>

