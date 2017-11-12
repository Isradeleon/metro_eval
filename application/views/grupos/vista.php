<section class="container">
	<div class="grid">
	    <div class="row cells3">
	        <div class="cell">
	        	<?php echo form_open() ?>
		        	<section class="login-panel">
		        		<h3>Grupos</h3>
		        		<hr>
						<span class="errors-section">
							<?php echo validation_errors() ?>
		        		</span>
		        		<label>Nombre:</label><br>
						<div class="input-control text">
						    <input autofocus name="nombre" type="text" value="<?php echo set_value('nombre'); ?>">
						</div><br><br>
						<label>Departamento:</label><br>
						<div class="input-control select">
						    <select name="departamento_id">
						        <?php foreach ($departamentos as $departamento): ?>
						        	<option value="<?php echo $departamento['id'] ?>">
						        		<?php echo $departamento['nombre'] ?>
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
	        	<?php if ($grupos): ?>
	        		<table class="table">
	        			<thead>
	        				<tr>
		        				<th>ID</th>
		        				<th>Grupo</th>
		        				<th>Departamento</th>
	        				</tr>
	        			</thead>
	        			<tbody>
	        				<?php foreach ($grupos as $grupo): ?>
	        				<tr>
	        					<td><?php echo $grupo['id'] ?></td>
	        					<td><?php echo $grupo['nombre'] ?></td>
	        					<td><?php echo $grupo['d_nombre'] ?></td>
	        				</tr>
	        				<?php endforeach ?>
	        			</tbody>
	        		</table>
	        	<?php else: ?>
	        		<h4><i>No hay grupos que mostrar.</i></h4>
	        	<?php endif ?>
		    </div>
		</div>
	</div>
</section>