<?php
require_once 'Anuro.php';
require_once 'Urodelo.php';

// Variables para mensajes de error/success
$error_message = "";
$success_message = "";

// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asignar valores a variables desde el formulario
    $codigo = $_POST["codigo"];
    $anio = $_POST["anio_alta_catalogo"];
    $precio = $_POST["precio"];
    $nombre_cientifico = $_POST["nombre_cientifico"];
    $nombre_comun = $_POST["nombre_comun"];
    $habitat = $_POST["habitat"];
    $tipo_especie = $_POST["tipo_especie"];
    $continentes = $_POST["continentes"];

    // Validar input
    if (empty($codigo) || empty($anio) || empty($precio) || empty($nombre_cientifico) || empty($nombre_comun) || empty($habitat) || empty($tipo_especie) || empty($continentes)) {
        $error_message = "Error: Completa todos los campos.";
    } else {
        // Crear instancia de Anuro o Urodelo
        if ($tipo_especie == "anuro") {
            $especie = new Anuro($codigo, $anio, $precio, $nombre_cientifico, $nombre_comun, $habitat, $continentes);
            $especie->setPrecioPorContinente();
        } else {
            $especie = new Urodelo($codigo, $anio, $precio, $nombre_cientifico, $nombre_comun, $habitat, $tipo_especie);
            $especie->setPrecioMasCaro();
        }
        $success_message = "Especie creada correctamente. Precio final: " . $especie->getPrecio();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestión de especies de anfibios</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
    <h1>Gestión de especies de anfibios</h1>
    <?php
    // Imprimir mensajes de error/success
    if ($error_message != "") {
        echo "<div class='error-message'>$error_message</div>";
    } elseif ($success_message != "") {
        echo "<div class='success-message'>$success_message</div>";
    }
    ?>
    <h2>Crear especie</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="input-group">
            <label>Código:</label>
            <input type="text" name="codigo">
        </div>
        <div class="input-group">
            <label>Año de alta en el catálogo:</label>
            <input type="number" name="anio_alta_catalogo">
        </div>
        <div class="input-group">
            <label>Precio:</label>
            <input type="number" step="1" name="precio">
        </div>
        <div class="input-group">
            <label>Nombre científico:</label>
            <input type="text" name="nombre_cientifico">
        </div>
        <div class="input-group">
            <label>Nombre común:</label>
            <input type="text" name="nombre_comun">
        </div>
        <div class="input-group">
            <label>Hábitat:</label>
            <input type="text" name="habitat">
        </div>
        <div class="input-group">
            <label>Tipo de especie:</label>
            <select name="tipo_especie">
                <option value=""></option>
                <option value="anuro">Anuro</option>
                <option value="terrestre">Urodelo terrestre</option>
                <option value="acuatico">Urodelo acuático</option>
            </select>
        </div>
        <div class="input-group">
            <label>Continente:</label>
            <select name="continentes">
                <option value=""></option>
                <option value="Europa">Europa</option>
                <option value="Africa">África</option>
                <option value="Asia">Asia</option>
                <option value="America">América</option>
            </select>
        </div>
        <div class="input-group">
            <button type="submit" class="btn">Crear</button>
        </div>
    </form>

    <div class="datos">
        <?php
        // Mostrar datos guardados del formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $success_message != "") {
            echo "<h2>Especie creada</h2>";
            echo "<p><strong>Código:</strong> " . $codigo . "</p>";
            echo "<p><strong>Año de alta en el catálogo:</strong> " . $anio . "</p>";
            echo "<p><strong>Precio:</strong> " . $precio . " €</p>";
            echo "<p><strong>Nombre científico:</strong> " . $nombre_cientifico . "</p>";
            echo "<p><strong>Nombre común:</strong> " . $nombre_comun . "</p>";
            echo "<p><strong>Hábitat:</strong> " . $habitat . "</p>";
            echo "<p><strong>Tipo de especie:</strong> " . $tipo_especie . "</p>";
            echo "<p><strong>Continentes:</strong> " . $continentes . "</p>";
            echo "<p><strong>Precio final:</strong> " . $especie->getPrecio() . " €</p>";
        }
        ?>
    </div>
</body>
</html>