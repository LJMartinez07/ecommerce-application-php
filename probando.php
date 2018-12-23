<?php 
$hoy= getdate();

$dia= $hoy['mday'];
$horas=$hoy['hours'];
$segundo=$hoy['seconds'];

$minutos= $hoy['minutes']; 
$mon= $hoy['mon'];
$year= $hoy['year'];

$actual =$year."/".$dia."/".$mon." ".$horas.":".$minutos.":".$segundo;
echo $actual ;
 ?>