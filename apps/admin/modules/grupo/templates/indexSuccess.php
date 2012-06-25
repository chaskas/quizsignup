<h1>Grupos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Modulo</th>
      <th>Tutor</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($grupos as $grupo): ?>
    <tr>
      <td><a href="<?php echo url_for('grupo/edit?id='.$grupo->getId()) ?>"><?php echo $grupo->getId() ?></a></td>
      <td><?php echo $grupo->getNombre() ?></td>
      <td><?php echo $grupo->getModuloId() ?></td>
      <td><?php echo $grupo->getTutorId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('grupo/new') ?>">New</a>
