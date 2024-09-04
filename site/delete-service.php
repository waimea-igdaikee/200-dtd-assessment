<?php

require_once 'partials/top.php';

$isAdmin = 1;

$serviceid = $_GET['id'];

// Setup query to delete service
$query = "DELETE FROM services WHERE id={$serviceid}";

// $db = connectToDB();
// // try to run the query
// try
// {
//     $stmt = $db->prepare($query);
//     $stmt->execute();
// }
// catch (PDOException $e)
// {
//     consoleLog($e->getMessage(), 'DB Post', ERROR);
//     die('There was an error deleting the service from the database');
// }

try {
    $db = new PDO($dsn, $username, $password);
    $stmt = $db->prepare($query);
    $stmt->execute();
} catch(PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    if ($e->getCode() == '23000') { // Integrity constraint violation
        die('It looks like there is a booking for this service. Please ensure there are no bookings for this service before attempting to delete this service.');
    } else {
        die('There was an error getting service data from the database');
    }
}

header("location: manage-services.php");

include 'partials/bottom.php'; ?>