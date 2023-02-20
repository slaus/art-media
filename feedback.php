<?php
// Email Submit
// Note: filter_var() requires PHP >= 5.2.0
//print_r($_POST);
if ( isset($_POST['first-name']) || isset($_POST['phone']) || isset($_POST['email']) || isset($_POST['date']) || isset($_POST['time']) || isset($_POST['message'])  ) {

		$to = "info@art-media.ro";	// receiver of the email
        $subject = "--- Message from art-media.ro website ---";			// subject of the email
	$message = '
	<html>
		<head>
    		<meta charset="utf-8">
			<title>Message from website</title>
		</head>
		<body>
			<h3>Name: <span style="font-weight: normal;">' . $_POST['first-name'] . '</span></h3>
			<h3>Phone: <span style="font-weight: normal;">' . $_POST['phone'] . '</span></h3>
			<h3>Email: <span style="font-weight: normal;">' . $_POST['email'] . '</span></h3>
			<h3>Meeting date: <span style="font-weight: normal;">' . $_POST['date'] . '</span></h3>
			<h3>Time: <span style="font-weight: normal;">' . $_POST['time'] . '</span></h3>
			<div>
				<h3 style="margin-bottom: 5px;">Comment:</h3>
				<div>' . $_POST['message'] . '</div>
			</div>
		</body>
	</html>';

	$headers  = "Content-type: text/html; charset=utf-8 \r\n";

	// E-mail sending function
	if (mail($to, $subject, $message, $headers)) {
	   echo '<html>
		    <head>
    	        <meta http-equiv="Refresh" content="5; URL=https://artmedia.mmix.ua/" />
    	    </head>
		    <body>
	            <div align="center" style="margin-top:30%;"><h4>Thank you, your email has been sent.</h4><h3>Our manager will contact you soon.</h3><h5>In 5 seconds you will be redirected to the site.<h5></div>
	        </body>
	    </html>';
	} else {
	   echo '<html>
		    <head>
    	        <meta http-equiv="Refresh" content="5; URL=https://artmedia.mmix.ua/" />
    	    </head>
		    <body>
	            <div align="center" style="margin-top:30%;"><h4>An error occurred while sending the message.</h4><h5>In 5 seconds you will be redirected to the site.</h5></div>
	        </body>
	    </html>';
	}

}
?>