<?php
require_once 'partials/top.php';

$isAdmin = 1;

$bookingid = $_GET['id'];

$query = "SELECT *,  bookings.name AS `Bname`,
                 services.name AS `Sname`,
                 bookings.id AS `BID`
          FROM bookings
          JOIN services ON bookings.service=services.id
          WHERE bookings.id = {$bookingid}
          ORDER BY `date`";



$db = connectToDB();


// try to run the query
try
{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $booking = $stmt->fetch();
}
catch (PDOException $e)
{
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}

// Ternary operator ensures that if phone == 0 (meaning it was left blank) then it says 'Left blank'

$phone = ($booking['phone'] == 0) ? 'Left blank' : substr($booking['phone'],0,48);
$location = ($booking['online'] == 1) ? 'Online' : 'In Person'
?>

<article>
    <h3>Viewing booking for<b> <?=substr($booking['Bname'],0,48)?> </b></h3>

    <table>
        <tr>
            <td>
                <p>Name:</p>
            </td>
            <td>
                <p><?=substr($booking['Bname'],0,48)?></p>
            </td>
        </tr>

        <tr>
            <td>
                <p>Date:</p>
            </td>
            <td>
                <p><?=substr($booking['date'],0,48)?></p>
            </td>
        </tr>

        <tr>
            <td>
                <p>Service:</p>
            </td>
            <td>
                <p><?=substr($booking['Sname'],0,48)?></p>
            </td>
        </tr>

        <tr>
            <td>
                <p>Location:</p>
            </td>
            <td>
                <p><?=$location?></p>
            </td>
        </tr>

        <tr>
            <td>
                <p>Phone Number:</p>
            </td>
            <td>
                <p><?=$phone?></p>
            </td>
        </tr>

        <tr>
            <td>
                <p>Email Address:</p>
            </td>
            <td>
                <p><?=substr($booking['email'],0,48)?></p>
            </td>
        </tr>

        <tr>
            <td>
                <p>Message:</p>
            </td>
            <td>
                <p><?=substr($booking['message'],0,48)?></p>
            </td>
        </tr>

    </table>

    <a role="button" id="back-button" class="big-button" href="view-bookings.php">Finish Viewing</a> 
    <a role="button" class="small-button" id="delete-button" href="confirm-delete.php?id=<?= $booking['BID'] ?>">Delete Booking</a>
</article>

<?php
require 'partials/bottom.php';
?>