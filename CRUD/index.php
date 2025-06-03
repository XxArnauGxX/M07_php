<?php
session_start();
$errores = $_SESSION['errores'] ?? [];
$old = $_SESSION['old'] ?? [];
session_unset();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro Ecommerce</title>
</head>

<body>
    <h1>Registro</h1>
    <form action="procesar_registro.php" method="post">
        Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($old['nombre'] ?? '') ?>">
        <?= $errores['nombre'] ?? '' ?><br>

        Apellidos: <input type="text" name="apellidos" value="<?= htmlspecialchars($old['apellidos'] ?? '') ?>">
        <?= $errores['apellidos'] ?? '' ?><br>

        Email: <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
        <?= $errores['email'] ?? '' ?><br>

        Contraseña: <input type="password" name="password">
        <?= $errores['password'] ?? '' ?><br>

        Confirmar contraseña: <input type="password" name="confirm_password">
        <?= $errores['confirm_password'] ?? '' ?><br>

        Dirección de envío: <input type="text" name="direccion" value="<?= htmlspecialchars($old['direccion'] ?? '') ?>"><br>

        Nº de tarjeta: <input type="text" name="tarjeta" value="<?= htmlspecialchars($old['tarjeta'] ?? '') ?>">
        <?= $errores['tarjeta'] ?? '' ?><br>

        Fecha de caducidad: <input type="date" name="caducidad" value="<?= htmlspecialchars($old['caducidad'] ?? '') ?>">
        <?= $errores['caducidad'] ?? '' ?><br>

        Código de seguridad: <input type="text" name="codigo" value="<?= htmlspecialchars($old['codigo'] ?? '') ?>">
        <?= $errores['codigo'] ?? '' ?><br>

        <button type="submit">Registrarse</button>
    </form>
</body>

</html>