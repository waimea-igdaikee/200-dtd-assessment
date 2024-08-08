<?php
require_once 'partials/top.php';

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
    <h3>Are you sure you want to delete this booking for <b><?= $name['name'] ?></b>?<br>This will <b>permanantly</b> delete this booking!</h3>
        <a role="button" class="grey-button small-button" href="manage-booking.php?id=<?= $bookingid ?>">Cancel</a>
        <a role="button" id="delete-button" class="big-button" href="delete-booking.php?id=<?= $bookingid ?>">Confirm Deletion</a>
</article>


<?php
require 'partials/bottom.php';
?>