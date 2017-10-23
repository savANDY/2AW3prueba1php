<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de notas por asignatura</title>
        
        <style>
            table{
                border: 1px double black;
            }
            tr, td, th{
                border: 1px solid crimson;
            }
        </style>
    </head>
    <body>
        <a href="index.php" >Volver</a><br><br>
        
        <?php
        
        //Conexión a la base de datos
        $link = mysqli_connect('localhost', 'root', '', 'examenreto1');
        
        

        
        //1. Obtengo los alumnos de la base de datos
        //1. Datu basetik ikasleak jaso
        $sql = "SELECT IdAsignatura, Nombre FROM `asignaturas`";
        $result = mysqli_query($link, $sql);
        
        //2. Pintar datos en pantalla
        //2. Datuak pantailan bistaratu.
        	
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        	echo ("---" . utf8_encode($row['Nombre']) . "---");
        	echo "<table>";
        	$idAsignatura = $row['IdAsignatura'];
        	
        	$sqlNotas = "SELECT IdAlumno, Nota FROM `notas` WHERE IdAsignatura = '$idAsignatura'";
        	$resultNotas = mysqli_query($link, $sqlNotas);
        	
        	
        	while ($notas = mysqli_fetch_array($resultNotas, MYSQLI_ASSOC)) {
        		
        		$idAlumno = $notas['IdAlumno'];
        		$sqlNombre = "SELECT Nombre, Apellido FROM `alumnos` WHERE IdAlumno = '$idAlumno'";
        		$resultNombre = mysqli_query($link, $sqlNombre);
        		
        		while ($nombre = mysqli_fetch_array($resultNombre, MYSQLI_ASSOC)) {
        			$nombreApellido = utf8_encode($nombre['Nombre']) . " " . utf8_encode($nombre['Apellido']);
        		}
        		
        		echo ("<tr>");
        		echo ("<td>" . $nombreApellido . "</td><td>" . $notas['Nota'] . "</td>");
        		echo ("</tr>");
        	}
        	
        	echo ("</table>");
        }
        
        
        //Nota. Puede que sean necesarios dos bucles
        //Oharra: Baliteke 2 bukle behar izatea.


        //Cerrar conexión
        mysqli_close($link);
        
        ?>
        

            
        
    </body>
</html>
