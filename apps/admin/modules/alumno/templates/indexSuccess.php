<h1>Alumnos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>User</th>
      <th>Carrera</th>
      <th>Matricula</th>
      <th>Grupo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alumnos as $alumno): ?>
    <tr>
      <td><a href="<?php echo url_for('alumno/edit?id='.$alumno->getId()) ?>"><?php echo $alumno->getId() ?></a></td>
      <td><?php echo $alumno->getUserId() ?></td>
      <td><?php echo $alumno->getCarrera() ?></td>
      <td><?php echo $alumno->getMatricula() ?></td>
      <td><?php echo $alumno->getGrupoId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('alumno/new') ?>">New</a>
