<div class="grid_16 widget first">
        <div class="widget_title clearfix">
            <h2>Alumnos</h2>
            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
              <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="<?php echo url_for('alumno/new'); ?>">Nuevo</a></li>
            </ul>
        </div>
        <div class="widget_body">
            <div class="widget_content">
              <div id="table3">
                    <table class="simple">
                      <thead>
                        <tr>
                          <td class="center">Carerra</td>
                          <td class="center">Matricula</td>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($alumnos as $alumno) : ?>
                          <tr>
                            <td class="center">
                              <?php echo $alumno->getFecha_at(); ?>
                            </td>
                            <td class="center">
                              <?php echo $alumno->getHora_ini(); ?>
                            </td>
                            <td class="center">
                              <?php echo $alumno->getHora_fin(); ?>
                            </td>
                            <td class="center">
                              <?php echo $alumno->getCupo(); ?>
                            </td>
                            <td class="center">
                              <?php echo $alumno->getLesson_id(); ?>                            
                            </td>
                            <td class="center">
                              <?php echo link_to(image_tag('/images/fugue/edit.png'),'alumno/edit?id='.$alumno->getId()); ?>
                              <?php echo link_to(image_tag('/images/fugue/cross.png'),'alumno/delete?id='.$alumno->getId(),array('method'=>'delete','confirm'=>'Est&aacute;s seguro?')); ?>
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

