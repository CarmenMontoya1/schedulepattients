<?php
include("../config/config.php");
include("patient.php");
$p = new patient();

$allpatiens = $p->getAll();

if(isset($_GET['id']) && !empty($_GET['id'])){

$remove = $p->remove($_GET["id"]); 
if ($remove) {
    header("location: " . ROOT . "patients/index.php");
} else {
    $msj = "<div class='alert-danger' rol='alert'>Error al eleminar el paciente</div>";
 }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pacientes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
    
</body>
<?php include("../menu.php") ?>
<div class="container">
    <h2 class="text-center mb-5"> lista de pacientes </h2>

    <div class="row">
        <?php
        while($patient = mysqli_fetch_object($allpatiens)) {
           
            echo "<div class='col-6'>";
            echo "<div class='border border-info p-2'>";
            echo "<h5> <img src='. ROOT .'/images/$patient->image' width='50' height='50' ></h5>";
            echo "<h5> <p> <b>Nombre:</b> $patient->nombres 
            <br> <p> <b>Cedula:</b> $patient->cedula </h5>";
            

            echo "<div class='center'> <a class='btn btn-success' href='". ROOT ."/patients/edit.php?id=$patient->id' >Modificar</a> - <a class='btn btn-danger' href='". ROOT ."/patients/index.php?id=$patient->id' >Eliminar</a> </div>";

            echo "</div>";
            echo "</div>";
        }
        ?>
        </div>

        </div>
        </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>