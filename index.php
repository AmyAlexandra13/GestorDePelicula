<?php
include 'helpers/utilities.php';
include 'peliculas/serviceSession.php';
include 'layout/layout.php';

$peliculas = GetList();




?>

<?php echo printHeader(true); ?>

<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">

        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#nuevo-heroe-modal">
          Agregar nueva pelicula
        </button>

    </div>
</div>

<div class="row">

    <?php if (count($peliculas) == 0) : ?>

        <h2 class="red">No hay peliculas agregadas</h2>

    <?php else : ?>

        <?php foreach ($peliculas as $key => $peli) : ?>

            <div class="col-md-3">

                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title"><?= $peli['Nombre-Peli'] ?></h5>
                        <p class="card-text"><?= $peli['Descripcion-Peli'] ?></p>
                        <p class="card-text"><?php echo $genero[$peli["Genero-Peli"]] ?></p>
                    </div>

                    <div class="card-body">
                        <a href="peliculas/edit.php?id=<?= $peli['id']?>" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>

            </div>

        <?php endforeach; ?>



    <?php endif; ?>



</div>

<div class="modal fade" id="nuevo-heroe-modal" tabindex="-1" aria-labelledby="nuevapeli" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevapeli">Nuevo heroe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="peliculas/add.php">
                    <div class="mb-3">
                       
        <label for="nombre">Nombre</label>
          <input name="Nombre-Peli" type="text" class="form-control" id="nombre">
                    </div>


                    <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
          <input name="Descripcion-Peli" type="text" class="form-control" id="descripcion">
      
                    </div>




                    <div class="mb-3">
        <label for="genero" class="form-label">Genero</label>
          <select name="Genero-Peli" class="form-select"> 
            <option value="">Selecciona una opcion</option>
              <?php foreach ($genero as $id => $text):?>

              <option value="<?=$id?>"><?=$text?> </option>
              <?php endforeach;?>

</select>


<div class="form-check">
  <input name="Peli-Active" class="form-check-input" type="checkbox" value="activo" id="flexCheckChecked" checked>
  <label class="form-check-label" for="flexCheckChecked">
  Activo
  </label>
</div>


          




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo printFooter(true); ?>

