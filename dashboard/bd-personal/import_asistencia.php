<?php
include_once "conexion.php";
include "../../vendor/simplexlsx/src/SimpleXLSX.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();
//CHECAR SI LA CONEXION ES EXISTOSA
/*
if($conexion){
    echo "estas conectado";
}*/
//$allowedFileType=['text/txt', 'text/csv', 'text/plain'];
if(isset($_POST['subir'])){
    $allowedFileType=['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if(in_array($_FILES['file']['type'], $allowedFileType)){
        $targetPath = 'subidas/'.$_FILES['file']['name'];
    //move_uploaded_file($_FILES['file']['tmp_name'],$targetPath);
        $excel = SimpleXLSX::parse($_FILES['file']['tmp_name']);
    //echo "archivo movido";
    //$archivo = $targetPath;
    //ABRIR EL ARCHIVO TXT
    //$archivo_open = fopen($archivo, 'r');
    //echo $linea;
    //$linea = file($archivo);
    //SENTENCIA SQL 
        $t_sql = 'REPLACE INTO asistencia (id, idEmpleado, fecha, horaEntrada, horaSalida) VALUES (NULL, ?, ?, ?, ?)';
        $resultado = $conexion->prepare($t_sql);
        $resultado-> bindParam(1, $idEmpleado);
        $resultado-> bindParam(2, $fecha);
        $resultado-> bindParam(3, $horaEntrada);
        $resultado-> bindParam(4, $horaSalida);

    //PARA UNA EXPORTACION EXITOSA, SE TIENEN QUE ELIMINAR LOS ESPACIOS EXTRAS Y TABULACIONES DEL ARCHIVO TXT. HACER QUE CADA FILA ESTE DIVIDO POR COMAS PARA QUE SE PUEDA EXPORTAR SIN PROBLEMAS
        foreach ($excel->rows() as $num_linea => $line){
            //$data = explode(',', $line);
            $idEmpleado = $line[2];
            $fecha = $line[6];
            $horaEntrada = $line[7];
            $horaSalida = $line[8];
            if($num_linea != 0){
                //print_r($resultado);
                //$sql = "INSERT INTO asistencia(estatus) VALUE ('$status')";
                //if($hora  )
                $resultado->execute();
                
                //print_r($line);
                //$result = $conexion->prepare($t_sql);
                //$result -> execute();

                //echo "importacion con exito";
                //print_r($data);
                //$data = explode(',', $linea);
                //print_r($data);
            }
        }
    /*
    //SE RECORRE EL ARCHIVO
    while(feof($archivo_open)==false){

        $line = fgets($archivo_open);
        $data = explode('|', $line);
        
    };
    fclose($archivo_open);*/
    }
header('location: ../asistencia.php');

}
//print json_encode($resultado);
//$nombre = ($_FILES['file']['name']);

//echo ($nombre);