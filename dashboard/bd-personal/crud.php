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
        $sql = "INSERT INTO personal(id, num_empleado, nombre, ap_paterno, ap_materno, edad, fech_nacimiento, sexo, domicilio, estado, provincia, cod_postal, CURP, RFC, num_tel, correo, escolaridad, puesto) VALUES (NULL,'$numEmpleado','$nombre', '$aPaterno', '$aMaterno', '$edad', '$fNacimiento', '$genero', '$direccion','$estado', '$provincia', '$cPostal', '$curp', '$rfc','$telefono', '$correo', '$escolaridad', '$puesto')";
        $resultado = $conexion->prepare($sql);
        $data = $resultado->execute();
        //$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
        $consulta = "SELECT * FROM personal";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:
        $sql = "UPDATE personal SET nombre = '$nombre', ap_paterno = '$aPaterno', ap_materno = '$aMaterno', edad = '$edad', fech_nacimiento = '$fNacimiento', sexo = '$genero', domicilio = '$direccion', estado = '$estado', provincia = '$provincia', cod_postal = '$cPostal', CURP = '$curp', RFC = '$rfc', num_tel = '$telefono', correo = '$correo', escolaridad = '$escolaridad', puesto = '$puesto' WHERE num_empleado = '$numEmpleado'";
        $resultado = $conexion->prepare($sql);
        $data = $resultado->execute();
        break;
    case 4:
        $sql = "DELETE FROM personal WHERE num_empleado = '$numEmpleado'";
        $resultado = $conexion->prepare($sql);
        $data = $resultado->execute();
        break;
    case 5:
        $sql = "TRUNCATE TABLE asistencia";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        break;
}
print json_encode($data , JSON_UNESCAPED_UNICODE);
$conexion = null;


