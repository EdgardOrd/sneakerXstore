<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

require_once('./php/conexion.php');
require_once('./php/component.php');

if (isset($_GET['id'])) {
    // Si existe, se asigna su valor a una variable
    $id = $_GET['id'];
} else {
    // Si no existe, se asigna el valor cero a la variable
    $_GET['id'] = 0;
    $id = 0;
}

// create instance of conexion class
$database = new conexion();

if (isset($_POST['add'])) {
    /// print_r($_POST['product_id']);
    if (isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        } else {

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    } else {

        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link rel="icon" href="upload/logo2.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php require_once("php/header.php"); ?>
    <div class="container">
        <div class="row py-3">
            <div class="container text-right">
                
                <div class="dropdown">
                <Span class="mr-3">Tallas:</Span>
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <?php
                        $talla_seleccionada = $_GET['id'];
                        echo $talla_seleccionada ? $talla_seleccionada : "Seleccione una talla";
                    ?>
                </a>

                <div class="dropdown-menu">
                    <?php
                        $result = $database->getTallas();
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $talla = $row['talla'];
                            $selected = ($talla == $talla_seleccionada) ? "selected" : "";
                            echo "<a class='dropdown-item' href='index.php?id={$talla}' {$selected}>{$talla}</a>";
                        }
                    ?>
                </div>
                </div>
                <!-- <select class="custom-select col-3"> -->
                <?php
                /* $result = $database->getTallas();
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['talla']}'>{$row['talla']}</option>";
                    }*/
                ?>
                <!-- </select> -->
            </div>
        </div>
        <div class="row text-center py-3">
            <?php
            if($id == 0)
            {
                $result = $database->getInStock(0);
            }
            else
            {
                $result = $database->getInStock($_GET["id"]);
            }
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                component($row['nombre'], $row['precio'], $row['imagen'], $row['id']);
            }
            ?>
        </div>
    </div>
    




    
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>