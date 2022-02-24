<?php 
    require_once "vistas/superior.php";
    
    include_once "../dashboard/bd-personal/conexion.php";

    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta="SELECT * FROM personal";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $personal = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Asistencias</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Tabla</li>
                        </ol>
                       
                        <!--DIV IMPORTACION DE DATOS EXCEl-->
                        <div class="">
                            <h4 class="">Importar Archivo de Asistencia</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card p-4 bg-dark" style="--bs-bg-opacity: .1;">
                                        <form action="" method="POST" name="formTxt" id="formTxt" enctype="multipart/form-data">
                                            <div>
                                                <label for="file" class="pe-4">Elija Archivo
                                                </label>
                                                <input type="file" name="file" id="file" class="pe-4">
                                                <button type="submit" id="btnArchivo_txt" name="subir" class="btn btn-dark">Importar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        
                        <hr>
                        <div class="mt-4 mb-4">
                            <h4>Asistencias</h4>
                        </div>
                        
                        <hr>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla - Personal OEK
                            </div>
                            <div class="card-body">
                                <table id="tbAsistencia" class="table table-striped table-bordered table-dark" style="width:100%">
                                    <thead class="bg-primary text-white text-center">
                                        <tr>
                                            <th>FECHA</th>
                                            <th>NOMBRE</th>
                                            <th># EMPLEADO</th>
                                            <!-- <th>APELLIDO</th> -->
                                            <th>PUESTO</th>
                                            <th>HORA ENTRADA</th>
                                            <th>HORA SALIDA</th>
                                            <th>HORAS LABORADAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // $sql = "SELECT *, personal.num_empleado as personal, asistencia.hora as horario from asistencia left join personal on personal.num_empleado = asistencia.idEmpleado order by asistencia.idEmpleado asc,  asistencia.fecha asc, asistencia.hora asc";
                                            // $resultado = $conexion->prepare($sql);
                                            // while($row = $resultado->fetchAll(PDO::FETCH_ASSOC)){
                                            //     echo "<pre>";print_r($row->rows());
                                            // }
                                            
                                            $sql = "SELECT *, personal.num_empleado as personal, asistencia.hora as horario from asistencia right join personal on personal.num_empleado = asistencia.idEmpleado WHERE hora BETWEEN '08:30:00' and '09:05:59' order by asistencia.fecha asc, asistencia.idEmpleado asc, asistencia.hora asc";
                                            $resultado = $conexion->prepare($sql);
                                            $resultado->execute();
                                            $result = $resultado->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $horario){
                                        
                                                //print_r($horario);
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $horario['fecha']?>
                                            </td>
                                            <td>
                                                <?php echo $horario['nombre'].' '.$horario['ap_paterno']?>
                                            </td>
                                            <td>
                                                <?php echo $horario['personal']?>
                                            </td>
                                            <td>
                                                <?php echo $horario['puesto']?>
                                            </td>
                                            <td>
                                                <?php echo $horario['horario']?>
                                            </td>
                                            <td>
                                               
                                            </td>
                                            <td>
                                               
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>  
                            </div>
                        </div>
                    </div> 
                </main>       
                

                
<?php 
    require_once "vistas/inferior.php";
?>
