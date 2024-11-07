<?php


$cadena_conexion = 'mysql:dbname=Escuela; host=localhost';
$usuario = 'root';
$clave='';

try{
    $conexion = new PDO($cadena_conexion,$usuario,$clave);
    $sql1 = "SELECT nombre FROM alumno WHERE codigo_curso IN
    ( SELECT codigo FROM curso WHERE nombre = ?)"; 
    
    //$resultado = $conexion->query($sql1);

    $resultado = $conexion->prepare($sql1);
    $resultado->execute(array('Matemáticas'));
    foreach($resultado as $alumno){
        echo $alumno['nombre'];
    }

}catch(PDOException $e){
    echo "Problema en la conexion";
} finally{
    $conexion = null;
}

