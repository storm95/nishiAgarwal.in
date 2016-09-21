<?php
	//php files
	$aboutUsPhp = "aboutUs.php";
	$defineVariablesPhp = "defineVariables.php";
	$footerPhp = "footer.php";
	$headerPhp = "header.php";
	$indexPhp = "index.php";
	$modalPhp = "modal.php";
	$onePhotoBlogPhp = "onePhotoBlog.php";
	$photoGallaryPhp = "photoGallary.php";
	$dbConnectPhp = "dbConnect.php";
	$uploadPhotoPhp = "uploadPhoto.php";
	$queryFunctionsPhp = "queryFunctions.php";
	$phpFunctionsPhp = "phpFunctions.php";

	//Directories
	$photoDir = "photos";
	
	//Get Variables
	$getMsg = NULL;
	$getPhotoId = NULL;
	$getDbChangeType = NULL;

	//Form Variables
	$dbChangeType = "dbChangeType";
	$dbChangeTypeAdd = "Add";
	$dbChangeTypeDelete = "Delete";
	$photoFile = "photoFile";

	//Database	
	$host= 'localhost';// '182.50.133.90';
	$user= 'storm95';
	$password= 'choton';
	$dbName = 'nishiAgarwalDb';
	
	//photoTable
	$photoTableName = 'photoTable';
	$colName = "name";
	$colDescription = "description";
	$colSize = "size";
	$colRank = "rank";
	$colPhotoFileName = "photoFileName";

	//Site Urls
	$siteUrlPrefix= 'localhost/NishiAgarwal/';
	$indexPageUrl = $siteUrlPrefix + $indexPhp;

	//Variables
	$noOfPhotosInRow = 3;
?>