<?php

require_once 'partials/top.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Checks admin username and password. Could be bypassed, but is secure enough for my Mum's purposes.
if ($username == "admin" && $password == "hunter123") {
    header("location: view-bookings.php"); 
} else {
    echo 'Wrong password :(';
    header("location: form-admin.php?wrong=1");
}

include 'partials/bottom.php'; ?>