<?php
require_once 'partials/top.php';
?>
<div id=banner>
    <p>Welcome to <?= SITE_NAME ?>. My passion is empowering others to live life to its full potential. I will help you challenge yourself to discover what you really want to achieve in your life and career. I will show you how to develop your potential by accessing your inner power to create confidence and transformation with your thoughts and beliefs to begin living a more fulfilling and purposeful life.
    </p>
    <img src="content/val.jpg" alt="Valerie Daikee">
</div>
<p>When you create a booking, you will receive a confirmation email from me. Since everyone's situation and needs are different, we will discuss the payment details in this email to work out a plan that works best for you.</p>
<p>Below are the services I offer:</p>

<?php

// Service cards
foreach ($services as $service)
{
    echo '<article>';
    echo    '<h3>' . constant('SERVICE_NAME_' . $service['id']) . '</h3>';
    echo    '<p>' . constant('SERVICE_DESCRIPTION_' . $service['id']) . '</p>';
    echo    '<a role="button" href="form-booking.php?service=service' . $service['id'] . '">Create Booking</a>';
    echo '</article>';
}

require 'partials/bottom.php';
?>