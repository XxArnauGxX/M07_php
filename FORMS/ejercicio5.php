<?php

function calculaSuma($a, $b)
{
    return $a + $b;
}

function calculaResta($a, $b)
{
    return $a - $b;
}

function calculaMultiplicacion($a, $b)
{
    return $a * $b;
}

function calculaDivision($a, $b)
{
    if ($b === 0) {
        echo "No se puede dividir entre $b";
        return;
    }
    return $a / $b;
}

function calculaPotencia($a, $b)
{
    return pow($a, $b);
}

$num1 = $num2 = $operacion = '';
$resultado = "";
$errores = ["num1" => "", "num2" => "", "general" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["num1"])) {
        $errores["num1"] = "Introduce el primer número.";
    } elseif (!is_numeric($_POST["num1"])) {
        $errores["num1"] = "Debe ser un número.";
    } else {
        $num1 = $_POST["num1"];
    }

    if (empty($_POST["num2"])) {
        $errores["num2"] = 'Introduce el segundo número.';
    } elseif (!is_numeric($_POST["num2"])) {
        $errores["num2"] = "Debe ser un número.";
    } else {
        $num2 = $_POST["num2"];
    }

    if (empty($_POST["operacion"])) {
        $errores["general"] = "Elige una operación.";
    } else {
        $operacion = $_POST["operacion"];
    }

    if (empty($errores["num1"]) && empty($errores["num2"]) && empty($errores["general"])) {
        switch ($operacion) {
            case "sumar":
                $resultado = calculaSuma($num1, $num2);
                break;
            case "restar":
                $resultado = calculaResta($num1, $num2);
                break;
            case "multiplicar":
                $resultado = calculaMultiplicacion($num1, $num2);
                break;
            case "dividir":
                $resultado = calculaDivision($num1, $num2);
                break;
            case "potencia":
                $resultado = calculaPotencia($num1, $num2);
                break;
            default:
                $errores["general"] = "Operación no válida";
        }
    }
}
?>

<!-- FORMULARIO HTML -->
<form method="post">
    <input type="text" name="num1" placeholder="Primer número" value="<?php echo htmlspecialchars($num1); ?>">
    <span style="color:red;"><?php echo $errores["num1"]; ?></span>
    <br><br>
    <input type="text" name="num2" placeholder="Segundo número" value="<?php echo htmlspecialchars($num2); ?>">
    <span style="color:red;"><?php echo $errores["num2"]; ?></span>
    <br><br>
    <label>
        <input type="radio" name="operacion" value="sumar" <?php if ($operacion == "sumar") echo "checked"; ?>> Sumar
    </label>
    <label>
        <input type="radio" name="operacion" value="restar" <?php if ($operacion == "restar") echo "checked"; ?>> Restar
    </label>
    <label>
        <input type="radio" name="operacion" value="multiplicar" <?php if ($operacion == "multiplicar") echo "checked"; ?>> Multiplicar
    </label>
    <label>
        <input type="radio" name="operacion" value="dividir" <?php if ($operacion == "dividir") echo "checked"; ?>> Dividir
    </label>
    <label>
        <input type="radio" name="operacion" value="potencia" <?php if ($operacion == "potencia") echo "checked"; ?>> Potencia
    </label>
    <br><br>
    <span style="color:red;"><?php echo $errores["general"]; ?></span>
    <br>
    <button type="submit">Calcular</button>
</form>

<!-- MOSTRAR RESULTADO -->
<?php if ($resultado !== "" && empty($errores["num1"]) && empty($errores["num2"]) && empty($errores["general"])): ?>
    <div style="margin-top:20px;">
        <strong>Resultado:</strong> <?php echo $resultado; ?>
    </div>
<?php endif; ?>