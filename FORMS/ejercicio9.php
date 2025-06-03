<?php

class Libro
{
    public $titulo;
    public $autor;
    public $anio;
    public $numPaginas;

    public function __construct($titulo, $autor, $anio, $numPaginas)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anio = $anio;
        $this->numPaginas = $numPaginas;
    }

    public function __getTitulo()
    {
        return $this->titulo;
    }

    public function __setTitulo($value)
    {
        $this->titulo = $value;
    }

    public function __getAutor()
    {
        return $this->autor;
    }

    public function __setAutor($value)
    {
        $this->autor = $value;
    }

    public function __getAnio()
    {
        return $this->anio;
    }

    public function __setAnio($value)
    {
        $this->anio = $value;
    }

    public function __getNumPaginas()
    {
        return $this->numPaginas;
    }

    public function __setNumPaginas($value)
    {
        $this->numPaginas = $value;
    }
}

function validateInput($input)
{
    if (empty($input)) {
        return null;
    }
    return htmlspecialchars(trim($input));
}

function validateNumber($input)
{
    if (!is_numeric($input)) {
        return false;
    }
    return true;
}

$isCreated = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = validateInput($_POST["title"]);
    $author = validateInput($_POST["author"]);
    $publishYear = validateInput($_POST["publishYear"]);
    $pages = validateInput($_POST["numPages"]);

    if (empty($title) || empty($author) || empty($publishYear) || empty($pages)) {
        $generalError = "Todos los campos son obligatorios.";
    } elseif (!validateNumber($publishYear) || !validateNumber($pages)) {
        $numberError = "$publishYear or $pages is not a number";
    } else {
        $book = new Libro($title, $author, $publishYear, $pages);
        $isCreated = true;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear libro</title>
</head>

<body>
    <?php if (!$isCreated): ?>
        <h1>Publicar libro</h1>
        <form method="post">
            <?php if (!empty($generalError)) echo "<p style='color:red;'>$generalError</p>"; ?>
            <?php if (!empty($numberError)) echo "<p style='color:red;'>$numberError</p>"; ?>

            <input type="text" name="title" placeholder="Título">
            <input type="text" name="author" placeholder="Autor">
            <input type="number" name="publishYear" placeholder="Año de publicación">
            <input type="number" name="numPages" placeholder="Número de páginas">
            <button type="submit">Publicar</button>
        </form>
    <?php else: ?>
        <div>
            <h1>Título: <?php echo $book->titulo; ?></h1>
            <p>Autor: <?php echo $book->autor; ?></p>
            <p>Año de publicación: <?php echo $book->anio; ?></p>
            <p>Número de páginas: <?php echo $book->numPaginas; ?></p>
        </div>
    <?php endif; ?>
</body>

</html>