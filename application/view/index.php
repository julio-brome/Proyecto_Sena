<form action="<?= URL ?>pedido\guardar" method="POST" name="pedido">
	<div class="container">

		<div class="card bg-warning text-black">
			<div class="card-body"><h5>Información General     </h5>
			</div>
		</div>
		<br><br>


	<div class="container">
		<label for="Fecha"> <h5>Fecha</h5></label>
		<input type="datetime" name="fecha"  value="<?php date_default_timezone_set('America/Bogota'); echo $fecha_actual=date("d-m-Y");?>" readonly="">
	</div>




	<div class="container">
		<div class="form-group">
			<div class ="col-sm-12 col-md-12">

						<label for="cliente">Cliente</label>

				<select class="form-control" id="ddlCliente" required ="true" name="ddlCliente" onchange = "direccion(this)">

					<option value="" > </option>

						<?php foreach($clientes as $value): ?>
						<option direc="<?= $value->direccion?>" tel= <?= $value->telefono?> value="<?= $value->id_cliente?>"><?=$value->documento.'  '.$value->nombre.'  '.$value->apellido?></option>
						<?php endforeach; ?>


				</select>	<br><br>
				<div class="row">
						<div class="col-md-12">
			<label for="">Direccion :</label>
			<h3 id="dDir">-</h3>
						</div>
				</div>
					<div class="row">
						<div class="col-md-12">
			<label for="">Telefono :</label>
			<h3 id="tTel">-</h3>
						</div>
					</div>
			</div>
		</div>
	</div>



	<div class="container">
		<div class="card bg-warning text-black">
			<div class="card-body"><h5>Información Pedido     </h5>
			</div>

		</div><br><br>

		<div class="container">
			<div class="form-group">
					<div class ="col-sm-12 col-md-12">
						<label for="TipoVenta">Tipo de venta : </label>
						<input type="radio" required name="tipoVenta" id="credito" value= "credito">Crédito
						<input type="radio" required name="tipoVenta" id="contado" value= "contado">Contado



						<br><br>
					<label for="Fecha">Producto</label>
					<select class="form-control" required ="true" id="ddlProducto" onchange = "ponerPrecio(this)">
				<option value="" ></option>
				<?php foreach($productos as $value): ?>
				<option cantidad= <?= $value->cantidad_en_existencia ?>  precio= <?= $value->valor_de_venta ?> idP= "<?= $value->nombre_del_producto ?>" value="<?= $value->id_producto ?>"><?= $value->nombre_del_producto ?></option>
				<?php endforeach; ?>
					</select><br><br><br>

						<div class="row">
							<div class="col-md-12">
							<div class="alert alert-success" role="alert">
				<label for="">Cantidades en existencia</label>
				<h3 id="cCantidades">0</h3>
						</div>
						<div class="alert alert-success" role="alert">
				<label for="">Precio</label>
				<h3 id="pPrecio">0</h3>
						</div>
							</div>
						</div>	<br>

							<div class="row">
								<div class="col-md-12">

				<label for="">Cantidad</label>
				<input type="number" name="cantidad" required ="true" pattern ="|0-9|" class="form-control" id="txtCantidad">

								</div>
							</div>
					</div>
			</div>
		</div>
	</div>






			<div class="container"><br><br>
				<button id="adicionar" class="btn btn-info float-right" type="button">Adicionar al pedido</button>
					<p>Productos en la Tabla:
  					<div id="adicionados">

					</div>
					</p>
			</div>




			<div class="container">
					<div class="card bg-success text-black">
							<div class="card-body"><h5>Pedido     </h5>
							<input type="hidden" name="estadoPedido" value="1">
							</div>
						</div>


    				<div class="row">
       					<div class="col-sm-12">

							<table  id="mytable" class="table table table-hover ">


								<tr>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Valor Unitario</th>
									<th>Subtotal</th>


								</tr>


							</table>


        				</div>
					</div>


			<div class="container">
				<div class="row">



			<label for="t"><h3>Total:</h3></label>
			<h3 id="gTotal">0</h3>
			<input type="hidden" id="totalInput" value="" name="totales">




				</div>
			</div>
			<label for="observaciones">Observaciones :</label><br>
			<textarea name="observaciones" id="observaciones" cols="60"></textarea>


			<button type="submit" name="btnEnviar" class="btn btn-success float-right" onsubmit = "valida(this)">Guardar Pedido</button><br><br>
			</div>
	</div>

</form>
