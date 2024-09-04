<?php
require_once 'partials/top.php';

$isAdmin = 1;

$query = 'SELECT bookings.name AS `Bname`,
                 `date`,
                 services.name AS `Sname`,
                 bookings.id `BID`
          FROM bookings
          JOIN services ON bookings.service=services.id
          ORDER BY `date`';



// $db = connectToDB();


// // try to run the query
// try
// {
//     $stmt = $db->prepare($query);
//     $stmt->execute();
//     $bookings = $stmt->fetchAll();
// }
// catch (PDOException $e)
// {
//     consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
//     die('There was an error getting data from the database');
// }


$dsn = "mysql:host=localhost;dbname=igdaikee_200_assessment";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
    $stmt = $db->prepare($query);
    $stmt->execute();
    $bookings = $stmt->fetchAll();
} catch(PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}


?>

<a role="button" class="grey-button" style="margin-bottom:0.6rem;" href="manage-services.php">Manage services</a>



<article>
    <h3>Bookings</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Service</th>
            <th></th>
        </tr>

<?php

foreach($bookings as $booking)
{
    $date = strtotime($booking['date']); // Convert date format

    echo '<tr>';

    echo    '<td>';
    echo        substr($booking['Bname'],0,48);
    echo    '</td>';

    echo    '<td>';
    echo        date('d/m/Y', $date);
    echo    '</td>';

    echo    '<td>';
    echo        substr($booking['Sname'],0,48);
    echo    '</td>';

    echo    '<td>';
    echo        '<a role="button" href="' . 'manage-booking.php?id=' . $booking['BID'] . '">Manage Booking</a>';
    echo    '</td>';

    echo '</tr>';
}
?>
</table>
</article>



<?php
require 'partials/bottom.php';
?>