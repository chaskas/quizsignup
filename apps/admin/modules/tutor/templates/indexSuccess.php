<div class="grid_16 widget first">
        <div class="widget_title clearfix">
            <h2>Tutores</h2>
            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
              <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="<?php echo url_for('tutor/new'); ?>">Nuevo</a></li>
            </ul>
        </div>
        <div class="widget_body">
            <div class="widget_content">
              <div id="table3">
                    <table class="simple">
                      <thead>
                        <tr>
                          <td class="center">Nombre</td>
                          <td class="center">Apellido</td>
                          <td class="center">Email</td>
                          <td class="center">Opciones</td>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($tutors as $tutor) : ?>
                          <tr>
                            <td class="center">
                              <?php echo $tutor->getNombre(); ?>
                            </td>
                            <td class="center">
                              <?php echo $tutor->getApellido(); ?>
                            </td>
                            <td class="center">
                              <?php echo $tutor->getEmail(); ?>
                            </td>
                            <td class="center">
                              <?php echo link_to(image_tag('/images/fugue/edit.png'),'tutor/edit?id='.$tutor->getId()); ?>
                              <?php echo link_to(image_tag('/images/fugue/cross.png'),'tutor/delete?id='.$tutor->getId(),array('method'=>'delete','confirm'=>'Est&aacute;s seguro?')); ?>
                          </tr>
                          <?php endforeach; ?>
                      </tbody>
                    </table>
              </div> 
              <div class="clear"></div>
            </div>
        </div>
</div>

