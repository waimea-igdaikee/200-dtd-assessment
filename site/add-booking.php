<?php

require_once 'partials/top.php';

echo empty($_POST['phone']);

// Ternary operators ensure that if an optional field is left blank then the server knows this is intentional and not an error
$service = $_POST['service'];
$online = $_POST['online'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = empty($_POST['phone']) == 1 ? '0' : $_POST['phone'];
$date = $_POST['date'];
$message = empty($_POST['message']) == 1 ? 'Left Blank' : $_POST['message'];

$db = connectToDB();

// Setup query to insert booking info
$query = 'INSERT INTO bookings (`service`, `online`, `name`, `email`, `phone`, `date`, `message`) VALUES (?, ?, ?, ?, ?, ?, ?)';

// Try to run the query
try
{
    $stmt = $db->prepare($query);
    $stmt->execute([$service, $online, $name, $email, $phone, $date, $message]);
}
catch (PDOException $e)
{
    consoleLog($e->getMessage(), 'DB Post', ERROR);
    die('There was an error sending data to the database');
}

header("location: index.php");
?>


<?php include 'partials/bottom.php'; ?>