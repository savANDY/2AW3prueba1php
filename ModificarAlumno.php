<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertar Alumno</title>
    </head>
    <body>
        <a href="index.php" >Volver</a><br><br>
        
        
        
        
        
        <form action="Modificar.php" method="POST">
            
            <select id="Alumnos" name="Alumnos" onchange="rellenarDatos()" >
                <?php 
                    $link = mysqli_connect('localhost', 'root', '', 'examenreto1');
                    $sql = mysqli_query($link, "SELECT * FROM Alumnos ORDER BY IdAlumno ");
                    while ($row = $sql->fetch_assoc()){
                        echo '<option value="' . $row['IdAlumno'] . '" title="' . utf8_encode($row['Nombre']) . "-" . utf8_encode($row['Apellido']) . "-" . $row['Telefono'] . '" >' . utf8_encode($row['Nombre']) . " " . utf8_encode($row['Apellido']) . " --- " . $row['Telefono'] . "</option>";

                    }
                ?>
            </select>
            <br>
            <br>
            
            
            Nombre: &nbsp;&nbsp;<input id="Nombre" type="text" name="Nombre" value=""><br>
            Apellido: &nbsp;<input id="Apellido" type="text" name="Apellido" value=""><br>
            Teléfono: &nbsp;<input id="Telefono" type="text" name="Telefono" value=""><br>
            <br>
            <input type="submit" value="Modificar" value="Modificar" />
            


        </form>
        
        
        <script type="text/javascript">
            function rellenarDatos(){
                
                var e = document.getElementById('Alumnos');
                var title = e.options[e.selectedIndex].title;

                 var datos = title.split('-');

                document.getElementById('Nombre').value = datos[0]; 
                document.getElementById('Apellido').value = datos[1];
                document.getElementById('Telefono').value = datos[2];
                
            }
         </script>
        
        <?php
            echo "   
                    <script type=\"text/javascript\">
                       rellenarDatos(); 
                   </script>       
                ";
        ?>
        
       
        
    </body>
</html>
