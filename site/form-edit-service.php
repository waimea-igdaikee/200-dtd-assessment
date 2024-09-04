<?php
require_once 'partials/top.php';
$isAdmin = 1;
$serviceid = $_GET['id'];

// Get's service name
$query = "SELECT `name`, `description` FROM services WHERE id={$serviceid}";


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
    $service = $stmt->fetch();
} catch(PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}

?>
<article>
    <h3>Editing <?=$service['name']?> </h3>
    <form method="post" action="edit-service.php">
        <label>Service Name</label>
        <input name="name" value="<?=$service['name']?>" required>

        <label>Description</label>
        <textarea name="description" rows="4" cols="50"><?=$service['description']?></textarea>

         <input type="hidden" id="serviceid" name="serviceid" value="<?=$serviceid?>">

        <a role="button" class="grey-button small-button" href="manage-services.php">Cancel</a>
        <input class="big-button" type="submit" value="Update Service">
    </form>
</article>

<?php
require 'partials/bottom.php';
?>