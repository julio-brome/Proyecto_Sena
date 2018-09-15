<div class="container">
    <form action="<?= URL ?>ruta/guardar" method="post">
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
