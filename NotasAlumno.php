<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Listado de notas por alumno</title>
        
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
        $sql = "SELECT DISTINCT a.IdAlumno, a.Nombre, a.Apellido FROM `alumnos` a, `notas` n WHERE n.idAlumno = a.idAlumno";
        $result = mysqli_query($link, $sql);
        
        //2. Pintar datos en pantalla
        //2. Datuak pantailan bistaratu.
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        	echo ("---" . utf8_encode($row['Nombre']) . " " . utf8_encode($row['Apellido']) . "---");
        	
        	echo "<table>";
        	$idAlumno = $row['IdAlumno'];
        	$sqlNotas = "SELECT IdAsignatura, Nota FROM `notas` WHERE IdAlumno = '$idAlumno'";
        	$resultNotas = mysqli_query($link, $sqlNotas);
        	
        	// Notas de cada alumno:
        	while ($row = mysqli_fetch_array($resultNotas, MYSQLI_ASSOC)) {
        		
        		$idAsignatura = $row['IdAsignatura'];
        		$sqlAsignatura = "SELECT Nombre FROM `asignaturas` WHERE IdAsignatura = '$idAsignatura'";
        		$resultAsignatura = mysqli_query($link, $sqlAsignatura);
        		echo ("<tr>");
	        	while ($nombre = mysqli_fetch_array($resultAsignatura, MYSQLI_ASSOC)) {
	        		echo ("<td>" . $nombre['Nombre'] . "</td>");
	        	}        		
        		echo ("<td> " . $row['Nota'] . "</td>");
        		echo ("</tr>");
        	}
        	echo "</table>";
        	
        }
        
        
        
        
        //Nota. Puede que sean necesarios dos bucles
        //Oharra: Baliteke 2 bukle behar izatea.
        
        


        //Cerrar conexión
        mysqli_close($link);
        
        ?>
        

            
        
    </body>
</html>
