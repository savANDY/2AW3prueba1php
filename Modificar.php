<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar registro</title>
    </head>
    <body>        
                
        <?php
        
        //Conexión a la base de datos
        $link = mysqli_connect('localhost', 'root', '', 'examenreto1');
            
            //1. Recoger los datos del formulario.
            //1. Formularioan dauden datuak jaso.
        $IdAlumno = filter_input(INPUT_POST, 'Alumnos');
        
        $Nombre= filter_input(INPUT_POST, 'Nombre');
        $Apellido = filter_input(INPUT_POST, 'Apellido');
        $Telefono = filter_input(INPUT_POST, 'Telefono');
        
            //2. Modificar el usuario en la base de datos.
            //2. Datu basean erabiltzailea aldatu.
            
        if ((!empty($IdAlumno)) && (!empty($Nombre)) && (!empty($Apellido)) && (!empty($Telefono))) {
        	$sql = "UPDATE `alumnos` SET `Nombre`='$Nombre', `Apellido`='$Apellido', `Telefono`='$Telefono' WHERE `IdAlumno`='$IdAlumno'";
        		mysqli_query($link, $sql);
        		header("Location: ListadoAlumnos.php"); /* Redirect browser */
        		exit();
        } else {
        	echo ("Algún campo está vacío");
        	echo('<a href="index.php" >Volver</a>');
        }
        
          
            
        ?>
    </body>
</html>
