<?php
require 'partials/top.php';
require 'lib/utils.php'; 


$db = connectToDB();

// Setup query to get company info
$query = 'SELECT `name`,
                 `date`,
                 `service`
            from bookings
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
    echo        substr($booking['name'],0,48);
    echo    '</td>';

    echo    '<td>';
    echo        substr($booking['date'],0,48);
    echo    '</td>';

    echo    '<td>';
    echo        substr($booking['Bservice'],0,48);
    echo    '</td>';
    echo '</tr>';
}
?>
</table>
</article>



<?php
require 'partials/bottom.php';
?>