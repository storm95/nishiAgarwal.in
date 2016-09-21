<?php
	$defineVariablesPhp = "defineVariables.php";

	require $defineVariablesPhp;
	require $dbConnectPhp;
	require $queryFunctionsPhp;
	require $phpFunctionsPhp;
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
						<h3><span>Gallary</span></h3>	
					</div>
				</div>
			</section>
			<hr>
			<section>
				<?php
					 $allPhotoRowArray = querySelectAllRows($photoTableName);
					 for($i=0;$i<count($allPhotoRowArray);$i+=$noOfPhotosInRow)
					 {
					 	echo addPhotoRow($allPhotoRowArray, $i, $noOfPhotosInRow);
					 }
				?>

			</section>
			<hr>
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

<!-- Templates -->
<!-- Gallery Row template -->
<!--
<div class="row thumbnail-div">
	<div class="height-100 col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<div class="thumbnail">
			<a href="">
				<div> 
					<img src="Images/Artists_Palette.jpg" class="thumbnail-img">
				</div>
				<div class="caption thumbnail-body" >
					<div><h4><span>SAVOR THE COLORS OF THE MOMENT</span></h4></div>
					<div>
						<p><span>BRING HOME THE NAPA VALLEY WITH "TEARING VINES" BY ANN REA, AN ORIGINAL OIL PAINTING</span></p>
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="height-100 col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<div class="thumbnail">
			<a href="">
				<div>
					<img src="Images/Peacock.jpg" class="thumbnail-img">
				</div>
				<div class="caption thumbnail-body">
					<div><h4><span>SAVOR THE COLORS OF THE MOMENT</span></h4></div>
					<div>
						<p><span>BRING HOME THE NAPA VALLEY WITH "TEARING VINES" BY ANN REA, AN ORIGINAL OIL PAINTING</span></p>
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="height-100 col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<div class="thumbnail">
			<a href="">
				<div>
					<img src="Images/ScenaryCycle.jpg" class="thumbnail-img">
				</div>
				<div class="caption thumbnail-body">
					<div><h4><span>SAVOR THE COLORS OF THE MOMENT</span></h4></div>
					<div>
						<p><span>BRING HOME THE NAPA VALLEY WITH "TEARING VINES" BY ANN REA, AN ORIGINAL OIL PAINTING</span></p>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>

-->