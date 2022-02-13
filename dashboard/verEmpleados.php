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
                        <h1 class="mt-4">Personal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Tabla</li>
                        </ol>
                       
                        <!--DIV IMPORTACION DE DATOS EXCEl-->
                        <div class="">
                            <h4 class="">Importar Archivo de Excel</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card p-4 bg-dark" style="--bs-bg-opacity: .1;">
                                        <form action="bd-personal/importarExcel.php" method="POST" name="formExcel" id="formExcel" enctype="multipart/form-data">
                                            <div>
                                                <label for="file" class="pe-4">Elija Archivo Excel
                                                </label>
                                                <input type="file" name="file" id="file" accept=".xls, .xlsx" class="pe-4">
                                                <button type="submit" id="btnArchivo" name="import" class="btn btn-dark">Importar Registros</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        
                        <hr>
                        <div class="mt-4 mb-4">
                            <h4>Registrar Personal</h4>
                        </div>
                        
                        <hr>
                        <div class="card mb-4">
                            
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla - Personal OEK
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <button id="btnNuevo" type="button" class="btn btn-dark btnNuevo" data-toggle="modal">
                                        Agregar
                                    </button>
                                </div>
                            <table id="datatablesSimple" class="table table-striped table-bordered table-dark" style="width:100%">
                            <thead class="bg-primary text-white text-center">
                                <tr>
                                    <th>NUM. EMPLEADO</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO PATERNO</th>
                                    <th>APELLIDO MATERNO</th>
                                    <th>EDAD</th>
                                    <th>TELEFONO</th>
                                    <th>CORREO</th>
                                    <th>FECHA DE NACIMIENTO</th>
                                    <th>GENERO</th>
                                    <th>DOMICILIO</th>
                                    <th>ESTADO</th>
                                    <th>PROVINCIA</th>
                                    <th>CODIGO POSTAL</th>
                                    <th>CURP</th>
                                    <th>RFC</th>
                                    <th>ESCOLARIDAD</th>
                                    <th>PUESTO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($personal as $personal) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $personal['num_empleado'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['nombre'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['ap_paterno'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['ap_materno'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['edad'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['num_tel'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['correo'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['fech_nacimiento'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['sexo'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['domicilio'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['estado'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['provincia'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['cod_postal'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['CURP'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['RFC'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['escolaridad'] ?>
                                    </td>
                                    <td>
                                        <?php echo $personal['puesto'] ?>
                                    </td>
                                    <td>
                                        <?php 
                                            echo "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar' data-toggle='modal'>EDITAR</button><button class='btn btn-danger btn-sm btnBorrar'>ELIMINAR</button></div></div>";
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
                <?php  include "vistas/modalAgregar.php";?>
                
<?php 
    require_once "vistas/inferior.php";
?>
