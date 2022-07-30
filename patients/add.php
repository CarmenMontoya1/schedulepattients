<?php
include("../config/config.php");
include("patient.php");

if (isset($_POST) && !empty($_POST)){
$data = new patient();

if ($_FILES['image']['name'] !== ''){
    $_POST['image'] = saveImage($_FILES);
  }
  $save = $data-> save($_POST); /* UTILICE LA RECETA SAVE */
  if($save){
    $error= '<div class="alert alert-success" role="alert">Usuario creado correctamente </div> ';
  }else{
    $error='<div class="alert alert-danger" role="alert">Error al crear el usuario </div> ';
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crear paciente</title>
    <!-- CSS only -->

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>
    <?php include("../menu.php") ?>
    <div class="container">
        <?php
        if(isset($error)){
            echo $error;
        }
        ?>
        <h2 class="text-center mb-5"> Registro de pacientes</h2>
        <form method= "POST" enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="col">
                <input type="text" name="nombres" id="nombres" placeholder="Nombre completo del paciente" require class="form-control" />
    </div>
    </div>
    <div class="row mb-2">
        <div class="col">
             <input type="cedula" name="cedula" id="cedula" placeholder="numero de cedula del paciente" require class="form-control" />
             </div>
    </div>
    <div class="row mb-2">
                <div class="col">
                <input type="date" name="fechadenacimiento" id="fechadenacimiento" placeholder="feche de nacimiento del paciente" require class="form-control" />
    </div>
    </div>
   
    
    <div class="row mb-2">
        <div class="col">
             <input type="text" name="telefono" id="telefono" placeholder="numero telefonico del paciente" require class="form-control" /> 
             </div>
       </div>

       <div class="row mb-2">
        <div class="col">
             <input type="text" name="correo" id="correo" placeholder="correo del paciente" require class="form-control" /> 
             </div>
       </div>

       <div class="row mb-2">
        <div class="col">
             <input type="text" name="direccion" id="direccion" placeholder="direccion del paciente" require class="form-control" /> 
             </div>
       </div>

       <div class="row mb-2">
        <div class="col">
             <input type="text" name="intereses" id="intereses" placeholder="intereses del paciente" require class="form-control" /> 
             </div>
       </div>

       <div class="row mb-2">
        <div class="col">
             <input type="text" name="observacion" id="observacion" placeholder="observacion" require class="form-control" /> 
             </div>
       </div>


       <div class="row mb-2">
        <div class="col">
             <input type="file" name="image" id="image" class="form-control" /> 
             </div>
       </div>
      <button class="btn btn-success"> Registrar </button>
    </form> 


                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">   
</body>
</html>