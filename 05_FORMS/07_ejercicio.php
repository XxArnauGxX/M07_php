<?php

function limpiarCampo($campo)
{
    return htmlspecialchars(trim($campo));
}

function validarCorreo($correo)
{
    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function esMayorDeEdad($fecha)
{
    $nacimiento = DateTime::createFromFormat('Y-m-d', $fecha);
    if (!$nacimiento) return false;
    $hoy = new DateTime();
    $edad = $hoy->diff($nacimiento)->y;
    return $edad >= 18;
}


$nombre = $apellido = $correo = $fecha = "";
$errores = ["nombre" => "", "apellido" => "", "correo" => "", "fecha" => ""];
$registroOk = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = limpiarCampo($_POST["name"] ?? "");
    $apellido = limpiarCampo($_POST["surname"] ?? "");
    $correo = limpiarCampo($_POST["email"] ?? "");
    $fecha = limpiarCampo($_POST["birthday"] ?? "");

    if (empty($nombre)) $errores["nombre"] = "El nombre es obligatorio.";
    if (empty($apellido)) $errores["apellido"] = "El apellido es obligatorio.";
    if (empty($correo)) $errores["correo"] = "El correo es obligatorio.";
    if (empty($fecha)) $errores["fecha"] = "La fecha de nacimiento es obligatoria.";

    if (empty($errores["correo"]) && !validarCorreo($correo)) {
        $errores["correo"] = "Formato de correo no válido.";
    }

    if (empty($errores["fecha"])) {
        $esFechaValida = DateTime::createFromFormat('Y-m-d', $fecha) !== false;
        if (!$esFechaValida) {
            $errores["fecha"] = "La fecha no es válida.";
        } elseif (!esMayorDeEdad($fecha)) {
            $errores["fecha"] = "Debes tener al menos 18 años.";
        }
    }

    $registroOk = true;
    foreach ($errores as $e) {
        if (!empty($e)) $registroOk = false;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Formulario de registro</h2>
    <?php if ($registroOK): ?>
        <div class="ok">
            <h3>¡Registro correcto!</h3>
            <p><span class="dato">Nombre:</span> <?php echo $nombre; ?></p>
            <p><span class="dato">Apellido:</span> <?php echo $apellido; ?></p>
            <p><span class="dato">Correo:</span> <?php echo $correo; ?></p>
            <p><span class="dato">Fecha de nacimiento:</span> <?php echo $fecha; ?></p>
        </div>
    <?php else: ?>
        <form method="post">
            <label>
                Nombre:
                <input type="text" name="name" value="<?php echo $nombre; ?>">
                <?php if ($errores["nombre"]) echo '<span class="error"> ' . $errores["nombre"] . '</span>'; ?>
            </label><br>
            <label>
                Apellido:
                <input type="text" name="surname" value="<?php echo $apellido; ?>">
                <?php if ($errores["apellido"]) echo '<span class="error"> ' . $errores["apellido"] . '</span>'; ?>
            </label><br>
            <label>
                Correo:
                <input type="email" name="email" value="<?php echo $correo; ?>">
                <?php if ($errores["correo"]) echo '<span class="error"> ' . $errores["correo"] . '</span>'; ?>
            </label><br>
            <label>
                Fecha de nacimiento:
                <input type="date" name="birthday" value="<?php echo $fecha; ?>">
                <?php if ($errores["fecha"]) echo '<span class="error"> ' . $errores["fecha"] . '</span>'; ?>
            </label><br>
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>
</body>

</html>