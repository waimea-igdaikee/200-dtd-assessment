<?php

require_once 'partials/top.php';

?>


<h3>Working...</h3>

<?php

$username = $_POST['username'];
$password = $_POST['password'];

// Checks admin username and password. Not at all secure, but good enough
if ($username == "admin" && $password == "hunter123") {
    header("location: view-bookings.php"); 
} else {
    echo 'Wrong password :(';
    header("location: form-admin.php?wrong=1");
}

?>


<?php include 'partials/bottom.php'; ?>