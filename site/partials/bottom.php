</main>

<footer>
    <p>&copy; <?= date('Y') ?> Indiana Daikee</p>

    <!-- If $isAdmin exists and is true show the admin log out button instead of log in -->
    <?php
    if (isset($isAdmin) && $isAdmin == 1) {
        echo '<a role="button" href="index.php">Admin Logout</a>';
    } else {
        echo '<a role="button" href="form-admin.php">Admin Login</a>';
    }
    
    ?>
</footer>

</body>

</html>
