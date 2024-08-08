<?php
require_once 'partials/top.php';

// check-admin.php will use the get method to tell this page to display the wrong password message, otherwise don't display it
$wrongLogin = empty($_GET['wrong']) ? 0 : $_GET['wrong'];

?>
<article>
    <h2>Please log in to continue</h2>
    <form method="post" action="check-admin.php">
        <label>Username</label>
        <input name="username" required>

        <label>Password</label>
        <input name="password" type=password required>

        <?php
        if ($wrongLogin == 1) {
            echo '<p style="color:red;">Wrong username or password. Please try again.</p>';
        }
        ?>

        <a role="button" class="grey-button small-button" href="index.php">Cancel</a>
        <input class="big-button" type="submit" value="Log in">
    </form>
</article>

<?php
require 'partials/bottom.php';
?>