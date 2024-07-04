<?php
require 'partials/top.php';
require 'lib/utils.php'; 

$isAdmin = 1;

// Setup query to get company info
// $query = 'SELECT `name`,
//                  `date`,
//                  `service`
//             from bookings
//         ORDER BY `date`';


$bookingid = $_GET['id']; // Error protection needed

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
?>

<article>
    <h3>Viewing booking for<b> <?=substr($booking['Bname'],0,48)?> </b></h1>

    <table>
        <tr>
            <td>
                <p>Name:</p>
            </td>
            <td>
                <p><?=substr($booking['Bname'],0,48)?></p>
            </td>
        <tr>

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
                <p>Online:</p>
            </td>
            <td>
                <p><?=substr($booking['online'],0,48)?></p>
            </td>
        </tr>

        <tr>
            <td>
                <p>Phone Number:</p>
            </td>
            <td>
                <p><?=substr($booking['phone'],0,48)?></p>
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

    <a href="view-bookings.php"><button id="back-button"   >Finish Viewing</button></a> 
    <a href="confirm-delete.php?id=<?= $booking['BID'] ?>"><button id="delete-button">Delete Booking</button></a>
</article>



<?php
require 'partials/bottom.php';
?>