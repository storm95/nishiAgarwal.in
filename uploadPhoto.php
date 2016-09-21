<?php
	$defineVariablesPhp = "defineVariables.php";

	require $defineVariablesPhp;
	require $dbConnectPhp;
?>

<?php
	$msg = NULL;

	if(isset($_POST[$dbChangeType]) && !empty($_POST[$dbChangeType]))
	{
		$getDbChangeType = mysql_real_escape_string($_POST[$dbChangeType]);
		
		if($getDbChangeType == $dbChangeTypeDelete)
		{	
			//Delete Photo
			if(isset($_POST[$colName]) && !empty($_POST[$colName]) )
			{
				$getColName = $_POST[$colName];
				
				$query = 'DELETE FROM `'.$dbName.'`.`'.$photoTableName.'` WHERE `'.$colName.'`="'.$getColName.'"';
			
				if(@mysql_query($query))
				{
					$msg = $getColName." is Deleted";
				}
				else
				{
					$msg = "Error in Deletion. Error : ".mysql_error()."      query : ".$query;
				}
			}
			else
			{
				$msg = "You didnot fill the Photo Name"; 
			}
		}
		elseif($getDbChangeType == $dbChangeTypeAdd) 
		{
			if((isset($_FILES[$photoFile]) && $_FILES[$photoFile]['error'] != UPLOAD_ERR_NO_FILE)
			&&(isset($_POST[$colName]) && !empty($_POST[$colName]))  
			&&(isset($_POST[$colDescription]))
			&&(isset($_POST[$colSize]))
			&&(isset($_POST[$colRank])) 
			)
			{
				$getColName = $_POST[$colName];
				$getColDescription = $_POST[$colDescription];
				$getColSize = $_POST[$colSize];
				$getColRank = $_POST[$colRank];

				$info = pathinfo($_FILES[$photoFile]['name']);
				$ext = $info['extension']; // get the extension of the file
				$colPhotoFileNameVal = $getColName.".".$ext; 
				$target = $photoDir.'/'.$colPhotoFileNameVal;
				if( is_writable($photoDir) && move_uploaded_file( $_FILES[$photoFile]['tmp_name'], $target))
				{
					echo 'File Uploaded';
				}
				else
				{
					echo 'Not uploaded';
				}
				
				$query= 'INSERT INTO  `'.$dbName.'`.`'.$photoTableName.'` (
					`'.$colName.'` ,
					`'.$colDescription.'` ,
					`'.$colSize.'`,
					`'.$colRank.'`,
					`'.$colPhotoFileName.'`
					)
					VALUES (
						"'.$getColName.'",  "'.$getColDescription.'",  "'.$getColSize.'",  "'.$getColRank.'", "'.$colPhotoFileNameVal.'"
					)';

				if(@mysql_query($query))
				{
					$msg = $getColName." successfully added.";
				}
				else
				{
					$msg = "Error in Adding Photo. Error : ".mysql_error();
				}
			}
			else
			{
				$msg = "Error. You didnot fill all the Fields";
			}
		}

	}
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
			<section>
				<div class="row">
					<h2><?php echo $msg; ?></h2>
				</div>
			</section>
			<section>
				<div class="row">
					<p> For Add : You have to fill in all the fields</p>
					<p> For Delete : You have to fill only the Photo Name</p>
				</div>
			</section>
			<section>
				<div class="row">
					<form action="uploadPhoto.php" method="POST" enctype="multipart/form-data">
						<input type="radio" name=<?php echo '"'.$dbChangeType.'"'; ?> value=<?php echo '"'.$dbChangeTypeAdd.'"'; ?> checked> Add<br>
						<input type="radio" name=<?php echo '"'.$dbChangeType.'"'; ?> value=<?php echo '"'.$dbChangeTypeDelete.'"'; ?> > Delete<br>
						<br>
						<input name=<?php echo '"'.$photoFile.'"'; ?> type="file"/>
						<br>
						<input name=<?php echo '"'.$colName.'"'; ?> placeholder="Photo Name"/>
						<br>
						<textarea name=<?php echo '"'.$colDescription.'"'; ?> placeholder="Description"></textarea>
						<br>
						<input name=<?php echo '"'.$colSize.'"'; ?> placeholder="Size"/>
						<br>
						<input name=<?php echo '"'.$colRank.'"'; ?> placeholder="Rank"/>
						<br>
						<input type="submit" value="Submit"/>
					</form>
				</div>
			</section>
		</div>
	</body>
</html>