<?php

$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$mensaje = "";
$rutaImagen = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["imagen"])) {
    $archivo = $_FILES["imagen"];

    if ($archivo["error"] === UPLOAD_ERR_OK) {
        if ($archivo["size"] > 2 * 1024 * 1024) {
            $mensaje =  "El archivo es demasiado grande. El tamaño máximo es 2MB.";
        } else {
            $tiposPermitidos  = ["image/jpeg", "image/png", "image/gif"];
            if (!in_array($archivo["type"], $tiposPermitidos)) {
                $mensaje = "El archivo debe ser una imagen JPG, PNG o GIF.";
            } else {
                $nombreSeguro = basename($archivo["name"]);
                $destino = $uploadDir . $nombreSeguro;
                if (move_uploaded_file($archivo["tmp_name"], $destino)) {
                    $mensaje = "¡Imagen subida correctamente!";
                    $rutaImagen = $destino;
                } else {
                    $mensaje = "Error al guardar la imagen en el servidor.";
                }
            }
        }
    } else {
        $mensaje = "Hubo un error al subir el archivo.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir imagen</title>
</head>

<body>
    <h1>Subida de Imágenes</h1>
    <?php if ($mensaje): ?>
        <p style="color: <?= ($rutaImagen ? 'green' : 'red') ?>;"><?= $mensaje ?></p>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="imagen" accept=".jpg,.jpeg,.png,.gif">
        <button type="submit">Subir Imagen</button>
    </form>
    <?php if ($rutaImagen): ?>
        <h2>Vista previa:</h2>
        <img src="<?= htmlspecialchars($rutaImagen) ?>" alt="Imagen subida" style="max-width: 300px;">
    <?php endif; ?>
</body>

</html>