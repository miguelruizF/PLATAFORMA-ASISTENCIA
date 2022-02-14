<?php
include_once '../bd-personal/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$numEmpleado = (isset($_POST['numEmpleado']))? $_POST['numEmpleado']:'';
$nombre = (isset($_POST['nombre']))? $_POST['nombre']:'';
$aPaterno = (isset($_POST['aPaterno']))? $_POST['aPaterno']:'';
$aMaterno = (isset($_POST['aMaterno']))? $_POST['aMaterno']:'';
$edad = (isset($_POST['edad']))? $_POST['edad']:'';
$telefono = (isset($_POST['telefono']))? $_POST['telefono']:'';
$correo = (isset($_POST['correo']))? $_POST['correo']:'';
$fNacimiento = (isset($_POST['fNacimiento']))? $_POST['fNacimiento']:'';
$genero = (isset($_POST['genero']))? $_POST['genero']:'';
$direccion = (isset($_POST['direccion']))? $_POST['direccion']:'';
$estado = (isset($_POST['estado']))? $_POST['estado']:'';
$provincia = (isset($_POST['provincia']))? $_POST['provincia']:'';
$cPostal = (isset($_POST['cPostal']))? $_POST['cPostal']:'';
$curp = (isset($_POST['curp']))? $_POST['curp']:'';
$rfc = (isset($_POST['rfc']))? $_POST['rfc']:'';
$escolaridad = (isset($_POST['escolaridad']))? $_POST['escolaridad']:'';
$puesto = (isset($_POST['puesto']))? $_POST['puesto']:'';
$opcion = (isset($_POST['opcion']))? $_POST['opcion']:'';
$id = (isset($_POST['id']))? $_POST['id']:'';

switch ($opcion) {
    case 1:
        $sql = "INSERT INTO personal(id, num_empleado, nombre, ap_paterno, ap_materno, edad, fech_nacimiento, sexo, domicilio, estado, provincia, cod_postal, CURP, RFC, num_tel, correo, escolaridad, puesto) VALUES (NULL,'$numEmpleado','$nombre', '$aPaterno', '$aMaterno', '$edad', '$telefono', '$correo', '$fNacimiento','$genero','$direccion','$estado', '$provincia', '$cPostal', '$curp', '$rfc', '$escolaridad', '$puesto')";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 4:
        $sql =  'SELECT * FROM personal';
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}
print json_encode($data , JSON_UNESCAPED_UNICODE);
//header('location: ../verEmpleados.php');
$conexion = null;


/* 
if(isset($_POST['add'])){
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
            $sql = "INSERT INTO personal(id, num_empleado, nombre, ap_paterno, ap_materno, edad, fech_nacimiento, sexo, domicilio, estado, provincia, cod_postal, CURP, RFC, num_tel, correo, escolaridad, puesto) VALUES (NULL,:numEmpleado, :nombre, :aPaterno, :aMaterno, :edad, :fNacimiento, :genero, :direccion, :estado, :provincia,:cPostal ,:curp ,:rfc , :telefono, :correo, :escolaridad, :puesto)";

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

 */
