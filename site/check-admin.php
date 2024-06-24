<?php

require 'partials/top.php';
require 'lib/utils.php'; 

?>


<h3>Working...</h3>

<?php

$username = $_POST['username'];
$password = $_POST['password'];

// Could do with improved security...
if ($username == "admin" && $password == "hunter123") {
    header("location: view-bookings.php"); 
} else {
    header("location: index.php");
}

?>


<?php include 'partials/bottom.php'; ?>