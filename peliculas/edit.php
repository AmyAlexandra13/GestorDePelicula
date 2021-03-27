<?php
include '../layout/layout.php';
include '../helpers/utilities.php';
include 'serviceSession.php';

$peli2 = null;
if (isset($_GET["id"])) {

    $peli2 = GetById($_GET["id"]);

    if(isset($_POST["Nombre-Peli"]) && isset($_POST["Descripcion-Peli"]) && isset($_POST["Genero-Peli"])){
        $peli2 = ["id"=> $_GET["id"], "nombre-Peli"=>$_POST["Nombre-Peli"],"descripcion-Peli"=>$_POST["Descripcion-Peli"], "genero-Peli"=>$_POST["Genero-Peli"]];
       
       
        Edit($peli2);

        header("Location: ../index.php");
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <?php echo printHeader() ?>

    <?php if ($peli2 == null && count($peli2) == 0) : ?>
        <h2>No existe esta pelicula</h2>
    <?php else : ?>

        <form action="edit.php?id=<?= $peli2["id"]?>" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la pelicula</label>
                <input name="Nombre-Peli" value="<?php echo $peli2["Nombre-Peli"]?>" type="text" class="form-control" id="nombre">

            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input name="Descripcion-Peli" value="<?php echo $peli2["Descripcion-Peli"]?>" type="text" class="form-control" id="descripcion">
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Genero de la pelicula</label>
                <select name="Genero-Peli" class="form-select" id="genero">
                    <option value="">Seleccione una opcion</option>
                    <?php foreach ($genero as $value => $text) : ?>

                        <?php if($value == $peli2["Genero-Peli"]):?>
                            <option selected value="<?php echo $value; ?>"> <?= $text ?> </option>
                         <?php else :?>
                            <option value="<?php echo $value; ?>"> <?= $text ?> </option>
                        <?php endif;?>   

                        

                    <?php endforeach; ?>
                </select>
            </div>
            <a href="../index.php" class="btn btn-warning">Volver atras </a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    <?php endif; ?>




    <?php echo printFooter() ?>

</body>

</html>