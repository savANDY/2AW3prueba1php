<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de alumnos</title>
        
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
        
        

       echo "Estos son los alumnos de la BBDD:";
            
        echo "<table>";

        
                
        //1. Obtengo los alumnos de la base de datos
        //1. Datu basetik ikasleak jaso
        $sql = "SELECT * FROM `alumnos`";
        $result = mysqli_query($link, $sql);
       
       
        
                
        //2. Pintar datos en pantalla
        //2. Datuak pantailan bistaratu.
        echo ('<tr><td><b>id</b></td><td><b>Izena</b></td><td><b>Abizena</b></td><td><b>Telefonoa</b></td></tr>');
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        	echo ("<tr>");
        	echo ("<td>" . $row['IdAlumno'] . "</td><td> " . utf8_encode($row['Nombre']) . "</td><td> " . utf8_encode($row['Apellido']) . "</td><td> " . $row['Telefono'] . "</td>");
        	echo ("</tr>");
        }
        
        echo "</table>";
        
        //Libero la variable $result
        //$result aldagaia liberatu.
        mysqli_free_result($result);


        //Cerrar conexión
        //Conexioa itxi
        mysqli_close($link);
        
        ?>
        

            
        
    </body>
</html>
