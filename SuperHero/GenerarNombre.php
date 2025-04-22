<!DOCTYPE html>
<html lang="en">
<head>
    <title>SuperNombre</title>
    <link rel="stylesheet" href="http://localhost/SuperHero/GenerarNombre.css">
</head>
<body>
 <main >
    <div class="container">
        <div class="p-container">
            <h1>Descubre tu Super Nombre </h1>
            <br>
            <form method="POST">
            <label>Nombre </label>
            <input type="text" class="t-input" name="nombre" require> 
            <br>
            <label>Apellido</label>
            <input type="text" class="t-input" name="apellido" require>
            <br>
            <input type= "submit" class= "btns" value= "NUEVO NOMBRE">
            </form>
        </div>
        <div class="p-container">
            <img src="./Images/FresaIni.jpg  ">
        </div>
    </div>
</main>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];

    $SuperNombre = ["Fresona", "Cereta", "Granadita", "Sandona", "Frambuesi", "Limonito", "Manzona", "Moraron", "Ciruelota", "Lichioso"];
    $Caracte = ["Buchona", "Picante", "Inmadura", "Envidiosa", "Nadaqueveriento", "Pasada", "Dulcesita"];
    $Habili = ["Ternura", "Rayo", "Fuerza", "Explosión", "Neblina", "Salto", "Antioxidante"];

    $nN = rand(0, count($SuperNombre) - 1);
    $nA = rand(0, count($Caracte) - 1);
    $NombreG = $SuperNombre[$nN];
    $CaractG = $Caracte[$nA];

    $caracteristicasSeleccionadas = array_rand($Caracte, 3);
    
    $habilidadesSeleccionadas = array_rand($Habili, 3);

    
    function generarEstrellas() {
        $numEstrellas = rand(1, 7);
        $estrellas = "";
        for ($i = 0; $i < $numEstrellas; $i++) {
            $estrellas .= "⭐"; 
        }
        return $estrellas;
    }

    echo "
    <div class='mensaje-container'>
        <div class='j-container'>
            <p>
                ¡Hola $nombre $apellido!, tu supernombre es 
                    <br><strong>$NombreG $CaractG
                    </strong> <br>
                <br><strong>Características:</strong> <br>";

    foreach ($caracteristicasSeleccionadas as $index) {
        $estrellas = generarEstrellas();
        echo "- {$Caracte[$index]}: $estrellas <br>";
    }

    echo "<br><strong>Habilidades:</strong> <br>";

    foreach ($habilidadesSeleccionadas as $index) {
        $estrellas = generarEstrellas();
        echo "- {$Habili[$index]}: $estrellas <br>";
    }

    echo "</p>
        </div>
        <div class='j-container'>
            <img src='./Images/$NombreG.jpg'>
        </div>
    </div>";
}
?>

</html>