<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}
$mysqli = new mysqli("localhost", "root", "", "tienda");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $email = trim($_POST['email']);
    $direccion = trim($_POST['direccion']);
    $tarjeta = trim($_POST['tarjeta']);
    $caducidad = trim($_POST['caducidad']);
    $codigo = trim($_POST['codigo']);

    $stmt = $mysqli->prepare(
        "UPDATE usuarios SET nombre=?, apellidos=?, email=?, direccion=?, tarjeta=?, caducidad=?, codigo=? WHERE id=?"
    );
    $stmt->bind_param(
        "sssssssi",
        $nombre,
        $apellidos,
        $email,
        $direccion,
        $tarjeta,
        $caducidad,
        $codigo,
        $id
    );
    if ($stmt->execute()) {
        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error al actualizar usuario: " . $stmt->error;
    }
    $stmt->close();
} else {
    $id = (int)$_GET['id'];
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $user = $resultado->fetch_assoc();
?>
    <form method="post">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($user['nombre']) ?>"><br>
        Apellidos: <input type="text" name="apellidos" value="<?= htmlspecialchars($user['apellidos']) ?>"><br>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"><br>
        Dirección: <input type="text" name="direccion" value="<?= htmlspecialchars($user['direccion']) ?>"><br>
        Nº tarjeta: <input type="text" name="tarjeta" value="<?= htmlspecialchars($user['tarjeta']) ?>"><br>
        Caducidad: <input type="date" name="caducidad" value="<?= htmlspecialchars($user['caducidad']) ?>"><br>
        Código: <input type="text" name="codigo" value="<?= htmlspecialchars($user['codigo']) ?>"><br>
        <button type="submit">Actualizar</button>
    </form>
<?php
    $stmt->close();
}
$mysqli->close();
?>