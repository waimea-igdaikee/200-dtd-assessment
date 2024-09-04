<?php
require_once 'partials/top.php';
$isAdmin = 1;
?>
<article>
    <h3>Add a service</h3>
    <form method="post" action="add-service.php">
        <label>Service Name</label>
        <input name="name" required>

        <label>Description</label>
        <textarea name="description" rows="4" cols="50"></textarea>

        <a role="button" class="grey-button small-button" href="manage-services.php">Cancel</a>
        <input class="big-button" type="submit" value="Add">
    </form>
</article>

<?php
require 'partials/bottom.php';
?>