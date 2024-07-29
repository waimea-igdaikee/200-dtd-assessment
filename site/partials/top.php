<?php 

require_once '_config.php';

$page = basename($_SERVER['SCRIPT_NAME']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= SITE_NAME ?></title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.yellow.min.css"/>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1 style="margin-bottom: 5px;"><?= SITE_NAME ?></h1>
    </header>

    <main>



