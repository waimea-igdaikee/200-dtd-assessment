<?php

require_once 'lib/utils.php'; 

$configQuery = 'SELECT * FROM services';


// $db = connectToDB();
// try to run the query
// try
// {
//     $stmt = $db->prepare($configQuery);
//     $stmt->execute();
//     $services = $stmt->fetchAll();
// }
// catch (PDOException $e)
// {
//     consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
//     die('There was an error getting service data from the database');
// }

$dsn = "mysql:host=localhost;dbname=igdaikee_200_assessment";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
    $stmt = $db->prepare($configQuery);
    $stmt->execute();
    $services = $stmt->fetchAll();
} catch(PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}

define('SITE_NAME', 'Valerie Daikee Life Coach');
define('SITE_AUTHOR', 'Indiana Daikee');

foreach ($services as $service)
{
    define('SERVICE_NAME_' . $service['id'], $service['name']);
    define('SERVICE_DESCRIPTION_' . $service['id'], $service['description']);
}

?>