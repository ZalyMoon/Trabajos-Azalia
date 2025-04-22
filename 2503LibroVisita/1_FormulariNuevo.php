<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBRO DE VISITAS</title>
</head>
<body>

    <div class="container">
        <div class="p-container">
            <h1>Libro de visitas</h1>
            <form method="POST">
                <label>Nombre</label>
                <input type="text" class="t-input" name="nombre" placeholder="Nombre" required>
                <label id="msj1" style="visibility: hidden" > El nombre no puede ser tan largo</label>
                <br>
                <label>Correo</label>
                <input type="email" class="t-input" name="correo" placeholder="Correo" required>
                <br>
                <label>Mensaje:</label>
                <input type="text" class="t-input" name="mensaje" placeholder="Escribe tu mensaje" required>
                <input type="submit" class="btns" value="ENVIAR MENSAJE">

                <p class='error'>**Todos los campos son obligatorios</p>
            </form>
        </div>
    </div>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if(empty($_POST["nombre"]) || empty($_POST["correo"]) || empty($_POST["mensaje"])) {
            echo "error " ;
        } else {
            $nombre = htmlspecialchars($_POST["nombre"],ENT_QUOTES);
            $correo = htmlspecialchars($_POST["correo"],ENT_QUOTES);
            $mensaje = htmlspecialchars($_POST["mensaje"],ENT_QUOTES);
            $fecha = date("j/n/Y ");
            $hora = date ("H:i");
        }
        $error= [];
        $meses = [
            1 => "enero", 2 => "febrero", 3 => "marzo", 4 => "abril",
            5 => "mayo", 6 => "junio", 7 => "julio", 8 => "agosto",
            9 => "septiembre", 10 => "octubre", 11 => "noviembre", 12 => "diciembre"
        ];


        if (strlen($nombre <30)){
            $nombre=$nombre;
        }else {
        
              $error= 1; 
        }

        if (strlen($mensaje < 500)){
            $mensaje=$mensaje;
        }else{
            echo "<p>El mensaje no puede ser tan largo</p>";
            $error=2;
        }

        if($error=null){
        $archivo = fopen("libro.txt", "a+");
            if ($archivo) {
                fwrite($archivo, "Fecha: $fecha\nNombre: $nombre\nCorreo: $correo\nMensaje: $mensaje\n-----------------\n");
                fclose($archivo);
            }
        } else{
            echo "<p>no se pudo guardar la informacion</p>";
        }

    }

    if(file_exists("libro.txt")) {
        echo "<div class='L-container'>";
        echo "<h2>Libro de mensajes:</h2>";

        $lineas = file("libro.txt");
        foreach($lineas as $linea) {
            echo "<p>".htmlspecialchars($linea)."</p><hr>";
        }
        echo "</div>";
    }

    $counter = file_exists("contador.txt") ? (int)file_get_contents("contador.txt") : 0;
    $counter++;
    file_put_contents("contador.txt", $counter);
    echo "<div>Visitas: $counter</div>";

    ?>

</body>
</html>