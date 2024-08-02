<?php
echo "Semana 1 - Tarea 1";
echo "<br/>";
echo "<br/>";
echo "Declaracion de Variables";
echo "<br/>";
$int = 0;
$flo = 0;
$str = "";
$bol = "";
$arr = array();

$int = 10;
$flo = 50.50;
$str = "Esta es una cadena";
$bol = true;
$arr = array(
	"a", "b", "c", "d", "e"
);

print_r($int);
echo "<br/>";
print_r($flo);
echo "<br/>";
print_r($str);
echo "<br/>";
print_r($bol);
echo "<br/>";
print_r($arr);
echo "<br/>";
echo "<br/>";
echo "Operaciones Aritméticas:";
echo "<br/>";
echo "Suma : ". $int + $flo;
echo "<br/>";
echo "Resta : ". $int - $flo;
echo "<br/>";
echo "<br/>";
echo "Manipulacion de Cadenas";
$cad1 = "Primera cadena Tarea 1";
$cad2 = "Segunda cadena Tarea 1";
echo "<br/>";
echo "Concatenacion de Cadenas: ".$cad1." ".$cad2;
echo "<br/>";
echo "Longitud de Cadenas: ".strlen($cad1." ".$cad2);
echo "<br/>";
echo "<br/>";

echo "Uso de Condicionales:";
echo "<br/>";
$var = true;

if ($var == true) {
	echo "La variable es verdadera";
}else{
	echo "La variables es falsa";
}

echo "<br/>";
echo "<br/>";
echo "Creacion de un Array";
echo "<br/>";

$array = array();
$array = array(
	"Dato 1", 
	"Dato 2",
	"Dato 3",
	"Dato 4",
	"Dato 5",
);

echo "Indice 3: ". $array[3];

