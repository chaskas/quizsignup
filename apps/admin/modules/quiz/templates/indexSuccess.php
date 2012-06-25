<div class="grid_16 widget first">
        <div class="widget_title clearfix">
            <h2>Quizzes</h2>
            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
              <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="<?php echo url_for('quiz/new'); ?>">Nuevo</a></li>
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
                          <td class="center">Lesson</td>
                          <td class="center">Opciones</td>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($quizs as $quiz) : ?>
                          <tr>
                            <td class="center">
                              <?php echo $quiz->getFecha_at(); ?>
                            </td>
                            <td class="center">
                              <?php echo $quiz->getHora_ini(); ?>
                            </td>
                            <td class="center">
                              <?php echo $quiz->getHora_fin(); ?>
                            </td>
                            <td class="center">
                              <?php echo $quiz->getCupo(); ?>
                            <td class="center">
                              <?php echo $quiz->getLesson_id(); ?>
                            </td>
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

