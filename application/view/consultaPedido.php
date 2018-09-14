
<div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">   
 
    <div class="row">
				<table id="example" class="table table-striped table-bordered " style= "width:100%">
					<thead>
						<tr>
              <th>ID PEDIDO</th>
							<th>FECHA</th>
							<th>NOMBRE CLIENTE</th>
							<th>VALOR TOTAL</th>
							<th>ESTADO DEL PEDIDO</th>
							<th>ACCIONES</th>
							
						</tr>
					</thead>
					<tfoot>
				
          <tbody>
					<?php foreach($pedidos as $value): ?>
					<tr>
						<td><?= $value->id_pedido?></td>
						<td><?= $value->fecha_de_creacion?></td>
						<td><?= $value->nombres_cliente.'  '.$value->apellidos_cliente?></td>
						<td><?= $value->valor_total?></td>
						<td><?= $value->estado_pedido?></td>
						<td><button class= "btn btn-warning">Ver Detalle</button>
						<button class= "btn btn-danger">Cambiar Estado</button></td>
					</tr>


					<?php endforeach; ?>
                    </tbody>
				</table>
			
	    
	</div>
</div>	

<!-- Modal -->
<div class="modal fade" id="modal-detallePedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detalle Pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
		<tr>
		<th>PRODUCTO</th>
		<th>CANTIDAD</th>
		<th>VALOR UNITARIO</th>
		<th>SUBTOTAL</th>
		
		</tr>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">C</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $('#example').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>