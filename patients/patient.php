<?php
include('../config/config.php'); /* LLAMAMOS CONFIG DE URLS */
include('../config/database.php'); /* CONEXION A LA BD */

class patient{
    public $conn;

    function __construct(){
        $db= new Database(); /* LA CONEXION A LA BD SIEMPRE SE RENUEVE O ESTE EN LINEA */
        $this->conn = $db->connectToDatabase();
    }

    function save($params){
        $nombres = $params['nombres'];
        $cedula = $params['cedula'];
        $fechadenacimiento = $params['fechadenacimiento'];
        $telefono = $params['telefono'];
        $correo = $params['correo'];
        $direccion = $params['direccion'];
        $intereses = $params['intereses'];
        $observacion = $params['observacion'];
        $image = $params['image'];

        $insert = " INSERT INTO clientes VALUES (NULL,'$nombres', '$cedula','$fechadenacimiento', '$telefono', 
    '$correo', '$direccion', '$intereses', '$observacion','$image')";
    
    return mysqli_query($this->conn, $insert);   
        
    }


    function getAll(){
        $sql = " SELECT * FROM clientes  ";
        return mysqli_query($this->conn, $sql);
     }
    function getOne($id){
        $sql = "SELECT * FROM clientes WHERE id = $id";
        return mysqli_query($this->conn, $sql);
    }

    function update($params){
        $nombres = $params['nombres'];
        $cedula = $params['cedula'];
        $fechadenacimiento = $params['fechadenacimiento'];
        $telefono = $params['telefono'];
        $correo = $params['correo'];
        $direccion = $params['direccion'];
        $intereses = $params['intereses'];
        $observacion = $params['observacion'];
        $image = $params['image'];
        $id = $params['id'];

        $update = "UPDATE clientes SET nombres='$nombres', cedula='$cedula', fechadenacimiento='$fechadenacimiento', telefono='$telefono', correo='$correo', direccion='$direccion', intereses='$intereses', observacion='$observacion', image='$image' WHERE id = $id"; 
       return mysqli_query($this->conn, $update);
    }

    function remove($id){
        $remove = "DELETE FROM clientes WHERE id = $id"; 
        return mysqli_query($this->conn, $remove);
    
    } 
    
}

