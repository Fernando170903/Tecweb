<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>

<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>

    <form action="http://localhost/tecweb/practicas/p07/index.php" method="get">
        Inresa el Número: <input type="text" name="number1"><br>
        <input type="submit" value="Comprobar">
    </form>


    <?php
    include_once 'C:/xampp/htdocs/tecweb/practicas/p07/src/funciones.php';

    if (isset($_GET['number1'])) {
        $num = $_GET['number1'];
        $numero_correcto = gen_multiploaletorio($num);
        echo "<pre>";
        print_r($numero_correcto);
        echo "</pre>";
    }
    ?>


    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p07/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
    if (isset($_POST["name"]) && isset($_POST["email"])) {
        echo $_POST["name"];
        echo '<br>';
        echo $_POST["email"];
    }
    ?>
</body>

</html>