<?php
require 'partials/top.php';
require 'lib/utils.php'; 


$db = connectToDB();

// Setup query to get company info
// $query = 'SELECT `name`,
//                  `date`,
//                  `service`
//             from bookings
//         ORDER BY `date`';


$bookingid = $_GET['id']; // Error protection needed

$query = "SELECT * FROM bookings WHERE id = {$bookingid}";



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
    <div>
        <p></p>
        <p></p>
    </div>
</article>



?>
</article>



<?php
require 'partials/bottom.php';
?>