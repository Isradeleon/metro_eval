<section class="container">
	<div class="grid">
	    <div class="row cells3">
	        <div class="cell">
	        	<?php echo form_open() ?>
		        	<section class="login-panel">
		        		<h3>Departamentos</h3>
		        		<hr>
		        		<span class="errors-section">
							<?php echo validation_errors() ?>
		        		</span>
		        		<label>Nombre:</label><br>
						<div class="input-control text">
						    <input autofocus name="nombre" type="text" value="<?php echo set_value('nombre'); ?>">
						</div>
						<div style="display: block; text-align: right;">
							<button class="button"><i class="fa fa-save"></i> GUARDAR</button>
						</div>
		        	</section>
		        </form>
	        </div>
	        <div class="cell colspan2">
	        	<?php if ($departamentos): ?>
	        		<table class="table">
	        			<thead>
	        				<tr>
		        				<th>ID</th>
		        				<th>Nombre</th>
	        				</tr>
	        			</thead>
	        			<tbody>
	        				<?php foreach ($departamentos as $departamento): ?>
	        				<tr>
	        					<td><?php echo $departamento['id'] ?></td>
	        					<td><?php echo $departamento['nombre'] ?></td>
	        				</tr>
	        				<?php endforeach ?>
	        			</tbody>
	        		</table>
	        	<?php else: ?>
	        		<h4><i>No hay departamentos que mostrar.</i></h4>
	        	<?php endif ?>
		    </div>
		</div>
	</div>
</section>