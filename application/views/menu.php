<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style media="screen">

  <?php
  if (isset($this->session->USUARIO)) { // Sesión iniciada
    $log = "<a class=\"nav-item nav-link active\" style=\"color: white;\" href=\"${base_url}/Usuario/logout\">SALIR</a>";
  }?>

</style>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #152F4F ">
    <img src="<?=$base_url?>/resources/img/escudo.png" width="40" height="32" class="d-inline-block align-top" href="<?=$base_url?>/Inicio">
  	<a class="navbar-brand" href="<?=$base_url?>/Inicio">INICIO</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  	</button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active active"><a class="nav-link" href="https://sire.mineduc.gob.gt/SREW/" target="_blank">SIRE<span class="sr-only"></span></a></li>
       
    <?php if ($this->session->ROL == 'CTA') { ?>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ESTABLECIMIENTOS</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Establecimientos/listar">Listado General</a>
          <a class="dropdown-item" href="<?=$base_url?>/Establecimientos/jornada">Jornadas</a>
          <a class="dropdown-item" href="<?=$base_url?>/Establecimientos/nivel">Nivel</a>
        </div>
      </li>

      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DOCENTES</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Docentes/docentes_establecimiento">Renglón Presupuestario</a>
          <a class="dropdown-item" href="<?=$base_url?>/Docentes/listard">Listado General</a>
         <!--     <a class="dropdown-item" href="<?=$base_url?>/Docentes/docentes_grado">Grado</a>
        </div>
      </li> 
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ALUMNOS</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Alumnos/alumno_establecimiento">Listado Establecimientos</a>
          <a class="dropdown-item" href="<?=$base_url?>/Alumnos/alumno_nivel">Listado Nivel</a>
          <a class="dropdown-item" href="<?=$base_url?>/Alumnos/alumno_grado">Listado Grado</a>
        </div>
      </li>  -->
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REGISTRO</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Establecimientos">Establecimientos</a>
          <a class="dropdown-item" href="<?=$base_url?>/Docentes">Docentes</a>
         <!-- <a class="dropdown-item" href="<?=$base_url?>/Alumnos">Alumnos</a>  -->
          <a class="dropdown-item" href="<?=$base_url?>/Usuario">Usuarios</a>
        </div>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ESTADÍSTICA</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Estadistica/reporte">Estadística de Establecimientos</a>
          <a class="dropdown-item" href="<?=$base_url?>/Estadistica/reporteDocentes">Estadística de Docentes</a>
          <!-- <a class="dropdown-item" href="#">Cantidad de Alumnos</a>
          <a class="dropdown-item" href="#">Cantidad de Escuelas</a>
          <a class="dropdown-item" href="#">Días Efectivos</a>   -->
        </div>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DOCUMENTOS</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/fallecimiento">Fallecimiento</a>
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/interinato">Interinato</a>
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/jubilacion">Jubilación</a>
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/ingreso">Primer Ingreso</a>
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/pagos">Solicitud de Pagos</a>
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/suspension">Suspensión IGSS</a>
        </div>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CALENDARIO</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Calendario">Eventos</a>
          <a class="dropdown-item" href="<?=$base_url?>/Establecimientos/diasEfectivo">Días Efectivo General</a> 
          <a class="dropdown-item" href="<?=$base_url?>/Calendario/CrearDia">Días Efectivo</a>
        </div>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CIRCULARES</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Documentos">Subir circulares</a>
          <a class="dropdown-item" href="<?=$base_url?>/Establecimientos/info">Circulares enviados</a> 
        </div>
      </li>
      </ul>
      </div>
      <ul class="navbar-nav end">
      <li class="nav-item active">
        <a class="navbar-brand" href="<?=$base_url?>/Usuario/logout">SALIR</a>
      </li>
    </ul>
    <?php } ?>
    
    <?php if ($this->session->ROL == 'Director(a)') { ?>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INFORMACIÓN</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Establecimientos/info">Información General</a>
        </div>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DOCENTES</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         <!-- <a class="dropdown-item" href="<?=$base_url?>/Docentes/docentes_grado">Grado</a>  -->
          <a class="dropdown-item" href="<?=$base_url?>/Docentes/listarDocenteEscuela">Listado General</a>
          <a class="dropdown-item" href="<?=$base_url?>/Docentes">Regitro de Docentes</a>
          
        </div>
      </li>
      <!--
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ALUMNOS</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Alumnos/alumno_nivel">Listado Nivel</a>
          <a class="dropdown-item" href="<?=$base_url?>/Alumnos/alumno_grado">Listado Grado</a>
          <a class="dropdown-item" href="<?=$base_url?>/Alumnos">Registro de Alumnos</a>
        </div>
      </li> -->
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DOCUMENTOS</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/fallecimiento">Fallecimiento</a>
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/interinato">Interinato</a>
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/jubilacion">Jubilación</a>
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/ingreso">Primer Ingreso</a>
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/pagos">Solicitud de Pagos</a>
          <a class="dropdown-item" href="<?=$base_url?>/Documentos/suspension">Suspensión IGSS</a>
        </div>
      </li>
      <!--
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CORREO</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Correo/recibir">Recepción</a>
        </div>
      </li>  -->
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CALENDARIO</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=$base_url?>/Calendario/CalendarioU">Eventos</a>
          <a class="dropdown-item" href="<?=$base_url?>/Calendario/CrearDia">Días Efectivo</a>
        </div>
      </li>
      </ul>   
    </div>
      <ul class="navbar-nav end">
      <li class="nav-item active">
        <a class="navbar-brand" href="<?=$base_url?>/Usuario/logout">SALIR</a>
      </li>
    </ul>
    <?php } ?>

</nav>  

