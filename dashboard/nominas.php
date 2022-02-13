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
                        <h1 class="mt-4">Nominas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Tabla</li>
                        </ol>
                       
                        <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Usuarios</h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Código</th>
      <th>Nombres</th>
      <th>Área</th>
      <th>Fecha Hora</th>
      <th>Asistencia</th>
      <th>Fecha</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <th>Opciones</th>
      <th>Código</th>
      <th>Nombres</th>
      <th>Área</th>
      <th>Fecha Hora</th>
      <th>Asistencia</th>
      <th>Fecha</th>
    </tfoot>   
  </table>
</div>


      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
                    </div> 
                </main>       
                <?php  include "vistas/modalAgregar.php";?>
                
<?php 
    require_once "vistas/inferior.php";
?>
