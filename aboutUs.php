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
				<div class="row">
					<div>
						<h2><span>About The Artist</span></h2>	
					</div>
				</div>
				<div class="row">
					<div>
						<img src="Images/ArtistPic.jpg">
					</div>
				</div>
			</section>
			<hr>
			<section>
				<div class="row">
					<div>
						<p><span>BRING HOME THE NAPA VALLEY WITH "TEARING VINES" BY ANN REA, AN ORIGINAL OIL PAINTING</span></p>
					</div>
					<div>
						<h4>ONCE UPON A TIME…</h4>
						<p>a talented young girl pursued her dream of becoming a famous artist by attending a very prestigious and expensive art school.</p>
						<p>For five years she learned how to make art…but not how to make money from it.</p>
						<p>Then her student loan bill arrived.</p>
						<p>She realized that she needed to make money, more than she needed to make art.</p>
						<h3>EVERY DAY…</h3>
						<p>…she commuted to a grey-base colored corporate cubicle.</p>
						<p>But this artless existence drove her into a deeper depression and anxiety that she could not numb.</p>
						<p>Too often she would sit with two work mates and pass the time by complaining about the relentless office politics and their dull career paths.</p>
						<h4>BUT ONE DAY…</h4>
						<p>…she remembered. Both of her work mates were in recovery from Stage IV breast cancer.</p>
						<p>So she asked them, <em>“If you had a magic wand and you could do anything, and be assured of success, what would you do?”</em></p>
						<p>One said, <em>“I don’t know.” </em></p>
						<p>The other said, <em>“I’d be an interior designer. But I’m too afraid.” </em></p>
						<p>Stunned. She asked, <em>"Are you afraid living what life you have left to the fullest more than you are of surviving cancer?"</em></p>
						<h4>BECAUSE OF THAT…</h4>
						<p>she picked up her brush and palette to paint again after seven years.</p>
						<p>Then she wrote <span>a letter to an </span>American Art icon, Wayne Thiebaud, asking if he would critique her paintings.</p>
						<p>To her delight he responded and offered her encouragement to pursue painting full time.  </p>
						<h4>UNTIL FINALLY…</h4>
						<p>… she just couldn’t take one more two-hour commute, and 13-hour day, working for another “team leader.”</p>
						<p>So she decided to turn her dream of being a full time artist into her reality.</p>
						<p>In 2005, she moved to the beach in San Francisco and she wrote a plan to sell over $100K in one year.</p>
						<p>This unknown artist exceeded her sales goal and Fortune Magazine quoted her.</p>
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
								<p><span>Phone No : </span><span>9999999999</span></p>
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