<?php
require_once 'partials/top.php';

$isAdmin = 1;

$db = connectToDB();

$query = 'SELECT bookings.name AS `Bname`,
                 `date`,
                 services.name AS `Sname`,
                 bookings.id `BID`
          FROM bookings
          JOIN services ON bookings.service=services.id
          ORDER BY `date`';



$db = connectToDB();


// try to run the query
try
{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $bookings = $stmt->fetchAll();
}
catch (PDOException $e)
{
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}

?>
<article>
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

    echo '<tr>';

    echo    '<td>';
    echo        substr($booking['Bname'],0,48);
    echo    '</td>';

    echo    '<td>';
    echo        substr($booking['date'],0,48);
    echo    '</td>';

    echo    '<td>';
    echo        substr($booking['Sname'],0,48);
    echo    '</td>';

    echo    '<td>';
    echo        '<a href="' . 'manage-booking.php?id=' . $booking['BID'] . '"><button> Manage Booking </button</a>';
    echo    '</td>';

    echo '</tr>';
}
?>
</table>
</article>



<?php
require 'partials/bottom.php';
?>