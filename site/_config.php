<?php

require_once 'lib/utils.php'; 

$configQuery = 'SELECT `name`, `description` FROM services';


$db = connectToDB();
// try to run the query
try
{
    $stmt = $db->prepare($configQuery);
    $stmt->execute();
    $services = $stmt->fetchAll();
}
catch (PDOException $e)
{
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}

define('SITE_NAME', 'Valerie Daikee Life Coach');
define('SITE_AUTHOR', 'Indiana Daikee');

define('SERVICE_1', $services[0]['name']);
define('SERVICE_2', $services[1]['name']);
define('SERVICE_3', $services[2]['name']);

define('SERVICE_1_DESCRIPTION', $services[0]['description']);
define('SERVICE_2_DESCRIPTION', $services[1]['description']);
define('SERVICE_3_DESCRIPTION', $services[2]['description']);

?>