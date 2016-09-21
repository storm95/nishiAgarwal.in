<?php
	$defineVariablesPhp = "defineVariables.php";

	require $defineVariablesPhp;
	require $dbConnectPhp;
	require $queryFunctionsPhp;
	require $phpFunctionsPhp;
?>

<?php
	if(isset($_GET[$colName]) && ($photoRow = queryCol($photoTableName, $colName, $_GET[$colName])))
	{
		$getColName = $_GET[$colName];
	}
	else
	{
		//Redirect to index.php
		$getMsg = "No Photo of ".$_GET[$colName]." Name is present";
		$indexPageUrl = $indexPageUrl.'?msg='.$getMsg; 
		//die($getMsg.'      $photoRow = '.$photoRow);
		header('Location: '.$indexPageUrl);
	}

	//die($photoRow);
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
					<div id="photoNameDiv">
						<h2><span><?php echo $photoRow[$colName]; ?></span></h2>	
					</div>
				</div>
				<div class="row">
					<div id="photoDiv">
						<img src=<?php echo '"'.$photoDir.'/'.$photoRow[$colPhotoFileName].'"' ?> >
					</div>
				</div>
			</section>
			<hr>
			<section>
				<div class="row">
					<div id="photoDescriptionDiv">
						<p><span><?php echo $photoRow[$colDescription]; ?></span></p>
					</div>
				</div>
				<div class="row">
					<div id="photoFeatureDiv">
						<ul>
							<li><span>Size : </span><span><?php echo $photoRow[$colSize]; ?></span></li>
						</ul>
					</div>
				</div>
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