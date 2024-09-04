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



// $db = connectToDB();


// // Try to run the query
// try
// {
//     $stmt = $db->prepare($query);
//     $stmt->execute();
//     $booking = $stmt->fetch();
// }
// catch (PDOException $e)
// {
//     consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
//     die('There was an error getting data from the database');
// }

try {
    $db = new PDO($dsn, $username, $password);
    $stmt = $db->prepare($query);
    $stmt->execute();
    $booking = $stmt->fetch();
} catch(PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}


// Die if the booking we are trying to view doesn't exist, otherwise continue and convert date format to standard written format
if (is_array($booking) && isset($booking['date'])) {
    $date = strtotime($booking['date']);
} else {
    die("This booking couldn't be found. Perhaps it has been deleted?");
}



// Ternary operator ensures that if phone == 0 (meaning it was left blank) then it says 'Left blank'

$phone = ($booking['phone'] == 0) ? '<i>Left blank</i>' : $booking['phone'];
$location = ($booking['online'] == 1) ? 'Online' : 'In Person'
?>

<article>
    <h3>Viewing booking for<b> <?=$booking['Bname']?> </b></h3>

    <table>
        <tr>
            <td>
                <p>Name:</p>
            </td>
            <td>
                <p><?=$booking['Bname']?></p>
            </td>
        </tr>

        <tr>
            <td>
                <p>Date:</p>
            </td>
            <td>
                <p><?=date('d/m/Y', $date)?></p>
            </td>
        </tr>

        <tr>
            <td>
                <p>Service:</p>
            </td>
            <td>
                <p><?=$booking['Sname']?></p>
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
                <p><?=$booking['email']?></p>
            </td>
        </tr>

        <tr>
            <td>
                <p>Message:</p>
            </td>
            <td>
                <p><?=$booking['message']?></p>
            </td>
        </tr>

    </table>

    <a role="button" id="back-button" class="big-button" href="view-bookings.php">Finish Viewing</a> 
    <a role="button" class="small-button" id="delete-button" href="confirm-delete-booking.php?id=<?= $booking['BID'] ?>">Delete Booking</a>
</article>

<?php
require 'partials/bottom.php';
?>