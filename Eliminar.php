<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar registro</title>
    </head>
    <body>        
                
        <?php
        
        //Conexión a la base de datos
        $link = mysqli_connect('localhost', 'root', '', 'examenreto1');
        
            //1. Eliminar el usuario seleccionado en el combo.
            //1. Aukeratutako erabiltzailea ezabatu.
            
        $IdAlumno = filter_input(INPUT_POST, 'Alumnos');
                
        	if (!empty($IdAlumno)) {
        		$sql = "DELETE FROM `alumnos` WHERE (`IdAlumno`='$IdAlumno')";
        		mysqli_query($link, $sql);
        	}
        	
        	
           header("Location: ListadoAlumnos.php"); /* Redirect browser */
           exit();
            
        ?>
    </body>
</html>
