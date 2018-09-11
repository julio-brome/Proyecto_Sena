<div class="table-responsive">
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
           <?php foreach($rutas as $value): ?>
           <tr>
           <td><?= $value->nombre_ruta?></td>
           <td><?= $value->nombre_barrio?></td>
           <td><?= $value->nombre_municipio?></td>
           <td><?= $value->estado==1?"Activo":"Inactivo" ?></td>
           <td>
               <a class="btn btn-primary" href="<?= URL ?>ruta/editar/<?= $value->id_ruta ?>">Editar<a/>

               <?php if($value->estado==1): ?>
               <a class="btn btn-danger" href="<?= URL ?>ruta/estado/<?= $value->id_ruta ?>/0">Inactivar</a>
               <?php else: ?>
               <a class="btn btn-success" href="<?= URL ?>ruta/estado/<?= $value->id_ruta ?>/1">Activar</a>
               <?php endif; ?>
            
           </td>
           </tr>
           <?php endforeach; ?> 
           <input class="succes" id="cr" type="submit" value="Crear Ruta"> 
       </tbody>
     </table>
</div>
