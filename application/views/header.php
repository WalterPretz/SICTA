<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>  
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="<?=$base_url?>/resources/css/bootstrap.min.css" />
	<script type="text/javascript" src="<?=$base_url?>/resources/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/resources/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/resources/js/edicion-plan.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/resources/js/alertify.js-0.3.11/lib/alertify.min.js"></script>
  <script type="text/javascript" src="<?=$base_url?>/resources/DataTables/datatables.min.js"></script>
  <link rel="stylesheet" href="<?=$base_url?>/resources/js/alertify.js-0.3.11/themes/alertify.core.css" />
  <link rel="stylesheet" href="<?=$base_url?>/resources/js/alertify.js-0.3.11/themes/alertify.default.css" / >
  <link rel="stylesheet" href="<?=$base_url?>/resources/css/icons.css" type="text/css"/ >
  <link rel="stylesheet" href="<?=$base_url?>/resources/css/all.min.css" / >
  <link rel="stylesheet" href="<?=$base_url?>/resources/DataTables/datatables.min.css"/>
  <link rel="icon" href="<?=$base_url?>/resources/img/w.ico" >
  <style type="text/css">

<style type="text/css">


/*navbar color y efecto*/
#efecto {
  margin:0px -20px 0px -20px;

  }

body {
		background-color: #fff;
		font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;

}

h1,h2,h3,h4,h5,h6 {
  font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-weight: 700;
}

.fondo1{
  background-color: #FFFFFF;
}

.ttl2{
  color: #F30000;
}

.ttl3{
  color: #FFFFFF;
  font-size: 1.10em;
  background-color: #001745;
}

.fondo:before {
  content:'';
  position: absolute;
        top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0,0,0,0.6);
}

modal-header, modal-body, {
  background: #FFFFFF;
}

/*regdoc*/
.content-form {
   background-image: linear-gradient(
    200deg, 
    rgba(94, 20, 3, 0.99) 30%, 
    rgba(0, 1, 43, 0.99) 75%);
    color: #fff;
    margin-top: 0;
    overflow: auto;
    padding: 0px 5px;
    width: 768px;
    margin: auto;
    border-radius: 10px;
    box-shadow: 2px 2px 5px #999;
}
.sub-title {
  text-align: center;
  font-size: 1.5em;
  color: #FFFFFF;
  margin: 10px auto;
}
.sub-title:after {
    content: "";
    width: 100px;
    height: 2px;
    background:#FFFFFF;
    display: block;
    margin: auto;
}

.ajust{
  margin-left: 1rem;
}

@media screen and (max-width:980px) {
    .content-form {
      width:98%;
    }
    section {
      width:68%;
    }
  }
 
  /* para 700px o menos */
  @media screen and (max-width:700px) {
    aside,section {
      float:none;
      width:96%;
    }

  }
 
  /* para 480px o menos */
  @media screen and (max-width:480px) {
    aside {
      display:none;
    }
  }

/*texto en la imagen*/
#texto1 {
	text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;
}

#texto2 {
	text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;
}
/*cuadro de menus*/
.info {    
    margin-bottom: 0; 
}

#info2 {
    background:#e9ecef;
    margin: -25px 0px 0px 0px;
}

#info4 {
    margin: 0px -40px 0px -40px;
}

#info3 {
    background:#191919;
    margin: 0px -40px 0px -40px
}
.pintar {
  color: #FFFFFF;
}

.card {
    box-shadow: 2px 5px 20px #777;
}

.card1 {
  height: 16rem;
  width: 9rem;
}
.modal-content {
    background:#004455;
}

.mn {
    color:#fff;
}


.espacio-arriba {
  padding-top: 5rem;
}

/*testimonios*/
.img1{
  width: 100%;
}

#testimonios {
    background:#2b2b2b;
    margin: 0px 0px 0px 0px;
}

.revs {
    padding: 100px;
}

/*inicio de login*/
.form-container{
  border: 1px solid #0190a2;
  padding: 50px 60px;

-webkit-box-shadow: 2px 2px 5px #999;
  -moz-box-shadow: 2px 2px 5px #999;
}

.abs-center {
  display: flex;
  align-items: center;
  justify-content: center;
}

.btn { border-radius: 0.35rem;}

form.user .btn-user {
  font-size: 0.8rem;
  border-radius: 10rem;
  padding: 0.75rem 1rem;
}

.btn-block {
  display: block;
  width: 100%;
}

.btn-block + .btn-block {
  margin-top: 0.5rem;
}

input[type="submit"].btn-block,
input[type="reset"].btn-block,
input[type="button"].btn-block {
  width: 100%;
}

form.user .custom-checkbox.small label {
  line-height: 1.5rem;
}

form.user .form-control-user {
  font-size: 1.2rem;
  border-radius: 10rem;
  padding: 1.5rem 1rem;
}

/*patrocinadores*/
.portafolio{
  width: 100%;
  max-width: 1400px;
  margin: auto;
}

.portafolio h1{
  text-align: center;
  font-size: 20px;
  margin: 0px 0px 0px;
}

