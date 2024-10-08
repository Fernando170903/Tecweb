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


    <h2>Ejercicio 2</h2>
    <p>Generar secuencia de números aleatorios hasta obtener una secuencia impar, par, impar</p>
    <form method="post" action="index.php">
        <input type="submit" name="generar" value="Generar matriz">
    </form>

    <?php
    include_once 'C:/xampp/htdocs/tecweb/practicas/p07/src/funciones.php'; // Incluir archivo de funciones
    
    // Mostrar la matriz solo si se ha hecho un submit
    if (isset($_POST['generar'])) {
        // Llamar a la función para generar la secuencia
        $resultados = generarSecuencia();

        echo "<h3>Resultados:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Número 1</th><th>Número 2</th><th>Número 3</th></tr>";

        // Mostrar la matriz de números aleatorios
        foreach ($resultados['matriz'] as $fila) {
            echo "<tr>";
            foreach ($fila as $num) {
                echo "<td>$num</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        // Mostrar número de iteraciones y total de números generados
        echo "<p>{$resultados['totalNumeros']} números obtenidos en {$resultados['iteraciones']} iteraciones.</p>";
    }
    ?>

    <h2>Ejercicio 3</h2>
    <p>Encontrar el primer número aleatorio que sea múltiplo de un número dado</p>

    <!-- Formulario para enviar el número dado vía GET -->
    <form method="get" action="index.php">
        <label for="numero">Introduce un número:</label>
        <input type="text" id="numero" name="numero" required>
        <input type="submit" value="Encontrar múltiplo (while)">
    </form>

    <!-- Variante con do-while -->
    <form method="get" action="index.php">
        <input type="hidden" name="dowhile" value="1">
        <label for="numero">Introduce un número:</label>
        <input type="text" id="numero" name="numero" required>
        <input type="submit" value="Encontrar múltiplo (do-while)">
    </form>

    <?php
    include_once 'C:/xampp/htdocs/tecweb/practicas/p07/src/funciones.php'; // Incluir archivo de funciones
    
    // Comprobar si se ha enviado un número vía GET
    if (isset($_GET['numero']) && is_numeric($_GET['numero'])) {
        $numeroDado = intval($_GET['numero']);

        // Opción para ciclo do-while
        if (isset($_GET['dowhile'])) {
            // Llamar a la función que utiliza do-while
            echo "<h3>Resultado usando do-while:</h3>";
            $numeroAleatorio = encontrarMultiploDoWhile($numeroDado);
            echo "<p>El primer número aleatorio que es múltiplo de {$numeroDado} es: {$numeroAleatorio}</p>";
        } else {
            // Llamar a la función que utiliza while
            echo "<h3>Resultado usando while:</h3>";
            $numeroAleatorio = encontrarMultiploWhile($numeroDado);
            echo "<p>El primer número aleatorio que es múltiplo de {$numeroDado} es: {$numeroAleatorio}</p>";
        }
    }
    ?>

    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo con índices de 97 a 122 y mostrar las letras correspondientes en una tabla</p>

    <!-- Formulario para generar y mostrar el arreglo -->
    <form method="post" action="index.php">
        <input type="submit" name="generar" value="Generar arreglo y mostrar tabla">
    </form>

    <?php
    include_once 'C:/xampp/htdocs/tecweb/practicas/p07/src/funciones.php'; // Incluir archivo de funciones
    
    // Mostrar el arreglo solo si se ha hecho submit
    if (isset($_POST['generar'])) {
        // Llamar a la función para generar el arreglo
        $arreglo = generarArregloAscii();

        // Mostrar el arreglo en una tabla
        echo "<h3>Tabla de índices y valores ASCII:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Índice</th><th>Valor</th></tr>";

        // Leer el arreglo y mostrar cada índice y valor
        foreach ($arreglo as $key => $value) {
            echo "<tr><td>$key</td><td>$value</td></tr>";
        }

        echo "</table>";
    }
    ?>

    <!-- EJERCICIO 5 -->
    <h2>Ejercicio 5</h2>
    <p>Identificar persona de sexo "femenino" cuya edad esté entre 18 y 35 años</p>

    <form method="post" action="index.php">
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br>

        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select><br>

        <input type="submit" value="Verificar">
    </form>

    <?php
    if (isset($_POST['edad']) && isset($_POST['sexo'])) {
        $edad = intval($_POST['edad']);
        $sexo = $_POST['sexo'];

        if ($sexo === "femenino" && $edad >= 18 && $edad <= 35) {
            echo "<p>Bienvenida, usted está en el rango de edad permitido.</p>";
        } else {
            echo "<p>Error, no cumple con los criterios.</p>";
        }
    }
    ?>

    <h2>Ejercicio 6</h2>
    <p>Consultar información del parque vehicular por matrícula o todos los autos registrados</p>

    <form method="get" action="index.php">
        <label for="matricula">Buscar por Matrícula:</label>
        <input type="text" id="matricula" name="matricula"><br>
        <input type="submit" value="Buscar">
    </form>

    <form method="get" action="index.php">
        <input type="submit" name="todos" value="Mostrar todos los vehículos">
    </form>

    <?php
    if (isset($_GET['matricula']) && !empty($_GET['matricula'])) {
        $matricula = $_GET['matricula'];
        $vehiculos = obtenerParqueVehicular();

        if (isset($vehiculos[$matricula])) {
            echo "<h3>Información del vehículo con matrícula $matricula:</h3>";
            echo "<pre>";
            print_r($vehiculos[$matricula]);
            echo "</pre>";
        } else {
            echo "<h3>No se encontró información para la matrícula $matricula.</h3>";
        }
    }

    if (isset($_GET['todos'])) {
        $vehiculos = obtenerParqueVehicular();
        echo "<h3>Información de todos los vehículos registrados:</h3>";
        echo "<pre>";
        print_r($vehiculos);
        echo "</pre>";
    }
    ?>

</body>

</html>