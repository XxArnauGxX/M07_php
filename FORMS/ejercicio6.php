<?php
function limpiarCampo($campo)
{
    return htmlspecialchars(trim($campo));
}

function validarNombre($nombre)
{
    return preg_match('/^[a-zA-Z0-9]+$/', $nombre);
}

function validarEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validarPassword($pass)
{
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{9,}$/', $pass);
}

$nombre = $email = $pass = $pass2 = "";
$mayor = false;
$errores = ["nombre" => "", "email" => "", "pass" => "", "pass2" => "", "mayor" => ""];
$mensajeOk = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = limpiarCampo($_POST["nombre"] ?? "");
    $email  = limpiarCampo($_POST["email"] ?? "");
    $pass   = limpiarCampo($_POST["pass"] ?? "");
    $pass2  = limpiarCampo($_POST["pass2"] ?? "");
    $mayor  = isset($_POST["mayor"]);

    if (empty($nombre)) {
        $errores["nombre"] = "El nombre es obligatorio.";
    } elseif (!validarNombre($nombre)) {
        $errores["nombre"] = "Solo se permiten letras y números.";
    }

    if (empty($email)) {
        $errores["email"] = "El email es obligatorio.";
    } elseif (!validarEmail($email)) {
        $errores["email"] = "El formato del email no es válido.";
    }

    if (empty($pass)) {
        $errores["pass"] = "La contraseña es obligatoria.";
    } elseif (!validarPassword($pass)) {
        $errores["pass"] = "Debe tener al menos 9 caracteres, una mayúscula, una minúscula y un número.";
    }

    if (empty($pass2)) {
        $errores["pass2"] = "Repite la contraseña.";
    } elseif ($pass !== $pass2) {
        $errores["pass2"] = "Las contraseñas no coinciden.";
    }

    if (!$mayor) {
        $errores["mayor"] = "Debes ser mayor de edad.";
    }

    $hayErrores = false;
    foreach ($errores as $e) {
        if (!empty($e)) {
            $hayErrores = true;
            break;
        }
    }
    if (!$hayErrores) {
        $mensajeOk = "¡Login correcto! Todos los datos son válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario Login con Validación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        .error {
            color: red;
            font-size: 0.95em;
        }

        .ok {
            color: green;
            font-weight: bold;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 220px;
            padding: 5px;
            margin-top: 3px;
        }
    </style>
</head>

<body>
    <h2>Formulario de Login</h2>
    <form method="post" autocomplete="off">
        <label>
            Nombre:<br>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
            <?php if ($errores["nombre"]) echo '<span class="error"> ' . $errores["nombre"] . '</span>'; ?>
        </label>
        <label>
            Correo electrónico:<br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <?php if ($errores["email"]) echo '<span class="error"> ' . $errores["email"] . '</span>'; ?>
        </label>
        <label>
            Contraseña:<br>
            <input type="password" name="pass" value="<?php echo htmlspecialchars($pass); ?>">
            <?php if ($errores["pass"]) echo '<span class="error"> ' . $errores["pass"] . '</span>'; ?>
        </label>
        <label>
            Repite contraseña:<br>
            <input type="password" name="pass2" value="<?php echo htmlspecialchars($pass2); ?>">
            <?php if ($errores["pass2"]) echo '<span class="error"> ' . $errores["pass2"] . '</span>'; ?>
        </label>
        <label style="margin-top: 18px;">
            <input type="checkbox" name="mayor" <?php if ($mayor) echo "checked"; ?>>
            Confirmo que soy mayor de edad
            <?php if ($errores["mayor"]) echo '<span class="error"> ' . $errores["mayor"] . '</span>'; ?>
        </label>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
    <?php if ($mensajeOk): ?>
        <div class="ok"><?php echo $mensajeOk; ?></div>
    <?php endif; ?>
</body>

</html>