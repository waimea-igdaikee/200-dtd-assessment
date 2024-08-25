<?php

require_once 'partials/top.php';

$isAdmin = 1;

$bookingid = $_GET['id'];

?>


<h3>Working...</h3>

<?php

$db = connectToDB();

// Setup query to delete booking
$query = "DELETE FROM bookings WHERE id={$bookingid}";

echo $query;

// try to run the query
try
{
    $stmt = $db->prepare($query);
    $stmt->execute();
}
catch (PDOException $e)
{
    consoleLog($e->getMessage(), 'DB Post', ERROR);
    die('There was an error deleting the booking from the database');
}

header("location: view-bookings.php");

include 'partials/bottom.php'; ?>