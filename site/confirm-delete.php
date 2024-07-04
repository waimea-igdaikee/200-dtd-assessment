<?php
require 'partials/top.php';
require 'lib/utils.php'; 

$isAdmin = 1;

$bookingid = $_GET['id']; // Error protection needed

$query = "SELECT `name` FROM bookings WHERE id={$bookingid}";


$db = connectToDB();
// try to run the query
try
{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $name = $stmt->fetch();
}
catch (PDOException $e)
{
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}
?>

<article id=confirm-delete>
    <h3>Are you sure you want to delete this booking for <b><?= $name['name'] ?></b>?</h3>

    <a href="manage-booking.php?id=<?= $bookingid ?>"><button>Cancel</button></a>
    <a href="delete-booking.php?id=<?= $bookingid ?>"><button>Confirm Deletion</button></a>
</article>


<?php
require 'partials/bottom.php';
?>