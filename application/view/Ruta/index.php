<div id="form_editar" class="container">
    <form action="<?= URL ?>ruta/modificarr" method="post">
    <input type="hidden" name="txxtId" id="txxtId" >
    <div class="row">
    <div class="col">
    <div class="form-group">
       <label for="">Nombre de ruta</label>
       <Input type="text" class="form-control" id="txtNombre" name="txtNombre">
    </div>
    </div>


    <div class="col">
    <div class="form-group">
       <label for="">Municipio</label>
       <select class="form-contro1" name="ddlMuni" id="ddlMuni" >
          <option value="option">Seleccione</option>
          <?php foreach($rut as $value): ?>
            <option value="<?= $value->id_municipio ?>"><?= $value->nombre_municipio?></option>
            <?php endforeach; ?> 

       </select>
    </div>
    </div>
    

    <div class="col">
    <div class="form-group">
       <label for="">Barrio </label>
       <select class="form-contro2" name="ddlbarri" id="ddlbarri">
            <option value="option">Seleccione </option>
       </select>
    </div>
    </div>
   
    </div>
    <div class="row">
        <button type="submit" class"btn btn-success">Guardar</button>
    </div>
    </form>
</div>


<div id="tabla_rutas" class="table-responsive">
     <table class="table" id="rruta">
       <thead>
        <tr>
        <th>Nombre de ruta</th>
        <th>Barrio</th>
        <th>Municipio</th>
        <th>Estado</th>
        <th>Opciones</th>
        </tr>
       </thead>
       <tbody>
           <?php foreach($ruta as $value): ?>
           <tr>
           <td><?= $value->nombre_ruta?></td>
           <td><?= $value->nombre_barrio?></td>
           <td><?= $value->nombre_municipio?></td>
           <td><?= $value->estado==1?"Activo":"Inactivo" ?></td>
           <td>

               
               <button class="btn btn-primary" value="<?= $value->id_ruta ?>" id="tedi"> Editar </button>

               <?php if($value->estado==1): ?>
    
               <a class="btn btn-danger" href="<?= URL ?>ruta/estado/<?= $value->id_ruta ?>/0">Inactivar</a>
               <?php else: ?>
               <a class="btn btn-success" href="<?= URL ?>ruta/estado/<?= $value->id_ruta ?>/1">Activar</a>
               <?php endif; ?>
            
           </td>
           </tr>
           <?php endforeach; ?> 
       </tbody>
     </table>
     <input class="succes" id="cr" type="submit" value="Crear Ruta">
     <input type="button" value="Descargar a excel" id="enviar">
</div>

