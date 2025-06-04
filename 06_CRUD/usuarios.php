<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}

$mysqli = new mysqli("localhost", "root", "", "tienda");
if ($mysqli->connect_errno) {
    die("Fallo al conectar: " . $mysqli->connect_error);
}

$resultado = $mysqli->query('SELECT * FROM usuarios');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usuarios registrados</title>
</head>

<body>
    <h1>Listado de usuarios</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
        <?php while ($user = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['nombre']) ?></td>
                <td><?= htmlspecialchars($user['apellidos']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['direccion']) ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?= $user['id'] ?>">Editar</a> |
                    <a href="borrar_usuario.php?id=<?= $user['id'] ?>">Borrar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>
<?php
$mysqli->close();
?>