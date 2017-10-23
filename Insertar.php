<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertar registro</title>
    </head>
    <body>
       
        <?php
        
        //Conexión a la base de datos
        $link = mysqli_connect('localhost', 'root', '', 'examenreto1');
        
            //1. Recoger los datos del formulario.
            //1. Formularioan dauden datuak jaso.
        $Nombre = filter_input(INPUT_POST, 'Nombre');
        $Apellido = filter_input(INPUT_POST, 'Apellido');
        $Telefono = filter_input(INPUT_POST, 'Telefono');
        
            //2. Introducir el usuario en la base de datos.
            //2. Datu basean erabiltzailea sartu.
        $sql = "INSERT INTO `alumnos` (`Nombre`,`Apellido`,`Telefono`) VALUES ('$Nombre','$Apellido','$Telefono')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            echo "
                <script type=\"text/javascript\">
                    alert('Se ha insertado a: $Nombre $Apellido');
                    window.location.href = 'ListadoAlumnos.php';
                </script>
            ";
        } else {
        	
        }
   
        ?>
    </body>
</html>
