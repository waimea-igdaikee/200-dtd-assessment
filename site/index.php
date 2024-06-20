<?php
require 'partials/top.php';
require 'lib/utils.php'; 
?>

<p>Welcome to <?= SITE_NAME ?>. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis mauris vitae dolor luctus placerat. Ut pulvinar sapien in eros ullamcorper, eu pulvinar magna porta. Sed nec magna neque. Ut ac pretium odio, vitae facilisis tortor. Morbi placerat at ligula consectetur pharetra. Etiam eu fringilla lorem. Aenean volutpat purus a sem venenatis pharetra. Sed purus enim, molestie vitae quam ut, sodales bibendum nulla.</p>

<p>Below are the services I offer:</p>

<article>
    <h3><?= SERVICE_1 ?></h3>
    <p>Empowerment Coaching is coaching where you get empowered. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis mauris vitae dolor luctus placerat.</p>
    <a href="form-booking.php?service=service1"><button>Create Booking</button></a>
</article>
<article>
    <h3><?= SERVICE_2 ?></h3>
    <p>Life Skills teaches you the skills you need to learn for life. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <a href="form-booking.php?service=service2"><button>Create Booking</button></a>
</article>
<article>
    <h3><?= SERVICE_3 ?></h3>
    <p>Specialised Coaching is coaching specific to <i>you</i>. It teaches you what you need to know to succeed in life. Lorem ipsum dolor sit amet, consectetur adipscing elit.</p>
    <a href="form-booking.php?service=service3"><button>Create Booking</button></a>
</article>

<?php
require 'partials/bottom.php';
?>