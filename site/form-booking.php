<?php
require_once 'partials/top.php';

$serviceid = $_GET['service']; // Error protection needed

?>
<article>
    <form method="post" action="add-booking.php">
        <label>Service</label>
        <select name="service" required>
            <option value="1" <?php if ($serviceid == 'service1') {echo 'selected';} ?> ><?= SERVICE_1 ?></option>  <!-- The php if statement echoes 'selected' -->
            <option value="2" <?php if ($serviceid == 'service2') {echo 'selected';} ?> ><?= SERVICE_2 ?></option>  <!-- if $serviceid is that service.         -->
            <option value="3" <?php if ($serviceid == 'service3') {echo 'selected';} ?> ><?= SERVICE_3 ?></option>
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
            <a class="grey-button small-button" href="index.php"><button type='button'>Cancel</button></a>
            <input class = "big-button" type="submit" value="Add">
        </div>
    </form>
</article>

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