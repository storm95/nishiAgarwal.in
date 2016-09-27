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
	$loginSignupPhp = "loginSignup.php";
	$forgotChangePwdPhp = "forgotChangePwd.php";

	//Directories
	$photoDir = "photos";
	
	//Get Variables
	$getMsg = "msg";
	$getPhotoId = NULL;
	$getDbChangeType = NULL;
	$getMsgVal = NULL;

	//Form Variables
	$dbChangeType = "dbChangeType";
	$dbChangeTypeAdd = "Add";
	$dbChangeTypeDelete = "Delete";
	$photoFile = "photoFile";
	$sendPwdVerifyCode = "sendPwdVerifyCode";

	//Database	
	$host= 'localhost'; //'182.50.133.85';
	$user= 'nishi';
	$password= 'nishi113';
	$dbName = 'nishiAgarwalDb';
	
	//photoTable
	$photoTableName = 'photoTable';
	$colName = "name";
	$colDescription = "description";
	$colSize = "size";
	$colRank = "rank";
	$colPhotoFileName = "photoFileName";

	//userTable
	$userTableName = "userTable";
	$colEmailId = "emailId";
	$colPassword = "password";
	$colLoginSignup = "loginSignup";
	$colFullName = "fullName";
	$colVerified = "verified";
	$colVerifyCode = "verificationCode";

	//forgotChangePwdTable
	$forgotChangePwdTable = "forgotChangePwdTable";
	$colPwdVerifyCode = "pwdVerifyCode";

	//Site Urls
	$siteUrlPrefix= 'localhost/NishiAgarwal/';//'http://nishiagarwal.in/';
	$indexPageUrl = $siteUrlPrefix.$indexPhp;
	$loginSignupUrl = $siteUrlPrefix.$loginSignupPhp;
	$forgotChangePwdUrl = $siteUrlPrefix.$forgotChangePwdPhp;

	//Variables
	$noOfPhotosInRow = 3;
	$showMsgModal = false;
?>