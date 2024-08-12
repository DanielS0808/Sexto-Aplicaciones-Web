<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
/*
echo "Hola Mundo";
echo 'Hola Mundo';
echo `Hola Mundo`;

$arreglo = array();
$arreglo = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

#echo "<ul>";

for($i=0; $i< count($arreglo); $i++){
	#echo "<li>". $arreglo[$i]. "</li>";
	echo '<div class="card-opening"><b>' . $arreglo[$i] . '</b></div>';
}
#echo "</ul>";

while($i < count($arreglo)){
	echo '<div class="card-opening"><b>' . $arreglo[$i] . '</b></div>';
	$i++;
}
($arreglo[2] == 1 ? "Correcto" : "Incorrecto");
*/

/**
 * 
 */
# Programacion Orientada a Objetos
# Consumir los recurso de Alumnos
$ListaAlumnos = [
	new Alumno("Juan", "Perez", 20, "2DAM", 7),
 	new Alumno("Adrian", "Arcos", 20, "POO", 7),
 	new Alumno("Alexis", "Pazmino", 20, "Aplicaciones Distribuidas", 7),
 	new Alumno("Bryan", "Moran", 20, "Aplicaciones Distribuidas", 7),
 	new Alumno("Carlos", "Pintag", 20, "Aplicaciones Distribuidas", 7),
 	new Alumno("Celso", "Pastasa", 20, "Aplicaciones Distribuidas", 7),
 	new Alumno("Cristian", "Pazmino", 20, "POO", 7),
 	new Alumno("Juan", "Perez", 20, "Programacion Web", 7)
 ];
# Variable proiedad o Metodo
#echo '<div class="card-opening"><b>' . $ListaAlumnos->getNombre() . '</b></div>';
#echo '<div class="card-opening"><b>' . $alumno->aporbar() . '</b></div>';
echo '<table class="table table-responsive table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Edad</th>
					<th>Asignatura</th>
					<th>Calificacion</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>';
foreach ($ListaAlumnos as $index => $alumno) {
	echo '<tr>
		<td>' . $index + 1 . '</td>
		<td>' . $alumno->getNombre() . '</td>
		<td>' . $alumno->getApellido() . '</td>
		<td>' . $alumno->getEdad() . '</td>
		<td>' . $alumno->getCurso() . '</td>
		<td>' . $alumno->getNota() . '</td>
		<td>
			<button class="btn btn-info">Ver</button>
			<button class="btn btn-primary">Editar</button>
			<button class="btn btn-danger">Eliminar</button>
		</td>
	</tr>';	
}
echo '</tbody>
		</table>';


class Alumno {
	public $nombre;
	public $apellido;
	public $edad;
	public $curso;
	public $nota;

	public function __construct($nombre, $apellido, $edad, $curso, $nota) {
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->edad = $edad;
		$this->curso = $curso;
		$this->nota = $nota;
	}

	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function getApellido(){
		return $this->apellido;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}
	public function getEdad(){
		return $this->edad;
	}
	public function setEdad($edad){
		$this->edad = $edad;
	}
	public function getCurso(){
		return $this->curso;
	}
	public function setCurso($curso){
		$this->curso = $curso;
	}
	public function getNota(){
		return $this->nota;
	}
	public function setNota($nota){
		$this->nota = $nota;
	}
	public function aporbar(){
		if($this->nota >= 5){
			return "Aprobado";
		}else{
			return "Reprobado";
		}
	}
}

