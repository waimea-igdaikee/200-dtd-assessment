<?php
require_once 'partials/top.php';
$isAdmin = 1;
?>

<a role="button" class='grey-button' href="form-service.php">New Service</a>

<?php
foreach ($services as $service)
{
    echo '<article>';
    echo    '<h3>' . constant('SERVICE_NAME_' . $service['id']) . '</h3>';
    echo    '<p>' . constant('SERVICE_DESCRIPTION_' . $service['id']) . '</p>';
    echo    '<a role="button" style="margin-right: 0.3rem;" href="form-edit-service.php?id=' . $service['id'] . '">Edit service</a>';
    if (sizeof($services) !=1 ) { // To prevent problems, if only 1 service exists make sure it can't be deleted
        echo    '<a role="button" class="delete-button" href="confirm-delete-service.php?id=' . $service['id'] . '">Delete service</a>';
    }
    echo '</article>';
}

echo '<a role="button" href="view-bookings.php">Back to main admin page</a>';

require 'partials/bottom.php';
?>