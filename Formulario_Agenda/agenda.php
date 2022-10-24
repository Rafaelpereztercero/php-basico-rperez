<!doctype html>
<html>
<head>
    <!-- Script de carga para Icon -->
    <script src="https://kit.fontawesome.com/32008d3e1f.js" crossorigin="anonymous"></script>
    <!-- Título de la página -->
    <title>Agenda de contactos</title>
</head>
<body>

<!-- Estilos generales -->
<style>
    body {
        background-color: grey;
    }

    header {
        position: relative;
        background-color: black;
        color: white;
        text-align: center;
        height: 60px;
    }

    form {
        margin-top: 10px;
        padding: 10px;
        position: relative;
        border-radius: 50px;
        margin-left: 20%;
        height: 185px;
        width: 70%;
        background-color: rosybrown;
    }

    #capsule {

        margin-left: 10%;
    }

    #list {
        width: 100%;
    }

    input {
        border-radius: 100px;
    }
</style>

<?php

// Declaración de funciones / phpdoc

/** Función para obtener la agenda
 * @return array|mixed
 */
function getAgenda()
{
    if (isset($_GET['agenda'])) {
        return $_GET['agenda'];
    } else {
        return array();
    }
}

/** Función para añadir/modificar/eliminar valores a agenda (pasamos por parametro con &)
 * @param $agenda
 * @return void
 */
function addNewValuesToAgenda(&$agenda)
{
    if (isset($_GET['submit'])) {
        $name_new = filter_input(INPUT_GET, 'a_name');
        $phone_new = filter_input(INPUT_GET, 'a_phone');

        if (empty($name_new)) {
            echo "<p style='color:#ff0000'>Please type a Name</p><br />";
        } elseif (empty($phone_new)) {
            echo "<p style='color:#00ff66'>The contact has been succesfully deleted!</p><br />";
            unset($agenda[$name_new]);
        } else {
            $agenda[$name_new] = $phone_new;
        }
    }
}

/** Función para insertar inputs ocultos
 * @param $agenda
 * @return void
 */
function setHidden($agenda)
{
    foreach ($agenda as $name => $phone) {
        echo '<input type="hidden" name="agenda[' . $name . ']" value="' . $phone . '"/>';
    }
}

/** Función para mostrar los contactos
 * @param $agenda
 * @return void
 */
function showContacts($agenda)
{
    if (count($agenda) == 0) {
        echo "<p>THE ADDRESS BOOK IS EMPTY...</p>";
    } else {

        echo "<ul>";
        foreach ($agenda as $name => $phone) {
            echo '<li> <i class="fa-solid fa-user"></i>   ' . $name . " | " . '<i class="fa-solid fa-phone"></i> ' . $phone . '</li><br>';


        }
        echo "</ul>";

    }
}

// Asignamos el valor de la agenda a la variable $agenda
$agenda = getAgenda();
// Función para añadir/modificar/eliminar valores a agenda
addNewValuesToAgenda($agenda);
?>

<!-- Inicio del header -->
<header>
    <h1 id="title">ADDRESS BOOK<h1/>
        <!-- Fin del header -->
</header>
<!-- Inicio del main -->
<main>
    <!-- Inicio del formulario -->
    <form>
        <div id="capsule">
            <h2>CREATE CONTACT</h2>
            <div>
                <?php
                // Función para insertar los inputs ocultos
                setHidden($agenda);
                ?>
                <!-- Inputs para que el usuario introduzca el nombre / telefono -->
                <label>Name: <input type="text" name="a_name"/></label><br/>
                <br>
                <label>Phone: <input id="phone" type="number" name="a_phone"/></label><br/>
                <br>
                <!-- Submit del formulario -->
                <input type="submit" name='submit' value="Save"/><br/>
            </div>
        </div>
        <!-- Fin del formulario -->
    </form>
    <br/>

    <!-- Inicio de la lista de contactos -->

    <div id="list">
        <h2>LIST OF CONTACTS</h2>
        <?php
        showContacts($agenda);
        ?>
    </div>
    <!-- Fin de la lista de contactos -->
</main>
<!-- Fin del main -->
</body>
</html>