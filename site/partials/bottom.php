</main>

<footer>
    <p>&copy; <?= date('Y') ?> Indiana Daikee</p>

    <!-- If $isAdmin exists and is true show the admin log out button instead of log in -->
    <?php
    if (isset($isAdmin) && $isAdmin == 1) {
        echo '<a href="index.php"><button>Admin Logout</button></a>';
    } else {
        echo '<a href="form-admin.php"><button>Admin Login</button></a>';
    }
    
    ?>
</footer>

</body>

</html>
