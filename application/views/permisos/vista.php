<section class="container">
	<div class="grid">
	    <div class="row cells3">
	        <div class="cell">
	        	<?php echo form_open() ?>
		        	<section class="login-panel">
		        		<h3>Permisos</h3>
		        		<hr>
						<span class="errors-section">
							<?php echo validation_errors() ?>
		        		</span>
		        		<label>Nombre:</label><br>
						<div class="input-control text">
						    <input autofocus name="nombre" type="text" value="<?php echo set_value('nombre'); ?>">
						</div><br><br>
						<label>Grupo / Departamento:</label><br>
						<div class="input-control select">
						    <select name="grupo_id">
						        <?php foreach ($grupos as $grupo): ?>
						        	<option value="<?php echo $grupo['id'] ?>">
						        		<?php echo $grupo['nombre']." / ".$grupo['d_nombre'] ?>
						        	</option>
						        <?php endforeach ?>
						    </select>
						</div>
						<div style="display: block; text-align: right;">
							<button class="button"><i class="fa fa-save"></i> GUARDAR</button>
						</div>
		        	</section>
		        </form>
	        </div>
	        <div class="cell colspan2">
	        	<?php if ($permisos): ?>
	        		<table class="table">
	        			<thead>
	        				<tr>
		        				<th>ID</th>
		        				<th>Permiso</th>
		        				<th>Grupo</th>
		        				<th>Dpto.</th>
	        				</tr>
	        			</thead>
	        			<tbody>
	        				<?php foreach ($permisos as $permiso): ?>
	        				<tr>
	        					<td><?php echo $permiso['id'] ?></td>
	        					<td><?php echo $permiso['nombre'] ?></td>
	        					<td><?php echo $permiso['g_nombre'] ?></td>
	        					<td><?php echo $permiso['d_nombre'] ?></td>
	        				</tr>
	        				<?php endforeach ?>
	        			</tbody>
	        		</table>
	        	<?php else: ?>
	        		<h4><i>No hay permisos que mostrar.</i></h4>
	        	<?php endif ?>
		    </div>
		</div>
	</div>
</section>