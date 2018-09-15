<div class="container">
<form id="idindex">
<h2> COMPRAS </H2>
<hr/>
<br/>

<div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
                <div class="form-group">
                    <label for="">proveedor</label>
                    <select  id="proveedor" class="form-control" onchange="ConsultarCompra(this.value)" >
                        <option selected value="">seleccionar</option>
                        <?php foreach($proveedores as $valor): ?>
                        <option value="<?= $valor->id_proveedor?>">
                            <?= $valor->nombre_empresa?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
                <div class="form-group">
                    <label for="">Fecha Inicio</label>
                    <input type="date" id="txtfechaInicio" class="form-control" name="txtfechaInicio" onchange="ConsultarCompra(this.value)">
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
                <div class="form-group">
                    <label for="">Fecha Fin</label>
                    <input type="date" id="txtfechaFin" class="form-control" name="txtfechaFin" onchange="ConsultarCompra(this.value)">
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
                <div class="form-group">
                    <br/>
                    <button onclick="LimpiarForm()" type="reset" class="btn btn primary " name="btnLimpiarindex" id="btnLimpiarindex">Limpiar
                    </button>
                </div>
            </div>
     </div>
           
<table class="table">
<thead>
<tr>

<th>Fecha</th>
<th>proveedor</th>
<!-- <th>Nombre Producto</th>
<th>Tipo Producto</th>
<th>Precio</th>
<th>Cantidad</th>
<th>Subtotal</th> -->
<th>Total</th>     
<th>Ver detalle</th>     
</tr>

</thead>
<tbody id="consultaCompra">
     

</tbody>
</table>

</div>





<div class="modal" id="Modal_Compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="compra">
              
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="contenedor_detalleCompra"> 
      
              <div class="panel panel-default">
                  <div class="panel-heading"></div>
                  <div class="panel-body">
                    <h3> Detalle Compra </h3>
                    <br/>    
                    <hr/>
                      <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-6 col-sx-6">
                              <div class="form-group">
                                  <label for="">Fecha Compra</label>
                                  <input type="text" id="txtFecha" class="form-control" name="txtFecha" disabled="true">
                              </div>
                          </div>
                          <div class="col-lg- col-md-4 col-sm-6 col-sx-6">
                              <div class="form-group">
                                  <label for="">Proveedor</label>
                                  <input type="text" id="txtTipoProveedor" class="form-control" name="txtTipoProveedor" disabled="true">
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
          
                                  <th>Nombre Producto</th>
                                  <th>Precio</th>
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

    <script>
     $(()=>{
     ConsultarCompra();

     })

       function LimpiarForm() {
        $("#txtfechaFin").val("");
        $("#txtfechaInicio").val("");
        $("select").val('').trigger('change');
    }
//      $(document).on('click', 'btnLimpiarindex',function(){
//   ConsultarCompra();
// })
     </script>
      </form>