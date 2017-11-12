<section class="container">
<?php if ($empleados): ?>
	<table class="table">
		<thead>
	        <tr>
	        	<th>ID/Acceso</th>
	            <th>Nombre</th>
	            <th>Apellidos</th>
	        </tr>
	    </thead>
	    <tbody>
			<?php foreach ($empleados as $empleado): ?>
			<tr>
				<td><?php echo $empleado['id'] ?></td>
				<td><?php echo $empleado['nombre'] ?></td>
				<td><?php echo $empleado['ap_p']." ".$empleado['ap_m'] ?></td>
			</tr>
			<?php endforeach ?>
	    </tbody>
	</table>
<?php else: ?>
	<h3>No hay empleados que mostrar.</h3>
<?php endif ?>
</section>
