<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
  <title>Inicio</title>
  <?php $this->load->view('header'); ?>
</head>
  <body>
  <header><?php $this->load->view('menu'); ?></header>
<section>
  <div id="efecto">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
      <div class="carousel-inner">
       <div class="carousel-item">
          <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" src="<?=$base_url?>/resources/img/f12.jpg" data-holder-rendered="true">
          <div class="carousel-caption d-none d-md-block">
            <h3>Totonicapán Guatemala</h3>
            <p>Coordinación Técnico Administrativo</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" src="<?=$base_url?>/resources/img/f13.jpg" data-holder-rendered="true">
          <div class="carousel-caption d-none d-md-block">
            <h3>Totonicapán Guatemala</h3>
            <p>Coordinación Técnico Administrativo</p>
          </div>
        </div>
        <div class="carousel-item active">
          <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="<?=$base_url?>/resources/img/f14.jpg" data-holder-rendered="true">
          <div class="carousel-caption d-none d-md-block">
            <h3>08 - 01 - 03</h3>
            <p>Licda. Gladys Pacheco</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div> 
  </div>
</section><br>
<center>
  <h4><?php echo $this->session->ROL ?> <?php echo $this->session->NOMBRE ?></h4>
      <div class="spinner-grow text-muted"></div>
      <div class="spinner-grow text-primary"></div>
      <div class="spinner-grow text-success"></div>
      <div class="spinner-grow text-info"></div>
      <div class="spinner-grow text-warning"></div>
      <div class="spinner-grow text-danger"></div>
      <div class="spinner-grow text-secondary"></div>
      <div class="spinner-grow text-dark"></div>
      <div class="spinner-grow text-light"></div>
    </center>
<br>
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Bienvenidos al Sistema</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row info text-center">
              <div class="col-12 col-md-12">
                <a class="btn btn-success btn-lg" href="<?=$base_url?>/Usuario/login">INGRESAR</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><br>
  </section><br><br>
  <section>
    <div class="card-group text-center">
      <div class="col-md-12 col-lg-3">
        <div class="card m-3">
        <img class="card-img-top mb-3" src="<?=$base_url?>/resources/img/mineduc.jpg" alt="Card image cap">
          <div class="card-block">
          <h4 class="card-title">MINEDUC</h4>
          <p class="card-text p-2">Portal Ministerio de Educación</p>
          <a class="btn btn-warning" href="http://www.mineduc.gob.gt/portal/" role="button" target="_blank">Visitar</a>                                  
          </div><br>
        </div>
      </div>
      <div class="col-md-12 col-lg-3">
        <div class="card m-3">
        <img class="card-img-top mb-3" src="<?=$base_url?>/resources/img/facede.jpg" alt="Card image cap">
          <div class="card-block">
          <h4 class="card-title">DIDEDUC</h4>
          <p class="card-text p-2">Facebook Dideduc Totonicapán</p>
          <a class="btn btn-warning" href="https://www.facebook.com/Departamental-de-Educaci%C3%B3n-de-Totonicap%C3%A1n-1718657618369400/" role="button" target="_blank">Visitar</a>                                  
          </div><br>
        </div>
      </div>
      <div class="col-md-12 col-lg-3">
        <div class="card m-3">
        <img class="card-img-top mb-3" src="<?=$base_url?>/resources/img/depa1.png" alt="Card image cap" >
          <div class="card-block">
          <h4 class="card-title">DIDEDUC</h4>
          <p class="card-text p-2">Portal Dideduc Totonicapán</p>
          <a class="btn btn-warning" href="http://dideductoto.blogspot.com/" role="button" target="_blank">Visitar</a>
          </div><br>
        </div>
      </div>
      <div class="col-md-12 col-lg-3">
        <div class="card m-3">
          <img class="card-img-top mb-3" src="<?=$base_url?>/resources/img/mineduc.jpg" alt="Card image cap" >
            <div class="card-block">
            <h4 class="card-title">Voucher</h4>
            <p class="card-text p-2">Sistema de Consulta del Empleado</p>
            <a class="btn btn-warning" href="https://apps2.mineduc.gob.gt/CGE/" role="button" target="_blank">Visitar</a>
            </div><br>
          </div>
        </div>
      </div>
    </div>
  </section><br>
  <section id="testimonios">
        <div class="container revs text-center text-light">
            <div class="tests pb-5">
                <h2 class="h4">¡Coordinación Técnico Administrativo!</h2>
            </div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="5000">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="<?=$base_url?>/resources/img/f22.jpg" class="rounded-circle pb-6" alt="First slide">
                        <h3>Gladys Pacheco</h3>
                        <p><em>"Me siento agradecida con el creador por facilitar las herramientas necesarias para los directores adjudicados a mi coordinación".</em></p>
                        <p><strong>Totonicapán, Guatemala</strong></p>
                    </div>
                    <div class="carousel-item">
                        <img src="<?=$base_url?>/resources/img/persona.png" class="rounded-circle pb-6" alt="Second slide">
                        <h3>Miguel Ajpop</h3>
                        <p><em>"Me siento Feliz".</em></p>
                        <p><strong>Totonicapán, Guatemnala</strong></p>
                    </div>
                    <div class="carousel-item">
                        <img src="<?=$base_url?>/resources/img/persona.png" class="rounded-circle pb-6" alt="Third slide">
                        <h3>Salomon</h3>
                        <p><em>"Afortunado".</em></p>
                        <p><strong>Totonicapán Guatemala</strong></p>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="icon-prev" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="icon-next" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Sistema de Coordinación</h3>
            <p class="lead mb-0">Aplicación Web</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Documentos de Apoyos</h3>
            <p class="lead mb-0">Documentos para determinados trámites relacionados con el docente</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Uso Fácil</h3>
            <p class="lead mb-0">El sistema es de uso práctico para el docente.</p>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <br>
  <section class="container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Mineduc Digital</h5>
        <img class="card-img-top mb-2" height="90%" src="<?=$base_url?>/resources/img/covid19.jpg" alt="Card image cap" >
        <center><a class="btn btn-primary" href="https://digital.mineduc.gob.gt/" role="button" target="_blank">Visitar</a></center>
      </div>
    </div>
  </section>
  <br>
  <section class="container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">#Aprendo en Casa</h5>
        <center><img   src="<?=$base_url?>/resources/img/aprendo.jpg" ></center>
        <center><a class="btn btn-primary" href="https://aprendoencasa.mineduc.gob.gt/" role="button" target="_blank">Visitar</a></center>
      </div>
    </div>
  </section>
  <footer><?php $this->load->view('footer') ?></footer>
  </body>
</html>