<h2> Pedidos </H2>
<hr/>
<br/>

<div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
                <div class="form-group">
                    <label for="">Cliente</label>
                    <select class="form-control" id="idcliente" required ="true" name="ddlCliente" onchange ="ConsultarPed(this.value)">

										<option value="" > </option>

										<?php foreach($clientes as $value): ?>
										<option value="<?= $value->id_cliente?>"><?=$value->numero_documento.'  '.$value->nombres_cliente.'  '.$value->apellidos_cliente?></option>
										<?php endforeach ?>
									</select>
									</div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
                <div class="form-group">
                    <label for="">Fecha Inicio</label>
                    <input type="date" id="txtfechaInicio" class="form-control" name="txtfechaInicio" onchange="ConsultarPed(this.value)">
										</div>
            </div>	
									
										<div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
                <div class="form-group">
            
                    <label for="">Fecha Fin</label>
                    <input type="date" id="txtfechaFin" class="form-control" name="txtfechaFin" onchange="ConsultarPed(this.value)">
										</div>
            </div>
						<div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
                <div class="form-group">
                    <br/>
                    <button type="reset" class="btn btn primary " name="btnLimpiarindex" id="btnLimpiarindex">Limpiar
                    </button>
                </div>
            </div>
     </div>
 <div class="table-responsive">         
<table class="table"">
<thead>
<tr>


<th>Fecha</th>
<th>Cliente</th>
<th>Total</th>     
<th>Estado</th>
<th>Acciones</th>     

</tr>

</thead>
<tbody id="ped">
     

</tbody>
</table>

</div>
</div> 




<div class="modal" id="Modal_Pedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="pedido">
              
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="contenedor_detallepedido"> 
      
              <div class="panel panel-default">
                  <div class="panel-heading"></div>
                  <div class="panel-body">
                    <h3> Detalle Pedido </h3>
                    <hr/>
                      <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-6 col-sx-6">
                              <div class="form-group">
                                  <label for="">Fecha Pedido</label>
                                  <input type="text" id="txtFecha" class="form-control" name="txtFecha" disabled="true">
                              </div>
                          </div>
                          <div class="col-lg- col-md-4 col-sm-6 col-sx-6">
                              <div class="form-group">
                                  <label for="">Cliente</label>
                                  <input type="text" id="txtCliente" class="form-control" name="txtTipoProveedor" disabled="true">
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-6 col-sx-6">
                              <div class="form-group">
                                  <H1>TOTAL</H1>
                                  <label for="" name="lbtotal" id="lbtotall">0</label>
                              </div>
                          </div>
          
                      </div>
                      
                      <table class="table" id="detalle">
                          <thead>
                              <tr>
          
                                  <th>Id Pedido</th>
                                  <th>Producto</th>
                                  <th>Cantidad</th>
                                  <th>Subtotal</th>
                              </tr>
                          </thead>
                          <tbody id="detallebodys">
      
                          </tbody>
                      </table>
          
                  </div>
              </div>
        
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
            </div>
          </div>
        </div>
      </div>

<input type="button" value="Descargar a excel" id="enviar">

