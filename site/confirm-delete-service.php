<?php
require_once 'partials/top.php';

$isAdmin = 1;

$serviceid = $_GET['id'];

// Get's service name for deletion conformation
$query = "SELECT `name` FROM services WHERE id={$serviceid}";


// $db = connectToDB();
// // Try to run the query
// try
// {
//     $stmt = $db->prepare($query);
//     $stmt->execute();
//     $name = $stmt->fetch();
// }
// catch (PDOException $e)
// {
//     consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
//     die('There was an error getting service data from the database');
// }

try {
    $db = new PDO($dsn, $username, $password);
    $stmt = $db->prepare($query);
    $stmt->execute();
    $name = $stmt->fetch();
} catch(PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}
?>

<article id=confirm-delete>
    <h3>Are you sure you want to delete <b><?= $name['name'] ?></b>?<br>This will <b>permanantly</b> delete this service!</h3>
        <a role="button" class="grey-button small-button" href="manage-services.php?id=<?= $serviceid ?>">Cancel</a>
        <a role="button" id="delete-button" class="big-button" href="delete-service.php?id=<?= $serviceid ?>">Confirm Deletion</a>
</article>


<?php
require 'partials/bottom.php';
?>