<?php

require_once 'partials/top.php';

$name = $_POST['name'];
$description = $_POST['description'];


// Setup query to insert booking info
$query = 'INSERT INTO services (`name`, `description`) VALUES (?, ?)';

// // $db = connectToDB();
// // Try to run the query
// try
// {
//     $stmt = $db->prepare($query);
    // $stmt->execute([$name, $description]);
// }
// catch (PDOException $e)
// {
//     consoleLog($e->getMessage(), 'DB Post', ERROR);
//     die('There was an error sending data to the database');
// }

try {
    $db = new PDO($dsn, $username, $password);
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $description]);
} catch(PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}

header("location: manage-services.php");
?>


<?php include 'partials/bottom.php'; ?>