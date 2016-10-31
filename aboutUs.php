<?php
	$defineVariablesPhp = "defineVariables.php";

	require $defineVariablesPhp;
	require $dbConnectPhp;
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=divice-width, initial-scale=1.0">
		<title>Nishi Agarwal</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/customIndex.css">
	</head>
	<body>
		<div class="container">
			<?php require("header.php"); ?>
			<hr>
			<section>
				<div class="divAboutUs">
					<div class="aboutUsHeadingDiv">
						<h2 class="aboutUsHeading"><span>AN ACCIDENTAL ARTIST !</span></h2>
					</div>
					<div class="contentAboutUs">
						<div class="row">
							<div class="img-div col-lg-5 col-md-5 col-sm-5 col-xs-5">
								<img src="Images/profilePic.jpg">
							</div>
							<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
								<p>I am working for the coolest startup in the world as an operation consultant.</p>
								<p><span class="impText">I believe in Magic & waiting for it to happen in life.</span></p>
								<p>I was always scared to put my art work up on the world wide, but someday I had to because I always thought it was different. <span class="impText">Painting & Sketching</span> has always been something which has brought me to peace and its an imaginary world of its own once you are diving into it. <span class="impText">A world of possibilities & Absolute Magic.</span></p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<hr>
			<section>
				<div class="row" id="ContactUs">
					<div>
						<h3>Contact Details</h3>
					</div>
					<div>
						<ul>
							<li>
								<p><span>Gmail : </span><span>xyz@odsiju.com</span></p>
							</li>
							<li>
								<p><span>Phone No : </span><span>7761847484</span></p>
							</li>
							<li>
								<p><span>Facebook : </span><a href=""><span>Nishi</span></a></p>
							</li>
							<li>
								<p><span>Instagram : </span><a href=""><span>Nishi</span></a></p>
							</li>
							<li>
								<p><span>Twitter : </span><a href=""><span>Nishi</span></a></p>
							</li>
							
						</ul>
					</div>
				</div>
			</section>
			<?php require("footer.php"); ?>
		</div>

		<!-- Modals Start-->
		<?php require("modal.php"); ?>
		<!-- Modals end -->

		<!-- JavaScript -->
		<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>
</html>
