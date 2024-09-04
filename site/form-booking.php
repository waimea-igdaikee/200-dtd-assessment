<?php
require_once 'partials/top.php';

$serviceid = $_GET['service'];

?>
<article>
    <h3>Create a booking</h3>
    <form method="post" action="add-booking.php">
        <label>Service</label>
        <select name="service" required>
            <option value="">Select a service:</option>
                <?php
                foreach ($services as $service)
                {
                    echo '<option value="' . $service['id'] . '"';
                    if ($serviceid == 'service' . $service['id']) {echo ' selected';} // If this is the service the user clicked on then select it by default
                    echo '>' . constant('SERVICE_NAME_' . $service['id']) . '</option>';
                }
                ?>
        </select>

        <label>Location</label>
        <div id="radio-div">
        <label for="online">Online
            <input type="radio" id="online" name="online" value=1 required>
        </label>

        <label for="in_person">In Person
            <input type="radio" id="in_person" name="online" value=0>
        </label>
        </div>

        <label>Name</label>
        <input name="name" required>

        <label>Email</label>
        <input name="email" type="email" required>

        <label>Phone number (Optional)</label>
        <input name="phone" type="text">

        <label>Date</label>
        <input name="date" type="date" required>

        <label>Message (Optional)</label>
        <textarea name="message" rows="4" cols="50"></textarea>

        <p>Valerie will send an email confirming your booking details shortly. Payment will be discussed further over email or phone.</p>
        <a role="button" class="grey-button small-button" href="index.php">Cancel</a>
        <input class="big-button" type="submit" value="Add">
    </form>
</article>

<!-- Adds a class to change the background colour of the currently selected radio button -->
<script>
    const radioButtons = document.querySelectorAll('input[name="online"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            // Remove the 'selected' class from all labels
            document.querySelectorAll('#radio-div label').forEach(label => {
                label.classList.remove('selected');
            });
            // Add the 'selected' class to the parent label of the checked radio button
            if (this.checked) {
                this.parentElement.classList.add('selected');
            }
        });
    });
</script>

<?php
require 'partials/bottom.php';
?>