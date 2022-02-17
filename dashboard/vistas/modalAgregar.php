<div class="modal fade" id="addnew" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Agregar Empleado</b></h4>
          	</div>

			<form class="form-horizontal" method="POST" action="bd-personal/crud.php" enctype="multipart/form-data" id="formAdd">
          		<div class="modal-body">
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="nombre" class=" control-label">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre" required>
								
							</div>
						</div>	
						<div class="col-lg-4">
							<div class="form-group">
								<label for="aPaterno" class="control-label">Apellido Paterno</label>
		
								<input type="text" class="form-control" id="aPaterno" name="aPaterno" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="aMaterno" class="control-label">Apellido Materno</label>
		
								<input type="text" class="form-control" id="aMaterno" name="aMaterno" required>
							</div>
						</div>		
					</div>

					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
								<label for="edad" class=" control-label">Edad</label>
								<input type="number" class="form-control" id="edad" name="edad" min="18" max="70">
								
							</div>
						</div>	
						<div class="col-lg-5">
							<div class="form-group">
								<label for="fNacimiento" class="control-label">Fecha Nacimiento</label>
		
								<input type="date" class="form-control" id="fNacimiento" name="fNacimiento" required>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="genero" class="control-label">Genero</label>
		
								<select class="form-control" name="genero" id="genero">
                                    <option value="" selected>- Seleccionar -</option>
                                    <option value="HOMBRE">Hombre</option>
                                    <option value="MUJER">Mujer</option>
                                </select>
							</div>
						</div>		
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="curp" class=" control-label">CURP</label>
								<input type="text" class="form-control" id="curp" name="curp" maxlength ="18">
							</div>
						</div>	
						<div class="col-lg-6">
							<div class="form-group">
								<label for="rfc" class="control-label">RFC</label>
		
								<input type="text" class="form-control" id="rfc" name="rfc" maxlength="10">
							</div>
						</div>	
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="direccion" class=" control-label">Direccion</label>
								<input type="text" class="form-control" id="direccion" name="direccion">
							</div>
						</div>		
					</div>
						
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="estado" class=" control-label">Estado</label>
								<input type="text" class="form-control" id="estado" name="estado">
							</div>
						</div>	
						<div class="col-lg-4">
							<div class="form-group">
								<label for="provincia" class="control-label">Provincia</label>
		
								<input type="text" class="form-control" id="provincia" name="provincia">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="cPostal" class="control-label">Codigo Postal</label>
		
								<input type="number" class="form-control" id="cPostal" name="cPostal">
							</div>
						</div>		
					</div>	
					
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="telefono" class=" control-label">Teléfono</label>
								<input type="tel" class="form-control" id="phone" name="telefono">
							</div>
						</div>	
						<div class="col-lg-6">
							<div class="form-group">
								<label for="correo" class="control-label">Correo Eléctronico</label>
		
								<input type="email" class="form-control" id="correo" name="correo">
							</div>
						</div>	
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="escolaridad" class=" control-label">Escolaridad</label>
								<input type="text" class="form-control" id="escolaridad" name="escolaridad">
							</div>
						</div>	
						<div class="col-lg-6">
							<div class="form-group">
								<label for="numEmpleado" class="control-label">Número Empleado</label>
		
								<input type="number" class="form-control" id="numEmpleado" name="numEmpleado">
							</div>
						</div>	
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="puesto" class=" control-label">Puesto</label>
								<select class="form-control" name="puesto" id="puesto">
                                    <option value="" selected>- Seleccionar -</option>
                                    <option value="EJECUTIVO">Ejecutivo</option>
                                    <option value="CAPACITADOR">Capacitador</option>
                                </select>
							</div>
						</div>	
							
					</div>

          		</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-flat pull-left close" data-dismiss="modal"><i class="fa fa-close" id="Cerrar"></i> Cerrar</button>
					<button id="submit" type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
				</div>
			</form>
        </div>
    </div>
</div>
