<?php
require 'partials/top.php';
require 'lib/utils.php'; 

$query = 'SELECT `description` FROM services';


$db = connectToDB();
// try to run the query
try
{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $descriptions = $stmt->fetchAll();
}
catch (PDOException $e)
{
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}


?>

<p>Welcome to <?= SITE_NAME ?>. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis mauris vitae dolor luctus placerat. Ut pulvinar sapien in eros ullamcorper, eu pulvinar magna porta. Sed nec magna neque. Ut ac pretium odio, vitae facilisis tortor. Morbi placerat at ligula consectetur pharetra. Etiam eu fringilla lorem. Aenean volutpat purus a sem venenatis pharetra. Sed purus enim, molestie vitae quam ut, sodales bibendum nulla.</p>

<p>Below are the services I offer:</p>

<article>
    <h3><?= SERVICE_1 ?></h3>
    <p><?= $descriptions[0]['description'] ?></p>
    <a href="form-booking.php?service=service1"><button>Create Booking</button></a>
</article>
<article>
    <h3><?= SERVICE_2 ?></h3>
    <p><?= $descriptions[1]['description'] ?></p>
    <a href="form-booking.php?service=service2"><button>Create Booking</button></a>
</article>
<article>
    <h3><?= SERVICE_3 ?></h3>
    <p><?= $descriptions[2]['description'] ?></p>
    <a href="form-booking.php?service=service3"><button>Create Booking</button></a>
</article>

<?php
require 'partials/bottom.php';
?>