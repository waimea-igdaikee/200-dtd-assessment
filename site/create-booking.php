<?php
require 'partials/top.php';
require 'lib/utils.php'; 
?>

<article>
    <form method="post" action="add-booking.php">
        <label>Full Name</label>
        <select name="service" required>
            <option value="service1">Empowerment Life Coaching</option>
            <option value="service2">Life Skills</option>
            <option value="service1">Special Coaching</option>
        </select>

        <label>Location</label>
        <input type="radio" id="html" name="online" value="yes">
        <label for="html">Online</label>
        <input type="radio" id="css" name="online" value="no">
        <label for="css">In person</label><br><br>

        <label>Name</label>
        <input name="name" required>

        <label>Email</label>
        <input name="email" type="email" required>

        <label>Phone number</label>
        <input name="phone" type="tel">

        <label>Date</label>
        <input name="date" type="date" required>

        <input type="hidden" name="service" value="<?= $id ?>">

        <input type="submit" value="Add">
    </form>
</article>