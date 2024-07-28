<?php
require 'partials/top.php';
require 'lib/utils.php'; 
$wrongLogin = $_GET['wrong'];
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

        <a class="grey-button small-button" href="index.php"><button type='button'>Cancel</button></a>
        <input class="big-button" type="submit" value="Log in">
    </form>
</article>

<?php
require 'partials/bottom.php';
?>