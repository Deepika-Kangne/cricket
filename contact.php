<?php
include_once('header.php');
?>
<div class="inner-page-banner">
	<div class="container">
	</div>
</div>
<div class="inner-information-text">
	<div class="container">
		<h3>Contact</h3>
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">Contact</li>
		</ul>
	</div>
</div>
</section>
<section id="contant" class="contant main-heading team">
	<div class="row">
		<div class="container">
			<div class="contact">
				<div class="col-md-12">
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.580671926123!2d77.31096031514461!3d28.582351982437654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfcad59dc9d0b%3A0xe4060212422c0b9a!2sLeopedia+Web+Solutions!5e0!3m2!1sen!2sin!4v1511962485065" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-md-6">
					<div class="contact-info">
						<div class="kode-section-title">
							<h3>Contact Info</h3>
						</div>
						<div class="kode-forminfo">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
								labore et dolore magna aliqua. Ut enim ad minim veniam aliquip..</p>
							<ul class="kode-form-list">
								<li>
									<i class="fa fa-home"></i>
									<p><strong>Address:</strong> 805 consectetur adipiscing elit, sed do eiusmod tempor</p>
								</li>
								<li>
									<i class="fa fa-phone"></i>
									<p><strong>Phone:</strong> 123 456 7890</p>
								</li>
								<li>
									<i class="fa fa-envelope-o"></i>
									<p><strong>Email:</strong> Info@sportyleague.com</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="contact-us">
						<form method="post" class="comments-form" id="contactform">
							<ul>
								<li><input type="text" id="name" name="name" class="required" placeholder="Name *"></li>
								<li><input type="text" id="email" name="email" class="required email" placeholder="Email *">
								</li>
								<li><input type="text" name="address" id="address" placeholder="Address:"></li>
								<li><textarea name="message" id="message" placeholder="Add your message"></textarea></li>
								<li><input class="thbg-color" type="submit" value="send"></li>
							</ul>
							<div class="hidden-me" id="contact_form_responce">
								<p></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
include_once('footer.php');

if (!$_POST) exit;

// Email address verification, do not edit.
function isEmail($email)
{
	return (preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$first_name     = $_POST['first_name'];
$last_name     = $_POST['last_name'];
$email    = $_POST['email'];
$phone   = $_POST['phone'];
$select_price   = $_POST['select_price'];
$select_service   = $_POST['select_service'];
$subject  = $_POST['subject'];
$comments = $_POST['comments'];
$verify   = $_POST['verify'];

if (trim($first_name) == '') {
	echo '<div class="error_message">Attention! You must enter your name.</div>';
	exit();
} else if (trim($email) == '') {
	echo '<div class="error_message">Attention! Please enter a valid email address.</div>';
	exit();
} else if (!isEmail($email)) {
	echo '<div class="error_message">Attention! You have enter an invalid e-mail address, try again.</div>';
	exit();
}

if (trim($comments) == '') {
	echo '<div class="error_message">Attention! Please enter your message.</div>';
	exit();
}



// Configuration option.
// Enter the email address that you want to emails to be sent to.
// Example $address = "joe.doe@yourdomain.com";

//$address = "example@themeforest.net";
$address = "example@yourdomain.com";


// Configuration option.
// i.e. The standard subject will appear as, "You've been contacted by John Doe."

// Example, $e_subject = '$name . ' has contacted you via Your Website.';

$e_subject = 'You\'ve been contacted by ' . $first_name . '.';


// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

$e_body = "You have been contacted by $first_name. $first_name selected service of $select_service, their additional message is as follows. Customer max budge is $select_price, for this project." . PHP_EOL . PHP_EOL;
$e_content = "\"$comments\"" . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $first_name via email, $email or via phone $phone";

$msg = wordwrap($e_body . $e_content . $e_reply, 70);

$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if (mail($address, $e_subject, $msg, $headers)) {

	// Email has sent successfully, echo a success page.

	echo "<fieldset>";
	echo "<div id='success_page'>";
	echo "<h1>Email Sent Successfully.</h1>";
	echo "<p>Thank you <strong>$first_name</strong>, your message has been submitted to us.</p>";
	echo "</div>";
	echo "</fieldset>";
} else {

	echo 'ERROR!';
}
?>