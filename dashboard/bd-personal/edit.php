<?php
include_once '../bd-personal/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

if(isset($_POST['edit-btn'])){
            $numEmpleado = $_POST['numEmpleado'];
            $nombre = $_POST['nombre'];
            $aPaterno = $_POST['aPaterno'];
            $aMaterno = $_POST['aMaterno'];
            $edad = $_POST['edad'];
            $fNacimiento = $_POST['fNacimiento'];
            $genero = $_POST['genero'];
            $direccion = $_POST['direccion'];
            $estado = $_POST['estado'];
            $provincia = $_POST['provincia'];
            $cPostal = $_POST['cPostal'];
            $curp = $_POST['curp'];
            $rfc = $_POST['rfc'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $escolaridad = $_POST['escolaridad'];
            $puesto = $_POST['puesto'];


            $sql = "UPDATE personal SET nombre = '$nombre', ap_paterno = '$aPaterno', ap_materno = '$aMaterno', edad = '$edad', fech_nacimiento = '$fNacimiento', sexo = '$genero', domicilio = '$direccion', estado = '$estado', provincia = '$provincia', cod_postal = '$cPostal', CURP = '$curp', RFC = '$rfc', num_tel = '$telefono', correo = '$correo', escolaridad = '$escolaridad', puesto = '$puesto' WHERE num_empleado = '$numEmpleado'";
        
            
            $resultado = $conexion ->prepare($sql);
            
            $resultado->bindParam(':numEmpleado', $numEmpleado, PDO::PARAM_STR, 25);
            $resultado->bindParam(':nombre', $nombre, PDO::PARAM_STR, 25);
            $resultado->bindParam(':aPaterno', $aPaterno, PDO::PARAM_STR, 25);
            $resultado->bindParam(':aMaterno', $aMaterno, PDO::PARAM_STR, 25);
            $resultado->bindParam(':edad', $edad, PDO::PARAM_STR, 25);
            $resultado->bindParam(':fNacimiento', $fNacimiento, PDO::PARAM_STR, 25);
            $resultado->bindParam(':genero', $genero, PDO::PARAM_STR, 25);
            $resultado->bindParam(':direccion', $direccion, PDO::PARAM_STR, 25);
            $resultado->bindParam(':estado', $estado, PDO::PARAM_STR, 25);
            $resultado->bindParam(':provincia', $provincia, PDO::PARAM_STR, 25);
            $resultado->bindParam(':cPostal', $cPostal, PDO::PARAM_STR, 25);
            $resultado->bindParam(':curp', $curp, PDO::PARAM_STR, 25);
            $resultado->bindParam(':rfc', $rfc, PDO::PARAM_STR, 25);
            $resultado->bindParam(':telefono', $telefono, PDO::PARAM_STR, 25);
            $resultado->bindParam(':correo', $correo, PDO::PARAM_STR, 25);
            $resultado->bindParam(':escolaridad', $escolaridad, PDO::PARAM_STR, 25);
            $resultado->bindParam(':puesto', $puesto, PDO::PARAM_STR, 25);
            
            $resultado -> execute();
            $conexion = null;
        
}

header('location: ../verEmpleados.php');