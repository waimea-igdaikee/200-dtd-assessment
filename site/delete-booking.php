<?php

require_once 'partials/top.php';

$isAdmin = 1;

$bookingid = $_GET['id']; // Error protection needed

?>


<h3>Working...</h3>

<?php

$db = connectToDB();

// Setup query to get company info
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
    die('There was an error sending data to the database');
}

echo '<h3>Success! Your booking has been deleted.</h3>';


header("location: view-bookings.php");

?>


<?php include 'partials/bottom.php'; ?>