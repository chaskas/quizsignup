<h1>Tutors List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tutors as $tutor): ?>
    <tr>
      <td><a href="<?php echo url_for('tutor/edit?id='.$tutor->getId()) ?>"><?php echo $tutor->getId() ?></a></td>
      <td><?php echo $tutor->getNombre() ?></td>
      <td><?php echo $tutor->getApellido() ?></td>
      <td><?php echo $tutor->getEmail() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tutor/new') ?>">New</a>
