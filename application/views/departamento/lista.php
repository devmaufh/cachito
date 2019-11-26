
<h1>Departamentos</h1>
<br>
<table border="1">
<thead>
    <th>ID</th>
    <th>Departamento</th>
</thead>

<tbody>
<?php foreach($departamentos as $depa) {?>
<tr>
<td> <?php echo $depa['idDepartamento']; ?>  </td>
<td> <?php echo $depa['Nom']; ?>  </td>
</tr>
<?php }  ?>
</tbody>
</table>