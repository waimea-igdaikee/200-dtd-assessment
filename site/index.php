<?php
require_once 'partials/top.php';
?>
<p>Welcome to <?= SITE_NAME ?>. My passion is empowering others to live life to its full potential. I will help you challenge yourself to discover what you really want to achieve in your life and career. I will show you how to develop your potential by accessing your inner power to create confidence and transformation with your thoughts and beliefs to begin living a more fulfilling and purposeful life.</p>

<p>Below are the services I offer:</p>

<article>
    <h3><?= SERVICE_1 ?></h3>
    <p><?= SERVICE_1_DESCRIPTION ?></p>
    <a href="form-booking.php?service=service1"><button>Create Booking</button></a>
</article>
<article>
<h3><?= SERVICE_2 ?></h3>
    <p><?= SERVICE_2_DESCRIPTION ?></p>
    <a href="form-booking.php?service=service2"><button>Create Booking</button></a>
</article>
<article>
    <h3><?= SERVICE_3 ?></h3>
    <p><?= SERVICE_3_DESCRIPTION ?></p>
    <a href="form-booking.php?service=service3"><button>Create Booking</button></a>
</article>

<?php
require 'partials/bottom.php';
?>