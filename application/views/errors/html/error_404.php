<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 No encontrada</title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #FFFFFF;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #FFFFFF;
	background-color: transparent;
	font-size: 25px;
	font-weight: normal;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
}

#container {
	order: 2px solid #620572;

-webkit-box-shadow: 2px 2px 5px #999;
 -moz-box-shadow: 2px 2px 5px #999;
}

p {
	margin: 12px 15px 12px 15px;
}

#info2 {
    background:#000F80;
    margin: -15px -8px -20px -8px;
}

a{
	color: #FFFFFF;
	size: 7px;

}

.boton {
text-decoration:none;
font-weight: 600;
font-size: 20px;
color:#333333;
padding-top:15px;
padding-bottom:15px;
padding-left:40px;
padding-right:40px;
background-color:#E2E9F1;
border-color: #d8d8d8;
border-width: 3px;
border-style: solid;
border-radius:35px;
}

.boton:hover {
background-color:#030753;
color: #FFFFFF;
}


</style>

</head>
<body>
<center>
	<section id="info2">
    <div class="container">
        <div class="info text-center"><br>
        <h2 id="wa"></h2>
        </div><br>
    </div>
    <img src="http://localhost/SICTA/404.png" width="529" height="320">
    <div>
		<h1><?php echo $heading; ?></h1>
		<br>
		<H2><?php echo $message; ?></H2>
	</div>
	<div>
		<h1>
		<img src="http://localhost/SICTA/escudo.png" width="70" height="60">
		<h3>SICTA 08 - 01 - 03</h3>
		<form action="http://localhost/SICTA/">
			<input type="submit" value="INICIO" class="boton" />
		</form>
	</div>
	<br><br><br><br><br><br>
</section>
</center>
</body>
</html>