<?php
session_start();

$validName = "Arnau";
$validPass = "arnau123";

$name = $pass = "";
$errors = ["name" => "", "pass" => ""];
$isOK = false;

function cleanInput($input)
{
    return htmlspecialchars(trim($input));
}

function validateForm($n, $p, $validName, $validPass)
{
    if ($n !== $validName || $p !== $validPass) {
        return false;
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = cleanInput($_POST["name"]);
    $pass = cleanInput($_POST["password"]);



    if (!validateForm($name, $pass, $validName, $validPass)) {
        $errors["name"] = "El nombre introducido no es válido.";
        $errors["pass"] = "La contraseña introducida no es válida.";
    } else {
        $_SESSION["user_id"] = "abc123";
        $userId = $_SESSION["user_id"];
        $welcomeMessage = "Bienvenido $validName con ID: $userId";
        $isOK = true;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>

<body>
    <h1>Iniciar Sesión</h1>
    <?php if ($isOK): ?>
        <div>
            <p><?php echo $welcomeMessage ?></p>
        </div>
    <?php else: ?>
        <form method="post">
            <input type="text" placeholder="Nombre" name="name" value="name">
            <?php if ($errors["name"]) echo '<span> ' . $errors["name"] . '</span>'; ?>
            <input type="password" placeholder="Contraseña" name="password">
            <?php if ($errors["pass"]) echo '<span> ' . $errors["pass"] . '</span>'; ?>
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>
</body>

</html>