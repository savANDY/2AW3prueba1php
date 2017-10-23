<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar Alumno</title>
    </head>
    <body>
        <a href="index.php" >Volver</a><br><br>
        
        
        
            
            <form action="Eliminar.php" method="post">
            <select id="Alumnos" name="Alumnos" onchange="rellenarDatos()" >
            <?php 
            
            //Conexión a la base de datos
            $link = mysqli_connect('localhost', 'root', '', 'examenreto1');
            
           // 1. Cargar los usuarios de la base en un desplegable.
           // 1. Erabiltzaileak zerrenda batetan bistaratu.
           
            $sql = "SELECT * FROM `alumnos`";
            $result = mysqli_query($link, $sql);
        
            
            while ($row = $result->fetch_assoc()){
 
            	echo '<option value="' . $row['IdAlumno'] . '">' . utf8_encode($row['IdAlumno']) . " "  . utf8_encode($row['Nombre']) . " " . utf8_encode($row['Apellido']) . " " . $row['Telefono'] . "</option>";

                }
        
           // 2. Mediante un botón lanzar la orden.
            //2. Botoi baten bidez, agindua bidali.
        
            //3. El formulario qeu se encargará de eliminar el usuario es "Eliminar.php"
            //3. "Eliminar.php" formularioa da erabiltzaileak ezabatuko dituena.
            
            ?>
            </select>
            <input type="submit" value="Borrar alumno"/>
            </form>
    </body>
</html>