.portafolio-container{
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -ms-flex-pack: justify;
  justify-content: space-between;
}

.portafolio-item{
  width: 50%;
  position: relative;
  overflow: hidden;

}

.portafolio-img{
  -webkit-transition: all 0.5s;
  transition: all 0.5s;
  width: 200%;
}

.portafolio-text{
  position: absolute;
  bottom: 0;
  padding: 20px;

  background: rgba(0,0,0,0.7);
  color: #fff;
  -webkit-transform: translateY(100%);
  -ms-transform: translateY(100%);
  transform: translateY(100%);
  -webkit-transition: all 0.5s ease-out;
  transition: all 0.5s ease-out;
}

.portafolio-text p{
  text-align: justify;
}

.portafolio-item:hover .portafolio-text{
  -webkit-transform: translateY(0%);
  -ms-transform: translateY(0%);
  transform: translateY(0%);
}

.portafolio-item:hover .portafolio-img{
  -webkit-transform: scale(2.15);
  -ms-transform: scale(1.15);
  transform: scale(1.15);
}

.container-flu {
  height: 20px;
  margin: 0px -42px 20px -40px;
  color: #203855;
  background-color: #203855;
 }


.wtitle {
    padding: 150px 20px; 
    text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;   
}

.wtitle h2 {
    font-size: 36px;
    font-weight: bold;
}

#colortexto {
  color: #0B015B;
  font-size: 40px;

}
/*calendario --*/
#calendar{
    max-width: 100%;
    margin: 10px auto;
    padding: 0 10px;
    font-size: 18px;
    font-weight: bold;
  }

.fc-title{
  color: #fff;
}
.fc-content{
  color: #fff;
}
/*calendario fin--*/
}
td{
text-align: left;
}

.td1{
text-align: left;
}

.td2{
text-align: center;
}
.col-6.col-sm-6{
  margin-top: 15px;
}

/*tabla*/
.card-body {
  flex: 1 1 auto;
  padding: 1.25rem;
}

.container-fluid {
  width: 100%;
  padding-right: 0.75rem;
  padding-left: 0.75rem;
  margin-right: auto;
  margin-left: auto;
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -0.75rem;
  margin-left: -0.75rem;
}

.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.table-responsive > .table-bordered {
  border: 0;

}
thead {
  color:#FFFFFF;
  background-color: #152F4F;
  text-align: center;
}

.table {
  width: 100%;
  margin-bottom: 1rem;
  color: #010430;
  border: 1px solid #4e9d47;
}

.table-bordered {
  border: 1px solid #4e9d47;
}

@media (max-width: 575.98px) {
  .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-sm > .table-bordered {
    border: 0;
  }
}

@media (max-width: 767.98px) {
  .table-responsive-md {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-md > .table-bordered {
    border: 0;
  }
}

@media (max-width: 991.98px) {
  .table-responsive-lg {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-lg > .table-bordered {
    border: 0;
  }
}

@media (max-width: 1199.98px) {
  .table-responsive-xl {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .table-responsive-xl > .table-bordered {
    border: 0;

  }
}

/*footer*/
.footer{
  background: #152F4F;
  color:white;
  
  .links{
    ul {list-style-type: none;
    }
    li a{
      color: white;
      transition: color .2s;
      margin-left: 10px;
      &:hover{
        text-decoration:none;
        color:#4180CB;
        }
    }
  }  
  .datos{
    i{font-size: 25px;}
    a{
      color:white;
      transition: color .2s;
      &:hover{color:#4180CB}
    }
  } 
  .ubiacaion{
    i{font-size: 18px;}
  }
  .copyright p{border-top:1px solid rgba(255,255,255,.1);} 
}

.img1 {
  size: 10px;
}

/*acerca*/
.showcase .showcase-text {
  padding: 3rem;
}

.showcase .showcase-img {
  min-height: 30rem;
  background-size: cover;
}

@media (min-width: 768px) {
  .showcase .showcase-text {
    padding: 7rem;
  }
}

.caracteristica-icon {
  font-size: 4rem;
  color: #050886; 
  padding-top: 4rem;
}

.features-icons {
  padding-top: 7rem;
  padding-bottom: 7rem;
}

.features-icons .features-icons-item {
  max-width: 20rem;
}

.features-icons .features-icons-item .features-icons-icon {
  height: 7rem;
}

.features-icons .features-icons-item .features-icons-icon i {
  font-size: 4.5rem;
}

.features-icons .features-icons-item:hover .features-icons-icon i {
  font-size: 5rem;
}

.call-to-action {
  position: relative;
  background-color: #343a40;
  background: url("<?=$base_url?>/resources/img/niño.jpg") no-repeat center center;
  background-size: cover;
  padding-top: 7rem;
  padding-bottom: 7rem;
}

.call-to-action .overlay {
  position: absolute;
  background-color: #212529;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  opacity: 0.3;
}

footer.footer {
  padding-top: 4rem;
  padding-bottom: 4rem;
}
</style>


