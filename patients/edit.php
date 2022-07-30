<?php
include("../config/config.php");
include("patient.php");
$p = new patient();
$data = mysqli_fetch_object($p->getOne($_GET['id']));
$date = new DateTime($data->fechadenacimiento);

if (isset($_POST) && !empty($_POST)){
    $_POST['image'] = $data->image;
    if ($_FILES['image']['name'] !== ''){
      $_POST['image'] = saveImage($_FILES);
    }
   $update = $p->update($_POST);
   if ($update){
    $error = '<div class="alert alert-success" role="alert">Paciente modificado correctamente</div>';
}else{
  $error = '<div class="alert alert-danger" role="alert" > Error al modificar un paciente </div>';
}
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Paciente </title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<?php include("../menu.php") ?>
    <?php
    if(isset($error)){
        echo $error;
    }
    ?>
    
    <h2 class="text-center mb-5"> Modificar paciente </h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="row mb-2">
            <div class="col">
            <input type="text" name="nombres" id="nombres" placeholder=" Nombre completo del paciente" requiere class="form-control" value="<?= $data->nombres?>" />
                <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />
            </div>

        <div class="row mb-2">
            <div class="col">
            <input type="cedula" name="cedula" id="cedula" placeholder=" numero de dedula del paciente" requiere class="form-control" value="<?= $data->cedula ?>" />
         </div>

        
        <div class="row mb-2">
            <div class="col">
            <input type="fechadenacimiento" name="fechadenacimiento" id="fechadenacimiento" placeholder=" fecha de nacimiento del paciente" requiere class="form-control" value="<?= $data->fechadenacimiento ?>" />
         </div>

            
         <div class="row mb-2">
            <div class="col">
            <input type="tel" name="telefono" id="telefono" placeholder="telefono del paciente" requiere class="form-control" value="<?= $data->telefono ?>" />
            
            </div>
         </div>

        <div class="row mb-2">
            <div class="col">
            <input type="correo" name="correo" id="correo"placeholder="correo" requiere class="form-control" value="<?= $data->correo ?>" /> 
            </div>
         </div>

        <div class="row mb-2">
            <div class="col">
            <input type="text" name="direccion" id="direccion" placeholder=" direcion del paciente" requiere class="form-control" value="<?= $data->direccion  ?>" />
            </div>
         </div>

         <div class="row mb-2">
            <div class="col">
            <input type="text" name="intereses" id="intereses" placeholder="intereses del paciente lo que quiere lograr" requiere class="form-control" value="<?= $data->intereses  ?>" />
            </div>
         </div>

         <div class="row mb-2">
            <div class="col">
            <input type="text" name="observacion" id="observacion" placeholder=" observacion del paciente" requiere class="form-control" value="<?= $data->observacion  ?>" />
            </div>
         </div>

        <div class="row mb-2">
            <div class="col">
            <input type="file" name="image" id="image" requiere class="form-control" />
            </div>
         </div>

         <button class="btn btn-success"> modificar </button>
    </form>
 </div>

 <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>   
</body>
</html>