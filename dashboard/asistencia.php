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
                                        <form action="bd-personal/import_asistencia.php" method="POST" name="formTxt" id="formTxt" enctype="multipart/form-data">
                                            <div>
                                                <label for="file" class="pe-4">Elija Archivo
                                                </label>
                                                <input type="file" name="file" id="file"
                                                accept=".xls, .xlsx"  class="pe-4">
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
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // $sql = "SELECT *, personal.num_empleado as personal, asistencia.hora as horario from asistencia left join personal on personal.num_empleado = asistencia.idEmpleado order by asistencia.idEmpleado asc,  asistencia.fecha asc, asistencia.hora asc";
                                            // $resultado = $conexion->prepare($sql);
                                            // while($row = $resultado->fetchAll(PDO::FETCH_ASSOC)){
                                            //     echo "<pre>";print_r($row->rows());
                                            // }
                                            $horaEntradaM = new DateTime('08:30:00');
                                            $limitHoraEntradaM = new DateTime('09:05:59');
                                            $horaSalidaM = new DateTime('14:30:00');
                                            $retardoMa = new DateTime('09:06:00');
                                            $limitRetardoMa = new DateTime('09:10:59');
                                            $faltaMa = new DateTime('09:11:00');
                                            $limitFaltaMa = new DateTime('13:59:59');

                                            $horaEntradaT = new DateTime('14:20:00');
                                            $limitHoraEntradaT = new DateTime('14:35:59');
                                            $horaSalidaT = new DateTime('19:30:00');
                                            $retardoTa = new DateTime('14:36:00');
                                            $limitRetardoTa = new DateTime('14:40:59');
                                            $faltaTa = new DateTime('14:41:00');
                                            $limitFaltaTa = new DateTime('16:59:59');
                                            
                                            $sql = "SELECT *, personal.num_empleado as personal, asistencia.horaEntrada as entrada, asistencia.horaSalida as salida from asistencia left join personal on personal.num_empleado = asistencia.idEmpleado order by asistencia.fecha asc, asistencia.idEmpleado asc, asistencia.horaEntrada asc";
                                            $resultado = $conexion->prepare($sql);
                                            $resultado->execute();
                                            $result = $resultado->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $horario){   
                                                $horaUno = new DateTime($horario['horaEntrada']);
                                                $horaDos = new DateTime($horario['horaSalida']);
                                                if($horaDos == new DateTime('00:00:00')){
                                                    $horaUno = new DateTime('00:00:00');
                                                    $resultado = $horaUno->diff($horaDos);
                                                    //$status = '<span class="bg-danger p-1 rounded">FALTA</span>';
                                                }else{
                                                    $resultado = $horaDos->diff($horaUno);
                                                }

                                                if(($horaUno >= $horaEntradaM and $horaUno <= $limitHoraEntradaM) or ($horaUno >= $horaEntradaT and $horaUno <= $limitHoraEntradaT)){
                                                    $status = '<span class="bg-success p-1 rounded">A TIEMPO</span>';
                                                }elseif (($horaUno > $retardoMa and $horaUno <= $limitRetardoMa) or ($horaUno > $retardoTa and $horaUno <= $limitRetardoTa)) {
                                                    $status = '<span class="bg-warning p-1 rounded">RETARDO</span>';
                                                }elseif(($horaUno > $faltaMa and $horaUno < $limitFaltaMa) or ($horaUno > $faltaTa and $horaUno < $limitFaltaTa) or ($horaUno > $faltaTa or $horaDos == new DateTime('00:00:00'))){
                                                    $status = '<span class="bg-danger p-1 rounded">FALTA</span>';
                                                }
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
                                                <?php echo $horario['horaEntrada']?>
                                            
                                            </td>
                                            <td>
                                                <?php echo $horario['horaSalida']?>
                                            </td>
                                            <td>
                                                <?php echo $resultado->format('%H:%I:%S')?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $status;
                                                ?>
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
