<?php
session_start();
$errores = [];
$old = [];
function limpiar($valor)
{
    return htmlspecialchars(trim($valor));
}

$nombre = limpiar($_POST['nombre'] ?? '');
$apellidos = limpiar($_POST['apellidos'] ?? '');
$email = limpiar($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$direccion = limpiar($_POST['direccion'] ?? '');
$tarjeta = limpiar($_POST['tarjeta'] ?? '');
$caducidad = limpiar($_POST['caducidad'] ?? '');
$codigo = limpiar($_POST['codigo'] ?? '');

if (empty($nombre) || !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $nombre)) {
    $errores['nombre'] = 'Nombre obligatorio y solo letras.';
}
if (empty($apellidos) || !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $apellidos)) {
    $errores['apellidos'] = 'Apellidos obligatorios y solo letras.';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Email obligatorio y válido.';
}
if (empty($password) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{5,}$/', $password)) {
    $errores['password'] = 'La contraseña debe tener mayúscula, minúscula, número y mínimo 5 caracteres.';
}
if (empty($confirm_password) || $password !== $confirm_password) {
    $errores['confirm_password'] = 'Las contraseñas deben coincidir.';
}

if (!empty($tarjeta)) {
    if (!preg_match('/^\d{16}$/', $tarjeta)) {
        $errores['tarjeta'] = 'La tarjeta debe tener 16 números.';
    }
    if (empty($caducidad)) {
        $errores['caducidad'] = 'La fecha de caducidad es obligatoria.';
    } elseif (strtotime($caducidad) <= time()) {
        $errores['caducidad'] = 'La fecha debe ser futura.';
    }
    if (empty($codigo) || !preg_match('/^\d{3}$/', $codigo)) {
        $errores['codigo'] = 'Código de seguridad: 3 números.';
    }
}

$old = [
    'nombre' => $nombre,
    'apellidos' => $apellidos,
    'email' => $email,
    'direccion' => $direccion,
    'tarjeta' => $tarjeta,
    'caducidad' => $caducidad,
    'codigo' => $codigo
];

if ($errores) {
    $_SESSION['errores'] = $errores;
    $_SESSION['old'] = $old;
    header('Location: index.php');
    exit();
}

$passHash = password_hash($password, PASSWORD_DEFAULT);

$mysqli = new mysqli("localhost", "root", "", "tienda");
if ($mysqli->connect_errno) {
    die("Fallo al conectar: " . $mysqli->connect_error);
}
$stmt = $mysqli->prepare(
    "INSERT INTO usuarios (nombre, apellidos, email, password, direccion, tarjeta, caducidad, codigo) 
     VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
);
$stmt->bind_param(
    "ssssssss",
    $nombre,
    $apellidos,
    $email,
    $passHash,
    $direccion,
    $tarjeta,
    $caducidad,
    $codigo
);

if ($stmt->execute()) {
    $idUsuario = $stmt->insert_id;
    $_SESSION['id'] = $idUsuario;
    header('Location: usuarios.php');
    exit();
} else {
    echo "Error al registrar usuario: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
